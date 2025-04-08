<?php

/**
 * Bootstrap file for PHPUnit tests.
 */

// Include the Composer autoloader
require_once __DIR__.'/../vendor/autoload.php';

// Set up error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// Load environment variables from .env file if it exists
if (file_exists(__DIR__.'/../.env')) {
    $dotenv = new Dotenv\Dotenv(__DIR__.'/..');
    $dotenv->load();
}

// Set up constants for testing
if (!defined('TEST_BASE_PATH')) {
    define('TEST_BASE_PATH', __DIR__);
}

// Register a custom autoloader for test classes
spl_autoload_register(function ($class) {
    // Only handle classes in the Sedo\Test namespace
    if (0 !== strpos($class, 'Sedo\\Test\\')) {
        return;
    }

    // Convert namespace to path
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $path = str_replace('Sedo\\Test\\', '', $path);
    $file = __DIR__.DIRECTORY_SEPARATOR.$path.'.php';

    if (file_exists($file)) {
        require_once $file;

        return true;
    }

    return false;
});

// Make sure the ApiServiceTestCase is loaded
require_once __DIR__.'/ApiServiceTestCase.php';
