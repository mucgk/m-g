<html>
    <head>
        <meta charset="utf-8">
        <title>M&G Alışveriş</title>
        <link rel="stylesheet" href="oturumac.css"/>
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
            <li><a href="#">Kozmatik</a>
            <ul>
                    <li><a href="#">Parfüm</a></li>
                    <li><a href="#">Saç Bakımı</a></li>
                    <li><a href="#">Güneş Bakım</a></li>
                    <li><a href="#">Kişisel Bakım</a></li>
                </ul></li>
                <li><a href="#">SüperMarket</a>
                    <ul>
                            <li><a href="#">Deterjan</a></li>
                            <li><a href="#">Gıda Ürünleri</a></li>
                            <li><a href="#">İçecekler</a></li>
                            <li><a href="#">Kağıt Ürünleri</a></li>
                        </ul></li>
        </ul>

    </div> 
    <div class="üyeol">  
        <div class="baslik" >Kullanıcı Giriş</div><br>
            <form action="?" method="POST">
                <p>E-mail Adresiniz : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text"  name="email"  />    </p><br><br>
                <p>Şifre :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input   type="password" name="sifre" /></p><br>
         <p> <input class="buton" type="submit" value="Giriş Yap"  />   </p>
         <p>Üye olmak için <a href="uyeol.php">tıklayın.</a></p>
         </form> 
        </div>  
        <?php
session_start();
session_destroy();
session_unset();
unset($_SESSION['oturum']);
?> 
        <?php
        
if($_POST){
    error_reporting(0);
    $email=$_POST['email'];
    $sifre=$_POST['sifre'];

if($email==""||$sifre==""){
    echo"<script type='text/javascript'>alert('Boş alan bırakmayınız.')</script>";
}
else{
    $baglan = new PDO("mysql:host=localhost;dbname=eticaret;charset=utf8","root","");
    $kontrol = $baglan->query("SELECT * FROM musteri WHERE email='$email' and sifre='$sifre'",PDO::FETCH_ASSOC);
    if($say = $kontrol->rowCount()){
        if($say >0){
            session_start();
				$_SESSION['oturum']=true;
                $_SESSION['id'] = $email;
				$_SESSION['name']=$name;
				$_SESSION['pass']=$pass;
                header("Location:oturum.php");
        } 
        else{
            echo"<script type='text/javascript'>alert('HATALI BİLGİ GİRİŞİ.')</script>";
        }
    }
    else{
        echo"<script type='text/javascript'>alert('GİRDİĞİNİZ ŞİFRE VEYA EMAİL YANLIŞ.')</script>";
    }
   
}}

?>

    </body>
</html>