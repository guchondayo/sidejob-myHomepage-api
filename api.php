<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');

// 大元はこれ
// https://into-the-program.com/phpmailer-gmail/
// ①まず、下の２つのインストラクター
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// ②Composer のオートローダーの読み込み composerを使ってインストールするなら、これがいる
require './vendor/autoload.php';
// https://1-notes.com/php-error-failed-opening-required/
// requireか、composer-__autoloaderかのどっちか
// https://www.webdesignleaves.com/pr/php/php_phpmailer.php

$mail = new PHPMailer(true);

try {
  //Gmail 認証情報
  $host = 'smtp.gmail.com';
  $username = 'アカウント'; // example@gmail.com
  $password = 'パスワード';

  //差出人
  $from = 'メールアドレス';
  $fromname = '差出人名';

  //宛先
  $to = '宛先';
  $toname = '宛名';

  //件名・本文
  $subject = '件名';
  $body = '本文';

  //メール設定
  $mail->SMTPDebug = 2; //デバッグ用
  $mail->isSMTP();
  $mail->SMTPAuth = true;
  $mail->Host = $host;
  $mail->Username = $username;
  $mail->Password = $password;
  $mail->SMTPSecure = 'tls';
  $mail->Port = 587;
  $mail->CharSet = "utf-8";
  $mail->Encoding = "base64";
  $mail->setFrom($from, $fromname);
  $mail->addAddress($to, $toname);
  $mail->Subject = $subject;
  $mail->Body    = $body;

  //メール送信
  $mail->send();
  echo '成功';

} catch (Exception $e) {
  echo '失敗: ', $mail->ErrorInfo;
}


?>