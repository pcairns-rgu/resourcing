<?php
/**
 * Created by PhpStorm.
 * User: Pauline
 * Date: 18/03/2019
 * Time: 14:56
 */
//Initialise code to create a session and link to the database
session_start();

if (!IsSet($_SESSION["userID"]))		//user variable must exist in session to stay here
    header("Location: login.php");	//if not, go back to login page
$username=$_SESSION["userID"];		//get user name into variable $username
include("config.php");

$statusMsg='';
$targetDir = "uploads/";
$fileName=basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = strtolower(pathinfo($targetFilePath,PATHINFO_EXTENSION));
$description = $_POST["description"];
$mod_code=$_POST["mod_code"];
$uploadOk=1;


if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){

        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $db->query("INSERT INTO documents (filename, mod_code, description) VALUES ('".$fileName."', '$mod_code', '$description')");
           // $data = $insert->fetch();
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
    // Check if file already exists


}

if (file_exists($targetFilePath)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
header("location: module.php");
$db->close();
/*
if(file_exists($targetFilePath)){
    header('Content-Description'.$data['description'] );
    header('Content-Type: '.$data['type']);
    header('Content-Disposition: '.$data['disposition'].'; filename="'.basename($file).'"');
  header('Expires: '.data['cache']);
header('Pragma:'.$data['pragma']);
header('Content-Length:'.filesize($file));
readfile($file);
exit;

}
// Display status message

echo $statusMsg;
header("location: module.php");





/* Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
?>
*/