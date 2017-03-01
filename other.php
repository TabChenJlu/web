<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>成绩</title>
</head>
<body style="font-size: 200%">

<?php
if (empty($_POST['name']) || empty($_POST['id'])) {
    die("信息错误，请重新填写");
}
require_once "search.php";
$id = $_POST["id"];
$name = $_POST['name'];
$name = substr($name, 0, 9);
$id = substr($id, 0, 15);

search($id, $name);
?>

</body>
</html>


