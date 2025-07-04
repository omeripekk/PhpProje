<?php

session_start();          
$_SESSION = array();       // Tüm oturum değişkenlerini boş bir diziyle sıfırlar
session_destroy();         //  Oturumu tamamen yok eder (server tarafında)

header("location:PanelLogin.php"); // yonlendırme
// session Kullanıcıya özel verileri sunucuda geçici olarak saklar, sayfalar arası taşır
?>