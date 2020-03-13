<?php include 'header.php' ?>
<?php include 'footer.php' ?>
<?php $servername = "localhost";
$username = "root";
$password = "mysql";
$myDB = "todolist";

header('Content-type: text/html; charset=iso-8859-1');

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
   
$stmt = $conn->prepare("INSERT INTO `lists` (listname, tasks) 
    VALUES (:listname , :tasks)");
    $stmt->bindParam(':listname', );
    $stmt->bindParam(':tasks', );
    $stmt->execute();
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id=<?= $game['id'] ?>" method="POST">
<!-- <form action="add.php?id=<?php //echo $game['id'] ?>" method="POST"> -->
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default"i>name to do list</span>
  </div>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="listname" value="">
</div>
  <input type="submit" value="Submit" onclick="">
</form>