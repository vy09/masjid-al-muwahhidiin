<?php

// Set the correct path for Laravel
$basePath = __DIR__ . '/..';

// Change to the base path
chdir($basePath);

// Define the public path
$_SERVER['SCRIPT_FILENAME'] = $basePath . '/public/index.php';

// Require the Laravel application
require_once $basePath . '/public/index.php';
