<?php
//PHP書き方

/*数字 と 文字
数字は半角
*/

echo(123);
echo('<br>');

//１２３・・文字として認識

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

// PHPは 動的型付 
//Java, Visual Basicは静的型付

// integer・・数字
// string・・文字

//定義する際、先頭は必ず英文字かアンダーバー
$test_1 = 123;
$test_2 = 456;

//組み合わせる際はピリオドを打つ
$test_3 = $test_1 . $test_2;


//$test = 'テストです';

// 配列 オブジェクト コレクション型
echo('<br>');
Var_dump($test_3);
echo('<br>');
//echo $test;
?>










<?php
//PHP定数

//定数 変わらない数・文字
// constantの略
const MAX = 'テスト';
echo('<br>');
echo MAX;
echo('<br>');
?>









<?php
//PHP 配列と連想配列 ※よく使う

//配列 1行
$array_1 = ['ああああ',2,3];

$array_2 = [
  ['赤','青','黄'],
  ['緑','紫','黒']
];

// 配列は0から始まる
// echo $array[1];

// preで縦に表示できる
echo '<pre>';
var_dump($array_2);
echo '</pre>';

echo $array_2[1][1];
echo('<br>');
?>










<?php
//PHP 連想配列 キーと値がセット

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


// 階層構造
$array_member_2 = [
  '本田' => [
    'height' => 170,
    'hobby' => 'サッカー'
  ],
  '香川' => [
    'height' => 165,
    'hobby' => 'サッカー'
  ]
];

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
// 演算子
$test_1 = 7;
$test_2 = 3;

$test_3 = $test_1 % $test_2;

echo('<br>');
echo $test_3;
echo('<br>');

?>









<?php
// 条件分岐

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

echo('<br>');
if ($height !== 90){ //型が同じかどうかも判定 
  echo '身長は90cmではありません。';
}

//データが入っているかどうか
// isset empty is_null
echo('<br>');
$test = 1; //文字

if(!empty($test)){
  echo '変数は空ではありません';
}

// AND と OR
$signal_1 = 'red';
$signal_2 = 'yellow';

echo('<br>');
if ($signal_1 === 'red' || $signal_2 === 'blue'){
  echo '赤です';
}


//三項演算子
//if else
//条件 ? 真 : 偽

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


// == 一致
// === 型も一致するか判定する ・string ・integerなど

?>