@echo off
start cmd /k "cd /ClimateConnectAI && node app.js"
timeout /t 3 >nul
start http://localhost:3000
