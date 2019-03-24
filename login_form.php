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
  <h1>Sign in</h1>

      <br><br>
      <form method="post" action="login.php">

                   <label>Username: </label><br>
          <input type="text" name="username" placeholder="username" /><br><br>
          <label>Password: </label><br>
          <input type="password" name="pwd" placeholder="password" /><br><br>

          <input type="submit" name="submit" value="login" />
      </form>
      <div class="error"><?php //echo $error?><?php // echo $username; echo $user_password ?>




  </div>


</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: Pauline
 * Date: 11/03/2019
 * Time: 19:17
 */