<?php

define('DBHOST', 'localhost');// MySQL host address
define('DBUSER', 'root'); // db username
define('DBPASS', ''); // db password
define('DBNAME', 'store'); // db name

define('DEBUG', false);// set to false when done testing

define('CHARSET',"utf8"); // sets the charset of your database for communication
define('DBDRIVER', 'mysql');// database driver to use
define('DBPORT', '3306'); // database port for connection

function __autoload($classname){
	require_once("classes/".$classname.".class.php");
}