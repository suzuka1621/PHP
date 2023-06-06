<?php

session_start(); //←この設定でsessionを使うことができる

require 'validation.php';


// クリックジャッキング対策
header('X-FRAME-OPTIONS:DENY');

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

//XSS(Cross-Site Scripting)対策
function h($str)
{
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
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
// CSRF 偽物のinput.php 悪意のあるページにアクセスするとことになる。
// 自分が意図しない操作を勝手に行なってしまう。

$pageFlag = 0;
$errors = validation($_POST);

if(!empty($_POST['btn_confirm']) && empty($errors)){
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
<?php if($_POST['csrf'] === $_SESSION['csrfToken']) :
  //↑合言葉(トークンが合っているかの判定) ?>
<form method="POST" action="input.php">
氏名
<?php echo h($_POST['your_name']) ;?>
<br>
メールアドレス
<?php echo h($_POST['email']) ;?>
<br>
ホームページ
<?php echo h($_POST['url']) ;?>
<br>
性別
<?php 
  if($_POST['gender'] === '0'){ echo '男性'; }
  if($_POST['gender'] === '1'){ echo '女性'; }
?>
<br>
年齢
<?php
  if($_POST['age'] === '1'){ echo '〜19歳'; }
  if($_POST['age'] === '2'){ echo '20歳〜29歳'; }
  if($_POST['age'] === '3'){ echo '30歳〜39歳'; }
  if($_POST['age'] === '4'){ echo '40歳〜49歳'; }
  if($_POST['age'] === '5'){ echo '50歳〜59歳'; }
  if($_POST['age'] === '6'){ echo '60歳〜'; }
?>
<br>
お問い合わせ内容
<?php echo h($_POST['contact']) ;?>
<br>

<input type="submit" name="back" value="戻る"> 
<input type="submit" name="btn_submit" value="送信する">
<input type="hidden" name="your_name" value="<?php echo h($_POST['your_name']) ;?>">
<input type="hidden" name="email" value="<?php echo h($_POST['email']) ;?>">
<input type="hidden" name="url" value="<?php echo h($_POST['url']) ;?>">
<input type="hidden" name="gender" value="<?php echo h($_POST['gender']) ;?>">
<input type="hidden" name="age" value="<?php echo h($_POST['age']) ;?>">
<input type="hidden" name="contact" value="<?php echo h($_POST['contact']) ;?>">
<input type="hidden" name="csrf" value="<?php echo h($_POST['csrf']) ;?>">
</form>
<?php endif; ?>
<?php endif; ?>


<?php if($pageFlag === 2) : ?>
<?php if($_POST['csrf'] === $_SESSION['csrfToken']) :?>
送信が完了しました。

<?php unset($_SESSION['csrfToken']);
  //↑合言葉(トークン)の削除 ?>
<?php endif; ?>
<?php endif; ?>


<?php if($pageFlag === 0) : ?>
<?php
if(!isset($_SESSION[('csrfToken')])){ //issetは中身があるか判定する
  $csrfToken = bin2hex(random_bytes(32));  //引数の数字は24でもOK。bin2hexを入れることで16進数に変換できうまく表記ができるようになる。
  $_SESSION['csrfToken'] = $csrfToken;
} 

$token = $_SESSION['csrfToken'];
?>

<?php if(!empty($errors) && !empty($_POST['btn_confirm'])) : ?>
<?php echo '<ul>' ;?>
 <?php 
   foreach($errors as $error) {
      echo '<li>' . $error . '</li>' ;
   }
?>
<?php echo '</ul>' ;?>
<?php endif ;?>

<form method="POST" action="input.php">
氏名
<input type="text" name="your_name" value="<?php if(!empty($_POST['your_name'])){echo h($_POST['your_name']) ;} ?>">
<br>
メールアドレス
<input type="email" name="email" value="<?php if(!empty($_POST['email'])){echo h($_POST['email']) ;} ?>">
<br>
ホームページ
<input type="url" name="url" value="<?php if(!empty($_POST['url'])){echo h($_POST['url']) ;}?>">
<br>
性別
<input type="radio" name="gender" value="0"
<?php if(isset($_POST['gender']) && $_POST['gender'] === '0' )
{ echo 'checked'; } ?>>男性
<input type="radio" name="gender" value="1"
<?php if(isset($_POST['gender']) && $_POST['gender'] === '1' )
{ echo 'checked'; } ?>>女性
<br>
年齢
<select name="age">
  <option value="">選択してください</option>
  <option value="1" selected>〜19歳</option>
  <option value="2">20歳〜29歳</option>
  <option value="3">30歳〜39歳</option>
  <option value="4">40歳〜49歳</option>
  <option value="5">50歳〜59歳</option>
  <option value="6">60歳〜</option>
</select>
<br>
お問い合わせ内容
<textarea name="contact">
<?php if(!empty($_POST['contact'])){echo h($_POST['contact']) ;} ?>
</textarea>
<br>
<input type='checkbox' name="caution" value="1">注意事項のチェックする
<br>

<input type="submit" name="btn_confirm" value="確認する">
<input type="hidden" name="csrf" value="<?php echo $token; ?>">

</form>
<?php endif; ?>


<body>
</html>