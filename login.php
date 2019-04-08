<?php
/**
 * Created by PhpStorm.
 * User: Pauline
 * Date: 11/03/2019
 * Purpose: to connect with database to check user log in credentials and allow access to further webpages if credentials match
 */


//Initialise code to create a session and link to the database
session_start();
include("config.php");

//Check that when log in form posted, that username and password has been supplied
  if(empty($_POST["username"])|| empty($_POST["pwd"]))
  {
    echo "All fields are required";
    exit();
  }
  else{
    $username=$_POST["username"];
    $pwd=$_POST["pwd"];
  }

// check that credentials input match those in the database
  $sql= "SELECT pwd FROM user WHERE username='$username';";
  $result = mysqli_query($db, $sql);

    while($row = $result->fetch_array()) {
      $storedPwd= $row['pwd'];

      if (password_verify($pwd, $storedPwd)) {

//If credentials match, check that only one username with that name in the database and
//then use that username for session purposes. Then redirect to full_list page.

         $sql2 = "SELECT username FROM user WHERE username='$username'";
         $result2 = mysqli_query($db, $sql2);
         //nested if statement
         if (mysqli_num_rows($result2) == 1) {
           $_SESSION["userID"] = $username;
           header("location: full_list.php");
           exit();
         }
      }

// If credentials don't match, advise the user
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
