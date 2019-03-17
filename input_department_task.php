<?php
/**
 * Created by PhpStorm.
 * User: Pauline
 * Date: 17/03/2019
 * Time: 11:55
 */

include("config.php");
$task = $_POST["task"];
$comments=$_POST["comments"];
$deadline=$_POST["deadline"];

$sql = "INSERT INTO department (task, comments, deadline) VALUES ('$task','$comments','$deadline')";

if(mysqli_query($db, $sql)){

}else {echo "Error: ". $sql . "<br". mysqli_error($db);
}

header("location: full_list.php")
?>