#!/bin/bash

set -euo pipefail

cd "$(dirname "${BASH_SOURCE[0]}")/.."

mkdir -p public/build/js

cp assets/js/app.js public/build/js/app.js
