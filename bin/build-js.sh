#!/bin/bash

set -euo pipefail

cd "$(dirname "${BASH_SOURCE[0]}")/.."

esbuild src/Assets/js/app.js --bundle --minify --outfile=public/build/js/app.js
