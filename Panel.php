<!DOCTYPE html>
<html lang="tr">
<head>
    <title></title>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>İletişim Formu Kayıtları</h1>

<table id="customers">
  <tr>
    <th>Ad Soyad</th>
    <th>Telefon</th>
    <th>Email</th>
    <th>Konu</th>
    <th>Mesaj</th>
  </tr>
  
    
<?php

session_start();

// Kullanıcı oturumda değilse (yani boşsa), çıkış işlemini yapan sayfaya yönlendiriyoruz
if ($_SESSION["user"] == "") {
    echo "<script>window.location.href='LogOut.php'</script>";  
} else {
    // echo ekrana yazdırmak ıcın
    echo "Kullanıcı Adınız : " . $_SESSION['user'] . "<br>"; 
    
    echo "<a href='LogOut.php' style='color: red;'>ÇIKIŞ YAP</a><br><br><br>";

    include("DatabaseConnection.php");  

    // Veritabanından "iletisim" tablosundaki tüm verileri çekiyoruz
    $sec = "SELECT * FROM iletisim";
    $sonuc = $baglan->query($sec);
     // query() Veritabanında SQL sorgusu çalıştırır ve sonucu döndürür

    if ($sonuc->num_rows > 0) {

        // Her bir satırı (kayıt) çekiyoruz
        while ($cek = $sonuc->fetch_assoc()) {
            
            echo 
            " <tr>
                <td>" . $cek['adsoyad'] . "</td>
                <td>" . $cek['telefon'] . "</td>
                <td>" . $cek['email'] . "</td>
                <td>" . $cek['konu'] . "</td>
                <td>" . $cek['mesaj'] . "</td>
            </tr>
            ";
        } 
    }  
} 

?> 
</table>
</body>
</html>


