<?php require 'require.php' ?>
<?php
/*
* a way to change a list info
*/
if (isset($e)) {
    exit("Unable to connect");
    header("Location: home.php");   
}
else{   
$id= $_GET['id'];
$stmt = $conn->prepare('UPDATE lists SET listname=:listname,liststatus=:liststatus WHERE id='. $id.'');
    $stmt->bindParam(':listname', $_POST['listname']);
     $stmt->bindParam(':liststatus', $_POST['liststatus']);
    $stmt->execute();
        header("Location: home.php");
}