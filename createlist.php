<?php include 'header.php' ?>
<?php include 'footer.php' ?>
<?php $servername = "localhost";
$username = "root";
$password = "mysql";
$myDB = "todolist";

header('Content-type: text/html; charset=iso-8859-1');
$game = getlistsById($_GET['id'],$conn);
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
   
//$stmt = $conn->prepare("INSERT INTO `lists` (listname, tasks) 
   // VALUES (:listname , :tasks)");
    //$stmt->bindParam(':listname', $_POST['listname']);
    //$stmt->bindParam(':tasks', $_POST['tasks']);
    //$stmt->bindParam(':tasks', $_POST['']);
    //$stmt->execute();

?>
<form action="" method="POST">
<!-- <form action="add.php?id=<?php //echo $game['id'] ?>" method="POST"> -->
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">name to do list</span>
  </div>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="listname" value="">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">tasks</span>
  </div>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="tasks" value="">
</div>
  <input type="submit" value="Submit" onclick="">
</form>