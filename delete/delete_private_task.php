<?php
/**
 * Created by PhpStorm.
 * User: Pauline
 * Date: 17/03/2019
 * Purpose: takes input from full_list.php and posts it to the database
 */
session_start();
include("../config.php");
if (!IsSet($_SESSION["userID"]))		//user variable must exist in session to stay here
    header("Location: login.php");	//if not, go back to login page
$username=$_SESSION["userID"];		//get user name into variable $username

//Processing input from  full_list.php
$id=$_POST['id'];

//Insert data to database
$sql = "DELETE FROM private WHERE id='$id'";

//check post to DB successful and redirect back to full_list page
if(mysqli_query($db, $sql)){

}else {echo "Error: ". $sql . "<br". mysqli_error($db);
}

header("location: ../full_list.php");
$db->close();

?>
