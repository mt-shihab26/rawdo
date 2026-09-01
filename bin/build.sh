#!/bin/bash

set -euo pipefail

cd "$(dirname "${BASH_SOURCE[0]}")/.."

./bin/build-css.sh
./bin/build-js.sh
./bin/build-php.sh
