<?php
$senderMail = $_POST["sender-mail"];
$issue = $_POST["sender-issue"];
$header = "From:".$senderMail."\r\n";
$header .=  "Cc:".$senderMail."\r\n";
$header .= "MIME-Version 1.0\r\n";
$header .= "Content-type: text/html\r\n";
if(mail("sillakidumma43@gmail.com","Issue report",$issue, $header)){
    echo "success";
}
else{
    echo($senderMail);
}
?>