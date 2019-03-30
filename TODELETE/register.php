<?php

include("../config.php");

if(empty($_POST["firstname"]) || empty($_POST["lastname"])|| empty($_POST["username"])|| empty($_POST["pwd"]))
{
    echo "All fields are required";
}
else{
    $firstname=$_POST["firstname"];
    $lastname=$_POST["lastname"];
    $username=$_POST["username"];
    $pwd=$_POST["pwd"];

}

$sql = "INSERT INTO user (firstname, lastname, username, pwd)
VALUES ('$firstname', '$lastname', '$username', '$pwd')";

if(mysqli_query($db, $sql)){

}else {echo "Error: ". $sql . "<br". mysqli_error($db);
}
header("location:home.php");
/*
$sql="SELECT id FROM user WHERE username='$username'";
$result = mysqli_query($db, $sql);

if(mysqli_num_rows($result)== 1)
{
    echo "Username already exists";



}
else{


}



$conn->close();
?>

<?php
/*
// define variables and set to empty values
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$name = test_input($_POST["name"]);
$email = test_input($_POST["email"]);
$website = test_input($_POST["website"]);
$comment = test_input($_POST["comment"]);
$gender = test_input($_POST["gender"]);
}

function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
?>





/**
 * Created by PhpStorm.
 * User: Pauline
 * Date: 12/03/2019
 * Time: 16:36
 */