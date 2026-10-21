# # ExternalSummary

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**pedigreeUsed** | **bool** | false : base illisible ou ascendance incompatible, calcul sans elle |
**recordsUsed** | **bool** | false : notes Index Mellifera illisibles ou ascendance non utilisée |
**ancestors** | **int** | ancêtres Index Mellifera ajoutés au pedigree | [optional] [default to 0]
**ancestorsCapped** | **bool** | remontée arrêtée au plafond d&#39;ancêtres | [optional] [default to false]
**ancestorsWithoutYear** | **int** | ancêtres sans année de naissance valide, écartés | [optional] [default to 0]
**contemporaries** | **int** | contemporaines des ancêtres qui apportent des notes | [optional] [default to 0]
**contemporariesCapped** | **bool** | plafond de contemporaines atteint | [optional] [default to false]
**discarded** | **array<string,int>** | notes écartées par motif : harvest (en kg), no_date, out_of_scale, non_numeric, no_apiary, before_birth, no_queen, alone (sans contemporaine) | [optional]
**linksCut** | **int** | liens erronés de la base coupés | [optional] [default to 0]
**recordAncestors** | **int** | ancêtres qui apportent des notes | [optional] [default to 0]
**records** | **int** | notes Index Mellifera ajoutées | [optional] [default to 0]
**recordsByCriterion** | **array<string,int>** | identifiant du critère -&gt; notes ajoutées | [optional]
**referencesLinked** | **int** | références saisies (mère ou côté mâle) rattachées | [optional] [default to 0]
**unknownReferences** | **string[]** | codes saisis introuvables, normalisés (majuscules, sans espaces), triés | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
