<?php
/**
 * Created by PhpStorm.
 * User: Pauline
 * Date: 17/03/2019
 * Time: 11:55
 */
session_start();

include("../config.php");



$module = $_POST["module"];
$task = $_POST["task"];
$comments=$_POST["comments"];
$deadline=$_POST["deadline"];

$sql = "UPDATE module SET module_task='$module', task='$task', comments='$comments', deadline='$deadline' WHERE id='jr001'";

if(mysqli_query($db, $sql)){

}else {echo "Error: ". $sql . "<br". mysqli_error($db);
}

header("location: ../full_list.php")
?>