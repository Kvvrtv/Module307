<!DOCTYPE html>
<html>
<body>
<?php
$textpattern="[A-Za-z]{3,5}";
?>

<form action="http://localhost/Module307/Beispiele/databaseDone.php" method="post">
    firstname*: <input type="text" pattern="<?php echo $textpattern?>" name="firstname" required>
    date: <input type="date" name="date">
    <input type="submit" value="Next" />
</form>
</body>
</html>
