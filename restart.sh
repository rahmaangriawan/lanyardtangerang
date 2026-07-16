#!/usr/bin/env bash
set -euo pipefail

APP_NAME="${APP_NAME:-lanyardtangerang.com}"
REMOTE_PATH="${REMOTE_PATH:-htdocs/lanyardtangerang.com}"

if [ -d "$HOME/$REMOTE_PATH" ]; then
  APP_DIR="$HOME/$REMOTE_PATH"
elif [ -d "$REMOTE_PATH" ]; then
  APP_DIR="$REMOTE_PATH"
else
  APP_DIR="$(cd "$(dirname "$0")" && pwd)"
fi

cd "$APP_DIR"

echo "=== Restarting Lanyard Tangerang (Laravel) ==="
echo "Application directory: $APP_DIR"

# Clear cache & optimize
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan optimize

echo "Lanyard Tangerang restarted."
