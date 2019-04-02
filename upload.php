<?php
/**
 * Created by PhpStorm.
 * User: Pauline
 * Date: 18/03/2019
 * Time: 14:56
 */

include("config.php");

$statusMsg='';
$targetDir = "uploads/";
$fileName=basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = strtolower(pathinfo($targetFilePath,PATHINFO_EXTENSION));





if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats

        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $db->query("INSERT INTO images (`filename`, `mod_code`) VALUES ('".$fileName."', 'SCDM001')");
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