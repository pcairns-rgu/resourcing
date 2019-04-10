<?php
/**
 * Created by PhpStorm.
 * User: Pauline
 * Date: 17/03/2019
 * Purpose: takes input from department form and posts it to the database
 */

//Initialise code to create a session and link to the database
session_start();
include("../config.php");

if (!IsSet($_SESSION["userID"]))		//user variable must exist in session to stay here
    header("Location: login.php");	//if not, go back to login page
$username=$_SESSION["userID"];		//get user name into variable $username

//Processing input from department form
$task = $_POST["task"];
$comments=$_POST["comments"];
$deadline=$_POST["deadline"];

//Insert data to database
$sql = "INSERT INTO department (today, task, comments, deadline, username) VALUES (curdate(),'$task','$comments','$deadline', '$username')";

//check post to DB successful and redirect back to full_list page
if(mysqli_query($db, $sql)){

}else {echo "Error: ". $sql . "<br". mysqli_error($db);
}

header("location: ../full_list.php")

?>