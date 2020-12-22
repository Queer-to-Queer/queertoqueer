<?php

ob_start();

define("PROJECT_FILES_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PROJECT_FILES_PATH));
define("PUBLIC_PATH", PROJECT_PATH . '/shared/public/');
define("PRIVATE_PATH", PROJECT_PATH . '/shared/private/');
define("SHARED_PATH", PROJECT_PATH . '/shared/');
define("ASSETS_PATH", PROJECT_PATH . '/assets/');
define("UPLOAD_PATH", PROJECT_PATH . '/uploads/');
define("ADMIN_PATH", PROJECT_PATH . '/admin/');



$public_end = strpos($_SERVER['SCRIPT_NAME'], '/') + 0;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", $doc_root);
  

require_once('functions.php');
require_once('db_credentials.php');
require_once('db_functions.php');
require_once('validation_functions.php');
require_once('status_error_functions.php');

// Autoload class definitions
function my_autoload($class) {
  if(preg_match('/\A\w+\Z/', $class)) {
    include('classes/' . strtolower($class) . '.class.php');
  }
}
spl_autoload_register('my_autoload');



$session = new Session;

$path = "";
$path.= "PROJECT FILES PATH: ". PROJECT_FILES_PATH ."<br>";
$path.= "PROJECT PATH: ". PROJECT_PATH."<br>";
$path.= "PUBLIC PATH: ". PUBLIC_PATH."<br>";
$path.= "PRIVATE PATH: ". PRIVATE_PATH."<br>";
$path.= "SHARED PATH: ". SHARED_PATH."<br>";
$path.= "ASSETS PATH: ". ASSETS_PATH."<br>";
$path.= "ADMIN PATH: ". ADMIN_PATH."<br>";
$path.= $_SERVER['SCRIPT_NAME']."<br>";
$path.= "public end: ". $public_end ."<br>";
$path.= "doc root: ".$doc_root."<br>";
$path.= "WWW_ROOT".WWW_ROOT."<br>";



?>