<?php
/**
* Created by PhpStorm.
* User: Pauline
* Date: 16/03/2019
* Time: 09:28
*/
session_start();
include('config.php');
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
    <title>Module Action List</title>
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
            <h2 class="col forecast center">Module actions</h2>
            <ul class="col nav nav-pills">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">My Account</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="full_list.php">My task list</a>
                        <a class="dropdown-item" href="overview_list.php">Overview</a>
                        <a class="dropdown-item" href="./update/password_updateform.php">Update password</a>
                        <a class="dropdown-item" href="log_out.php">Sign out</a>
                    </div>
                </li>

            </ul>
        </div>
        </nav>
          </header>

    <main>

        <div class="container mt-3">



   <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="nav-item">Tasks for: </li>
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="collapse" href="#home">All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#menu1">My tasks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#menu2">Other tasks</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div id="home" class="collapse" ><br>
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
                </div>
                <div id="menu1" class="collapse"><br>
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
                        <?php
                        $sql_query="SELECT * FROM module_task,user WHERE module_task.username= user.username AND user.username='$username'";
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
                          <td>{$lastname}</td>
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
                </div>
                <div id="menu2" class="collapse"><br>
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
                            <?php
                            $sql_query="SELECT * FROM module_task,user WHERE module_task.username= user.username AND user.username!='$username'";
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
                          <td>{$lastname}</td>
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
                </div>
            </div>
        </div>



        <br><br>

        <table class='cabinet'>

            <tr>
                <th>Filing cabinet</th>
            </tr>
            <tr>
                <th>
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                        Select file to upload:
                        <input type="file" name="file">
                        <input type="submit" value="Upload" name="submit">
                    </form>

                </th>

            </tr>

       <tr>
           <th>

        <?php


        // Get images from the database
        $query = $db->query("SELECT * FROM images");

        if($query->num_rows > 0){
            while($row = $query->fetch_assoc()){
                $imageURL = 'uploads/'.$row["filename"];
                ?>
                <img src="<?php echo $imageURL; ?>" alt="" />
            <?php }
        }else{ ?>
            <p>No image(s) found...</p>
        <?php } ?>

           </th>
       </tr>
        </table>

        <br><br>


        <table class='cabinet'>

            <tr>
                <th>Articles/documents</th>
            </tr>
        </table>
        <br><br>


        <table class='cabinet'>

            <tr>
                <th>Reminders</th>
            </tr>
        </table>
        <br><br>

        <table class='cabinet'>

            <tr>
                <th>Pending deadlines</th>
            </tr>
        </table>
        <br><br>

        <table class='cabinet'>

            <tr>
                <th>Add note</th>
            </tr>
        </table>
        <br><br>

    </main>
    <hr />

        <?php
        include('footer.html')
        ?>


</div>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5c853fcb8b82e462"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
