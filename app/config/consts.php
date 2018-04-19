<?php
/*
 * App config
 */

define('APP_NAME', 'APP1');
/*
    Database connection
*/
$dbname = "session20";
$driver = "mysql";
$host = "localhost";

$dsn = "$driver:host=$host;dbname=$dbname";

$username = "root";
$password = "";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];



/*
 *  Path
 */

define('DS', DIRECTORY_SEPARATOR);
//echo dirname( __DIR__ );

define('APP_PATH',  dirname( __DIR__ ) . DS);
define('CONFIG_PATH', APP_PATH . 'config' . DS);
define('LIBS_PATH', APP_PATH . 'libs' . DS);
define('TEMPS_PATH', APP_PATH . 'templates' . DS);
define('LAYOUTS_PATH', TEMPS_PATH . '_layouts' . DS);
//admin
define('ADMIN_PATH', APP_PATH . 'admin' . DS);
define('TEMP_ADMIN_PATH', ADMIN_PATH . 'templates' . DS);
define('LAYOUT_ADMIN_PATH', TEMP_ADMIN_PATH . '_layouts' . DS);

// base url
define('BASE_URL', "http://" . $_SERVER['HTTP_HOST'] . '/ideaAcademy/FULLSTACKGIT/Full-Stack-Tutorials/session21/app/');

define('CSS_DIR', BASE_URL . "templates/css" . '/');
define('JS_DIR', BASE_URL . "templates/js" . '/');
define('IMAGES_DIR', BASE_URL . "templates/images" . '/');

define('BASE_ADMIN', BASE_URL . "admin" . '/');
define('BASE_ADMIN_temp', BASE_URL . "admin/templates" . "/");
define('JS_ADMIN_DIR', BASE_ADMIN . "templates/js" . '/');
define('CSS_ADMIN_DIR', BASE_ADMIN . "templates/css" . '/');
