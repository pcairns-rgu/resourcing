<?php
/**
* Created by PhpStorm.
* User: Pauline
* Date: 16/03/2019
* Time: 09:28
*/
session_start();
include("config.php");
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
    <title>My Action List</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/table.css">

</head>
<!--- Main body --->
<body>
<div class="container colour">
    <header>

        <nav class="navbar navbar-expand-sm">
            <div class="row">
        <a href="index.php"><h2 class="col logo">FORECAST</h2></a>
        <h2 class="col forecast center">My Action List</h2>
        <ul class="col nav nav-pills">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">My Account</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Overview</a>
                    <a class="dropdown-item" href="#">Module</a>
                    <a class="dropdown-item" href="#">Update password</a>
                    <a class="dropdown-item" href="log_out.php">Sign out</a>
                </div>
            </li>

        </ul>
            </div>
        </nav>
    </header>
    <main>
   <!--
        <div class="dropdown">
            <button type="button" class="btn btn-primary ">Add task

            </button>
            <div >
                <a href="create/module_form.html">Module</a>
                <a href="create/department_form.html">Department</a>
                <a href="create/private_form.html">Private</a>
            </div>
        </div>
        -->

        <ul class="nav nav-pills">

            <li class="nav-item dropdown">
                <div class="nav-link dropdown-toggle" data-toggle="dropdown">Add task</div>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="create/module_form.html">Module</a>
                    <a class="dropdown-item" href="create/department_form.html">Department</a>
                    <a class="dropdown-item" href="create/private_form.html">Private</a>
                </div>
            </li>

        </ul>

        <!--
        <div class="dropdown">
            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                Dropdown button
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="create/module_form.html">Module</a>
                <a class="dropdown-item" href="create/department_form.html">Department</a>
                <a class="dropdown-item" href="create/private_form.html">Private</a>
            </div>
        </div>
  -->

        <br>

        <h3>Module</h3>
        <p><a href="create/module_form.html">Add task</a></p>
        <table class='module'>

            <tr>
                <th>Date added</th>
                <th>Course</th>
                <th>Action</th>
                <th>Notes(status)</th>
                <th>Deadline</th>
                <th>Completed</th>
                <th>Delete</th>
                <th>Reallocate</th>
                <th>Update</th>
            </tr>
        <?php
        $sql_query="SELECT * FROM module_task";
        $result = $db->query($sql_query);
        while($row = $result->fetch_array()) {
            $today = $row['today'];
            $module = $row['module'];
            $task = $row['task'];
            $comments = $row['comments'];
            $deadline = $row['deadline'];
            echo "
            <tr>
            <td>{$today}</td>
            <td>{$module}</td>
            <td>{$task}</td>
                <td>{$comments}</td>
                <td>{$deadline}</td>
            <td>No</td>
            <td><a href='delete/delete_module_task.php'>Delete</a></td>
            <td>Reallocate</td>
            <td><a href='update/module_updateform.php'>Update</a></td>

            </tr>

       ";
        }
        ?>
        </table>
<br><br>
        <h3>Department</h3>
        <p><a href="create/department_form.html">Add task</a></p>
        <table class='department'>

            <tr>
                <th>Date added</th>
                <th>Action</th>
                <th>Notes(status)</th>
                <th>Deadline</th>
                <th>Completed</th>
                <th>Delete</th>
                <th>Reallocate</th>
                <th>Update</th>
            </tr>
        <?php
$sql_query="SELECT * FROM department";

$result = $db->query($sql_query);
while($row = $result->fetch_array()) {
    $today = $row['today'];
    $task = $row['task'];
    $comments = $row['comments'];
    $deadline = $row['deadline'];
    $completed = $row['completed'];
    echo "
       
            <tr>
               <td>{$today}</td>
                <td>{$task}</td>
                <td>{$comments}</td>
                <td>{$deadline}</td>
                <td>{$completed}</td>
                <td><a href='delete/delete_department_task.php'>Delete<a></a></td>
                <td>Reallocate</td>
                <td><a href='update/department_updateform.php'>Update</a></td>
            </tr>

       ";
    }
    ?>
        </table>
        <br><br>
        <h3>Private</h3>
        <p><a href="create/private_form.html">Add task</a></p>
        <table class='private'>

            <tr>
                <th>Date added</th>
                <th>Action</th>
                <th>Notes(status)</th>
                <th>Deadline</th>
                <th>Completed</th>
                <th>Delete</th>
                <th>Update</th>

            </tr>

            <?php

      $sql_query="SELECT * FROM private";
        $result = $db->query($sql_query);
        while($row = $result->fetch_array()) {
            $today = $row['today'];
            $task = $row['task'];
            $comments = $row['comments'];
            $deadline = $row['deadline'];
            $completed = $row['completed'];
            echo "
            <tr>
                <td>{$today}</td>
                <td>{$task}</td>
                <td>{$comments}</td>
                <td>{$deadline}</td>
                <td>{$completed}</td>
                <td><a href='delete/delete_private_task.php'>Delete</a></td>
                <td><a href='update/private_updateform.php'>Update</a></td>


            </tr>

    ";
        }
?>
        </table>


    </main>
    <!-- Start of footer -->

    <?php
    include("footer.html");

    ?>
    <!-- End of footer -->
</div>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5c853fcb8b82e462"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
