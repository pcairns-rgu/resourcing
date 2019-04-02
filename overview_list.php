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
    <title>Actions overview</title>
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
                <h2 class="col forecast center">Actions overview</h2>
                <ul class="col nav nav-pills">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">My Account</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">My task list</a>
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

        <div class="dropdown">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
               Select staff member
            </button>
            <div class="dropdown-menu">

                <?php
                $sql_query="SELECT * FROM user";
                $result = $db->query($sql_query);
                while($row = $result->fetch_array()) {
                    $firstname = $row['firstname'];
                    $lastname = $row['lastname'];

                    echo "<a class='dropdown-item' href='#'>{$firstname} {$lastname}</a>";
            

       };
                echo "<a class='dropdown-item' href='#'>All</a>";
              ?>
            </div>
        </div>

            <h3>Module</h3>

        <table class="module">

                <tr>
                    <th>Date</th>
                    <th>Course</th>
                    <th>Action</th>
                    <th>Notes(status)</th>
                    <th>Deadline</th>
                    <th>Completed</th>
                    <th>Delete</th>
                    <th>Reallocate</th>
                </tr>
                <tr>
                    <td>Today</td>
                    <td>CMM004</td>
                    <td>Set up page</td>
                    <td>Started</td>
                    <td>Now</td>
                    <td>No</td>
                    <td>Delete</td>
                    <td>Reallocate</td>

                </tr>

            </table>



            <br><br>
            <h3>Department</h3>
<button type="button" data-toggle="collapse" data-target="#demo">Show all tasks</button>
<br><br>
<div id="demo" class="collapse">


<table class="department">

                <tr>
                    <th>Date</th>
                    <th>Action</th>
                    <th>Notes(status)</th>
                    <th>Deadline</th>
                    <th>Completed</th>
                    <th>Delete</th>
                    <th>Reallocate</th>
                </tr>
                <tr>
                    <td>Today</td>
                    <td>Set up page</td>
                    <td>Started</td>
                    <td>Now</td>
                    <td>No</td>
                    <td>Delete</td>
                    <td>Reallocate</td>

                </tr>

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
