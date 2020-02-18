<!DOCTYPE html>
<html>
<body>
<?php

$firstname = $_POST['firstname'];
$date = $_POST['date'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO test (firstname, date)
    VALUES ('" . $firstname . "','" . $date . "')";
    // use exec() because no results are returned
    $conn->exec($sql);
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
Hey <?php echo $firstname ?>!
<br>
Wir freuen uns dich am <?php echo $date ?> zu treffen.
Bis dahin findest du uns <a href="www.tie-international.com">hier!</a>

</br></br></br></br></br></br></br></br></br></br></br>
<?php echo $sql ?>
</body>
</html>
