<?php include 'header.php' ?>
<?php include 'footer.php' ?>
<?php require 'require.php' ?>
<?php
/*
*a file that deletes a list and the tasks that belong to it
*/
if (isset($e)) {
    exit("Unable to connect");
    header("Location: home.php");   
}
else{
    $id= $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM `lists` WHERE id =:id");
    $stmt->bindParam(':id',$id);
    $stmt->execute();

    $stmt = $conn->prepare("DELETE FROM `tasks` WHERE id =:listid");
    $stmt->bindParam(':listid',$id);
    $stmt->execute();
    header("Location: home.php");
}