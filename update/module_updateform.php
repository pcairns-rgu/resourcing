<?php
/**
 * Created by PhpStorm.
 * User: Pauline
 * Date: 18/03/2019
 * Purpose: Update form for module related tasks
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

    <title>Department task</title>

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

<!-- Retrieve entry from database and allow amendments -->
        <?php
        $id=$_POST['id'];
        $sql_query="SELECT * FROM module_task WHERE id='$id'";

        $result = $db->query($sql_query);
        while($row = $result->fetch_array()) {
            $today = $row['today'];
            $task = $row['task'];
            $comments = $row['comments'];
            $deadline = $row['deadline'];
            $completed=$row['completed'];
            $id=$row['id'];
            echo "
        <form method='post' action='update_module_task.php'>
           <h1 class='forecast'>Update task</h1>
          
            <label>Task </label><br>
            <input type='text' name='task' value='$task' autofocus required/><br><br>
            <label>Notes/Status </label><br>
            <textarea name='comments'>$comments</textarea><br><br>
            <label>Deadline  </label><br>
            <input type='date' name='deadline' value='$deadline' />* Required<br><br>
            <label>Completed:      </label>
            <input type='radio' name='completed' value='Yes' />Yes
            <input type='radio' name='completed' value='No' />No
            <input type='hidden' name='id' value='$id'/>
            <br><br>
            <input type='submit' name='submit' value='Submit' />
            <input type='submit' name=' <a href=\"../full_list.php\"><h3 class=\"connect\">Back</h3></a>' value='Back' />
          
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

