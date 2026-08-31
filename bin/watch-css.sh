#!/bin/bash

set -euo pipefail

cd "$(dirname "${BASH_SOURCE[0]}")/.."

tailwindcss -i assets/css/app.css -o public/build/css/app.css --watch

