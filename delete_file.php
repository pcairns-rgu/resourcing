<?php
/**
 * Created by PhpStorm.
 * User: Pauline
 * Date: 17/03/2019
 * Purpose: deletes item from database
 */
session_start();
include("config.php");
if (!IsSet($_SESSION["userID"]))		//user variable must exist in session to stay here
    header("Location: login.php");	//if not, go back to login page
$username=$_SESSION["userID"];		//get user name into variable $username

//Processing input from module document table.php
$id=$_POST['id'];

$sql_query="SELECT filename FROM documents WHERE id='$id'";
$result = $db->query($sql_query);
while($row = $result->fetch_array()) {

    $filename = $row['filename'];


//Delete data from database
    $sql = "DELETE FROM documents WHERE id='$id'";

//check post to DB successful and redirect back to full_list page
    if (mysqli_query($db, $sql)) {

        unlink('uploads/'.$filename);
    } else {
        echo "Error: " . $sql . "<br" . mysqli_error($db);
    }
}
header("location:module.php");
$db->close();

?>
