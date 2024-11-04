#!/bin/bash

# Install dependencies if needed
if [ ! -d "node_modules" ] || [ ! -f "node_modules/.package-lock.json" ]; then
    npm install
fi

# Start Vite in the background
npm run dev &

# Start PHP-FPM
php-fpm
