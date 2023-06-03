<?php

//PHPのバージョン確認↓
// phpinfo();

?>



<?php
//PHPの書き方

//数字 と 文字
//数字は半角

/*複数行のコメントアウトは
「*」と「/」を使う
*/

echo(123);
echo('<br>');

//１２３・・・全角だと文字として認識

echo('こんにちは');
echo('<br>');
echo("こんばんは");
echo('<br>');
echo('こんば""んは');
echo('<br>');
echo('こちらはPHPです');
echo('<br>');

?>







<?php
//PHP変数

//PHPは 動的型付 自動的に数字か文字を認識してくれる
//Java, Visual Basicは静的型付 こちらで数字か文字を指定しないといけない

// integer・・数字
// string・・文字

//定義する際、$マークをつけて、文字の先頭は必ず英文字かアンダーバー
$test_1 = 456;
$test_1 = 123; //上書き可能

$test_2 = 456;

// var_dumpを使えば、定義した値が文字か数字かを表示してくれる。

//組み合わせる際はピリオドを打つ
$test_3 = $test_1 . $test_2;
//変数を組み合わせると、数字の変数でも文字として扱われる

//$test = 'テストです';

// 配列 オブジェクト コレクション型
echo('<br>'); //'(<br>);で改行できる
var_dump($test_3);
echo('<br>');
//echo $test;
?>










<?php
//PHP定数

//定数 変わらない数・文字
// const = constantの略
const MAX = 'テスト'; //上書きはされない
echo('<br>');
echo MAX;
echo('<br>');

?>









<?php
//PHP 配列と連想配列 ※よく使う

//配列 1行の場合
$array_1 = ['ああああ',2,3]; //配列は[]で囲む

$array_2 = [ //多段階はかっこの中にさらにかっこを入れる
  ['赤','青','黄'],
  ['緑','紫','黒']
];

// 配列は0から始まる→2つ目を取り出し合い場合は1を設定する
// echo $array[1];

// preで縦に表示できる
echo '<pre>';
var_dump($array_2);
echo '</pre>';

echo $array_2[1][1];
echo('<br>');
?>










<?php
//PHP 連想配列 キーと値(バリュー)がセット

// 連想配列の記述は 'キー' => '値'
$array_member = [
 'name' => '本田',
 'height' => 170,
 'hobby' => 'サッカー'
];

echo('<br>');
echo $array_member['hobby'];

echo '<pre>';
var_dump($array_member);
echo '</pre>';


// 多段階の場合
$array_member_2 = [
  '本田' => [ //[]の中にキーと値を入れる
    'height' => 170,
    'hobby' => 'サッカー'
  ],
  '香川' => [
    'height' => 165,
    'hobby' => 'サッカー'
  ]
];

//出力の仕方
echo $array_member_2['香川']['height'];

echo '<pre>';
var_dump($array_member_2);
echo '</pre>';


$array_member_3 = [
  '1kumi' => [
    '本田' => [
      'height' => 170,
      'hobby' => 'サッカー'
    ], 
    '香川' => [
      'height' => 165,
      'hobby' => 'サッカー'

    ]
  ],
  '2kumi' => [
    '長友' => [
      'height' => 160,
      'hobby' => 'サッカー'
    ],
    '乾' =>[
      'height' => 168,
      'hobby' => 'サッカー'
    ]
  ]
];

echo $array_member_3['2kumi']['長友']['height'];
echo('<br>');
?>










<?php
// 演算子 四則演算子(+,-,*,/,%)
//       比較演算子(>,>=,+=,===,!==)
//       論理演算子(and,&&,or,||,xor)
$test_1 = 7;
$test_2 = 3;

$test_3 = $test_1 % $test_2;

echo('<br>');
echo $test_3;
echo('<br>');

?>










<?php
// 条件分岐

//ifの書き方
//if (条件){
  //条件が真なら実行
//}

//if (条件){
  //条件が真なら実行
//} else {
  //条件が偽なら実行
//}

$height = 91;

echo('<br>');
var_dump($height);

// echo('<br>');
// if ($height >= 91){ //条件は数字
//   echo '身長は' . $height . 'cmです';
// } 

// if ($height <= 90){ 
//   echo '身長は' . $height . 'cmになります。';
// }


// == 値が一致していれば出力
// === 値も型も一致するか判定している。値が一緒でも型が違えば出力できない
// ・string ・integerなど

echo('<br>');
if ($height !== 90){ //型が同じかどうかも判定 
  echo '身長は90cmではありません。';
}

//データが入っているかどうか
// isset empty is_null ←この構文で確認できる
echo('<br>');
$test = 1;

if(!empty($test)){ //!emptyと先頭に!をつけている場合は否定の意味になる
  echo '変数は空ではありません';
}

// AND と OR
// ANDは「〇〇かつ〇〇で記号の&&を記述」
// ORは「〇〇または〇〇で記号の||を記述」

$signal_1 = 'red';
$signal_2 = 'yellow';

echo('<br>');
if ($signal_1 === 'red' || $signal_2 === 'blue'){
  echo '赤です';
}


//三項演算子
//条件 ? 真 : 偽 ←記述方法

$math = 80;
echo('<br>');
$comment = $math > 80 ? 'good' : 'not good';

echo $comment;


//elseを使う場合
$signal = 'blue';
echo('<br>');
if ($signal === 'red'){
  echo 'とまれ';
} else if ($signal === 'yellow'){
  echo '一旦停止';
} else {
  echo '進む';
}

echo('<br>');
$speed = 80;


// if文の中にif文
if ($signal === 'blue'){
  if ($speed >= 90){ //ネスト
    echo 'スピード違反';
  }
}
echo('<br>');

//elseやif文の中にif文を書くと読みづらくなるので非推奨
//if文単体で書くのが望ましい
?>










<?php
// foreach
// 複数の値を展開したり表示したい場合にforeachを使う

$members = [
  'name' => '本田',
  'height' => 170,
  'hobby' => 'サッカー'
];

// バリューのみ表示
foreach($members as $member){ //左複数形、右単数系で書くのが分かりやすい
  echo $member; //foreachで記述した右側が出力される
}

  echo '<br>';
// キーとバリューそれぞれ表示
foreach($members as $key => $value){
  echo $key . 'は' . $value . 'です';
}

echo '<br>';


//多段階の配列を展開
$members_2 = [
  '本田' => [
  'height' => 170,
  'hobby' => 'サッカー'
  ],
  '香川' => [
  'height' => 165,
  'hobby' => 'サッカー'
  ]
];

//foreachの中にforeachを書く。 右側の変数をもう1度開くイメージ
foreach($members_2 as $member_1){
  foreach($member_1 as $member => $value){ //キーとバリュー両方取り出し
  echo $member . 'は' . $value . 'です';
  }
}
echo '<br>';

?>










<?php
echo '<br>';
// for文とwhile文

//for文の記述方法
// for(変数 = 0;   < 10;     変数++)
        //初期値   //条件   //インプリメント

for($i = 0; $i < 10; $i++ ){ //++はインプリメントといい、1つ足すという意味

// continue, break文
  if($i === 5){
    //break; breakの場所で止まる
    //continue; //continueの場所はスキップされる
  } 
  echo $i;
}

echo '<br>';

// while文の記述方法
$j = 0; //←外に変数を作る
while($j < 5){
  echo $j;
  $j++; 
}

// 2つの文の使い分け↓
// for 繰り返す数が決まっていたら
// while 繰り返す数が決まっていなかったら

// do while文 補足程度
do{echo $j;}
while($j < 5);
echo '<br>';

?>










<?php
// switch文
// switch文は注意する点もあるため、if文の方が好ましい
echo '<br>';

$data = 1;

//switchの場合 == ←2つ扱いになる

switch($data){
  case $data === 1: //←の書き方で型も一致しているかを判定できる
    echo '1です';
    break; //breakを入れないと流れてしまう
  case 2:
    echo '2です'; //←の書き方では==扱いになる('型は判定しない')
    break;
  case 3:
    echo '3です';
    break;
  default: //上記以外の場合の条件分岐
    echo '1-3ではありません';
}

// if文での書き方
echo '<br>';
if ($data === 1){
  echo '1';
}

if ($data === 2){
  echo '2';
}

if ($data === 3){
  echo '3';
}
echo '<br>';
?>










<?php
// 関数の考え方
// 関数→function(機能)


// ユーザー定義関数
// function test(引数){
//    処理    ↑関数名
//   return 戻り値;
// }



//インプット引数 なし
//アウトプット戻り値 なしの場合
echo '<br>';
function test(){
  //処理
  echo 'テスト';
}

test();


// インプット引数 あり
// アウトプット戻り値 なしの場合
echo '<br>';
$comment = 'コメント2';
$comment3 = 'コメント3';

function getComment($string){
  echo $string;
}

getComment($comment3);


// インプット引数 なし
// アウトプット戻り値 ありの場合
echo '<br>';
function getNumberOfComment(){
  return 5;
}

$commentNumber = getNumberOfComment();

// echo getNumberOfComment();

echo $commentNumber;


//引数2つ
//戻り値 ありの場合
echo '<br>';
function sumPrice($int1, $int2){
  $int3 = $int1 + $int2;
  return $int3;
}

$total = sumPrice(3,5);

echo $total;
echo '<br>';
?>










<?php
// 組み込み関数 元々備わっている関数
// http://www.php.net/manual/ja/funcref.php
// ↑関数カンファレンス


// 文字列の長さ
echo '<br>';
// マルチバイト←アルファベットや数字以外で表記される文字列のこと
// 日本語の場合 SJIS, UTF-8
// 現在UTF-8が主流で、１文字3~6バイト
$text = 'あいうえお';

// echo strlen($text); //バイト数のカウント

echo mb_strlen($text); //日本語の文字数をカウント


// 文字列の置換
echo '<br>';
$str = '文字列を置換します';
echo str_replace('置換','ちかん',$str);


// 指定文字列で分割
echo '<br>';
$str_2 = '指定文字列で、分割します';

var_dump(explode('、', $str_2));
// 配列として返ってくる。


// implode ←文字列をくっつける役割を持つ

// 正規表現 特定の文字が入っているかを確認する方法
// 文字がどうか
// 数字かどうか
// 郵便番号
// メールアドレスか test@gmail.com

echo '<br>';
$str_3 = '特定の文字列が含まれるか確認する';
echo preg_match('/文字列/',$str_3);


// 指定文字列から文字列を取得する
echo '<br>';
echo substr('あいうえお', 2); //こちらだと日本語は文字化けしてしまう
echo '<br>';
echo mb_substr('かきくけこ', 2); //マルチバイトで出力するので文字化け対応できる
echo '<br>';

// 正規表現でしたいことの調べ方
// 検索欄に 「php 文字列 〇〇(したいこと)」と検索をかける
?>










<?php
//配列に関する関数
echo '<br>';

// 配列に配列を追加する
$array = ['りんご','みかん'];

array_push($array, 'ぶどう', 'なし'); //配列を追加

echo '<pre>';
var_dump($array);
echo '</pre>';

?>










<?php
//ユーザー定義関数
//関数の命名 動詞＋名詞の組み合わせがおすすめ

// 郵便番号チェック
echo '<br>';
$postalCode = '123-4567';

//関数名の付け方
//camelCase 最初の単語が小文字で、その後の単語ごとに先頭が大文字
function checkPostalCode($str){
  $replaced = str_replace('-','',$str);
  $length = strlen($replaced);

  var_dump($length);
  if($length === 7){
    return true;
  }
  return false;
}

var_dump(checkPostalCode($postalCode));

//snakeCase 単語の区切りをアンダーバーで表示
//check_postal_code()

?>










<?php
//変数のスコープ(有効範囲)
echo '<br>';
echo '<br>';

$globalVariable = 'グローバル変数です';

function checkScope($str){
  $str = 'ローカル変数です';
  //global $globalVariable; ←の方法はあまり使わない
  echo $str;
}


echo $globalVariable;

echo '<br>';
checkScope($globalVariable); //関数の呼び出し
echo '<br>';
?>










<?php
//ファイルの読み込み
//require←間違いがあるとエラーが表示され、そこで処理が止まる
//include←間違いがあった際、警告が出るが処理はそのまま実行される

echo '<br>';
require __DIR__ . '/common/common.php'; //←読み込みの書き方
//今記述しているファイルから移動のパスを書く
//もし階層が上ならば../でひとつ上の階層にいく必要がある


//__DIR__ 現在のパスの絶対パスを表示することができる
echo __DIR__; //DIRはディレクトリの略

echo '<br>';

//__FILE__ 現在のファイルの場所までのありかを表示する
echo __FILE__;
echo '<br>';

echo $commonVariable;
echo '<br>';
commonTest();
echo '<br>';
?>










<?php
//フォーム関連
//https←通信が暗号化されている

echo '<br>';
echo '<br>';
//$test = 123;

echo $t;
phpinfo();
//display_errorsの項目がoffになっているとエラーが表示されない。
//↑をonにする方法
//Configuration File (php.ini) Pathを見て設定ファイルの場所を確認する
//その後、PCに入っているファイルまでアクセスし設定ファイルを見つけ、
//設定が間違った場合為にコピーをしバックアップをとっておく
//php.iniをVSコードで開く
//コマンド(ctrl)+ Fでdisplay_errorsを探す
//display_errors = Off をOnにする
//MAMP(XAMPP)を再起動
//エラーが表示されるようになる(Notice...)















?>