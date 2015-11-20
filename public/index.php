<?php
// Define some constants
define("DS", DIRECTORY_SEPARATOR);
define("ROOT", realpath(dirname(__DIR__)) . "/");
define("VENDORDIR", ROOT . "vendor/");
define("ROUTEDIR", ROOT . "src/routes/");
define("TEMPLATEDIR", ROOT . "templates/");
define("TEMPLATECACHEDIR", ROOT . "templates_cache/");
define("ENV", 'dev');
define("LOGPATH", ROOT . "runtime/app.log");

date_default_timezone_set('Asia/Shanghai');

// Include autoload file
if (file_exists(VENDORDIR . "autoload.php")) {
    require_once VENDORDIR . "autoload.php";
} else {
    die("<pre>Run 'composer.phar install' in root dir</pre>");
}

// Include bootstrap file
require_once ROOT . 'src/bootstrap.php';
