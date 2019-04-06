<?php
/**
 * Created by PhpStorm.
 * User: Pauline
 * Date: 17/03/2019
 * Time: 11:55
 */
session_start();

include("../config.php");
if (!IsSet($_SESSION["userID"]))		//user variable must exist in session to stay here
    header("Location: login.php");	//if not, go back to login page
$username=$_SESSION["userID"];		//get user name into variable $username

$task = $_POST["task"];
$comments=$_POST["comments"];
$deadline=$_POST["deadline"];
$completed=$_POST["completed"];
$id=$_POST["id"];

$sql = "UPDATE private SET task='$task', comments='$comments', deadline='$deadline', completed='$completed' WHERE id='$id'";


if(mysqli_query($db, $sql)){

}else {echo "Error: ". $sql . "<br". mysqli_error($db);
}

header("location: ../full_list.php")

?>