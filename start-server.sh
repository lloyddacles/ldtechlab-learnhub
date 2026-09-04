#!/bin/bash
# ============================================
#   LD TechLab Programming Tutorials
#   Smart Server Starter
# ============================================

SCRIPT_DIR="$(cd "$(dirname "$0")" && pwd)"
PORT=8000

# Colors
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m'

echo ""
echo "========================================="
echo "   LD TechLab Programming Tutorials"
echo "========================================="
echo ""

# Find PHP binary - check in order: bundled, system
PHP=""
if [ -f "$SCRIPT_DIR/bin/php" ] && [ -x "$SCRIPT_DIR/bin/php" ]; then
    PHP="$SCRIPT_DIR/bin/php"
    echo -e "${GREEN}[OK]${NC} Using bundled PHP"
elif command -v php &> /dev/null; then
    PHP=$(command -v php)
    echo -e "${GREEN}[OK]${NC} Using system PHP: $PHP"
else
    echo -e "${RED}[ERROR]${NC} PHP not found!"
    echo ""
    echo "PHP is required to run this tutorial website."
    echo ""
    echo "Options:"
    echo "  1. Run: ./setup.sh  (auto-installs PHP)"
    echo "  2. Install PHP manually: brew install php"
    echo "  3. Download from: https://www.php.net/downloads"
    echo ""
    exit 1
fi

# Check PHP version
PHP_VERSION=$($PHP -r 'echo PHP_VERSION;')
PHP_MAJOR=$(echo "$PHP_VERSION" | cut -d. -f1)
PHP_MINOR=$(echo "$PHP_VERSION" | cut -d. -f2)

if [ "$PHP_MAJOR" -lt 7 ] || ([ "$PHP_MAJOR" -eq 7 ] && [ "$PHP_MINOR" -lt 4 ]); then
    echo -e "${RED}[ERROR]${NC} PHP 7.4+ required. Found: $PHP_VERSION"
    exit 1
fi
echo -e "${GREEN}[OK]${NC} PHP $PHP_VERSION"

# Check Python (optional)
if command -v python3 &> /dev/null; then
    PY_VERSION=$(python3 --version 2>&1)
    echo -e "${GREEN}[OK]${NC} $PY_VERSION (Python sandbox enabled)"
else
    echo -e "${YELLOW}[WARN]${NC} Python3 not found (Python lessons will show reference only)"
fi

# Check Java (optional)
JAVA_BIN=""
if [ -f "$HOME/Library/Java/JavaVirtualMachines/jdk-"*/Contents/Home/bin/java ]; then
    JAVA_BIN=$(ls -d "$HOME/Library/Java/JavaVirtualMachines/jdk-"*/Contents/Home/bin/java 2>/dev/null | head -1)
    echo -e "${GREEN}[OK]${NC} Java found (Java sandbox enabled)"
elif command -v java &> /dev/null && java -version &> /dev/null 2>&1; then
    echo -e "${GREEN}[OK]${NC} Java found (Java sandbox enabled)"
else
    echo -e "${YELLOW}[WARN]${NC} Java not found (Java lessons will show reference only)"
fi

echo ""
echo "-----------------------------------------"
echo "  Starting server on http://localhost:$PORT"
echo "  Press Ctrl+C to stop"
echo "-----------------------------------------"
echo ""

# Open browser (macOS only)
if [[ "$OSTYPE" == "darwin"* ]]; then
    (sleep 1 && open "http://localhost:$PORT") &
fi

exec "$PHP" -S "localhost:$PORT" -t "$SCRIPT_DIR/public" "$SCRIPT_DIR/public/router.php"
