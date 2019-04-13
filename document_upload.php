<?php
/**
 * Created by PhpStorm.
 * User: Pauline
 * Date: 12/04/2019
 * Purpose: upload file reference to database and save file in uploads directory
 */
//Initialise code to create a session and link to the database
session_start();

if (!IsSet($_SESSION["userID"]))		//user variable must exist in session to stay here
    header("Location: login.php");	//if not, go back to login page
$username=$_SESSION["userID"];		//get user name into variable $username
include("config.php");

//takes input from create/documents_form.php and prepares for upload to database
$statusMsg='';
$targetDir = "uploads/";
$fileName=basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = strtolower(pathinfo($targetFilePath,PATHINFO_EXTENSION));
$description = $_POST["description"];
$mod_code=$_POST["mod_code"];
$uploadOk=1;

//upload to filename etc to database and save file in uploads directory
if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    //check to see if file already exists prior to uploading
    if (file_exists($targetFilePath)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
      // Insert image file name into database
      $insert = $db->query("INSERT INTO documents (filename, mod_code, description) VALUES ('".$fileName."', '$mod_code', '$description')");

      if($insert){
        $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            }
    }else {
      $statusMsg = "Sorry, there was an error uploading your file.";
     }
}else{
    $statusMsg = 'Please select a file to upload.';
}

header("location: module.php");
$db->close();

?>
