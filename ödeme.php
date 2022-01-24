
<html>
    <head>
        <meta charset="utf-8">
        <title>M&G Alışveriş</title>
        <link rel="stylesheet" href="ödeme.css"/>
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
            <li><a target="_top" href="sepet.php">Sepetim</a></li>
            <li><a target="_top" href="#">Kullanıcı Bilgilerim</a></li>
            <li><a target="_top" href="ürünekle.php">Ürün Ekle</a></li>
            <li><a target="_top" href="anasayfa.php">Çıkış</a></li>
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
    <div class="adres">
        <table border=1>
            <tr>
                Teslimat Adresi 
                <td>
    <table style="width:200px" >
        <tr >
            <td>Adres Adı:<input type="text" name="adres_ad"></td>
        </tr>
        <tr>
        <td>Adı Soyadı:<input type="text" name="adsoyad"></td></tr>
        <tr>
            <td>Adres:<textarea  name="adres"></textarea></td></tr>
            <tr>
            <td>Ülke Adı:<input type="text" name="ulke"></td></tr>
            <tr>
            <td>Şehir Adı:<input type="text" name="sehir"></td></tr>
            <tr>
            <td>İlçe Adı: <input type="text" name="ilce"></td></tr>
        </table>
</td>
</tr>
        </table>
        </div>
        <div class="ödeme">
        <table border=1>
            <tr>
                Ödeme Bilgileri
                <td>
    <table style="width:300px" >
        <tr >
            <td>Kart Üzerindeki Ad Soyad<input type="text" name="adsoyad2"></td>
        </tr>
        <tr>
        <td>Kredi/Banka Kartı Numarası<input type="text" name="no"></td></tr>
        <tr>
            <td>Son Kullanma Tarihi:<select name="ay">
<option>Ay</option>
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
<option>7</option>
<option>8</option>
<option>9</option>
<option>10</option>
<option>11</option>
<option>12</option>
</select>
<select name="Yıl">
<option>Yıl</option>
<option>2021</option>
<option>2022</option>
<option>2023</option>
<option>2024</option>
<option>2025</option>
<option>2026</option>
<option>2027</option>
<option>2028</option>
<option>2029</option>
<option>2030</option>
<option>2031</option>
<option>2032</option>
</select></td>
</tr>

            <tr>
            <td>Güvenlik Kodu(CV2):<input type="text" name="guvenlik"></td></tr>
           
            
        </table>
</td>
</tr>
        </table>
        </div>
      
</div>
<div class="sözlesme">
<input type="checkbox" >Satış Sözleşmesini okudum, onaylıyorum.
<div>
<div>
<?php 
$adsoyad=['adsoyad'];
if($adsoyad==""){
echo"<div class='uyarı'><strong>Uyarı</strong> Boş alan bırakmayanız.</div>";
}
else{
?>
    <a href="siparis.php"><input type="submit" class="buton" value="Siparişi Tamamla"></a>
    <?php }?>
</div>

   
    </body>
</html>