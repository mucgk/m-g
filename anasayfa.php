<?php
session_start();
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>M&G Alışveriş</title>
        <link rel="stylesheet" href="oturum.css"/>
        <link rel="stylesheet" href="resimler.css">
        <script src="anasayfa.js" async> </script>
    </head>
    <body>
        <header class="logo">
        <a href="anasayfa.php"><img src="resimler/logo.png" width="400px"; height="200px";> </a>
    </header>
    <div class="arama-motoru">
        <input type="text" class="text-tasarim" placeholder="Hangi ürünü aramıştınız?">
        <input type="submit" value="Ara" class="ara-buton">
    </div>

<div id="sepet" class="sepetim">
    <div class="sepetlogo">
        <a href="sepet.php"><img src="resimler/sepet.png" width="35px"; height="35px" ; align="top"></a>
    </div>
    <ul>
        <li> 
            <a href="sepet.php">Sepetim</a>
            
        </li>
        </ul>
</div>
<div id="hesap" class="kullanıcı">
    <div class="hesaplogo">
        <img src="resimler/user.png" width="35px"; height="35px" ; align="top">
    </div>
    <ul>
        <li>
           
            <a href="#">Hesabım</a>
        <ul>
            <li><a target="_top" href="oturumac.php">Oturum Aç</a></li>
            <li><a target="_top" href="uyeol.php">Üye Ol</a></li>
        </ul>
        </li>
        </ul>
</div>

    <div id="menu" class="menuler">
        <ul>
            <li><a href="#">Elektronik</a>
                <ul>
                    <li><a href="#">Bilgisayar</a></li>
                    <li><a href="#">Telefon</a></li>
                    <li><a href="#">Tablet</a></li>
                    <li><a href="#">Televizyon</a></li>
                    <li><a href="#">Ses Sistemleri</a></li>
                    <li><a href="#">Aksesuarlar & Oyunlar</a></li>
                </ul>
            </li>
            <li><a href="#">Moda</a>
            <ul>
                    <li><a href="#">Ayakkbılar</a></li>
                    <li><a href="#">Erkek Giyim</a></li>
                    <li><a href="#">Kadın Giyim</a></li>
                    <li><a href="#">Çocuk Giyim</a></li>
                </ul></li>
            <li><a href="#">Yaşam</a>
            <ul>
                    <li><a href="#">Mobilya</a></li>
                    <li><a href="#">Kırtasiye</a></li>
                    <li><a href="#">Yataklar</a></li>
                    <li><a href="#">Aydınlatma</a></li>
                </ul></li>
            <li><a href="#">Kozmetik</a>
            <ul>
                    <li><a href="#">Parfüm</a></li>
                    <li><a href="#">Saç Bakımı</a></li>
                    <li><a href="#">Güneş Bakım</a></li>
                    <li><a href="#">Kişisel Bakım</a></li>
                </ul></li>
              
        </ul>

    </div>

    <div class="slideshow-container">
        <div class="mySlides fade">
          <div class="numbertext">1 / 3</div>
          <img src="resimler/asus-kulaklik-standi-bundle-anasayfa-0203202111190680.jpg" style="width:100%">
          <div class="text">Asus kulaklıklar</div>
        </div>
        <div class="mySlides fade">
          <div class="numbertext">2 / 3</div>
          <img src="resimler/8882241896498.jpg" style="width:100%">
          <div class="text">Fırsatı Kaçırma!</div>
        </div>
        <div class="mySlides fade">
          <div class="numbertext">3 / 3</div>
          <img src="resimler/8882076745778.jpg" style="width:100%">
          <div class="text">Laptoplarda İndirim</div>
        </div>
        </div>
        <br>
        <div style="text-align:center">
          <span class="dot"></span> 
          <span class="dot"></span> 
          <span class="dot"></span> 
        </div> 
           

        <div class="ürün" >
          <?php
          $baglan = new PDO("mysql:host=localhost;dbname=eticaret;charset=utf8","root","");
          $göster = $baglan->prepare("SELECT * FROM urunler ORDER BY urun_id asc");
          $göster->execute();
          for($i=0; $row = $göster->fetch(); $i++){
          ?>
        <form action="sepet.php" method="POST">
            <div class="cerceve">
               <img src="<?php echo $row['urun_resim'];?>" alt="..." width="180px"; height="150px";>
                  <h3><?php echo $row['urun_ad'];?></h3>
                  <p><?php echo $row['urun_bilgi'];?></p>
                <p><?php echo $row['urun_fiyat'];?></p>
               
                <input type="hidden" class="buton" role="button" value="<?php echo $row['urun_id'];?>" name = "urunid">
                <input type="hidden" class="buton" role="button" value="<?php echo $_SESSION["id"]; ?>" name = "userid">

                <input type="submit" class="buton" value="Sepete Ekle">
                <div class="temizle"></div>
            </div>
          </form>
            <?php } ?>
          </div>  
    </body>
</html>