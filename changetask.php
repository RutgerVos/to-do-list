<?php require 'require.php' ?>
<?php
/*
* a way to change a task form list
*/
if (isset($e)) {
    exit("Unable to connect");
    header("Location: home.php");   
}
else{   
$id= $_GET['id'];
$stmt = $conn->prepare('UPDATE tasks SET task=:task,taskstatus=:taskstatus,tasktime=:tasktime,taskdescription=:taskdescription,tasktime=:tasktime WHERE id='. $id.'');
    $stmt->bindParam(':task', $_POST['task']);
     $stmt->bindParam(':taskstatus', $_POST['taskstatus']);
     $stmt->bindParam(':tasktime', $_POST['tasktime']);
     $stmt->bindParam(':taskdescription', $_POST['taskdescription']);
    $stmt->execute();
        header("Location: home.php");
}