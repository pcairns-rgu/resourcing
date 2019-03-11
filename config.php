<?php
/**
 * Created by PhpStorm.
 * User: Pauline
 * Date: 11/03/2019
 * Time: 18:59
 */

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_DATABASE', 'resourcing');
$db= mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

?>