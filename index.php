<?php

/**
 * twice a day for resident 
 * Report bonus for xray only 10%
 * Using price list
 * 4 groups xray, scan. lab. ecg . . . 
 * 
 */


date_default_timezone_set("Africa/Lagos");
/**
 * ROOT - Thats the root of server filesystem eg "C:/xampp/htdocs/herium".
 * DS - Defining a foward slash with PHP DIRECTORY_SEPARATOR using str_replace.
 * DS - Handling windows back slash compatibility
 */
define("ROOT", str_replace("\\", "/", dirname(__FILE__)));
define("DS", str_replace("\\", "/", DIRECTORY_SEPARATOR));

/**
 * The path to the application, public, framework and views folder.
 */
define("FRAMEWORK_PATH", ROOT . DS . "framework");
define("APPLICATION_PATH", ROOT . DS . "application");
define("VIEWS_PATH", FRAMEWORK_PATH . DS . "Views"); 
define("BACKEND_PATH", VIEWS_PATH . DS . "backend");
define("PUBLIC_PATH", ROOT . DS . "public");
define("FRONTEND_PATH", VIEWS_PATH . DS . "frontend");

/**
 * Standard PHP way of autoloading classes - Using composer.
 */
require ROOT . DS . "vendor" . DS . "autoload.php";

/*
|--------------------------------------------------------------------------
| Storing sensitive data in .env file
|--------------------------------------------------------------------------
|
| All live database credentials and any api keys are registered
| Highly recommended for security purposes
|
*/
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__, ".env");
$dotenv->load();
$dotenv->required(["LIVE_DATABASE_HOST", "LIVE_DATABASE_NAME", "LIVE_DATABASE_USERNAME", "LIVE_DATABASE_PASSWORD", "LIVE_DATABASE_CHARSET"]);

/**
 * Requiring the configuration file.
 *
 */
require APPLICATION_PATH . DS . "config.php";

/**
 * Starting the session at the root
 * To avoid session error.
 */
Application\Library\Session::start();

/*
|--------------------------------------------------------------------------
| Tracking visitors and users devices and browsers
|--------------------------------------------------------------------------
|
| To prepare for some UI/UX changes and features
|
*/
$result = new WhichBrowser\Parser(getallheaders(), ["detectBots" => false]);
$visitor = ["browserName" => $result->browser->getName(), "operationSystemName" => $result->os->getName(), "operationSystemVersion" => $result->os->getVersion(), "browserVersion" => $result->browser->getVersion(), "deviceType" => $result->device->type];


/*
|--------------------------------------------------------------------------
| Register Error & Exception handlers
|--------------------------------------------------------------------------
|
| Here we will register the methods that will fire whenever there is an error
| or an exception has been thrown.
| Only log exceptions on live server but display on development.
|
*/

//if(!in_array(SERVER_HOST, LOCALHOSTS)) {
    Application\Exceptions\Handler::register();
//}

//$hash = Application\Library\Generate::hash(18.5);
//var_dump($hash);
//
//$salt = Application\Library\Generate::salt(19);
//var_dump($salt);

// $key = hex2bin('000102030405060708090a0b0c0d0e0f101112131415161718191a1b1c1d1e1f');
// $e = Application\Components\Encryption::encrypt(18, $key, $encode = true);
// echo $e;

// $d = Application\Components\Encryption::decrypt(18, $key, $encode = true);
// //echo $d;

// $v = hash_equals("18", $hash);
// echo ($v) ? "true" : "false" ."\n\n";

// $equals = Application\Components\Encryption::hashEquals("18", $hash);
// echo ($equals) ? "true" : "false";
//die();


/**
 * Routing the application using the url parameter from the .htaccess file
 * @var [type] Array
 */
$url = isset($_GET["url"]) ? explode("/", filter_var(rtrim(strtolower($_GET["url"]), "/"), FILTER_SANITIZE_URL)) : [];
$router = new Application\Core\Router;
$router->route($url);