#!/bin/sh
set -e

until nc -z -v -w30 db 3306; do
  echo "Waiting for database connection..."
  sleep 2
done

php artisan config:clear
php artisan cache:clear
php artisan migrate --force
php artisan storage:link || true

/usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
