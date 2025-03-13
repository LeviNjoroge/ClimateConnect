<?php
exec('start /B node ClimateConnectAI/app.js');
header('Location: http://localhost:3000');
?>