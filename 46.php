<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>成绩</title>
</head>
<body style="font-size: 200%">

<?php
require_once "search.php";
$id = $_POST["id"];
$go = "http://cet.jlste.com.cn/cet/query/qry/$id";
//$url = 'http://cet.jlste.com.cn/cet/query/qry/610124199504204818';  //这儿填页面地址
$info = file_get_contents($go);
preg_match_all('|<td>(.*?)<\/td>|i', $info, $m);
if (!$m[0]) {
    die("信息错误，请重新填写");
}
$help = $m['0'];
$name = $help['1'];

$id = $help['7'];
$id = substr($id, 4, 15);
$bname = $name;
if (strlen($name) == 15) {
    $name = substr($name, 4, 6);
} else {
    $name = substr($name, 4, 9);
}
search($id, $name);
?>

</body>
</html>


