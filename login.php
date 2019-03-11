<?php
/**
 * Created by PhpStorm.
 * User: Pauline
 * Date: 11/03/2019
 * Time: 19:06
 */
include("config.php");

if(empty($_POST["username"])|| empty($_POST["user_password"]))
{
    echo "All fields are required";
}
else{

    $username=$_POST["username"];
    $user_password=$_POST["user_password"];

}

$sql="SELECT id FROM user WHERE username='$username' AND user_password='$user_password'";
$result = mysqli_query($db, $sql);

if(mysqli_num_rows($result)== 1)
{
    header("location: home.php");

}else{
    echo "Incorrect username or password";
}


?>

