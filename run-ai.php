<?php
exec('node ClimateConnectAI/app.js > /dev/null 2>&1 &');
header('Location: http://localhost:3000');
?>