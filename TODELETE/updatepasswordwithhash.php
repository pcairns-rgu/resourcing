<?php
/**
 * Created by PhpStorm.
 * User: Pauline
 * Date: 02/04/2019
 * Time: 16:35
 */
include('../config.php');

$pwd1=password_hash('edinburgh', PASSWORD_DEFAULT);
$pwd2=password_hash('glasgow', PASSWORD_DEFAULT);
$pwd3=password_hash('london', PASSWORD_DEFAULT);
$pwd4=password_hash('international', PASSWORD_DEFAULT);
$pwd5=password_hash('maine', PASSWORD_DEFAULT);
$pwd6=password_hash('losangeles', PASSWORD_DEFAULT);
$pwd7=password_hash('bosley', PASSWORD_DEFAULT);
$pwd8=password_hash('charlie', PASSWORD_DEFAULT);

$sql  = "UPDATE user SET pwd='$pwd1' WHERE id=1;";
$sql .= "UPDATE user SET pwd='$pwd2' WHERE id=2;";
$sql .= "UPDATE user SET pwd='$pwd3' WHERE id=3;";
$sql .= "UPDATE user SET pwd='$pwd4' WHERE id=4;";
$sql .= "UPDATE user SET pwd='$pwd5' WHERE id=5;";
$sql .= "UPDATE user SET pwd='$pwd6' WHERE id=6;";
$sql .= "UPDATE user SET pwd='$pwd7' WHERE id=7;";
$sql .= "UPDATE user SET pwd='$pwd8' WHERE id=8;";

if($db->multi_query($sql) === TRUE){

}else {echo "Error: ". $sql . "<br". mysqli_error($db);
};

$db->close();

?>


