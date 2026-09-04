@echo off
REM ============================================
REM    LD TechLab Programming Tutorials
REM    Smart Server Starter (Windows)
REM ============================================

set SCRIPT_DIR=%~dp0
set PORT=8000

echo.
echo =========================================
echo    LD TechLab Programming Tutorials
echo =========================================
echo.

REM Find PHP binary
set PHP=

REM Check bundled PHP first
if exist "%SCRIPT_DIR%bin\php.exe" (
    set PHP=%SCRIPT_DIR%bin\php.exe
    echo [OK] Using bundled PHP
    goto :found_php
)

REM Check system PHP
where php >nul 2>&1
if %ERRORLEVEL% EQU 0 (
    set PHP=php
    echo [OK] Using system PHP
    goto :found_php
)

REM Check common install locations
if exist "C:\php\php.exe" (
    set PHP=C:\php\php.exe
    echo [OK] Using PHP from C:\php
    goto :found_php
)

echo [ERROR] PHP not found!
echo.
echo PHP is required to run this tutorial website.
echo.
echo Options:
echo   1. Run: setup.bat  (auto-downloads PHP)
echo   2. Install PHP from: https://www.php.net/downloads
echo   3. Add PHP to your PATH environment variable
echo.
pause
exit /b 1

:found_php

REM Check PHP version
for /f "tokens=2" %%a in ('%PHP% -r "echo PHP_VERSION;"') do set PHP_VER=%%a
echo [OK] PHP %PHP_VER%

REM Check Python (optional)
where python >nul 2>&1
if %ERRORLEVEL% EQU 0 (
    for /f "tokens=*" %%a in ('python --version 2^>^&1') do echo [OK] %%a ^(Python sandbox enabled^)
) else (
    echo [WARN] Python not found ^(Python lessons will show reference only^)
)

REM Check Java (optional)
where java >nul 2>&1
if %ERRORLEVEL% EQU 0 (
    java -version >nul 2>&1
    if %ERRORLEVEL% EQU 0 (
        echo [OK] Java found ^(Java sandbox enabled^)
    ) else (
        echo [WARN] Java not found ^(Java lessons will show reference only^)
    )
) else (
    echo [WARN] Java not found ^(Java lessons will show reference only^)
)

echo.
echo -----------------------------------------
echo   Starting server on http://localhost:%PORT%
echo   Press Ctrl+C to stop
echo -----------------------------------------
echo.

REM Open browser
start http://localhost:%PORT%

REM Start server
"%PHP%" -S "localhost:%PORT%" -t "%SCRIPT_DIR%public" "%SCRIPT_DIR%public\router.php"
pause
