<?php
/**
 * Created by PhpStorm.
 * User: Pauline
 * Date: 24/03/2019
 * Purpose: to log user out of session, close the session and redirect to index page
 */

session_start();

session_unset();
session_destroy();

header("location: index.php");

?>