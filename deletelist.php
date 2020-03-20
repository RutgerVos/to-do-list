<?php include 'header.php' ?>
<?php include 'footer.php' ?>
<?php 
$servername = "localhost";
$username = "root";
$password = "mysql";
$myDB = "todolist";

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
    $stmt = $conn->prepare("DELETE FROM `lists` WHERE id =:id");
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    header("Location: home.php");