#!/bin/bash

set -euo pipefail

cd "$(dirname "${BASH_SOURCE[0]}")/.."

esbuild assets/js/app.js --bundle --outfile=public/build/js/app.js --watch=forever
