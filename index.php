<!DOCTYPE html>
<html>
<body>
<?php
$name = $_GET['firstname'];
//echo "hello world";

$textpattern="[A-Za-z]{3,5}";
?>
<!--hello --><?php //echo $name?>

<!--<form action="http://localhost/307/?<?php /*echo $_GET['firstname']; */?>">
    <input type="text" name="firstname" value="abc">
    <input type="submit" value="Next" />
</form>-->

<!--<form action="http://localhost/307/done.php" method="get">
    <input type="text" name="firstname">
    <input type="text" name="date">
    <input type="submit" value="Next" />
</form>-->

<form action="http://localhost/307/done.php" method="post">
    firstname*: <input type="text" pattern="<?php echo $textpattern?>" name="firstname" required>
    date: <input type="date" name="date">
    <input type="submit" value="Next" />
</form>
</body>
</html>
 