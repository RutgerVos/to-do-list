<?php 
$servername = "localhost";
$username = "root";
$password = "mysql";
$myDB = "todolist";

header('Content-type: text/html; charset=iso-8859-1');
//$game = getlistsById($_GET['id'],$conn);
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

    
$stmt = $conn->prepare("INSERT INTO `lists` SET listname 
    = :listname");
    $stmt->bindParam(':listname', $_POST['listname']);
    //$stmt->bindParam(, $_POST['date']);
    $stmt->execute();
    header("Location: home.php");?>