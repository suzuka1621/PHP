<?php
//パスワードを記録したファイルの場所
echo __FILE__;
// /Applications/MAMP/htdocs/PHP/form/mainte/test.php

echo '<br>';
//パスワード(暗号化)
// password_hashを使う
echo(password_hash('password123' , PASSWORD_BCRYPT));

echo '<br>';
echo '<br>';

$contactFile = '.contact.dat';

// ファイルを丸ごと読み込みする方法
$fileContents = file_get_contents($contactFile);

// echo $fileContents;


// ファイルに書き込む(上書き)方法
//file_put_contents($contactFile, 'テストです');

$addText = 'テストです' . "\n"; // "\n"で改行をすることができる

// ファイルに書き込む(追記)方法
file_put_contents($contactFile, $addText, FILE_APPEND);


// CSVファイルの表示方法
// 配列(file)として扱う or コンマごとに区切る(explode), 
// 配列の表示はforeach

//$allData = file($contactFile);

//foreach($allData as $lineData){
  //$lines = explode(',', $lineData);
  //echo $lines[0]. '<br>';
  //echo $lines[1]. '<br>';
  //echo $lines[2]. '<br>';
//}

echo '<br>';
echo '<br>';

$contents = fopen($contactFile, 'a+');
$addText = '1行追記' . "\n";

fwrite($contents, $addText);

fclose($contents);
?>