#!/usr/bin/env bash
echo "Running composer"

# Composerのバージョンを取得し、最初の数字（メジャーバージョン）だけを抽出
composer_version=$(composer --version | grep -oP '^Composer version \K[0-9]+')

echo "Detected Composer Version: $composer_version"

composer install --no-dev --working-dir=/var/www/html

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Running migrations..."
php artisan migrate --force