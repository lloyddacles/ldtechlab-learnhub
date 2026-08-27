#!/bin/bash
echo "========================================="
echo "   PHP Tutorial Website - Server"
echo "========================================="
echo ""
echo "Starting server on http://localhost:8000"
echo "Press Ctrl+C to stop the server"
echo ""
php -S localhost:8000 -t public public/router.php
