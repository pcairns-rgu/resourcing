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
    exit();
}
else{
    $username=$_POST["username"];
    $pwd=$_POST["pwd"];
}


$sql= "SELECT pwd FROM user WHERE username='$username';";
$result = mysqli_query($db, $sql);

    while($row = $result->fetch_array()) {
        $storedPwd= $row['pwd'];

    if (password_verify($pwd, $storedPwd)) {


/*
echo "<br>";
echo $pwd;
    echo "<br>";
    echo $storedPwd;
echo "<br>";
echo strcmp($pwd,$storedPwd);
*/


   $sql2 = "SELECT username FROM user WHERE username='$username'";
    $result2 = mysqli_query($db, $sql2);
     if (mysqli_num_rows($result2) == 1) {
    $_SESSION["userID"] = $username;
    header("location: home.php");
    exit();
    }

    }
    else {
        echo "Incorrect username or password";
        echo "<br>";
        echo "Please note that access to this website requires authorisation from the head of the school. ";
        echo "<br>";
        echo "If you should have access and have not received login credentials, please contact the school office.";
    }
    }
exit();
?>
