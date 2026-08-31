#!/bin/bash

set -euo pipefail

cd "$(dirname "${BASH_SOURCE[0]}")/.."

HOST="${1:-localhost}"
PORT="${2:-8000}"

php -S "$HOST:$PORT" -t public
