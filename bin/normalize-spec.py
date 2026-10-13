#!/usr/bin/env python3
"""Normalise l'openapi.json du moteur avant génération (usage : normalize-spec.py ENTREE SORTIE).

Pourquoi : openapi-generator 7.10 (php-nextgen) lit mal les champs nullables OpenAPI 3.1 écrits
{"anyOf": [S, {"type": "null"}]} dans certains schémas (RecordIn, CriterionIn, valeurs de
additionalProperties) : il produit un modèle vide non nullable (H2, Evaluator, Visit...) qui
sérialise « {} » et perd la valeur. On réécrit donc chaque anyOf [S, null], où S est un schéma
doté d'un "type" et dont le niveau supérieur ne porte pas de "$ref", en S avec "type": [S.type, "null"],
en gardant titre, bornes et autres clés. Cela inclut les tableaux, y compris ceux dont "items" est un
"$ref" (seul un "$ref" au niveau supérieur de S est exclu). Les anyOf dont une variante est un "$ref"
(par exemple [{"$ref": ...}, null]) sont laissés tels quels. La variante null peut porter des clés
d'annotation (titre, description...), qui sont alors ignorées. Le nombre d'anyOf réécrits est écrit
sur la sortie d'erreur.
Le même générateur ne marque pas ces champs nullables dans les schémas qui portent
"additionalProperties": false (RecordIn, CriterionIn : setH2(null) lèverait une exception) : on retire
cette clé, qui ne sert qu'à la validation côté serveur et n'a aucun effet sur les modèles du SDK.
La spec du moteur n'est jamais modifiée : on n'écrit que la copie SORTIE.
"""
import json
import sys


# Clés d'annotation tolérées sur la variante null : elles ne changent pas le sens du schéma.
ANNOTATIONS = {"title", "description", "$comment", "deprecated", "example", "examples"}


def est_null(schema):
    return (
        isinstance(schema, dict)
        and schema.get("type") == "null"
        and set(schema) <= ANNOTATIONS | {"type"}
    )


def est_type_simple(schema):
    return isinstance(schema, dict) and isinstance(schema.get("type"), str) and "$ref" not in schema


def aplatir(noeud):
    """Retourne le schéma sans anyOf [S, null] si la règle s'applique, sinon None."""
    variantes = noeud.get("anyOf")
    if not isinstance(variantes, list) or len(variantes) != 2:
        return None
    nulls = [v for v in variantes if est_null(v)]
    autres = [v for v in variantes if not est_null(v)]
    if len(nulls) != 1 or len(autres) != 1 or not est_type_simple(autres[0]):
        return None
    schema = dict(autres[0])
    schema["type"] = [schema["type"], "null"]
    for cle, valeur in noeud.items():  # titre, description, défaut... du schéma englobant
        if cle != "anyOf":
            schema[cle] = valeur
    return schema


def normaliser(noeud, bilan):
    """Normalise récursivement ; bilan["reecrits"] compte les anyOf réécrits."""
    if isinstance(noeud, dict):
        plat = aplatir(noeud)
        if plat is not None:
            noeud = plat
            bilan["reecrits"] += 1
        return {
            cle: normaliser(valeur, bilan)
            for cle, valeur in noeud.items()
            if not (cle == "additionalProperties" and valeur is False)
        }
    if isinstance(noeud, list):
        return [normaliser(element, bilan) for element in noeud]
    return noeud


def main(argv):
    if len(argv) != 3:
        sys.exit("usage : normalize-spec.py ENTREE SORTIE")
    with open(argv[1], encoding="utf-8") as fichier:
        spec = json.load(fichier)
    bilan = {"reecrits": 0}
    spec = normaliser(spec, bilan)
    with open(argv[2], "w", encoding="utf-8") as fichier:
        json.dump(spec, fichier, ensure_ascii=False, indent=2)
        fichier.write("\n")
    print(f"normalize-spec : {bilan['reecrits']} anyOf [type, null] réécrits en type nullable.", file=sys.stderr)


if __name__ == "__main__":
    main(sys.argv)
