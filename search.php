<!DOCTYPE html >
<html>
<head>
    <meta charset="UTF-8">
    <title>分数成绩</title>
</head>
<body>
<div>
    <?php
    //php的匹配字符串是需要分隔符来分隔的，这个分隔符不能是字母数字和反斜线。其他的字符是可以的，一般选择 / 做分隔符,#等特殊符号都是可以的，只要成对就行。
    function search($id, $name)
    {

        $curl = curl_init();
        $url = "http://www.chsi.com.cn/cet/query?zkzh=$id&xm=$name";
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT, 5);
        curl_setopt($curl, CURLOPT_REFERER, 'http://www.chsi.com.cn/cet');
        if (!empty($options)) {
            curl_setopt_array($curl, $options);
        }
        $data = curl_exec($curl);
        preg_match_all('/\d{2,3}/', $data, $m);
        $m = $m[0];
        $score = array($m[44], $m[47], $m[49], $m[51]);
        curl_close($curl);
        if ($score[0] >= 550) {
            echo "<h1 style='color: maroon'>果然大神！顶礼膜拜！！</h1>";
        } elseif ($score[0] >= 500) {
            echo "<h1 style='color: maroon'>太棒了,你真厉害！</h1>";
        } elseif ($score[0] >= 460) {
            echo "<h1 style='color: maroon'>哇塞你好高呀</h1>";
        } elseif ($score[0] >= 440) {
            echo "<h1 style='color: maroon'>可能没发挥好下次会更好的，加油！</h1>";
        } elseif ($score[0] >= 425) {
            echo "<h1 style='color: rgba(255,173,219,0.95)'>我是不会告诉你，“我想说：你是一个幸运的孩子！”</h1>";
        } else {
            echo "<h1 style='color: #508f2c'>下次加油哦！我们都相信你</h1>";
        }

        echo "<h2> 姓名：$name </h2>";
        echo "<h2> 准考证号 ：$id </h2>";
        echo "<h2> 总分：$score[0] </h2>";
        echo "<h2>  听力：$score[1]</h2>";
        echo "<h2> 阅读：$score[2] </h2>";
        echo "<h2>  翻译写作：$score[3]</h2>";
        echo "<h4 style='color: #4d4d4d'>声明：网页数据都来源与<a href='http://cet.jlste.com.cn/cet/'>吉林省四六级官网</a>以及<a href='http://www.chsi.com.cn/cet'>学信网</a>，本网站对数据的真实性不负责，请已成绩单为准！</h4>";
        echo "<h3 style='color: red'> 本系统仅作查询使用，禁止其他用途，负责后果自负</h3>";
        echo "<h4>联系方式：boss@tabchen.com</h4>";
//    $fw = fopen("e:/cet.txt", 'w');
//    fwrite($fw, $data);
    }

    ?>


</div>


</body>
</html>