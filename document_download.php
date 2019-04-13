<?php
/**
 * Created by PhpStorm.
 * User: Pauline
 * Date: 12/04/2019
 * Purpose: download file for user to view
 */
//Initialise code to create a session and link to the database
session_start();

if (!IsSet($_SESSION["userID"]))		//user variable must exist in session to stay here
    header("Location: login.php");	//if not, go back to login page
$username=$_SESSION["userID"];		//get user name into variable $username
include("config.php");


$id=$_POST["id"];

//Retrieve info from database
$sql= "SELECT filename FROM documents WHERE id='$id';";
$result = mysqli_query($db, $sql);
while($row = $result->fetch_array()) {
    $filename = $row['filename'];
}


$targetDir = 'uploads/';
$targetFilePath = $targetDir . $filename;
//check that values have been received
//echo $filename;
//echo "<br>";
//echo $targetFilePath;
//echo "<br>";

//download file
if(file_exists($targetFilePath) && is_readable($targetFilePath)) {
    echo "File exists";
    $size = filesize($targetFilePath);
   // header("Cache-Control: public");
    header('Content-Length: ' . $size);
    header("Content-Description: File Transfer");
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($filename));
    header('Content-Transfer-Encoding: binary');
    header('Accept-Ranges: bytes');

    $file = @fopen($targetFilePath, 'r') or die("Unable to open file!");
    if ($file) {
        fpassthru($file);
        exit;
    } else {
        echo "Oops";
    }
}
