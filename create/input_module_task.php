<?php
/**
 * Created by PhpStorm.
 * User: Pauline
 * Date: 17/03/2019
 * Purpose: takes input from module form and posts it to the database
 */

//Initialise code to create a session and link to the database
session_start();
include("../config.php");

if (!IsSet($_SESSION["userID"]))		//user variable must exist in session to stay here
    header("Location: login.php");	//if not, go back to login page
$username=$_SESSION["userID"];		//get user name into variable $username

//Processing input from module form
$code = $_POST["code"];
$task = $_POST["task"];
$comments=$_POST["comments"];
$deadline=$_POST["deadline"];
$completed=$_POST["completed"];
$id=$_POST["id"];

//Insert data to database
$sql = "INSERT INTO module_task (today, code, task, comments, deadline, completed, username) VALUES (curdate(),'$code','$task','$comments','$deadline', '$completed','$username')";

//check post to DB successful and redirect back to full_list page
if(mysqli_query($db, $sql)){

}else {echo "Error: ". $sql . "<br". mysqli_error($db);
}
header("location: ../full_list.php")
?>
