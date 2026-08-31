#!/bin/bash

set -euo pipefail

cd "$(dirname "${BASH_SOURCE[0]}")/.."

pids=()

cleanup() {
    kill "${pids[@]}" 2>/dev/null
}
trap cleanup EXIT INT TERM

./bin/watch-css.sh &
pids+=("$!")
echo "watch-css: $!"

./bin/watch-js.sh &
pids+=("$!")
echo "watch-js: $!"

./bin/watch-php.sh "$@" &
pids+=("$!")
echo "watch-php: $!"

wait
