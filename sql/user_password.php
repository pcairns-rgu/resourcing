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

$sql  = "UPDATE user SET pwd='$pwd1' WHERE username='jr001';";
$sql .= "UPDATE user SET pwd='$pwd2' WHERE username='jt002';";
$sql .= "UPDATE user SET pwd='$pwd3' WHERE username='sh003';";
$sql .= "UPDATE user SET pwd='$pwd4' WHERE username='jb007';";
$sql .= "UPDATE user SET pwd='$pwd5' WHERE username='jf004';";
$sql .= "UPDATE user SET pwd='$pwd6' WHERE username='kg005';";
$sql .= "UPDATE user SET pwd='$pwd7' WHERE username='km006';";
$sql .= "UPDATE user SET pwd='$pwd8' WHERE username='sd008';";

if($db->multi_query($sql) === TRUE){

}else {echo "Error: ". $sql . "<br". mysqli_error($db);
};

$db->close();

?>


