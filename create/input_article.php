<?php
/**
 * Created by PhpStorm.
 * User: Pauline
 * Date: 17/03/2019
 * Purpose: takes input from private form and posts it to the database
 */

//Initialise code to create a session and link to the database
session_start();
include("../config.php");
if (!IsSet($_SESSION["userID"]))		//user variable must exist in session to stay here
    header("Location: login.php");	//if not, go back to login page
$username=$_SESSION["userID"];		//get user name into variable $username

//Processing input from private form
$title = $_POST["title"];
$webref=$_POST["webref"];
$description=$_POST["description"];
$mod_code=$_POST["mod_code"];

//Insert data to database
$sql = "INSERT INTO articles (title, webref, description, mod_code ) VALUES ('$title','$webref','$description', '$mod_code')";

//check post to DB successful and redirect back to full_list page
if(mysqli_query($db, $sql)){

}else {echo "Error: ". $sql . "<br". mysqli_error($db);
}

header("location: ../module.php");
$db->close();
?>