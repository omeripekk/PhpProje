<?php

// Veritabanı bağlantı bilgileri
$vt_sunucu = "127.0.0.1";        
$vt_kullanici = "root";           
$vt_sifre = "";                  
$vt_adi = "kullanici_iletisim";  
$vt_port = 3307;

$baglan = mysqli_connect($vt_sunucu, $vt_kullanici, $vt_sifre, $vt_adi, $vt_port);

if (!$baglan) {
    die("Veritabanı bağlantı işlemi başarısız: " . mysqli_connect_error()); // die durdurur
}

?>