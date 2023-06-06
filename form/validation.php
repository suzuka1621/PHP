<?php

function validation($request){ 
// 変数には問い合わせフォームから送られる
// $POSTの連想配列が入ってくる
  $errors = [];
  
  if(empty($request['your_name'])){
    $errors[] = '氏名は必須です';
  }
    return $errors;
}
?>