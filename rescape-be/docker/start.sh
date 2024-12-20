#!/bin/bash

# Start Vite in the background
npm run dev &

# Start Laravel server
php artisan storage:link && php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000
