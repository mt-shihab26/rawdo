#!/bin/bash

set -euo pipefail

cd "$(dirname "${BASH_SOURCE[0]}")/.."

./bin/build-js.sh

while inotifywait -qq -e modify,create,delete assets/js/app.js; do
    ./bin/build-js.sh
done
