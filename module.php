<?php
/**
* Created by PhpStorm.
* User: Pauline
* Date: 16/03/2019
* Purpose: page which shows relevant information on the module selected
*/
session_start();
include('config.php');
if (!IsSet($_SESSION["userID"]))		//user variable must exist in session to stay here
    header("Location: login.php");	//if not, go back to login page
$username=$_SESSION["userID"];		//get user name into variable $username
$mod_code="SCDM005";  // currently hardcoded but additional code could be written to pass a value in
$name= "Website development";  // currently hardcoded but additional code could be written to pass a value in
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

            <a href="index.php"><h2 class="col-sm-4 logo navbar-text">FORECAST</h2></a>
            <h2 class="col-sm-4 forecast center navbar-text"><?php echo $mod_code.' '.$name ?> </h2>

            <ul class="col-sm-4 nav nav-pills">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown">My Account</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="full_list.php">My task list</a>
                        <a class="dropdown-item" href="overview_list.php">Overview</a>
                        <a class="dropdown-item" href="./update/password_updateform.php">Update password</a>
                        <a class="dropdown-item" href="log_out.php">Sign out</a>
                    </div>
                </li>
            </ul>

        </nav>
    </header>

<!-- start of main section -->
    <main>

      <div class="container mt-3">

      <article> <!--to keep together the set up of the tasks per person navbar and the subsequent selection contents-->
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

   <!-- Tab panes supplying the content for the  navs -->
       <div class="tab-content">
          <div id="home" class="collapse" ><br>

             <table class="module">
                <tr>
                  <th>Name</th>
                  <th>Action</th>
                  <th>Notes(status)</th>
                  <th>Deadline</th>
                  <th>Completed</th>
                 </tr>

                <?php
                   $sql_query="SELECT * FROM module_task,user WHERE module_task.username= user.username ORDER BY deadline ";
                   $result = $db->query($sql_query);
                   while($row = $result->fetch_array()){
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
                            <td>{$task}</td>
                            <td>{$comments}</td>
                            <td>{$deadline}</td>
                            <td>{$completed}</td>
                        </tr>
                        ";
                   };
                ?>
             </table>
           </div>

           <div id="menu1" class="collapse"><br>
             <table class="module">
                 <tr>
                    <th>Name</th>
                    <th>Action</th>
                    <th>Notes(status)</th>
                    <th>Deadline</th>
                    <th>Completed</th>
                 </tr>

                 <?php
                   $sql_query="SELECT * FROM module_task,user WHERE module_task.username= user.username AND user.username='$username'ORDER BY deadline";
                   $result = $db->query($sql_query);
                   while($row = $result->fetch_array()) {
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
                     <th>Name</th>
                     <th>Action</th>
                     <th>Notes(status)</th>
                     <th>Deadline</th>
                     <th>Completed</th>
                 </tr>

                 <?php
                    $sql_query="SELECT * FROM module_task,user WHERE module_task.username= user.username AND user.username!='$username'ORDER BY deadline";
                    $result = $db->query($sql_query);
                    while($row = $result->fetch_array()) {
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

    </article>
   <!-- end of navbar containing the tasks per person -->
        <br><br>

    <article><!--to keep together the three table sections displayed on the page-->
        <!-- start of document display section -->
        <section>

        <h3>Documents</h3>
            <!-- insert collapse button -->
        <button type="button" data-toggle="collapse" data-target="#documents">Show all documents</button>
        <br><br>
        <div id="documents" class="collapse" >
        <p><a href="create/documents_form.php">Add document</a></p>
        <table class='cabinet'>

            <tr>

                <th>Description</th>
                <th>Filename</th>
                <th>Delete</th>
                <th>Download</th>

            </tr>
        <?php

        // Get images from the database
        $query = $db->query("SELECT * FROM documents");

        if($query->num_rows > 0){
            while($row = $query->fetch_assoc()){
                 $id=$row['id'];
                 $filename=$row['filename'];
                 $description=$row['description'];
            echo "
              <tr>
            
                <td>{$description}</td>
                  <td>{$filename}</td>
                <td><form action='delete_file.php' method='post'>
                        <input type='hidden' name='id' value='$id'/>

                        <input type='submit' name='submit' value='Delete' /></form></td>
                 <td><form action='document_download.php' method='post'>
                        <input type='hidden' name='id' value='$id'/>

                        <input type='submit' name='submit' value='Download' /></form></td>        
              </tr>
            ";
        }}else{echo"
            <p>No document(s) found...</p>";
         }
            ?>


        </table>
        </div>
        </section>
        <!-- end of document display section -->
        <br><br>

   <!-- Start of articles display section -->
        <section>
          <h3>Articles</h3>

          <button type="button" data-toggle="collapse" data-target="#articles">Show all articles</button>
          <br><br>
          <!-- insert collapse button -->
          <div id="articles" class="collapse" >
          <p><a href="create/articles_form.php">Add reference</a></p>

          <table class='article'>
            <tr>
                <th>Website</th>
                <th>Notes(status)</th>
                <th>Delete</th>
            </tr>

            <tr>
                <?php
                $sql_query="SELECT * FROM articles WHERE mod_code='$mod_code'";
                $result = $db->query($sql_query);
                while($row = $result->fetch_array()) {
                    $title = $row['title'];
                    $webref = $row['webref'];
                    $description = $row['description'];
                    $id=$row['id'];
                    echo "
                        <tr>                    
                            <td><a href='{$webref}' target='_blank'>{$title}</a></td>
                            <td>{$description}</td>         
                            <td><form action='delete/delete_article.php' method='post'>
                            <input type='hidden' name='id' value='$id'/> 
                            
                            <input type='submit' name='submit' value='Delete' /></form></td>             
                        </tr>
                        ";
                }
                ?>
          </table>
          </div>
        </section>
        <!-- end of articles display section -->
        <br><br>

      <!-- start of notes section -->
      <section>
        <h3>Notes</h3>
          <!-- insert collapse button -->
          <button type="button" data-toggle="collapse" data-target="#notes">Show all articles</button>
          <br><br>

          <div id="notes" class="collapse" >
        <p><a href="create/notes_form.php">Add note</a></p>

        <table class='notes'>
            <tr>
              <th width="400">Add note</th>
              <th>Delete</th>
            </tr>

            <?php
              $sql_query="SELECT * FROM notes WHERE mod_code='$mod_code'";
              $result = $db->query($sql_query);
              while($row = $result->fetch_array()) {
                $notes = $row['notes'];
                $id=$row['id'];
                echo "
                  <tr>                    
                    <td>{$notes}</td>         
                    <td><form action='delete/delete_notes.php' method='post'>
                    <input type='hidden' name='id' value='$id'/> 
                    <input type='submit' name='submit' value='Delete' /></form></td>             
                  </tr>
                ";
               }
            ?>
        </table>
      </section>
      <!-- end of notes section -->
        <br><br>

    <!-- end of the section containing three display tables -->
    </article>
   </main>
<!--- end of main section -->

<!-- footer section -->
    <?php
      include('footer.html')
    ?>
<!-- End of footer -->

<!-- End of <div class="container colour">-->
  </div>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5c853fcb8b82e462"></script>
<!-- Required for drop down lists -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<!-- Bootstrap script for general CSS layout-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
