<?php
// Define some constants
define("DS", DIRECTORY_SEPARATOR);
define("ROOT", realpath(dirname(__DIR__)) . DS);
define("VENDORDIR", ROOT . "vendor" . DS);
define("ROUTEDIR", ROOT . "src" . DS . "routes" . DS);
define("TEMPLATEDIR", ROOT . "templates" . DS);
define("TEMPLATECACHEDIR", ROOT . "templates_cache" . DS);

// Include autoload file
if (file_exists(VENDORDIR . "autoload.php")) {
    require_once VENDORDIR . "autoload.php";
} else {
    die("<pre>Run 'composer.phar install' in root dir</pre>");
}

// Include bootstrap file
require_once ROOT . 'src' . DS . 'bootstrap.php';
