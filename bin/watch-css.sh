#!/bin/bash

set -euo pipefail

cd "$(dirname "${BASH_SOURCE[0]}")/.."

./bin/build-css.sh

tailwindcss -i src/Assets/css/app.css -o public/build/css/app.css --watch

