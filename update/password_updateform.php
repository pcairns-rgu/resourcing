<?php
/**
 * Created by PhpStorm.
 * User: Pauline
 * Date: 18/03/2019
 * Purpose: Update form for password
 */

//Initialise code to create a session and link to the database
session_start();
include("../config.php");

if (!IsSet($_SESSION["userID"]))		//user variable must exist in session to stay here
    header("Location: login.php");	//if not, go back to login page
$username=$_SESSION["userID"];		//get user name into variable $username

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
    shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Password update</title>

    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/form.css">

</head>

<body>

  <div class="container colour">

    <header>
        <a href="../index.php"><h2 class="logo">FORECAST</h2></a>
    </header>

    <!-- Start of main -->
    <main>
        <div class=" d-flex justify-content-center">
        <br>

        <?php
        $sql_query="SELECT * FROM user WHERE username='$username'";

        $result = $db->query($sql_query);
        while($row = $result->fetch_array()) {
            $pwd = "";

            echo "
        <form method='post' action='update_password.php'>
           <h1 class='forecast'>Update password</h1>
            <label>Password </label><br>
            <input type='password' name='pwd' value='$pwd' minlength='8' autofocus required/><br><br>
             
            <input type='submit' name='submit' value='Submit' />
           
        </form>";
        }
        $db->close();
        ?>
        </div>
    </main>
    <!-- End of main -->

<!-- End of <div class="container colour">-->
  </div>

</body>
</html>

