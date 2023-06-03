<?php

//your_nameが？の後に入っていない場合、Noticeのエラー文が出てしまうので、それを消す
if(!empty($_POST)){
//GET(POST)の中身を見る方法
  echo '<pre>';
  var_dump($_POST); //←[]にキーを入力すると中身が見られる
  echo '</pre>';
//$?で書いている変数をスーパーグローバル変数と呼ぶ
//phpの場合は9種類ある
//連想配列になっている
//今回の場合、name="your_name"がキーになっていて
//入力された値がvalue="送信"
}

//解説
// inputに </input>と書いているのですが、
// 実は </input>は不要になります。
// 当時、クセで書いていたと思うのですが、先の講座では不要と解説させていただいております。
// チェックボックスで複数選択できるようなフォームの場合に、
// 配列として受け取る場合はnameに[]をつける形になります。
// []をつけないと1つの値しかとれなかったと思います。
?>

<!DOCTYPE html>
<meta charser="utf-8">
<head></head>
<body>


<form method="POST" action="input.php">
氏名
<input type="text" name="your_name">
<br>
<input type="checkbox" name="sports[]" value="野球">野球
<input type="checkbox" name="sports[]" value="サッカー">サッカー
<input type="checkbox" name="sports[]" value="バスケ">バスケ


<input type="submit" value="送信">

</form>






<body>
</html>