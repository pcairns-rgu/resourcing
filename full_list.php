<?php
/**
* Created by PhpStorm.
* User: Pauline
* Date: 16/03/2019
* Time: 09:28
*/
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
<div class="container">
    <header>
        <a href="index.php"><h2 class="logo">FORECAST</h2></a>
        <h1>My Action List</h1>
        <p id=""><a href="">Module list</a></p>
        <p id=""><a href="">Nav to another page</a></p>
    </header>
    <main>

        <div class="dropdown">
            <button class="dropbtn">Add task

            </button>
            <div >
                <a href="module_form.html">Module</a>
                <a href="department_form.html">Department</a>
                <a href="private_form.html">Private</a>
            </div>
        </div>

        <br>

        <h3>Module</h3>
        <p><a href="module_form.html">Add task</a></p>
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
        $sql_query="SELECT * FROM module";
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
            <td>Delete</td>
            <td>Reallocate
            <td>Update</td>

            </tr>

       ";
        }
        ?>
        </table>
<br><br>
        <h3>Department</h3>
        <p><a href="department_form.html">Add task</a></p>
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
    echo "
       
            <tr>
               <td>{$today}</td>
                <td>{$task}</td>
                <td>{$comments}</td>
                <td>{$deadline}</td>
                <td>No</td>
                <td>Delete</td>
                <td>Reallocate</td>
                <td><a href='department_updateform.php'>Update</a></td>
            </tr>

       ";
    }
    ?>
        </table>
        <br><br>
        <h3>Private</h3>
        <p><a href="private_form.html">Add task</a></p>
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
            echo "
            <tr>
                <td>{$today}</td>
                <td>{$task}</td>
                <td>{$comments}</td>
                <td>{$deadline}</td>
                <td>No</td>
                <td>Delete</td>
                <td>Update</td>


            </tr>

    ";
        }
?>
        </table>


    </main>
    <hr />
    <footer>
        <div class="connect">
            <p>FORECAST - FORESEE ORGANISE RESOURCE EFFICIENT COLLABORATE ACHIEVE SHARE TRANSFER </p>
            <p>Connect with us:</p>


            <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <div class="addthis_inline_follow_toolbox"></div>
        </div>
        <div class="bottom">
            <p>&copy; 2019 Pauline Cairns</p>
            <nav>
                <ul>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="t&c.html">T&Cs</a></li>
                    <li><a href="cookies.html">Cookies</a></li>
                </ul>
            </nav>
        </div>

        <!-- Go to www.addthis.com/dashboard to customize your tools -->

        <!-- Go to www.addthis.com/dashboard to customize your tools -->



    </footer>
</div>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5c853fcb8b82e462"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
