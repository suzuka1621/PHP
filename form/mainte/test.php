<?php
//パスワードを記録したファイルの場所
echo __FILE__;
// /Applications/MAMP/htdocs/PHP/form/mainte/test.php

echo '<br>';
//パスワード(暗号化)
// password_hashを使う
echo(password_hash('password123' , PASSWORD_BCRYPT));
?>