<?php
/**
 * Created by PhpStorm.
 * User: Pauline
 * Date: 17/03/2019
 * Time: 11:55
 */

include("../config.php");


$sql = "DELETE FROM module WHERE id=1";


if(mysqli_query($db, $sql)){

}else {echo "Error: ". $sql . "<br". mysqli_error($db);
}

header("location: ../full_list.php")

?>
