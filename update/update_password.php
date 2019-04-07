<?php
/**
 * Created by PhpStorm.
 * User: Pauline
 * Date: 02/04/2019
 * Time: 16:35
 */
session_start();
include('../config.php');
if (!IsSet($_SESSION["userID"]))		//user variable must exist in session to stay here
    header("Location: login.php");	//if not, go back to login page
$username=$_SESSION["userID"];		//get user name into variable $username

$pwd=$_POST["pwd"];
$pwd1=password_hash($pwd, PASSWORD_DEFAULT);

$sql = "UPDATE user SET pwd='$pwd1' WHERE username='$username'";

if(mysqli_query($db, $sql)){

}else {echo "Error: ". $sql . "<br". mysqli_error($db);
}

header("location: ../full_list.php")

?>


