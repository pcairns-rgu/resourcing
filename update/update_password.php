<?php
/**
 * Created by PhpStorm.
 * User: Pauline
 * Date: 02/04/2019
 * Purpose: updates information  - from password form and posts it to the database
 */

//Initialise code to create a session and link to the database
session_start();
include('../config.php');
if (!IsSet($_SESSION["userID"]))		//user variable must exist in session to stay here
    header("Location: login.php");	//if not, go back to login page
$username=$_SESSION["userID"];		//get user name into variable $username

//Processing input from password update form and then hash the password
$pwd=$_POST["pwd"];
$pwd1=password_hash($pwd, PASSWORD_DEFAULT);

//Insert data to database
$sql = "UPDATE user SET pwd='$pwd1' WHERE username='$username'";

//check post to DB successful and redirect back to full_list page
if(mysqli_query($db, $sql)){

}else {echo "Error: ". $sql . "<br". mysqli_error($db);
}

header("location: ../full_list.php");
$db->close();

?>


