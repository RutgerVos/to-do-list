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
$stmt = $conn->prepare("INSERT INTO `lists` SET listname 
    = :listname,liststatus=:liststatus");
    $stmt->bindParam(':listname', $_POST['listname']);
    $stmt->bindParam(':liststatus', $_POST['liststatus']);
    $stmt->execute();
    header("Location: home.php");
    }