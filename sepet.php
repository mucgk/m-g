<html>
    <!-- Ürün ekle -->
    <?php
        error_reporting(0);
        $id = $_POST['urunid'];
        $userId = $_POST['userid'];
        
        $connect = new PDO("mysql:host=localhost;dbname=eticaret;charset=utf8","root","");

        $urun = $connect->prepare("SELECT chart FROM uyeler WHERE email = '$userId'");

            if($urun != "") {

            $urun->execute();
            $row = $urun->fetch();
            $idUrun = $row['chart'];

            $dataBefore = json_decode($idUrun);

            foreach ($idUrun as $key) {
                array_push($dataBefore, $key);
            }
                array_push($dataBefore, $id);

            $data = json_encode($dataBefore);

            $user = $connect->query("UPDATE uyeler SET chart='$data' WHERE email = '$userId'");
            
        }
    ?>
    <!-- /Ürün Ekle -->
    <head>
        <meta charset="utf-8">
        <title>M&G Alışveriş</title>
        <link rel="stylesheet" href="sepet.css">
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

    <div class="ürünler">
        <div class="ürün">
            <table style="width:400px;">
            <tr >
                <td>Ürün Resim</td>
                <td>Ürün Ad</td>
                <td>Ürün Bilgi</td>
                <td>Ürün Adet</td>
                <td>Ürün Fiyat</td>
            </tr>
            <?php
            $urun = $connect->prepare("SELECT chart FROM uyeler WHERE email = $userId");
            $urun->execute();
            $row = $urun->fetch();
            $idUrun = $row['chart'];

            $urunData = json_decode($idUrun);
            $in = '(' . implode(',', $urunData) .')';

            $liste = $connect->prepare("SELECT * FROM urunler WHERE urun_id IN $in");
            $liste->execute();
            $result = $liste->fetchAll(\PDO::FETCH_ASSOC);
            $idUrun2 = $result;
                
            foreach ($idUrun2 as $key => $value) {
            ?>
            <tr>
                <td><img src="<?php echo $value['urun_resim'] ?>" style="width: 100px!important;"></td>
                <td><?php echo $value['urun_ad'] ?></td>
                <td><?php echo $value['urun_bilgi'] ?></td>
                <td><?php echo "1"?></td>
                <td><?php echo $value['urun_fiyat'] ?></td>
            </tr>
            <?php } ?>
        </table>
        </div>
    </div>
    <div class="ödeme">
    <table style="width:250px" > 
        <tr >
        <td>Toplam Tutar:</td>
        <?php
        $toplamtutar+=$value['urun_fiyat'];
        ?>
        <td><?php echo $toplamtutar ?></td>
        </tr>
        </table>
        <tr><td><a href="ödeme.php"><input type="submit" class="buton" value="Ödeme işlemleri"></a></td></tr>
        <?php
            $bosalt = $connect->prepare("UPDATE uyeler set chart=['23'] ");
            $bosalt->execute();
        ?>
        <tr><td><input type="submit" class="buton" value="Sepeti Boşalt"></td></tr>
</div>
   

    </body>
</html>