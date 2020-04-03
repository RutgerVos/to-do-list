<?php

$servername = "localhost";
$username = "root";
$password = "mysql";
$myDB = "todolist";

//header('Content-type: text/html; charset=iso-8859-1');

try {
    $conn = new PDO("mysql:host=$servername;dbname=$myDB", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
    }

catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    } 
$id= $_GET['id'];
$stmt = $conn->prepare('UPDATE tasks SET task=:task,taskstatus=:taskstatus,tasktime=:tasktime,taskdescription=:taskdescription,tasktime=:tasktime WHERE id='. $id.'');
    $stmt->bindParam(':task', $_POST['task']);
     $stmt->bindParam(':taskstatus', $_POST['taskstatus']);
     $stmt->bindParam(':tasktime', $_POST['tasktime']);
     $stmt->bindParam(':taskdescription', $_POST['taskdescription']);
    $stmt->execute();
        header("Location: home.php");