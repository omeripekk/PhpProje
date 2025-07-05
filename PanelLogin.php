<!DOCTYPE html>
<html lang="tr">
<head>
    <title>Panel Girişi</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

.icon {
  padding: 10px;
  background: dodgerblue;
  color: white;
  min-width: 50px;
  text-align: center;
}

.input-field {
  width: 100%;
  padding: 10px;
  outline: none;
}

.input-field:focus {
  border: 2px solid dodgerblue;
}

.btn {
  background-color: dodgerblue;
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}
</style>
</head>
<body>
<!-- bılgılerını gırdıgınde gırıs yapa basınca  method="post" yazdıgın bılgılerın url kısmında gozukmemesını saglıyor-->
<form action= "PanelLogin.php" method="post" style= "max-width:500px;margin:auto">
  <h2>Panel Girişi</h2>
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Kullanıcı Adı" name="usrnm">
  </div>
  
  <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password" placeholder="Şifre" name="psw">
  </div>

  <button type="submit" class="btn">Giriş Yap</button>
</form>

</body>
</html>
 
<?php 

session_start(); 

$admins = [
    "Omer" => "Omer123",
    "Pelin" => "Pelin11",
    "Faruk" => "Faruk789",
    "Sude" => "Sude321"
];

// Formdan 'usrnm' ve 'psw' verileri gönderilmiş mi diye kontrol edilir bunu isset() yapar
if(isset($_POST["usrnm"], $_POST["psw"])) {
    $username = $_POST["usrnm"];  // Kullanıcı adı formdan alınır
    $password = $_POST["psw"];    // Şifre formdan alınır

    // session Kullanıcıya özel verileri sunucuda geçici olarak saklar, sayfalar arası taşır
    if(isset($admins[$username]) && $admins[$username] === $password) {
        $_SESSION["user"] = $username; 
        header("Location: Panel.php");
        exit();
    } else {
        echo "<script>alert('Kullanıcı Adı veya Şifre Yanlış')</script>";
    }
}
?>

