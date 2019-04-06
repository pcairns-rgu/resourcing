<?php
/**
 * Created by PhpStorm.
 * User: Pauline
 * Date: 18/03/2019
 * Time: 14:25
 */
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
    <link rel="stylesheet" href="../assets/css/colours.css">
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

<?php
include("../config.php");
$sql_query="SELECT * FROM user WHERE id='jr001'";

$result = $db->query($sql_query);
while($row = $result->fetch_array()) {
    $pwd = $row['pwd'];

    echo "
<form method='post' action='update_password.php'>
   <h1 class='forecast'>Update password</h1>
    <label>Password </label><br>
    <input type='password' name='pwd' value='$pwd' minlength='8' autofocus required/><br><br>
     
    <input type='submit' name='submit' value='Submit' />
</form>";
}
?>
        </div>
    </main>
</div>
</body>
</html>

