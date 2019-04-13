<!--
Creator: Pauline Cairns
Date: 11/03/2019
Purpose: Input form for notes on module page
-->
<?php
session_start();
include("../config.php");
if (!IsSet($_SESSION["userID"]))		//user variable must exist in session to stay here
header("Location: login.php");	//if not, go back to login page
$username=$_SESSION["userID"];	//get user name into variable $username
$mod_code="SCDM005";  //currently hardcoded in - in future could be changed to a value being passed in

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
    shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Add note</title>

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

    <main>
        <div class=" d-flex justify-content-center">
        <br>
          <?php  echo "
        <form method='post' action='input_notes.php' xmlns=\"http://www.w3.org/1999/html\">
            <h1 class='forecast'>Add Note</h1>
            <label>Notes </label><br>
             <textarea name='notes' placeholder='Notes'></textarea><br><br>
            <input type='hidden' name='mod_code' value='$mod_code'/>
            <input type='submit' name='submit' value='Submit' />

        </form>
        " ?>
        </div>
        <a href="../module.php"><p>Return to module</p></a>
    </main>
  </div>

</body>
</html>
