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


?>