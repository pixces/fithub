<?php

/**
 * Configuration
 *
 * For more info about constants please @see http://php.net/manual/en/function.define.php
 */

/**
 * Configuration for: Error reporting
 * Useful to show every little problem during development, but only show hard errors in production
 */
define('ENVIRONMENT', 'dev');

if (ENVIRONMENT == 'development' || ENVIRONMENT == 'dev') {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    define('DB_TYPE', 'mysql');
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'fitout');
    define('DB_USER', 'root');
    define('DB_PASS', 'root');
    define('DB_CHARSET', 'utf8');


} else {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    ini_set("log_errors", 0);

    define('DB_TYPE', 'mysql');
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'biomedca_fitout');
    define('DB_USER', 'biomedca_rizwamy');
    define('DB_PASS', 'fQBpMT}t7VLk');
    define('DB_CHARSET', 'utf8');

}

define('URL_PUBLIC_FOLDER', 'public');
define('URL_PROTOCOL', 'http://');
define('URL_DOMAIN', $_SERVER['HTTP_HOST']);
define('URL_SUB_FOLDER', str_replace(URL_PUBLIC_FOLDER, '', dirname($_SERVER['SCRIPT_NAME'])));
define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER);