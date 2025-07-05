<?php
ob_start();
include "DatabaseConnection.php"; //  include baska bı php dosyasını dahıl eder

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["isim"], $_POST["telno"], $_POST["mail"], $_POST["konu"], $_POST["mesaj"])) {
        // formdan gelen verılerı degıskenlere atıyoruz
        $adsoyad = $_POST["isim"];
        $telefon = $_POST["telno"];
        $email = $_POST["mail"];
        $konu = $_POST["konu"];
        $mesaj = $_POST["mesaj"];

        // $ degısken tanımlamak ıcın kullanılır
        // strlen metnın uzunlugunu belırler
        // Uzunluk kontrolleri, hata varsa redirect ile durum parametresi gönderelim
        if (strlen($adsoyad) > 40) {
            header("Location: index.php?durum=isim_uzun"); // yonlendırıyor
            exit();
        }
        if (strlen($telefon) > 25) {
            header("Location: index.php?durum=telefon_uzun");
            exit();
        }
        if (strlen($email) > 50) {
            header("Location: index.php?durum=email_uzun");
            exit();
        }
        if (strlen($konu) > 45) {
            header("Location: index.php?durum=konu_uzun");
            exit();
        }
        if (strlen($mesaj) > 500) {
            header("Location: index.php?durum=mesaj_uzun");
            exit();
        }

        $ekle = "INSERT INTO iletisim(adsoyad, telefon, email, konu, mesaj) VALUES (?, ?, ?, ?, ?)";
        $stmt = $baglan->prepare($ekle); // SQL sorgusunu guvenlı sekılde hazırlar calıstırmaya hazırlar
        $stmt->bind_param("sssss", $adsoyad, $telefon, $email, $konu, $mesaj); // hazırlanan sorguya degıskenler atanıyor

        if ($stmt->execute()) {
            // execute sorguyu calıstırır
            header("Location: index.php?durum=ok");
            exit();
        } else {
            header("Location: index.php?durum=hata");
            exit();
        }
    }
}

ob_end_flush();

// Tamponu boşaltır ve çıktı gönderilir
?>


<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8" />
    
    <title>Lorem Ipsum</title>
    
    <link rel="stylesheet" href="css/style.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
    rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <link rel="stylesheet" href="owl/owl.carousel.min.css">
    
    <link rel="stylesheet" href="owl/owl.theme.default.min.css">
    
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
</head>
    
<body>
    <section id="menu">
        <div id="logo">Lorem Ipsum</div>
        <a href="#iletisim" id="menubizeulasin">BİZE ULAŞIN</a>
    
        <nav>
                <a href="#anasayfa" id="menuanasayfa">ANASAYFA</a>
                <a href="#hakkimizda" id="menuhakkimizda">HAKKIMIZDA</a>
                <a href="#egitimler" id="menuegitimler">EĞİTİMLER</a>
            
        </nav>
    </section>
    
    <section id = "anasayfa">
       <div id = "black"> </div>
        
       <div id="icerik"> 
          <h2>Neden Biz?</h2>
            <hr style="width: 310px; text-align: left; margin-left: 0;">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
            Quo saepe, eos possimus nisi voluptates porro 
            <br> veniam fugiat eveniet
            ipsa minus rem ut consequatur sapiente repellendus ipsum hic, fuga est.
           </p>
       </div>     
    </section>
    
    <section id ="hakkimizda">
        
        <div class = "hakkimizda-container">
        <h3>Hakkımızda</h3>
            <div class="hakkimizda-icerik">
            <img src = "img/about.jpg" alt ="Hakkımızda" class = "img-about">
            
            <div class="hakkimizda-yazi">
                <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Consequuntur distinctio 
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Consequuntur distinctio 
                    autlvoluptatem quod blanditis nulla impedit sequi tempora similique.
                    autlvoluptatem quod blanditis nulla impedit sequi tempora similique.
                    autlvoluptatem quod blanditis nulla impedit sequi tempora similique.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Consequuntur distinctio 
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Consequuntur distinctio 
                    autlvoluptatem quod blanditis nulla impedit sequi tempora
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Consequuntur distinctio 
                    autlvoluptatem quod blanditis nulla impedit sequi tempora
                    autlvoluptatem quod blanditis nulla impedit sequi tempora
                    autlvoluptatem quod blanditis nulla impedit sequi tempora
                    autlvoluptatem quod blanditis nulla impedit sequi tempora
                </p>
            
            </div>
            </div>
        </div>
    </section>
        
    
    <section id = "egitimler">
        <div class = "container">
            
            <h3>Eğitimler</h3>
            <div class="owl-carousel owl-theme">
                
                
              <div class = "card item" data-merge= 1>
                
              <img src = "img/CSS.jpg" alt = "" class= "img-fluid">
              <h5 class="baslikCard">CSS Eğitimi</h5>
              <p class= "cardP">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, minus!  consectetur adipisicing elit. Animi  consectetur adipisicing elit. Animi
              </p>
              
              </div>
                
                   
              <div class = "card item" data-merge= 1>
                
              <img src = "img/HTML.jpg" alt = "" class= "img-fluid">
              <h5 class="baslikcard">HTML Eğitimi</h5>
              <p class= "cardP">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, minus!  consectetur adipisicing elit. Animi  consectetur adipisicing elit. Animi
              </p>
              
              </div>
                
                   
              <div class = "card item" data-merge= 1>
                
              <img src = "img/JS.png" alt = "" class= "img-fluid">
              <h5 class="baslikcard">JAVASCRIPT Eğitimi</h5>
              <p class= "cardP">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, minus!  consectetur adipisicing elit. Animi  consectetur adipisicing elit. Animi
              </p>
              
              </div>
                
              <div class = "card item" data-merge= 1>
                
              <img src = "img/flutter.jpeg" alt = "" class= "img-fluid">
              <h5 class="baslikcard">FLUTTER Eğitimi</h5>
              <p class= "cardP">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, minus!  consectetur adipisicing elit. Animi  consectetur adipisicing elit. Animi
              </p>
              
              </div>
                
              <div class = "card item" data-merge= 1>
                
              <img src = "img/java.png" alt = "" class= "img-fluid">
              <h5 class="baslikcard">JAVA Eğitimi</h5>
              <p class= "cardP">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, minus!  consectetur adipisicing elit. Animi  consectetur adipisicing elit. Animi
              </p>
              
              </div>
                
              <div class = "card item" data-merge= 1>
                
              <img src = "img/PHP.jpeg" alt = "" class= "img-fluid">
              <h5 class="baslikcard">PHP Eğitimi</h5> 
              <p class= "cardP">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, minus!  consectetur adipisicing elit. Animi   consectetur adipisicing elit. Animi
              </p>
              
              </div>    
              
            </div>
            
        </div>
            
    </section>
    
    
    <section id="ekip">
        <div class="container">
            
            <h3>Ekip</h3>
            
            <div class="sutun-sol-sag">
                  <img src ="img/foto.jpg" alt= "" class="img-fluid oval">
                  <h4 class="ekip-isim">Ömer İpek</h4>
                  <p class="ekipYazi">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, minus!
                  </p>
                
                  <div class="ekip-icon"></div>
                        <a href="https://www.linkedin.com/in/%C3%B6mer-faruk-ipek-374762334/"  target="_blank"><i class="fa-brands fa-linkedin-in social"   style="color: #ffffff;"></i></a>
                        <a href="mailto:oomeripekk@gmail.com"><i class="fa-brands fa-google-plus-g social"   style="color: #ffffff;"></i></a>
                        <a href="https://x.com/oomeripekk"  target="_blank"><i class="fa-brands fa-x-twitter social"  style="color: #ffffff;"></i></a>
            </div>
            
            
            <div class="sutun">
                  <img src ="img/foto.jpg" alt= "" class="img-fluid oval">
                  <h4 class="ekip-isim">Ömer İpek</h4>
                  <p class="ekipYazi">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, minus!
                  </p>
                
                  <div class="ekip-icon"></div>
                        <a href="https://www.linkedin.com/in/%C3%B6mer-faruk-ipek-374762334/"  target="_blank"><i class="fa-brands fa-linkedin-in social" style="color: #ffffff;"></i></a>
                        <a href="mailto:oomeripekk@gmail.com"><i class="fa-brands fa-google-plus-g social" style="color: #ffffff;"></i></a>
                        <a href="https://x.com/oomeripekk"  target="_blank"><i class="fa-brands fa-x-twitter social"  style="color: #ffffff;"></i></a>
            </div>
            
            
            <div class="sutun-sol-sag">
                  
                <img src ="img/foto.jpg" alt= "" class="img-fluid oval">
                  <h4 class="ekip-isim">Ömer İpek</h4>
                  <p class="ekipYazi">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, minus!
                  </p>
                
                  <div class="ekip-icon">
                        <a href="https://www.linkedin.com/in/%C3%B6mer-faruk-ipek-374762334/"  target="_blank"><i class="fa-brands fa-linkedin-in social" style="color: #ffffff;"></i></a>
                        <a href="mailto:oomeripekk@gmail.com"><i class="fa-brands fa-google-plus-g social" style="color: #ffffff;"></i></a>
                        <a href="https://x.com/oomeripekk"  target="_blank"><i class="fa-brands fa-x-twitter social"  style="color: #ffffff;"></i></a>
                  </div>
            </div>
    
            
        </div>
    </section>
    
    <section id="iletisim">
        <div class="container">

             <h3>İletişim</h3>
            
            <form action="index.php" method="post">
            
            <div id="iletisimWrapper"> 
              <div id="formGroup">
                
                <div id="solForm"> 
                   <input type="text"   name="isim"   placeholder="Ad Soyad"   required class="form-control"> 
                   <input type="text"   name="telno"   placeholder="Telefon"   required class="form-control"> 
                </div>
                
                <div id="sagForm"> 
                   <input type="email"   name="mail"   placeholder="Email"   required class="form-control">  
                   <input type="text"   name="konu"   placeholder="Konu"   required class="form-control"> 
                </div>
                
                <textarea name="mesaj"  cols="90"  placeholder="Mesajınız"   rows="10"  required class="form-control"></textarea>
                <input type="submit"  value="Gönder"> 
                
              </div>
                     <div id="contact-info">
                           <h4 id="contact-infoB">İletişim Bilgilerimiz</h4>
                         <i class="fa-solid fa-location-dot" style="color: #ffffff;"></i> 
                         
                         <p class="contact-infoP">Barbaros Mahallesi Varyap Plaza A Blok <br>No:10 Kat:12 Ataşehir / İstanbul</p>
                           <p class="contact-infoP">0212 212 21 12</p>
                           <p class="contact-infoP">oomeripekk@gmail.com</p>
                     </div>
                
            </div>
            
            </form>
            
              <div class="footer-content">
                <div id="copyright">2025 | Tüm Hakları Saklıdır</div>
                <div id="socialfooter">
                   <a href="https://www.linkedin.com/in/%C3%B6mer-faruk-ipek-374762334/"  target="_blank"><i class="fa-brands fa-linkedin-in social" style="color: #ffffff;"></i></a>
                    <a href="mailto:oomeripekk@gmail.com"><i class="fa-brands fa-google-plus-g social" style="color: #ffffff;"></i></a>
                    <a href="https://x.com/oomeripekk"  target="_blank"><i class="fa-brands fa-x-twitter social"  style="color: #ffffff;"></i></a>
                </div>
              </div>
        
        </div>
   
    </section>
    
    
<?php // isset() Değişken var mı diye bakar
if (isset($_GET["durum"])) {
    switch ($_GET["durum"]) {
        case "ok":
            $msg = "Mesajınız başarıyla gönderildi!";
            break;
        case "hata":
            $msg = "Mesaj gönderilirken bir hata oluştu!";
            break;
        case "isim_uzun":
            $msg = "Ad Soyad 40 karakterden uzun olamaz.";
            break;
        case "telefon_uzun":
            $msg = "Telefon numarası 25 karakterden uzun olamaz.";
            break;
        case "email_uzun":
            $msg = "E-posta adresi 50 karakterden uzun olamaz.";
            break;
        case "konu_uzun":
            $msg = "Konu 45 karakterden uzun olamaz.";
            break;
        case "mesaj_uzun":
            $msg = "Mesaj 500 karakterden uzun olamaz.";
            break;
        default:
            $msg = "";
    }

    if ($msg !== "") {
        echo "<script>
            alert('$msg');
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.pathname);
            }
        </script>";
    }
} ?>

    
  <script src ="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>  
<script src = "owl/owl.carousel.min.js"></script>
    <script src ="owl/script.js"></script>
    
</body>
</html>  