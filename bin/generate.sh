#!/usr/bin/env bash
# Régénère le SDK depuis l'openapi.json du dépôt beekube-blup (dossier modifiable par SPEC_DIR).
set -euo pipefail
cd "$(dirname "$0")/.."
SPEC_DIR="${SPEC_DIR:-$(cd ../beekube-blup/openapi && pwd)}"
test -f "$SPEC_DIR/openapi.json" || { echo "openapi.json introuvable dans $SPEC_DIR" >&2; exit 1; }
docker run --rm -u "$(id -u):$(id -g)" \
  -v "$PWD:/local" -w /local \
  -v "$SPEC_DIR:/spec:ro" \
  openapitools/openapi-generator-cli:v7.10.0 generate \
  -c config-openapi-generator.yml -i /spec/openapi.json -o /local
