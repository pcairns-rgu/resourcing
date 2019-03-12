<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
    shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Register</title>

    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/colours.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/form.css">

</head>
<body>


      <h3>Register</h3>
      <br><br>
      <form method="post" action="register.php">
          <label>Firstname: </label><br>
          <input type="text" name="firstname" placeholder="firstname" autofocus required/><br><br>
          <label>Lastname: </label><br>
          <input type="text" name="lastname" placeholder="lastname" required/><br><br>
          <label>Username: </label><br>
          <input type="text" name="username" placeholder="username" required/><br><br>
          <label>Password: (8 to 15 characters in length)</label><br>
          <input type="password" name="user_password" placeholder="password" minlength="8" maxlength="15" required/><br><br>

          <input type="submit" value="Submit"/>
          <input type="reset">
      </form>
      <div class="error"><?php //echo $error?><?php // echo $username; echo $user_password ?>

  </div>


</body>
</html>


<?php
/**
 * Created by PhpStorm.
 * User: Pauline
 * Date: 12/03/2019
 * Time: 16:34
 */