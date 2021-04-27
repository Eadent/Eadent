<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

    //ini_set("SMTP", "relay-hosting.secureserver.net");

    $Result = mail("Mail@ProtectAddress.biz", "PHP Test E-Mail", "\r\nThis is a test.\r\n\r\nAnd this is another line of text.\r\n", "From: From.WebPage@ProtectAddress.biz");

    echo "E-Mail Result = $Result";

?>
