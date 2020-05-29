<?php include 'header.php' ?>
<?php include 'footer.php' ?>
<?php require 'require.php' ?>
<?php 
/*
* a way to delete task form list
*/
if (isset($e)) {
    exit("Unable to connect");
    header("Location: home.php");   
}
else{
$id= $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM `tasks` WHERE id =:id");
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    header("Location: home.php");
}