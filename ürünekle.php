<html>
    <head>
        <meta charset="utf-8">
        <title>M&G Alışveriş</title>
        <link rel="stylesheet" href="ürünekle.css"/>
    </head>
    <body>
        <header class="logo">
        <a href="oturum.php"><img src="resimler/logo.png" width="400px"; height="200px";> </a>
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
            <li><a target="_top" href="#">Siparişlerim</a></li>
            <li><a target="_top" href="#">Sepetim</a></li>
            <li><a target="_top" href="#">Kullanıcı Bilgilerim</a></li>
            <li><a target="_top" href="ürünekle.php">Ürün Ekle</a></li>
            <li><a target="_top" href="anasayfa.html">Çıkış</a></li>
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
 
<div class="ürün">
    <fieldset >
        <legend >Ürün Ekle</legend>
     <?php
        if($_POST){
            error_reporting(0);
            $urun_ad =$_POST['urun_ad'];
            $urun_bilgi = $_POST['urun_bilgi'];
            $urun_fiyat=$_POST['urun_fiyat'];
        if($urun_ad==""|| $urun_bilgi==""||$urun_fiyat==""){
            echo"<div class='uyarı'><strong>Uyarı</strong> Boş alan bırakmayanız.</div>";
        }
        else{
            
                if($_FILES["resim"]["size"]<1024*1024){
                    if($_FILES["resim"]["type"]=="image/jpeg"){
                        $dosya_adi=$_FILES["resim"]["name"];
                        $uret=array("as","rt","ty","yu","fg");
                        $uzanti=substr($dosya_adi,-4,4);
                        $sayi_tut=rand(1,10000);
                        $yeni_ad="ürünler/".$uret[rand(0,4)].$sayi_tut.$uzanti;
                        
                            if(move_uploaded_file($_FILES["resim"]["tmp_name"],$yeni_ad)){
                                $baglan = new PDO("mysql:host=localhost;dbname=eticaret;charset=utf8","root",""); 	
                                 $kayıt = $baglan->query("INSERT INTO urunler(urun_ad,urun_bilgi,urun_fiyat,urun_resim) Values ('$urun_ad','$urun_bilgi','$urun_fiyat','$yeni_ad' )",PDO::FETCH_ASSOC);
                                 if($kayıt){
                                    echo"<div class='basarılı'><strong>Başarılı!</strong> Ürün eklendi.</div>";
                                }
                                else{
                                    echo"<div class='hata'><strong>Uyarı</strong>Ürün eklenemedi.</div>";
                                } 

                    }}
                }
           
                
               
        }}
        ?>
        
        <form action="" method="POST" enctype="multipart/form-data">
        <div>
        <label for="">Ürün Adı:</label>
        <input type="text" name="urun_ad">
        </div>
        <div>
        <label for="">Ürün Bilgi:</label>
        <input type="text" name="urun_bilgi" ></textarea>
        </div>
        <div>
        <label for="">Ürün Fiyat:</label>
        <input type="text" name="urun_fiyat">
        </div>
        <div>
        <label for="">Resim</label>
        <input type="file" name="resim">
        </div>
        <div>
        <input type="submit" value="Ekle">
        </div>
        

        </form>
    </fieldset>
</div>
    </body>
</html>