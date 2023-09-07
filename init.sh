#!/bin/bash

echo "### Coping .env ..."
cp .env.example .env

echo "### Installing composer ..."
composer install

echo "### Installing docker images ..."
./vendor/bin/sail up -d

echo "### Generating app key ..."
./vendor/bin/sail php artisan key:generate

echo "### Migrating ..."
./vendor/bin/sail php artisan migrate

echo "### Generating ide helpers ..."
./vendor/bin/sail php artisan ide-helper:generate
./vendor/bin/sail php artisan ide-helper:models --write-mixin


