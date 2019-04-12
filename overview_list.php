<?php
/**
* Created by PhpStorm.
* User: Pauline
* Date: 16/03/2019
* Time: 09:28
*/
session_start();
include("config.php");
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
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Actions overview</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/table.css">

</head>
<!--- Main body --->
<body>
<div class="container colour">
    <header>

        <nav class="navbar navbar-expand-sm">

                <a href="index.php"><h2 class="col-sm-4 logo navbar-text">FORECAST</h2></a>
                <h2 class="col-sm-4 forecast center navbar-text2">Overview</h2>
                <ul class="col-sm-4 nav nav-pills">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown">My Account</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="full_list.php">My task list</a>
                            <a class="dropdown-item" href="module.php">Module</a>
                            <a class="dropdown-item" href="./update/password_updateform.php">Update password</a>
                            <a class="dropdown-item" href="log_out.php">Sign out</a>
                        </div>
                    </li>

                </ul>

        </nav>


    </header>
    <main>
        <div class="denied">
        <?php
        if($username!='jr001')
        { echo"<br>";
          echo "Access denied";
          echo"<br>";
          echo"<br>";
          echo"<a href='full_list.php'>Return to my action list</a>";
          echo"<br>";
          echo"<br>";
          exit();
        }
        ?>
        </div>
<!-- Not used in final version as onward click functionality not implemented

        <div class="dropdown">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
               Select staff member
            </button>
            <div class="dropdown-menu">

                <?php /*
                $sql_query="SELECT * FROM user";
                $result = $db->query($sql_query);
                while($row = $result->fetch_array()) {
                    $firstname = $row['firstname'];
                    $lastname = $row['lastname'];

                    echo "<a class='dropdown-item' href='#'>{$firstname} {$lastname}</a>";
       };
                echo "<a class='dropdown-item' href='#' >All</a>";
              */?>
            </div>
        </div>
-->
            <h3>Module</h3>

        <table class="module">

                <tr>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Course</th>
                    <th>Action</th>
                    <th>Notes(status)</th>
                    <th>Deadline</th>
                    <th>Completed</th>

                </tr>
            <?php
            $sql_query="SELECT * FROM module_task,user WHERE module_task.username= user.username";
            $result = $db->query($sql_query);
            while($row = $result->fetch_array()) {
            $today = $row['today'];
            $code = $row['code'];
            $task = $row['task'];
            $comments = $row['comments'];
            $deadline = $row['deadline'];
            $completed = $row['completed'];
            $id=$row['id'];
            $firstname=$row['firstname'];
            $lastname=$row['lastname'];
            echo "
            <tr>
            <td>{$firstname} {$lastname}</td>
                <td>{$today}</td>
                <td>{$code}</td>
                <td>{$task}</td>
                <td>{$comments}</td>
                <td>{$deadline}</td>
                <td>{$completed}</td>
            </tr>

            ";
            }
?>
            </table>



            <br><br>
            <h3>Department</h3>
<button type="button" data-toggle="collapse" data-target="#demo">Show all tasks</button>
<br><br>
<div id="demo" class="collapse" >
<table class="department">

                <tr>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Action</th>
                    <th>Notes(status)</th>
                    <th>Deadline</th>
                    <th>Completed</th>

                                    </tr>
    <?php
    $sql_query="SELECT * FROM department, user WHERE department.username= user.username";
    $result = $db->query($sql_query);
    while($row = $result->fetch_array()) {
    $today = $row['today'];
    $task = $row['task'];
    $comments = $row['comments'];
    $deadline = $row['deadline'];
    $completed = $row['completed'];
    $id=$row['id'];
    $firstname=$row['firstname'];
    $lastname=$row['lastname'];


        echo "


    <tr>
    <td>{$firstname} {$lastname}</td>
        <td>{$today}</td>
        <td>{$task}</td>
        <td>{$comments}</td>S
        <td>{$deadline}</td>
        <td>{$completed}</td>
       
    </tr>

    ";
    }
    ?>

            </table>

</div>



    </main>
    <?php

    include("footer.html");
    ?>

        <!-- Go to www.addthis.com/dashboard to customize your tools -->

        <!-- Go to www.addthis.com/dashboard to customize your tools -->




</div>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5c853fcb8b82e462"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
