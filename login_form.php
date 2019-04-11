<?php
/**
 * Created by PhpStorm.
 * User: Pauline
 * Date: 11/03/2019
 * Purpose: Webpage for inputting username and password to login into system
 */
?>

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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
                $("#dialog").dialog();
            }
         );
    </script>

</head>

<body class="body">
  <div class="container colour">

  <header>
    <a href="index.php"><h2 class="logo">FORECAST</h2></a>
      <!-- couldn't get popup box to sit to the right hand side of screen plus it kept overlapping with the footer
      <div id="dialog" title="First time user" class="connect"
      <p>If you are signing into your account for the first time, you should change your password as soon as you have logged in</p>
      </div>
      -->
  </header>

  <main>
    <div class=" d-flex justify-content-center">

      <form method="post" action="login.php">
          <h1 class="forecast drop">Log-in</h1>
          <p class="small">If you are signing into your account for the first time,</p>
          <p class="small">you should change your password as soon as you have logged in</p>
          <label>Username: </label><br>
          <input type="text" name="username" placeholder="username" required/><br><br>
          <label>Password: </label><br>
          <input type="password" name="pwd" placeholder="password" required/><br><br>
          <input type="submit" name="submit" value="Log-in" />
      </form>
    </div>

  </main>

<!-- start of footer -->
  <?php
    include("footer.html");
  ?>
<!-- end of footer -->

<!-- End of <div class="container colour">-->
  </div>

<!--  www.addthis.com/dashboard script for connect tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5c853fcb8b82e462"></script>
<!-- Bootstrap script for general CSS layout-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>



