<?php require 'require.php' ?>
<?php
/*
* a way to add a task to a list
*/
if (isset($e)) {
    exit("Unable to connect");
    header("Location: home.php");   
}
else{
$id= $_GET['id'];
$stmt = $conn->prepare("INSERT INTO `tasks`(listid,task,taskstatus,tasktime,taskdescription)
VALUES(:listid , :task,:taskstatus,:tasktime,:taskdescription)");
    $stmt->bindParam(':listid', $id);
    $stmt->bindParam(':task', $_POST['task']);
    $stmt->bindParam(':taskstatus', $_POST['taskstatus']);
    $stmt->bindParam(':tasktime', $_POST['tasktime']);
    $stmt->bindParam(':taskdescription', $_POST['taskdescription']);
    $stmt->execute();
    header("Location: home.php");
}