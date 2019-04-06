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
/*$hashed_password= "SELECT pwd FROM user WHERE username='$username';";
$result1 = mysqli_query($db, $hashed_password);
if(password_verify($pwd, $result1)) {
echo "valid input";
}
else{
    echo "invalid input";
}
ffff
*/
$sql = "SELECT username FROM user WHERE username='$username' AND pwd='$pwd'";
$result = mysqli_query($db, $sql);
if (mysqli_num_rows($result) == 1) {
    $_SESSION["userID"] = $username;
    header("location: home.php");
    exit();
} else {
    echo "Incorrect username or password";
    echo "<br>";
    echo "Please note that access to this website requires authorisation from the head of the school. ";
    echo "<br>";
    echo "If you should have access and have not received login credentials, please contact the school office.";
}
exit();
?>
