<?php
/**
 * Created by PhpStorm.
 * User: Pauline
 * Date: 18/03/2019
 * Time: 14:25
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
    shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Department task</title>

    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/colours.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/form.css">

</head>
<body>
<h1>Department task required</h1>

<h3>Set up task </h3>
<br><br>

<?php
include("config.php");
$sql_query="SELECT * FROM department WHERE id=1";

$result = $db->query($sql_query);
while($row = $result->fetch_array()) {
    $today = $row['today'];
    $task = $row['task'];
    $comments = $row['comments'];
    $deadline = $row['deadline'];
    echo "
<form method='post' action='update_department_task.php'>

    <label>Task </label><br>
    <input type='text' name='task' value='$task' autofocus required/><br><br>
    <label>Notes/Status </label><br>
    <textarea name='comments'>$comments</textarea><br><br>
    <label>Deadline </label><br>
    <input type='date' name='deadline' value='$deadline' /><br><br>
    <input type='submit' name='submit' value='Submit' />
</form>";
}
?>
</body>
</html>

