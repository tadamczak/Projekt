<?php
/**
 * Database constants
 * 
 */
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'gwo');
define('DB_USER', 'root');
define('DB_PASS', ''); 


/**
 * Path definitions
 * 
 */
define('URL', 'http://'. $_SERVER['SERVER_NAME'] . '/');
define('LIBS', 'libs/');

// PASSWORD HASHING - DO NOT CHANGE
define('HASH_KEY','PrzykladowyHash');