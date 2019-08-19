<?php
$to = "maroua.oua96@gmail.com";
//$subject = "HTML email";
/*$message = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>This email contains HTML Tags!</p>
<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
</tr>
<tr>
<td>John</td>
<td>Doe</td>
</tr>
</table>
</body>
</html>
";*/

$subject = 'This is subject';
$message = 'This is body of email';
$headers = "From: FirstName LastName <SomeEmailAddress@Domain.com>";
//$headers = "MIME-Version: 1.0" . "\r\n";
//$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
//$headers .= "From: <maghrebeco.no.reply@gmail.com>" . "\r\n";
//$headers .= "From: maghrebeco.contact@gmail.com" . "\r\n"
//$headers .= 'Cc: maghrebeco.no.reply@gmail.com' . "\r\n";



$headers = 'From: mail-noreply@maghrebeco.com' . "\r\n" .
     'Reply-To: mail-noreply@maghrebeco.com' . "\r\n" .
     'X-Mailer: PHP/' . phpversion();



mail($to,$subject,$message,$headers);
?> 