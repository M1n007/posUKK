<?php
define('host', 'localhost');
define('username', 'root');
define('password', '');
define('db_name', 'app_kasir');

$konek = NEW MYSQLI (host,username,password,db_name) or die(mysql_error());
?>