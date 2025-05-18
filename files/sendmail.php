<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';

$title = "Scrooge Frog";
$c = true;

foreach ($_POST as $key => $value) {
    if ($value != "") {
        $body .= "
            " . (($c = !$c) ? '<tr>' : '<tr style="background-color: #f8f8f8;">') . "
                <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
                <td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
            </tr>
        ";
    }
}
$body = "<table style='width: 100%;'>$body</table>";

$mail = new PHPMailer(true);

$mail->CharSet = 'UTF-8';

$mail->setFrom('Antifraud@scroogefrog.com', 'ScroogeFrog');
$mail->addAddress('Antifraud@scroogefrog.com');

$mail->isHTML(true);
$mail->Subject = $title;
$mail->Body = $body;

try {
    $mail->send();
} catch (Exception $e) {
    echo "Error: {$mail->ErrorInfo}";
}