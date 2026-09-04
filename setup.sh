#!/bin/bash
# ============================================
#   LD TechLab - Auto Setup Script
#   Downloads and installs PHP if missing
# ============================================

set -e

SCRIPT_DIR="$(cd "$(dirname "$0")" && pwd)"
BIN_DIR="$SCRIPT_DIR/bin"

GREEN='\033[0;32m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
BLUE='\033[0;34m'
NC='\033[0m'

echo ""
echo "========================================="
echo "   LD TechLab - Setup"
echo "========================================="
echo ""

# Detect platform
ARCH=$(uname -m)
OS=$(uname -s)

if [ "$OS" = "Darwin" ]; then
    PLATFORM="macos"
    if [ "$ARCH" = "arm64" ]; then
        ARCH_NAME="arm64"
    else
        ARCH_NAME="x64"
    fi
elif [ "$OS" = "Linux" ]; then
    PLATFORM="linux"
    if [ "$ARCH" = "x86_64" ]; then
        ARCH_NAME="x64"
    elif [ "$ARCH" = "aarch64" ]; then
        ARCH_NAME="arm64"
    else
        ARCH_NAME="x64"
    fi
else
    echo -e "${RED}[ERROR]${NC} Unsupported platform: $OS"
    exit 1
fi

echo -e "${BLUE}Platform:${NC} $PLATFORM ($ARCH_NAME)"
echo ""

# ============================================
# Check / Install PHP
# ============================================
echo "--- PHP ---"

find_php() {
    # Check bundled
    if [ -f "$BIN_DIR/php" ] && [ -x "$BIN_DIR/php" ]; then
        echo "$BIN_DIR/php"
        return 0
    fi
    # Check system
    if command -v php &> /dev/null; then
        command -v php
        return 0
    fi
    return 1
}

install_php() {
    echo -e "${YELLOW}PHP not found. Downloading...${NC}"
    mkdir -p "$BIN_DIR"

    if [ "$PLATFORM" = "macos" ]; then
        # Download static PHP for macOS from static-php.dev
        PHP_URL="https://dl.static-php.dev/static-php-cli/common/php-8.3-cli-macos-${ARCH_NAME}.tar.gz"
        echo "Downloading from: $PHP_URL"
        if curl -fsSL --connect-timeout 30 -o /tmp/php-download.tar.gz "$PHP_URL" 2>/dev/null; then
            tar -xzf /tmp/php-download.tar.gz -C "$BIN_DIR/" php 2>/dev/null
            chmod +x "$BIN_DIR/php"
            rm -f /tmp/php-download.tar.gz
            echo -e "${GREEN}[OK]${NC} PHP installed to bin/php"
            return 0
        fi
    fi

    # Fallback: try Homebrew (macOS) or apt (Linux)
    if command -v brew &> /dev/null; then
        echo "Installing via Homebrew..."
        brew install php
        return 0
    elif command -v apt-get &> /dev/null; then
        echo "Installing via apt..."
        sudo apt-get update && sudo apt-get install -y php-cli
        return 0
    elif command -v yum &> /dev/null; then
        echo "Installing via yum..."
        sudo yum install -y php-cli
        return 0
    fi

    echo -e "${RED}[ERROR]${NC} Could not install PHP automatically."
    echo "Please install PHP 7.4+ manually:"
    echo "  macOS: brew install php"
    echo "  Linux: sudo apt install php-cli"
    echo "  All:   https://www.php.net/downloads"
    return 1
}

PHP=""
if PHP=$(find_php); then
    PHP_VERSION=$("$PHP" -r 'echo PHP_VERSION;')
    echo -e "${GREEN}[OK]${NC} PHP $PHP_VERSION already installed"
else
    if install_php; then
        PHP="$BIN_DIR/php"
    else
        exit 1
    fi
fi

echo ""

# ============================================
# Check Python
# ============================================
echo "--- Python ---"
if command -v python3 &> /dev/null; then
    PY_VERSION=$(python3 --version 2>&1)
    echo -e "${GREEN}[OK]${NC} $PY_VERSION"
else
    echo -e "${YELLOW}[SKIP]${NC} Python3 not found"
    echo "  To enable Python sandbox: brew install python3"
fi
echo ""

# ============================================
# Check Java
# ============================================
echo "--- Java ---"
JAVA_FOUND=false
if command -v java &> /dev/null && java -version &> /dev/null 2>&1; then
    echo -e "${GREEN}[OK]${NC} Java found"
    JAVA_FOUND=true
fi
if [ "$JAVA_FOUND" = false ]; then
    # Check user-level JDK
    JDK_DIR=$(ls -d "$HOME/Library/Java/JavaVirtualMachines/jdk-"*/Contents/Home/bin/java 2>/dev/null | head -1)
    if [ -n "$JDK_DIR" ]; then
        echo -e "${GREEN}[OK]${NC} Java found (user-level JDK)"
        JAVA_FOUND=true
    fi
fi
if [ "$JAVA_FOUND" = false ]; then
    echo -e "${YELLOW}[SKIP]${NC} Java not found"
    echo "  To enable Java sandbox: brew install openjdk@17"
fi
echo ""

# ============================================
# Make scripts executable
# ============================================
chmod +x "$SCRIPT_DIR/start-server.sh" 2>/dev/null
chmod +x "$SCRIPT_DIR/bin/php" 2>/dev/null

# ============================================
# Done
# ============================================
echo "========================================="
echo -e "${GREEN}Setup complete!${NC}"
echo ""
echo "To start the tutorial website:"
echo "  ./start-server.sh"
echo ""
echo "Then open: http://localhost:8000"
echo "========================================="
echo ""
