#!/bin/bash

# Stop the current PHP server if running
pkill -f "php artisan serve"

# Clear the cache
echo "Clearing cache..."
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Optimize the application
echo "Optimizing application..."
php artisan optimize:clear
php artisan optimize

# Restart the PHP server
echo "Restarting PHP server..."
php artisan serve --port=8000 &

# Wait a moment for the server to start
echo "Deployment complete!"
