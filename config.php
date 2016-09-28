<?php
ob_start();
session_start();
define('AN_DS', DIRECTORY_SEPARATOR);
define('AN_DIR', dirname(__FILE__) . AN_DS);

define('AN_DATABASE_HOST', 'localhost');
define('AN_DATABASE_NAME', 'demo_admin');
define('AN_DATABASE_USER', 'root');
define('AN_DATABASE_PASSWORD', '');

require_once AN_DIR.'classes'.AN_DS."db.class.php";
$aClassDb = new ClassDb();

$admin_login = false;
if(isset($_SESSION['ADMIN_LOGIN']))
{
	$admin_login = true;
}
?>