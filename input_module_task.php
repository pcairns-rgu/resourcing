<?php
/**
 * Created by PhpStorm.
 * User: Pauline
 * Date: 17/03/2019
 * Time: 11:55
 */

include("config.php");
$module = $_POST["module"];
$task = $_POST["task"];
$comments=$_POST["comments"];
$deadline=$_POST["deadline"];

$sql = "INSERT INTO module (today, module, task, comments, deadline) VALUES (curdate(),'$module','$task','$comments','$deadline')";

if(mysqli_query($db, $sql)){

}else {echo "Error: ". $sql . "<br". mysqli_error($db);
}

header("location: full_list.php")
?>