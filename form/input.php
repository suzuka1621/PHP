<?php

// your_nameが？の後に入っていない場合、Noticeのエラー文が出てしまうので、それを消す
if(!empty($_POST)){
// GET(POST)の中身を見る方法
  echo '<pre>';
  var_dump($_POST); //←[]にキーを入力すると中身が見られる
  echo '</pre>';
// $_で書いている変数をスーパーグローバル変数と呼ぶ
// phpの場合は9種類ある
// 連想配列になっている
// 今回の場合、name="your_name"がキーになっていて
// 入力された値がvalue="送信"
}

// 解説
// inputに </input>と書いているのですが、
// 実は </input>は不要になります。
// 当時、クセで書いていたと思うのですが、先の講座では不要と解説させていただいております。
// チェックボックスで複数選択できるようなフォームの場合に、
// 配列として受け取る場合はnameに[]をつける形になります。
// []をつけないと1つの値しかとれなかったと思います。


// 入力、確認、完了画面の作成
// 3つを分ける場合→input.php, confirm.php, thanks.php
// input.php←今回は一つのファイルで全てを入れる

$pageFlag = 0;

if(!empty($_POST['btn_confirm'])){
  $pageFlag = 1;
}
if(!empty($_POST['btn_submit'])){
  $pageFlag = 2;
}

?>

<!DOCTYPE html>
<meta charser="utf-8">
<head></head>
<body>

<?php if($pageFlag === 1) : ?>
<form method="POST" action="input.php">
氏名
<?php echo $_POST['your_name'] ;?>
<br>
メールアドレス
<?php echo $_POST['email'] ;?>
<br>
<input type="submit" name="back" value="戻る"> 
<input type="submit" name="btn_submit" value="送信する">
<input type="hidden" name="your_name" value="<?php echo $_POST['your_name'] ;?>">
<input type="hidden" name="email" value="<?php echo $_POST['email'] ;?>">
</form>
<?php endif; ?>

<?php if($pageFlag === 2) : ?>
送信が完了しました。
<?php endif; ?>


<?php if($pageFlag === 0) : ?>

<form method="POST" action="input.php">
氏名
<input type="text" name="your_name" value="<?php if(!empty($_POST['your_name'])){echo $_POST['your_name'] ;} ?>">
<br>
メールアドレス
<input type="email" name="email" value="<?php if(!empty($_POST['email'])){echo $_POST['email'] ;} ?>">
<br>
<input type="submit" name="btn_confirm" value="確認する">

</form>
<?php endif; ?>





<body>
</html>