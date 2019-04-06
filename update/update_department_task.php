<?php
/**
 * Created by PhpStorm.
 * User: Pauline
 * Date: 17/03/2019
 * Time: 11:55
 */

include("../config.php");
$user_id = $_GET["user_id"];
$task = $_POST["task"];
$comments=$_POST["comments"];
$deadline=$_POST["deadline"];
$completed=$_POST["completed"];

$sql = "UPDATE department SET task='$task', comments='$comments', deadline='$deadline', completed='$completed' WHERE id='jr001'";


if(mysqli_query($db, $sql)){

}else {echo "Error: ". $sql . "<br". mysqli_error($db);
}

header("location: ../full_list.php")

?>