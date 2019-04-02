<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
    shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Log-in</title>

    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/form.css">

</head>
<body>
<div class="container colour">
<header>
    <a href="index.php"><h2 class="logo">FORECAST</h2></a>
</header>
 <div class=" d-flex justify-content-center">


      <form method="post" action="login.php">
          <h1 class="forecast drop">Log-in</h1>
                   <label>Username: </label><br>
          <input type="text" name="username" placeholder="username" required/><br><br>
          <label>Password: </label><br>
          <input type="password" name="pwd" placeholder="password" required/><br><br>

          <input type="submit" name="submit" value="Log-in" />
      </form>
      <div class="error"><?php //echo $error?><?php // echo $username; echo $user_password ?>


      </div>

  </div>


<?php
include("footer.html");
?>
</div>

<!--  www.addthis.com/dashboard script for connect tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5c853fcb8b82e462"></script>
<!-- Bootstrap script for general CSS layout-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: Pauline
 * Date: 11/03/2019
 * Time: 19:17
 */