@echo off
REM ============================================
REM    LD TechLab - Auto Setup Script (Windows)
REM    Downloads and installs PHP if missing
REM ============================================

setlocal enabledelayedexpansion

set SCRIPT_DIR=%~dp0
set BIN_DIR=%SCRIPT_DIR%bin

echo.
echo =========================================
echo    LD TechLab - Setup
echo =========================================
echo.

REM ============================================
REM Check / Install PHP
REM ============================================
echo --- PHP ---

set PHP=

REM Check bundled
if exist "%BIN_DIR%\php.exe" (
    set PHP=%BIN_DIR%\php.exe
    echo [OK] Bundled PHP found
    goto :php_done
)

REM Check system PATH
where php >nul 2>&1
if !ERRORLEVEL! EQU 0 (
    set PHP=php
    echo [OK] System PHP found
    goto :php_done
)

REM Check common locations
if exist "C:\php\php.exe" (
    set PHP=C:\php\php.exe
    echo [OK] PHP found at C:\php
    goto :php_done
)

REM PHP not found - try to download
echo [WARN] PHP not found. Downloading...
mkdir "%BIN_DIR%" 2>nul

REM Download PHP for Windows
set PHP_VERSION=8.3.12
set PHP_URL=https://windows.php.net/downloads/releases/php-%PHP_VERSION%-Win32-vs16-x64.zip
set PHP_ZIP=%TEMP%\php-download.zip

echo Downloading PHP %PHP_VERSION% for Windows...
echo URL: %PHP_URL%

powershell -Command "try { [Net.ServicePointManager]::SecurityProtocol = [Net.SecurityProtocolType]::Tls12; Invoke-WebRequest -Uri '%PHP_URL%' -OutFile '%PHP_ZIP%' -UseBasicParsing } catch { Write-Host 'Download failed'; exit 1 }"

if !ERRORLEVEL! NEQ 0 (
    echo [ERROR] Download failed.
    echo.
    echo Please install PHP manually:
    echo   1. Download from: https://www.php.net/downloads
    echo   2. Extract to C:\php
    echo   3. Add C:\php to your PATH
    echo.
    goto :php_done
)

echo Extracting...
powershell -Command "Expand-Archive -Path '%PHP_ZIP%' -DestinationPath '%BIN_DIR%\php-temp' -Force"

REM Move php.exe from nested directory
for /d %%D in ("%BIN_DIR%\php-temp\php-*") do (
    copy "%%D\php.exe" "%BIN_DIR%\php.exe" >nul 2>&1
    copy "%%D\php.ini" "%BIN_DIR%\php.ini" >nul 2>&1
)
rmdir /s /q "%BIN_DIR%\php-temp" 2>nul
del "%PHP_ZIP%" 2>nul

if exist "%BIN_DIR%\php.exe" (
    set PHP=%BIN_DIR%\php.exe
    echo [OK] PHP installed to bin\php.exe
) else (
    echo [ERROR] PHP installation failed.
)

:php_done

if defined PHP (
    for /f "tokens=*" %%v in ('%PHP% -r "echo PHP_VERSION;"') do echo [OK] PHP %%v
) else (
    echo [ERROR] PHP is required to run this tutorial website.
    echo.
    echo Options:
    echo   1. Download PHP from: https://www.php.net/downloads
    echo   2. Add PHP to your PATH environment variable
    echo.
)

echo.

REM ============================================
REM Check Python
REM ============================================
echo --- Python ---
where python >nul 2>&1
if !ERRORLEVEL! EQU 0 (
    for /f "tokens=*" %%v in ('python --version 2^>^&1') do echo [OK] %%v
) else (
    echo [SKIP] Python not found
    echo   To enable Python sandbox: winget install Python.Python.3
)
echo.

REM ============================================
REM Check Java
REM ============================================
echo --- Java ---
where java >nul 2>&1
if !ERRORLEVEL! EQU 0 (
    java -version >nul 2>&1
    if !ERRORLEVEL! EQU 0 (
        echo [OK] Java found
    ) else (
        echo [SKIP] Java not found
    )
) else (
    echo [SKIP] Java not found
    echo   To enable Java sandbox: winget install EclipseAdoptium.Temurin.17.JDK
)
echo.

REM ============================================
REM Done
REM ============================================
echo =========================================
echo Setup complete!
echo.
echo To start the tutorial website:
echo   start-server.bat
echo.
echo Then open: http://localhost:8000
echo =========================================
echo.
pause
