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
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
    shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Module Action List</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/table.css">

</head>
<!--- Main body --->
<body>
<div class="container colour">
    <!--Start of header -->
    <header>
      <a href="index.php"><h2 class="col-sm-4 logo">FORECAST</h2></a>
    </header>
    <!-- End of header -->
    <main>
  <?php
  if(empty($_POST["username"])|| empty($_POST["pwd"]))
  {
      echo "All fields are required";
      exit();
  }
  else{
      $username=$_POST["username"];
      $pwd=$_POST["pwd"];
  }


  $sql2 = "SELECT username FROM user WHERE username='$username'";
  $result2 = mysqli_query($db, $sql2);
  //nested if statement
  if (mysqli_num_rows($result2) != 1) {

        echo "Incorrect username or password";
        echo "<br>";
        echo "<br>";
        echo "Please note that access to this website requires authorisation from the head of the school. ";
        echo "<br>";
        echo "<br>";
        echo "If you should have access and have not received login credentials, please contact the school office.";
        echo "<br>";
        echo "<br>";
        echo "<a href='login_form.php'>Return to log in page </a>";
          exit();

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
        echo "<br>";
        echo "Please note that access to this website requires authorisation from the head of the school. ";
        echo "<br>";
        echo "<br>";
        echo "If you should have access and have not received login credentials, please contact the school office.";
        echo "<br>";
        echo "<br>";
        echo "<a href='login_form.php'>Return to log in page </a>";
          exit();
      }

    }
  ?>
    </main>
</div>

</body>
</html>

