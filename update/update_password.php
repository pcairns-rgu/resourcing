<?php
/**
 * Created by PhpStorm.
 * User: Pauline
 * Date: 02/04/2019
 * Time: 16:35
 */
include('../config.php');

$pwd1=password_hash('pwd', PASSWORD_DEFAULT);

$sql = "UPDATE user SET pwd='$pwd1' WHERE id='jr001'";

if(mysqli_query($db, $sql)){

}else {echo "Error: ". $sql . "<br". mysqli_error($db);
}

header("location: ../full_list.php")

?>


