<?php
/**
 * Created by PhpStorm.
 * User: Pauline
 * Date: 24/03/2019
 * Time: 15:39
 */

session_start();

session_unset();
session_destroy();

header("location: index.php");

?>