<?php
/**
 * Created by PhpStorm.
 * User: Pauline
 * Date: 11/03/2019
 * Time: 19:06
 */
session_start();
include("config.php");

if(empty($_POST["username"])|| empty($_POST["pwd"]))
{
    echo "All fields are required";
}
else{

    $username=$_POST["username"];
    $pwd=$_POST["pwd"];

}

$sql="SELECT id FROM user WHERE username='$username' AND pwd='$pwd'";
$result = mysqli_query($db, $sql);

if(mysqli_num_rows($result)== 1)
{

    $_SESSION["userID"]=$username;

    header("location: home.php");
    exit();

}else{
    echo "Incorrect username or password";
}


?>

