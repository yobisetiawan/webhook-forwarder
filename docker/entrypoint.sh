#!/bin/sh
set -e

echo "✅ Set permissions"
php artisan optimize:clear

echo "🔑 Generating app key..."
if [ ! -f .env ]; then
  cp .env.example .env
  echo ".env file created from example."
fi
# Only generate key if APP_KEY is empty in .env
if [ -z "$(grep '^APP_KEY=' .env | cut -d'=' -f2)" ]; then
  php artisan key:generate --force
else
  echo "APP_KEY already set in .env, skipping key:generate."
fi

echo "🔗 Linking storage..."
php artisan storage:link

echo "🚀 Optimizing..."
php artisan optimize

echo "✅ Starting PHP-FPM..."
pkill php-fpm 2>/dev/null || true
php-fpm -F

#exec "$@"
