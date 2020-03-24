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
$stmt = $conn->prepare("INSERT INTO `tasks`(listid , task)
VALUES(:listid , :task)");
    $stmt->bindParam(':listid', $id);
    $stmt->bindParam(':task', $_POST['task']);
    $stmt->execute();
    header("Location: home.php");?>