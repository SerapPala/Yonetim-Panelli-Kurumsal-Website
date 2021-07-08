<?php include_once("../config/genel.php");  
class yonetim extends PDO { 
    function __construct(){
        try {
  $baglanti = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", DB_KULAD,DB_SIFRE); 
  $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} catch (PDOException $e) {
  die($e->getMessage()); 
}
    }
  protected $tercihArray = array("Açık", "Kapalı");
  function DahilEt($dosyalar = array())
  {
    foreach ($dosyalar as $key => $deger) :
      include_once(YONETİM_YOL."assets/" . $key . ".php");
      $this->$deger = new $deger;
    endforeach;
  }
  //-----GENEL SORGU BAŞLADI----------
    private $veriler=array();
    function sorgum($vt,$sorgu,$tercih=0){
        $al = $vt->prepare($sorgu);
        $al->execute();
        if($tercih==1):
            return $al->fetch();
            elseif($tercih==2):
            return $al;
             elseif ($tercih == 3) :
        return $sonuc;
        endif;
  }
  //-----GENEL SORGU BİTTİ----------
 
   //-----VERİ TEMİZLE TASARIM RENKLER BAŞLADI----------
  function veriTemizle($deger)
  {
   return htmlspecialchars(strip_tags($deger));
  }
  //-----VERİ TEMİZLE TASARIM RENKLER BİTTİ----------
  
  //-----BREADCRUMB EKLEME BAŞLADI----
  function SayfaNavi($baglanti, $link, $anaMetin, $cocukMetin)
  {
    echo '<h4><span>
          <a href="' . $this->UrlCek($baglanti) . '/onePage/yonetim/control.php?sayfa=' . $link . '"> 
          ' . $anaMetin . '
          </a> / 
          <a href="#">
         ' . $cocukMetin . '
          </a>
        </span></h4>';
  }
  function UrlCek($baglanti)
  {
    $urlAl = $baglanti->prepare("select url from ayarlar");
    $urlAl->execute();
    $sorguson = $urlAl->fetch();
    return $sorguson["url"];
  }
  //-----BREADCRUMB EKLEME BİTTİ----

  //-----------SİTE AYARLARI BAŞLANGIÇ-----
  function siteayar($baglanti)
  {
    $sonuc = self::sorgum($baglanti, "select * from ayarlar", 1);
    if ($_POST) :
      //burada veritabanı işlemleri
      $url = htmlspecialchars($_POST["url"]);
      $title = htmlspecialchars($_POST["title"]);
      $metatitle = htmlspecialchars($_POST["metatitle"]);
      $metadesc = htmlspecialchars($_POST["metadesc"]);
      $metakey = htmlspecialchars($_POST["metakey"]);
      $metaauthor = htmlspecialchars($_POST["metaauthor"]);
      $metaowner = htmlspecialchars($_POST["metaowner"]);
      $metacopy = htmlspecialchars($_POST["metacopy"]);
      $logoyazisi = htmlspecialchars($_POST["logoyazisi"]);
      $twit = htmlspecialchars($_POST["twit"]);
      $face = htmlspecialchars($_POST["face"]);
      $inst = htmlspecialchars($_POST["inst"]);
      $telefonno = htmlspecialchars($_POST["telefonno"]);
      $adress = htmlspecialchars($_POST["adress"]);
      $mailadres = htmlspecialchars($_POST["mailadres"]);
      //SLOGAN      		
      $slogan_tr = htmlspecialchars($_POST["slogan_tr"]);
      $slogan_en = htmlspecialchars($_POST["slogan_en"]);
      //REFERANSLAR
      $referansUstBaslik_tr = htmlspecialchars($_POST["referansUstBaslik_tr"]);
      $referansUstBaslik_en = htmlspecialchars($_POST["referansUstBaslik_en"]);
      $referansbaslik_tr = htmlspecialchars($_POST["referansbaslik_tr"]);
      $referansbaslik_en = htmlspecialchars($_POST["referansbaslik_en"]);
      //GALERİ
      $galeriUstBaslik_tr = htmlspecialchars($_POST["galeriUstBaslik_tr"]);
      $galeriUstBaslik_en = htmlspecialchars($_POST["galeriUstBaslik_en"]);
      $galeribaslik_tr = htmlspecialchars($_POST["galeribaslik_tr"]);
      $galeribaslik_en = htmlspecialchars($_POST["galeribaslik_en"]);
      //YORUMLAR	
      $yorumUstBaslik_tr = htmlspecialchars($_POST["yorumUstBaslik_tr"]);
      $yorumUstBaslik_en = htmlspecialchars($_POST["yorumUstBaslik_en"]);
      $yorumbaslik_tr = htmlspecialchars($_POST["yorumbaslik_tr"]);
      $yorumbaslik_en = htmlspecialchars($_POST["yorumbaslik_en"]);
      //İLETİŞİM		
      $iletisimUstBaslik_tr = htmlspecialchars($_POST["iletisimUstBaslik_tr"]);
      $iletisimbaslik_tr = htmlspecialchars($_POST["iletisimbaslik_tr"]);
      $iletisimUstBaslik_en = htmlspecialchars($_POST["iletisimUstBaslik_en"]);
      $iletisimbaslik_en = htmlspecialchars($_POST["iletisimbaslik_en"]);
      //HİZMETLER
      $hizmetlerUstBaslik_tr = htmlspecialchars($_POST["hizmetlerUstBaslik_tr"]);
      $hizmetlerUstBaslik_en = htmlspecialchars($_POST["hizmetlerUstBaslik_en"]);
      $hizmetlerbaslik_tr = htmlspecialchars($_POST["hizmetlerbaslik_tr"]);
      $hizmetlerbaslik_en = htmlspecialchars($_POST["hizmetlerbaslik_en"]);
      //VİDEOLAR
      $videolarUstBaslik_tr = htmlspecialchars($_POST["videolarUstBaslik_tr"]);
      $videolarbaslik_tr = htmlspecialchars($_POST["videolarbaslik_tr"]);
      $videolarUstBaslik_en = htmlspecialchars($_POST["videolarUstBaslik_en"]);
      $videolarbaslik_en = htmlspecialchars($_POST["videolarbaslik_en"]);
      //HARİTA BİLGİ - FOOTER -MESAJ-TERCİH
      $haritabilgi = htmlspecialchars($_POST["haritabilgi"]);
      $footer = htmlspecialchars($_POST["footer"]);
      $mesajtercih = htmlspecialchars($_POST["mesajtercih"]);
      //HABERLER BAŞLIK
      $haberler_tr = htmlspecialchars($_POST["haberler_tr"]);
      $haberler_en = htmlspecialchars($_POST["haberler_en"]);
        
      $guncelleme = $baglanti->prepare("update ayarlar set title=?,metatitle=?,metadesc=?,metakey=?,metaauthor=?,metaowner=?,metacopy=?,logoyazisi=?,twit=?,face=?,inst=?,telefonno=?,adress=?,mailadres=?,slogan_tr=?,slogan_en=?,referansUstBaslik_tr=?,referansUstBaslik_en=?,referansbaslik_tr=?,referansbaslik_en=?,galeriUstBaslik_tr=?,galeriUstBaslik_en=?,galeribaslik_tr=?,galeribaslik_en=?,yorumUstBaslik_tr=?,yorumUstBaslik_en=?,yorumbaslik_tr=?,yorumbaslik_en=?,iletisimUstBaslik_tr=?,iletisimUstBaslik_en=?,iletisimbaslik_tr=?,iletisimbaslik_en=?,hizmetlerUstBaslik_tr=?,hizmetlerUstBaslik_en=?,hizmetlerbaslik_tr=?,hizmetlerbaslik_en=?,videolarUstBaslik_tr=?,videolarbaslik_tr=?,videolarUstBaslik_en=?,videolarbaslik_en=?,mesajtercih=?,haritabilgi=?,footer=?,url=?,haberler_tr=?,haberler_en=?");
      $guncelleme->bindParam(1, $title, PDO::PARAM_STR);
      $guncelleme->bindParam(2, $metatitle, PDO::PARAM_STR);
      $guncelleme->bindParam(3, $metadesc, PDO::PARAM_STR);
      $guncelleme->bindParam(4, $metakey, PDO::PARAM_STR);
      $guncelleme->bindParam(5, $metaauthor, PDO::PARAM_STR);
      $guncelleme->bindParam(6, $metaowner, PDO::PARAM_STR);
      $guncelleme->bindParam(7, $metacopy, PDO::PARAM_STR);
      $guncelleme->bindParam(8, $logoyazisi, PDO::PARAM_STR);
      $guncelleme->bindParam(9, $twit, PDO::PARAM_STR);
      $guncelleme->bindParam(10, $face, PDO::PARAM_STR);
      $guncelleme->bindParam(11, $inst, PDO::PARAM_STR);
      $guncelleme->bindParam(12, $telefonno, PDO::PARAM_STR);
      $guncelleme->bindParam(13, $adress, PDO::PARAM_STR);
      $guncelleme->bindParam(14, $mailadres, PDO::PARAM_STR);
      //SLOGAN
      $guncelleme->bindParam(15, $slogan_tr, PDO::PARAM_STR);
      $guncelleme->bindParam(16, $slogan_en, PDO::PARAM_STR);
      //REFERANSLAR      
      $guncelleme->bindParam(17, $referansUstBaslik_tr, PDO::PARAM_STR);
      $guncelleme->bindParam(18, $referansUstBaslik_en, PDO::PARAM_STR);
      $guncelleme->bindParam(19, $referansbaslik_tr, PDO::PARAM_STR);
      $guncelleme->bindParam(20, $referansbaslik_en, PDO::PARAM_STR);
      //GALERİ         
      $guncelleme->bindParam(21, $galeriUstBaslik_tr, PDO::PARAM_STR);
      $guncelleme->bindParam(22, $galeriUstBaslik_en, PDO::PARAM_STR);
      $guncelleme->bindParam(23, $galeribaslik_tr, PDO::PARAM_STR);
      $guncelleme->bindParam(24, $galeribaslik_en, PDO::PARAM_STR);
      //YORUMLAR      
      $guncelleme->bindParam(25, $yorumUstBaslik_tr, PDO::PARAM_STR);
      $guncelleme->bindParam(26, $yorumUstBaslik_en, PDO::PARAM_STR);
      $guncelleme->bindParam(27, $yorumbaslik_tr, PDO::PARAM_STR);
      $guncelleme->bindParam(28, $yorumbaslik_en, PDO::PARAM_STR);
      //İLETİŞİM     
      $guncelleme->bindParam(29, $iletisimUstBaslik_tr, PDO::PARAM_STR);
      $guncelleme->bindParam(30, $iletisimbaslik_tr, PDO::PARAM_STR);
      $guncelleme->bindParam(31, $iletisimUstBaslik_en, PDO::PARAM_STR);
      $guncelleme->bindParam(32, $iletisimbaslik_en, PDO::PARAM_STR);
      //HİZMETLER      
      $guncelleme->bindParam(33, $hizmetlerUstBaslik_tr, PDO::PARAM_STR);
      $guncelleme->bindParam(34, $hizmetlerUstBaslik_en, PDO::PARAM_STR);
      $guncelleme->bindParam(35, $hizmetlerbaslik_tr, PDO::PARAM_STR);
      $guncelleme->bindParam(36, $hizmetlerbaslik_en, PDO::PARAM_STR);
      //VİDEOLAR
      $guncelleme->bindParam(37, $videolarUstBaslik_tr, PDO::PARAM_STR);
      $guncelleme->bindParam(38, $videolarbaslik_tr, PDO::PARAM_STR);
      $guncelleme->bindParam(39, $videolarUstBaslik_en, PDO::PARAM_STR);
      $guncelleme->bindParam(40, $videolarbaslik_en, PDO::PARAM_STR);
      //HARİTA BİLGİ- FOOTER- MESAJ TERCİH- URL
      $guncelleme->bindParam(41, $mesajtercih, PDO::PARAM_INT);
      $guncelleme->bindParam(42, $haritabilgi, PDO::PARAM_STR);
      $guncelleme->bindParam(43, $footer, PDO::PARAM_STR);
      $guncelleme->bindParam(44, $url, PDO::PARAM_STR);
      //HABERLER BAŞLIK
      $guncelleme->bindParam(45, $haberler_tr, PDO::PARAM_STR);
        $guncelleme->bindParam(46, $haberler_en, PDO::PARAM_STR);
      $guncelleme->execute();
      ?><script>
        BilgiPenceresi("control.php?sayfa=siteayar", "BAŞARILI", "Site ayarları başarıyla güncellendi.", "success");
      </script><?php
        else :
      ?>
      <form action="control.php?sayfa=siteayar" method="post">
        <div class="row">
          <div class="col-lg-9 mt-2  mx-auto border-bottom">
            <h3 class="text-inf">SİTE AYARLARI</h3>
          </div>
          <!--URL-->
          <div class="col-lg-9 mt-2  mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right p-3 text-xl-left text-dark">
                <span style="font-size:18px;">SİTE URL</span>
              </div>
              <div class="col-lg-9 p-1">
                <input type="text" name="url" class="form-control" value="<?php echo $sonuc["url"]; ?>" />
              </div>
            </div>
          </div>
          <!--Title-->
          <div class="col-lg-9 mt-2  mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right p-3 text-xl-left text-dark">
                <span style="font-size:18px;">Title</span>
              </div>
              <div class="col-lg-9 p-1">
                <input type="text" name="title" class="form-control" value="<?php echo $sonuc["title"]; ?>" />
              </div>
            </div>
          </div>
          <!--Meta Title-->
          <div class="col-lg-9 mt-2  mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right p-3 text-xl-left text-dark">
                <span style="font-size:18px;">Meta Title</span>
              </div>
              <div class="col-lg-9 p-2">
                <input type="text" name="metatitle" class="form-control" value="<?php echo $sonuc["metatitle"]; ?>" />
              </div>
            </div>
          </div>
          <!--Sayfa Açıklama/Meta Description-->
          <div class="col-lg-9 mt-2  mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right p-3 text-xl-left text-dark">
                <span style="font-size:18px;">Sayfa Açıklama</span>
              </div>
              <div class="col-lg-9 p-2">
                <input type="text" name="metadesc" class="form-control" value="<?php echo $sonuc["metadesc"]; ?>" />
              </div>
            </div>
          </div>
          <!--Anahtar Kelimeler/Meta Key-->
          <div class="col-lg-9 mt-2  mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right p-3 text-xl-left text-dark">
                <span style="font-size:18px;">Anahtar Kelimeler</span>
              </div>
              <div class="col-lg-9 p-2">
                <input type="text" name="metakey" class="form-control" value="<?php echo $sonuc["metakey"]; ?>" />
              </div>
            </div>
          </div>
          <!--Yapımcı/Meta Author-->
          <div class="col-lg-9 mt-2  mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right p-3 text-xl-left text-dark">
                <span style="font-size:18px;">Yapımcı</span>
              </div>
              <div class="col-lg-9 p-2">
                <input type="text" name="metaauthor" class="form-control" value="<?php echo $sonuc["metaauthor"]; ?>" />
              </div>
            </div>
          </div>
          <!--Firma/Meta Owner-->
          <div class="col-lg-9 mt-2  mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right p-3 text-xl-left text-dark">
                <span style="font-size:18px;">Firma</span>
              </div>
              <div class="col-lg-9 p-2">
                <input type="text" name="metaowner" class="form-control" value="<?php echo $sonuc["metaowner"]; ?>" />
              </div>
            </div>
          </div>
          <!--Copyright/Meta Copy-->
          <div class="col-lg-9 mt-2  mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right p-3 text-xl-left text-dark">
                <span style="font-size:18px;">Copyright</span>
              </div>
              <div class="col-lg-9 p-2">
                <input type="text" name="metacopy" class="form-control" value="<?php echo $sonuc["metacopy"]; ?>" />
              </div>
            </div>
          </div>
          <!--Logo Yazısı-->
          <div class="col-lg-9 mt-2  mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right p-3 text-xl-left text-dark">
                <span style="font-size:18px;">Logo Yazısı</span>
              </div>
              <div class="col-lg-9 p-2">
                <input type="text" name="logoyazisi" class="form-control" value="<?php echo $sonuc["logoyazisi"]; ?>" />
              </div>
            </div>
          </div>
          <!--Twitter-->
          <div class="col-lg-9 mt-2  mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right p-3 text-xl-left text-dark">
                <span style="font-size:18px;">Twitter</span>
              </div>
              <div class="col-lg-9 p-2">
                <input type="text" name="twit" class="form-control" value="<?php echo $sonuc["twit"]; ?>" />
              </div>
            </div>
          </div>
          <!--Facebook-->
          <div class="col-lg-9 mt-2  mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right p-3 text-xl-left text-dark">
                <span style="font-size:18px;">Facebook</span>
              </div>
              <div class="col-lg-9 p-2">
                <input type="text" name="face" class="form-control" value="<?php echo $sonuc["face"]; ?>" />
              </div>
            </div>
          </div>
          <!--Instagram-->
          <div class="col-lg-9 mt-2  mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right p-3 text-xl-left text-dark">
                <span style="font-size:18px;">Instagram</span>
              </div>
              <div class="col-lg-9 p-2">
                <input type="text" name="inst" class="form-control" value="<?php echo $sonuc["inst"]; ?>" />
              </div>
            </div>
          </div>
          <!--Telefon Numarası-->
          <div class="col-lg-9 mt-2  mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right p-3 text-xl-left text-dark">
                <span style="font-size:18px;">Telefon Numarası</span>
              </div>
              <div class="col-lg-9 p-2">
                <input type="text" name="telefonno" class="form-control" value="<?php echo $sonuc["telefonno"]; ?>" />
              </div>
            </div>
          </div>
          <!--Adres-->
          <div class="col-lg-9 mt-2  mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right p-3 text-xl-left text-dark">
                <span style="font-size:18px;">Adres</span>
              </div>
              <div class="col-lg-9 p-2">
                <input type="text" name="adress" class="form-control" value="<?php echo $sonuc["adress"]; ?>" />
              </div>
            </div>
          </div>
          <!--Mail Adresi-->
          <div class="col-lg-9 mt-2  mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right p-3 text-xl-left text-dark">
                <span style="font-size:18px;">Mail Adresi</span>
              </div>
              <div class="col-lg-9 p-2">
                <input type="text" name="mailadres" class="form-control" value="<?php echo $sonuc["mailadres"]; ?>" />
              </div>
            </div>
          </div>
          <!--Slogan TR-->
          <div class="col-lg-9 mt-2  mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right p-3 text-xl-left text-dark">
                <span style="font-size:18px;">Slogan <span class="text-danger">TR</span></span>
              </div>
              <div class="col-lg-9 p-2">
                <input type="text" name="slogan_tr" class="form-control" value="<?php echo $sonuc["slogan_tr"]; ?>" />
              </div>
            </div>
          </div>
          <!--Slogan EN-->
          <div class="col-lg-9 mt-2  mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right p-3 text-xl-left text-dark">
                <span style="font-size:18px;">Slogan EN</span>
              </div>
              <div class="col-lg-9 p-2">
                <input type="text" name="slogan_en" class="form-control" value="<?php echo $sonuc["slogan_en"]; ?>" />
              </div>
            </div>
          </div>
         <!--Haberler Başlık TR-->
          <div class="col-lg-9 mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right pt-3 text-left">
                <span style="font-size:18px;">Haberler BAŞLIK TR</span>
              </div>
              <div class="col-lg-9 p-1">
                <input type="text" name="haberler_tr" class="form-control" value="<?php echo $sonuc["haberler_tr"]; ?>" />
              </div>
            </div>
          </div>
         <!--Haberler Başlık EN-->
          <div class="col-lg-9 mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right pt-3 text-left">
                <span style="font-size:18px;">Haberler BAŞLIK EN</span>
              </div>
              <div class="col-lg-9 p-1">
                <input type="text" name="haberler_en" class="form-control" value="<?php echo $sonuc["haberler_en"]; ?>" />
              </div>
            </div>
          </div>
          <!--Referans ÜST Başlık TR-->
          <div class="col-lg-9 mt-2  mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right p-3 text-xl-left text-dark">
                <span style="font-size:18px;">Referans Üst Başlık <span class="text-danger">TR</span>
              </div>
              <div class="col-lg-9 p-2">
                <input type="text" name="referansUstBaslik_tr" class="form-control" value="<?php echo $sonuc["referansUstBaslik_tr"]; ?>" />
              </div>
            </div>
          </div>
          <!--Referans ÜST Başlık EN-->
          <div class="col-lg-9 mt-2  mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right p-3 text-xl-left text-dark">
                <span style="font-size:18px;">Referans Üst Başlık <span class="text-info">EN</span>
              </div>
              <div class="col-lg-9 p-2">
                <input type="text" name="referansUstBaslik_en" class="form-control" value="<?php echo $sonuc["referansUstBaslik_en"]; ?>" />
              </div>
            </div>
          </div>
          <!--Referans ALT Başlık TR-->
          <div class="col-lg-9 mt-2  mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right p-3 text-xl-left text-dark">
                <span style="font-size:18px;">Referans Alt Başlık<span class="text-danger">TR</span>
              </div>
              <div class="col-lg-9 p-2">
                <input type="text" name="referansbaslik_tr" class="form-control" value="<?php echo $sonuc["referansbaslik_tr"]; ?>" />
              </div>
            </div>
          </div>
          <!--Referans ALT Başlık EN-->
          <div class="col-lg-9 mt-2  mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right p-3 text-xl-left text-dark">
                <span style="font-size:18px;">Referans Alt Başlık <span class="text-info">EN</span>
              </div>
              <div class="col-lg-9 p-2">
                <input type="text" name="referansbaslik_en" class="form-control" value="<?php echo $sonuc["referansbaslik_en"]; ?>" />
              </div>
            </div>
          </div>
          <!--Galeri ÜST Başlık TR-->
          <div class="col-lg-9 mt-2  mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right p-3 text-xl-left text-dark">
                <span style="font-size:18px;">Galeri Üst Başlık <span class="text-danger">TR</span>
              </div>
              <div class="col-lg-9 p-2">
                <input type="text" name="galeriUstBaslik_tr" class="form-control" value="<?php echo $sonuc["galeriUstBaslik_tr"]; ?>" />
              </div>
            </div>
          </div>
          <!--Galeri  ÜST Başlık EN-->
          <div class="col-lg-9 mt-2  mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right p-3 text-xl-left text-dark">
                <span style="font-size:18px;">Galeri Üst Başlık <span class="text-info">EN</span>
              </div>
              <div class="col-lg-9 p-2">
                <input type="text" name="galeriUstBaslik_en" class="form-control" value="<?php echo $sonuc["galeriUstBaslik_en"]; ?>" />
              </div>
            </div>
          </div>
          <!--Galeri ALT Başlık TR-->
          <div class="col-lg-9 mt-2  mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right p-3 text-xl-left text-dark">
                <span style="font-size:18px;">Galeri Alt Başlık <span class="text-danger">TR</span>
              </div>
              <div class="col-lg-9 p-2">
                <input type="text" name="galeribaslik_tr" class="form-control" value="<?php echo $sonuc["galeribaslik_tr"]; ?>" />
              </div>
            </div>
          </div>
          <!--Galeri ALT Başlık EN-->
          <div class="col-lg-9 mt-2  mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right p-3 text-xl-left text-dark">
                <span style="font-size:18px;">Galeri Alt Başlık <span class="text-info">EN</span>
              </div>
              <div class="col-lg-9 p-2">
                <input type="text" name="galeribaslik_en" class="form-control" value="<?php echo $sonuc["galeribaslik_en"]; ?>" />
              </div>
            </div>
          </div>
          <!--Videolar ÜST Başlık TR-->
          <div class="col-lg-9 mt-2  mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right p-3 text-xl-left text-dark">
                <span style="font-size:18px;">Videolar Üst Başlık <span class="text-danger">TR</span>
              </div>
              <div class="col-lg-9 p-2">
                <input type="text" name="videolarUstBaslik_tr" class="form-control" value="<?php echo $sonuc["videolarUstBaslik_tr"]; ?>" />
              </div>
            </div>
          </div>
          <!--Videolar  ÜST Başlık EN-->
          <div class="col-lg-9 mt-2  mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right p-3 text-xl-left text-dark">
                <span style="font-size:18px;">Videolar Üst Başlık <span class="text-info">EN</span>
              </div>
              <div class="col-lg-9 p-2">
                <input type="text" name="videolarUstBaslik_en" class="form-control" value="<?php echo $sonuc["videolarUstBaslik_en"]; ?>" />
              </div>
            </div>
          </div>
          <!--Videolar ALT Başlık TR-->
          <div class="col-lg-9 mt-2  mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right p-3 text-xl-left text-dark">
                <span style="font-size:18px;">Videolar Alt Başlık <span class="text-danger">TR</span>
              </div>
              <div class="col-lg-9 p-2">
                <input type="text" name="videolarbaslik_tr" class="form-control" value="<?php echo $sonuc["videolarbaslik_tr"]; ?>" />
              </div>
            </div>
          </div>
          <!--Videolar ALT Başlık EN-->
          <div class="col-lg-9 mt-2  mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right p-3 text-xl-left text-dark">
                <span style="font-size:18px;">Videolar Alt Başlık <span class="text-info">EN</span>
              </div>
              <div class="col-lg-9 p-2">
                <input type="text" name="videolarbaslik_en" class="form-control" value="<?php echo $sonuc["videolarbaslik_en"]; ?>" />
              </div>
            </div>
          </div>
          <!--Yorum ÜST Başlık TR-->
          <div class="col-lg-9 mt-2  mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right p-3 text-xl-left text-dark">
                <span style="font-size:18px;">Yorum Üst Başlık <span class="text-danger">TR</span>
              </div>
              <div class="col-lg-9 p-2">
                <input type="text" name="yorumUstBaslik_tr" class="form-control" value="<?php echo $sonuc["yorumUstBaslik_tr"]; ?>" />
              </div>
            </div>
          </div>
          <!--Yorum  ÜST Başlık EN-->
          <div class="col-lg-9 mt-2  mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right p-3 text-xl-left text-dark">
                <span style="font-size:18px;">Yorum Üst Başlık <span class="text-info">EN</span>
              </div>
              <div class="col-lg-9 p-2">
                <input type="text" name="yorumUstBaslik_en" class="form-control" value="<?php echo $sonuc["yorumUstBaslik_en"]; ?>" />
              </div>
            </div>
          </div>
          <!--Yorum ALT Başlık TR-->
          <div class="col-lg-9 mt-2  mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right p-3 text-xl-left text-dark">
                <span style="font-size:18px;">Yorum Alt Başlık <span class="text-danger">TR</span>
              </div>
              <div class="col-lg-9 p-2">
                <input type="text" name="yorumbaslik_tr" class="form-control" value="<?php echo $sonuc["yorumbaslik_tr"]; ?>" />
              </div>
            </div>
          </div>
          <!--Yorum ALT Başlık EN-->
          <div class="col-lg-9 mt-2  mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right p-3 text-xl-left text-dark">
                <span style="font-size:18px;">Yorum Alt Başlık <span class="text-info">EN</span>
              </div>
              <div class="col-lg-9 p-2">
                <input type="text" name="yorumbaslik_en" class="form-control" value="<?php echo $sonuc["yorumbaslik_en"]; ?>" />
              </div>
            </div>
          </div>
          <!--İletişim Üst Sayfa Başlık TR-->
          <div class="col-lg-9 mt-1 mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right p-3 text-xl-left text-dark">
                <span style="font-size:18px;">İletişim Üst Başlık <span class="text-danger">TR</span>
              </div>
              <div class="col-lg-9 p-2">
                <input type="text" name="iletisimUstBaslik_tr" class="form-control" value="<?php echo $sonuc["iletisimUstBaslik_tr"]; ?>" />
              </div>
            </div>
          </div>
          <!--İletişim Üst Sayfa Başlık EN-->
          <div class="col-lg-9 mt-1 mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right p-3 text-xl-left text-dark">
                <span style="font-size:18px;">İletişim Üst Başlık <span class="text-info">EN</span>
              </div>
              <div class="col-lg-9 p-2">
                <input type="text" name="iletisimUstBaslik_en" class="form-control" value="<?php echo $sonuc["iletisimUstBaslik_en"]; ?>" />
              </div>
            </div>
          </div>
          <!--İletişim ALT Sayfa Başlık TR-->
          <div class="col-lg-9 mt-1 mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right p-3 text-xl-left text-dark">
                <span style="font-size:18px;">İletişim Alt Başlık <span class="text-danger">TR</span>
              </div>
              <div class="col-lg-9 p-2">
                <input type="text" name="iletisimbaslik_tr" class="form-control" value="<?php echo $sonuc["iletisimbaslik_tr"]; ?>" />
              </div>
            </div>
          </div>
          <!--İletişim ALT Sayfa Başlık EN-->
          <div class="col-lg-9 mt-1 mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right p-3 text-xl-left text-dark">
                <span style="font-size:18px;">İletişim Alt Başlık <span class="text-info">EN</span>
              </div>
              <div class="col-lg-9 p-2">
                <input type="text" name="iletisimbaslik_en" class="form-control" value="<?php echo $sonuc["iletisimbaslik_en"]; ?>" />
              </div>
            </div>
          </div>
          <!--Hizmetler ÜST Sayfa Başlık TR-->
          <div class="col-lg-9 mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right pt-3 text-left">
                <span style="font-size:18px;">Hizmetler Üst Başlık TR <span class="text-danger">TR</span>
              </div>
              <div class="col-lg-9 p-1">
                <input type="text" name="hizmetlerUstBaslik_tr" class="form-control" value="<?php echo $sonuc["hizmetlerUstBaslik_tr"]; ?>" />
              </div>
            </div>
          </div>
          <!--Hizmetler ÜST Sayfa Başlık EN-->
          <div class="col-lg-9 mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right pt-3 text-left">
                <span style="font-size:18px;">Hizmetler Üst Başlık <span class="text-info">EN</span>
              </div>
              <div class="col-lg-9 p-1">
                <input type="text" name="hizmetlerUstBaslik_en" class="form-control" value="<?php echo $sonuc["hizmetlerUstBaslik_en"]; ?>" />
              </div>
            </div>
          </div>
          <!--Hizmetler ALT Sayfa Başlık TR-->
          <div class="col-lg-9 mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right pt-3 text-left">
                <span style="font-size:18px;">Hizmetler Alt Başlık <span class="text-danger">TR</span>
              </div>
              <div class="col-lg-9 p-1">
                <input type="text" name="hizmetlerbaslik_tr" class="form-control" value="<?php echo $sonuc["hizmetlerbaslik_tr"]; ?>" />
              </div>
            </div>
          </div>
          <!--Hizmetler ALT Sayfa Başlık EN-->
          <div class="col-lg-9 mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right pt-3 text-left">
                <span style="font-size:18px;">Hizmetler Alt Başlık <span class="text-info">EN</span>
              </div>
              <div class="col-lg-9 p-1">
                <input type="text" name="hizmetlerbaslik_en" class="form-control" value="<?php echo $sonuc["hizmetlerbaslik_en"]; ?>" />
              </div>
            </div>
          </div>
          <!--Harita Bilgisi-->
          <div class="col-lg-9 mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right pt-3 text-left">
                <span style="font-size:18px;">Harita Bilgisi</span>
              </div>
              <div class="col-lg-9 p-1">
                <input type="text" name="haritabilgi" class="form-control" value="<?php echo $sonuc["haritabilgi"]; ?>" />
              </div>
            </div>
          </div>
          <!--Harita Bilgisi-->
          <!--Footer Bilgisi-->
          <div class="col-lg-9 mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right pt-3 text-left">
                <span style="font-size:18px;">Footer Bilgisi</span>
              </div>
              <div class="col-lg-9 p-1">
                <input type="text" name="footer" class="form-control" value="<?php echo $sonuc["footer"]; ?>" />
              </div>
            </div>
          </div>
          <!--Footer Bilgisi-->
          <!--Mesaj Tercih-->
          <div class="col-lg-9 mx-auto border">
            <div class="row">
              <div class="col-lg-3 border-right pt-3 text-left">
                <span style="font-size:18px;">Mesaj Tercih</span>
              </div>
              <div class="col-lg-9 p-1">
                <div class="row">
                  <div class="col-lg-4 pt-1 text-danger border-right">
                    Sadece Mail
                    <input type="radio" name="mesajtercih" value="1" class="mt-2" <?php echo ($sonuc["mesajtercih"] == 1) ? "checked='checked'" : ""; ?> />
                  </div>
                  <div class="col-lg-4 pt-1 text-danger border-right ">
                    Hem Mail Hem Mesaj
                    <input type="radio" name="mesajtercih" value="2" class="mt-2" <?php echo ($sonuc["mesajtercih"] == 2) ? "checked='checked'" : ""; ?> />
                  </div>
                  <div class="col-lg-4 pt-1 text-danger">
                    Sadece Mesaj
                    <input type="radio" name="mesajtercih" value="3" class="mt-2" <?php echo ($sonuc["mesajtercih"] == 3) ? "checked='checked'" : ""; ?> />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--Mesaj Tercih-->
          <!--Güncelle Butonu-->
          <div class="col-lg-8 mx-auto mt-2 border-bottom">
            <input type="submit" name="buton" class="btn btn-info m-1" value="Guncelle" />
          </div>
        </div>
      </form>
    <?php
              endif;
            }
  //-----------SİTE AYARLARI BİTTİ-----

function sifrele($veri)
            {   //şifreleme
              //biraz daha sıkıştırdım //sıkıştırdım            
              return base64_encode(gzdeflate(gzcompress(serialize($veri))));
              //gelen veriyi şifreledim
            }
            function coz($veri)
            {   //çözme
              return unserialize(gzuncompress(gzinflate(base64_decode($veri))));
            }
            function kuladial($vt)
            {  //Kullanıcı adı alma
              $cookid = $_COOKIE["kulbilgi"];
              $cozduk = self::coz($cookid);
              $sorgusonuc = self::sorgum($vt, "select * from yonetim where id=$cozduk", 1);
              return $sorgusonuc["kulad"];
            }
            function giriskontrol($kulad, $sifre, $vt)
            { //---------------GİRİŞ KONTROL-------------------
              $sifrelihal = md5(sha1(md5($sifre)));
              $sor = $vt->prepare("SELECT * from yonetim where kulad='$kulad' and sifre='$sifrelihal' ");
              $sor->execute();
              if ($sor->rowCount() == 0) :
                echo '<div class="container-fluid bg-white ">
                <div class="alert alert-white border border-dark mt-5 col-md-5 mx-auyo p-3 text-danger fon14 font-weight-bold"><img src='.YONETİM_YOL.'"assets/images/loader.gif" class="mr-3" />BİLGİLER HATALI ! YÖNLENDİRİLİYOR..</div> 
                </div>';
                header("refresh:2, url=index.php");
              else :
                $gelendeger = $sor->fetch();
                $sor = $vt->prepare("UPDATE yonetim set aktif=1 where kulad='$kulad' and sifre='$sifrelihal'");
                $sor->execute();
                echo '
                <div class="container-fluid bg-white ">
                <div class="alert alert-white border border-dark mt-5 col-md-5 mx-auyo p-3 text-success fon14 font-weight-bold"><img src=<img src='.YONETİM_YOL.'"assets/images/loader.gif" class="mr-3" />KULLANICI ADI VE ŞİFRE DOĞRU...<br>Sayfa Yükleniyor Lütfen Bekleyiniz.</div> 
                </div>
                ';
                header("refresh:2, url=control.php");
                // cookie olusturmak
                $id = self::sifrele($gelendeger["id"]);
                setcookie("kulbilgi", $id, time() + 60 * 60 * 24);
              endif;
            }
               function cikis($id,$vt)
            { //Çıkış Kontrol
              $cookid = $_COOKIE["kulbilgi"];
              $cozduk = self::coz($cookid);
              self::sorgum($vt, "update yonetim set aktif=0 where id=$cozduk", 0);
              setcookie("kulbilgi", $cookid, time() - 5);
              echo '
              <div class="container-fluid bg-white ">
              <div class="alert alert-white border border-dark mt-5 col-md-5 mx-auyo p-3 text-success fon14 font-weight-bold">Çıkış Yapılıyor.</div> 
              </div>
              ';
              header("Location:index.php");
            }
 function kontrolet($sayfa)
            { //cookie nin tanımlı olup olmamasını kontrol eder.
              if (isset($_COOKIE["kulbilgi"])) :
                /*
                -Giriş yapan kullanıcının bilgilerini teyit etmek için db ye bağlanabilirsin.
                O bilgiler ile sağlama yaparak daha fazla kontrol yapabilirsin.
                */
                if ($sayfa == "ind") : header("Location:control.php");
                endif;
              else :
                if ($sayfa == "cot") : header("Location:index.php");
                endif;
              endif;
            }
            //--------------------İNTRO BAŞLADI-----------------------
            function introayar($vt)
            {
              echo '<div class="row text-center">
    
    <div class="col-lg-12 breadcrumbBack">
                    <h4 class="float-left mt-3 text-info mb-2 ">
                    <a href="control.php?sayfa=introresimekle" class="ti-plus eklemebuton p-1  mr-2 mt-3"></a>
                    İntro Resimleri</h4> </div>';
           
              $introbilgiler = self::sorgum($vt, "select * from intro", 2);
              while ($sonbilgi = $introbilgiler->fetch(PDO::FETCH_ASSOC)) :
                  
                echo '<div class="col-lg-4">
                  <div class="row card-bordered  p-1 m-1">
                  <div class="col-lg-12">
                  <img src="'.URL.$sonbilgi["resimyol"] . '">
                  <kbd class="bg-white p-2" style="position:absolute; bottom:10px; right:10px;">
                  <a href="control.php?sayfa=introresimguncelle&id=' . $sonbilgi["id"] . '" class="ti-reload m-2 text-success" style="font-size:20px;"></a>'; ?>
      <a onclick="silmedenSor('control.php?sayfa=introresimsil&id=<?php echo $sonbilgi["id"]; ?>');return false" class="ti-trash m-2 text-danger" style="font-size:20px;"></a>
      <?php echo '
    </kbd>
    </div> </div>
    </div>';
              endwhile;
              echo '</div>';
            } //vt resimleri geldi
            
  
            
            
            //intro resim ekleme
            function introresimekleme($vt)
            {
              echo '<div class="row text-center">
    <div class="col-lg-12">
    ';
              if ($_POST) :
                if ($_FILES["dosya"]["name"] == "") :
      ?><script>
          BilgiPenceresi("control.php?sayfa=introresimekle", "BAŞARISIZ", "Dosya Yüklenmedi. Boş Olamaz.", "warning");
        </script><?php
                else : //boş değilse
                  if ($_FILES["dosya"]["size"] > (1024 * 1024 * 5)) :
                  ?><script>
            BilgiPenceresi("control.php?sayfa=introresimekle", "BAŞARISIZ", "Dosya Yüklenmedi. Dosya boyutu çok fazla.", "warning");
          </script><?php
                  else : //boyutta bir problem yok ise
                    $izinverilen = array("image/png", "image/jpeg");
                    if (!in_array($_FILES["dosya"]["type"], $izinverilen)) :
                    ?><script>
              BilgiPenceresi("control.php?sayfa=introresimekle", "BAŞARISIZ", "Dosya Yüklenmedi. İzin verilen uzantı değil.", "warning");
            </script><?php
                    else : //artık her şey tamam
                      $uzanti = explode(".", $_FILES["dosya"]["name"]);
                      $randdeger = md5(mt_rand(0, 9995454));
                      $yeniisim = $randdeger . "." . end($uzanti);
                      $dosyaminyolu = '../img/carousel/' . $yeniisim;
                      move_uploaded_file($_FILES["dosya"]["tmp_name"], $dosyaminyolu);
                      ?><script>
              BilgiPenceresi("control.php?sayfa=introayar", "BAŞARILI", "Dosya başarıyla yüklendi.", "success");
            </script><?php
                      //dosya yüklendikten sonra veritabanınada bu kaydı eklemem lazım
                      $dosyaminyolu2 = str_replace('../', '', $dosyaminyolu);
                      $kayıtekle = self::sorgum($vt, "insert into intro (resimyol) VALUES('$dosyaminyolu2')", 0);
                    endif;
                  endif;
                endif;
              else :
                      ?>
      <div class="col-lg-12 breadcrumbBack text-left text-muted p-1">
        <?php $this->SayfaNavi($vt, "introayar", "İntrolar", "İntro Ekle");
        ?>
      </div>
      <div class="col-lg-4 mx-auto mt-5">
        <div class="card card-bordered">
          <div class="card-body mt-4">
            <h5 class="title border-bottom">İNTRO RESİM YÜKLEME FORMU</h5>
            <form action="" method="post" enctype="multipart/form-data">
              <p class="card-text"><input type="file" name="dosya" /></p>
              <input type="submit" name="buton" value="YÜKLE" class="btn btn-primary mb-1" />
            </form>
            <p class="card-text text-left text-danger border-top">
              * izin verilen formatlar : jgp-png <br />
              * izin verilen max.boyut : 5 MB
            </p>
          </div>
        </div>
      </div>
    <?php

              endif;
              echo '</div></div></div>';
            }
            //intro resim ekleme bitti

            //intro resim silme
            function introsil($vt)
            {
              $introid = $_GET["id"];
              $verial = self::sorgum($vt, "select * from intro where id=$introid", 1);
              echo '<div class="row text-center">
                    <div class="col-lg-12">
                    ';
              //veritabanı ver silme
              self::sorgum($vt, "delete from intro where id=$introid", 0);
    ?><script>
      BilgiPenceresi("control.php?sayfa=introayar", "BAŞARILI", "Silme işlemi başarılı", "success");
    </script><?php
            }
            //İntro Resim Güncelle
            function introresimguncelleme($vt)
            {
              $gelenintroid = $_GET["id"];
              echo '<div class="row text-center">
                    <div class="col-lg-12">
                    ';
              if ($_POST) :
                $formdangelenid = $_POST["introid"];
                if ($_FILES["dosya"]["name"] == "") :
              ?><script>
          BilgiPenceresi("control.php?sayfa=introayar", "BAŞARISIZ", "Dosya Yüklenmedi. Boş Olamaz", "warning");
        </script><?php
                else : //boş değilse
                  if ($_FILES["dosya"]["size"] > (1024 * 1024 * 5)) :
                  ?><script>
            BilgiPenceresi("control.php?sayfa=introayar", "BAŞARISIZ", "Dosya Yüklenmedi. Dosya boyutu çok fazla.", "warning");
          </script><?php
                  else : //boyutta bir problem yok ise
                    $izinverilen = array("image/png", "image/jpeg");
                    if (!in_array($_FILES["dosya"]["type"], $izinverilen)) :
                    ?><script>
              BilgiPenceresi("control.php?sayfa=introayar", "BAŞARISIZ", "Dosya Yüklenmedi. İzin verilen uzantı değil.", "warning");
            </script><?php
                    else : //artık herşey tamam
                      //db den mevcut veriyi çektik ve dosyayı sildik.
                      $resimyolunabak = self::sorgum($vt, "select * from intro where id=$gelenintroid", 1);
                      $dbgelenyol = '../' . $resimyolunabak["resimyol"];
                      unlink($dbgelenyol);
                      //db den mevcut veriyi çektik ve dosyayı sildik.
                      $dosyaminyolu = '../img/carousel/' . $_FILES["dosya"]["name"];
                      move_uploaded_file($_FILES["dosya"]["tmp_name"], $dosyaminyolu);
                      $dosyaminyolu2 = str_replace('../', '', $dosyaminyolu);
                      self::sorgum($vt, "UPDATE intro SET resimyol='$dosyaminyolu2' where id=$gelenintroid", 0);
                      ?><script>
              BilgiPenceresi("control.php?sayfa=introayar", "BAŞARILI", "Dosya başarıyla güncellendi", "success");
            </script><?php
                    endif;
                  endif;
                endif;
              else :
                      ?>
      <div class="col-lg-12 breadcrumbBack text-left text-muted p-1">
        <?php $this->SayfaNavi($vt, "introayar", "İntrolar", "İntro Güncelle"); ?>
      </div>
      <div class="col-lg-4 mx-auto mt-5">
        <div class="card card-bordered">
          <div class="card-body">
            <h5 class="title border-bottom pb-1">RESİM GÜNCELLEME FORMU</h5>
            <form action="" method="post" enctype="multipart/form-data">
              <p class="card-text"><input type="file" name="dosya" /></p>
              <p class="card-text"><input type="hidden" name="introid" value="<?php echo $gelenintroid; ?>" /></p>
              <input type="submit" name="buton" value="YÜKLE" class="btn btn-primary mb-1" />
            </form>
            <p class="card-text text-left text-danger border-top">
              * izin verilen formatlar : jgp-png <br />
              * izin verilen max.boyut : 5 MB
            </p>
          </div>
        </div>
      </div>
    <?php
              endif;
              echo '</div></div></div>';
            }
      //--------------------İNTRO BİTTİ-----------------------

      //--------------------GALERİ BAŞLANGIÇ-----------------------
            function galeriayar($vt)
            { //Mevcut galeri getiriliyor.
              echo '<div class="row text-center">
    <div class="col-lg-12 breadcrumbBack">
    <h4 class="float-left mt-3 text-info mb-2">
    <a href="control.php?sayfa=galeriekle" class="ti-plus eklemebuton p-1  mr-2 mt-3"></a>
    Galeri Resimleri</h4> </div>';
              $introbilgiler = self::sorgum($vt, "select * from galerimiz", 2);
              while ($sonbilgi = $introbilgiler->fetch(PDO::FETCH_ASSOC)) :
                echo '<div class="col-lg-4">
      <div class="row card-bordered  p-1 m-1">
      <div class="col-lg-12">
      <img src="../' . $sonbilgi["resimyol"] . '">
      <kbd class="bg-white p-2" style="position:absolute; bottom:10px; right:10px;">
      <a href="control.php?sayfa=galeriguncelle&id=' . $sonbilgi["id"] . '" class="ti-reload m-2 text-success" style="font-size:20px;"></a>'; ?>
      <a onclick="silmedenSor('control.php?sayfa=galerisil&id=<?php echo $sonbilgi["id"]; ?>');return false" class="ti-trash m-2 text-danger" style="font-size:20px;"></a>
      <?php echo '
      </kbd>
      </div>
      </div>
      </div>';
              endwhile;
              echo '</div>';
            }
            //galeri yeni resim ekleme
            function galeriekleme($vt)
            {
              echo '<div class="row text-center">
  <div class="col-lg-12">
  ';
              if ($_POST) :
                if ($_FILES["dosya"]["name"] == "") :
      ?><script>
          BilgiPenceresi("control.php?sayfa=galeriekle", "BAŞARISIZ", "Dosya Yüklenmedi. Boş Olamaz.", "warning");
        </script><?php
                else : //boş değilse
                  if ($_FILES["dosya"]["size"] > (1024 * 1024 * 5)) :
                  ?><script>
            BilgiPenceresi("control.php?sayfa=galeriekle", "BAŞARISIZ", "Dosya boyutu çok fazla", "warning");
          </script><?php
                  else : //boyutta bir problem yok ise
                    $izinverilen = array("image/png", "image/jpeg");
                    if (!in_array($_FILES["dosya"]["type"], $izinverilen)) :
                    ?><script>
              BilgiPenceresi("control.php?sayfa=galeriekle", "BAŞARISIZ", "İzin verilen uzantı değil.<", "warning");
            </script><?php
                    else : //artık herşey tamam
                      $uzanti = explode(".", $_FILES["dosya"]["name"]);
                      $randdeger = md5(mt_rand(0, 9995454));
                      $yeniisim = $randdeger . "." . end($uzanti);
                      $dosyaminyolu = '../img/galeri/' . $yeniisim;
                      move_uploaded_file($_FILES["dosya"]["tmp_name"], $dosyaminyolu);
                      ?><script>
              BilgiPenceresi("control.php?sayfa=galeriayar", "BAŞARILI", "Dosya başarıyla yüklendi", "success");
            </script><?php
                      //dosya yüklendikten sonra veritabanınada bu kaydı eklemem lazım
                      $dosyaminyolu2 = str_replace('../', '', $dosyaminyolu);
                      self::sorgum($vt, "insert into galerimiz (resimyol) VALUES('$dosyaminyolu2')", 0);
                    endif;
                  endif;
                endif;
              else :
                      ?>
      <div class="col-lg-12 breadcrumbBack text-left text-muted p-1">
        <?php $this->SayfaNavi($vt, "galeriayar", "Galeri Resimleri", "Galeri Resim Ekle"); ?>
      </div>
      <div class="col-lg-4 mx-auto mt-5">
        <div class="card card-bordered">
          <div class="card-body">
            <h5 class="title border-bottom">GALERİ RESİM YÜKLEME FORMU</h5>
            <form action="" method="post" enctype="multipart/form-data">
              <p class="card-text"><input type="file" name="dosya" /></p>
              <input type="submit" name="buton" value="YÜKLE" class="btn btn-primary mb-1" />
            </form>
            <p class="card-text text-left text-danger border-top">
              * izin verilen formatlar : jgp-png <br />
              * izin verilen max.boyut : 5 MB
            </p>
          </div>
        </div>
      </div>
    <?php
              endif;
              echo '</div></div></div>';
            }
            //galeri resim silme
            function galerisil($vt)
            {
              $introid = $_GET["id"];
              $verial = self::sorgum($vt, "select * from galerimiz where id=$introid", 1);
              echo '<div class="row text-center">
              <div class="col-lg-12">
              ';
              //veritabanı ver silme
              self::sorgum($vt, "delete from galerimiz where id=$introid", 0);
    ?><script>
      BilgiPenceresi("control.php?sayfa=galeriayar", "BAŞARILI", "Silme işlemi başarılı", "success");
    </script><?php
            }
            //galeri Resim Güncelle
            function galeriguncelleme($vt)
            {
              $gelenintroid = $_GET["id"];
              echo '<div class="row text-center">
  <div class="col-lg-12">
  ';
              if ($_POST) :
                $formdangelenid = $_POST["introid"];
                if ($_FILES["dosya"]["name"] == "") :
              ?><script>
          BilgiPenceresi("control.php?sayfa=galeriayar", "BAŞARISIZ", "Dosya Yüklenmedi. Boş Olamaz.", "warning");
        </script><?php
                else : //boş değilse
                  if ($_FILES["dosya"]["size"] > (1024 * 1024 * 5)) :
                  ?><script>
            BilgiPenceresi("control.php?sayfa=galeriayar", "BAŞARISIZ", "Dosya boyutu çok fazla.", "warning");
          </script><?php
                  else : //boyutta bir problem yok ise
                    $izinverilen = array("image/png", "image/jpeg");
                    if (!in_array($_FILES["dosya"]["type"], $izinverilen)) :
                    ?><script>
              BilgiPenceresi("control.php?sayfa=galeriayar", "BAŞARISIZ", "İzin verilen uzantı değil.", "warning");
            </script><?php
                    else : //artık herşey tamam
                      //db den mevcut veriyi çektik ve dosyayı sildik.
                      $resimyolunabak = self::sorgum($vt, "select * from galerimiz where id=$gelenintroid", 1);
                      $dbgelenyol = '../' . $resimyolunabak["resimyol"];
                      unlink($dbgelenyol);
                      //db den mevcut veriyi çektik ve dosyayı sildik.
                      $dosyaminyolu = '../../img/galeri/' . $_FILES["dosya"]["name"];
                      move_uploaded_file($_FILES["dosya"]["tmp_name"], $dosyaminyolu);
                      $dosyaminyolu2 = str_replace('../', '', $dosyaminyolu);
                      self::sorgum($vt, "UPDATE galerimiz SET resimyol='$dosyaminyolu2' where id=$gelenintroid", 0);
                      ?><script>
              BilgiPenceresi("control.php?sayfa=galeriayar", "BAŞARILI", "Dosya başarıyla güncellendi.", "success");
            </script><?php
                    endif;
                  endif;
                endif;
              else :
                      ?>
      <div class="col-lg-12 breadcrumbBack text-left text-muted p-1">
        <?php $this->SayfaNavi($vt, "galeriayar", "Galeri Resimleri", "Galeri Resim Güncelle"); ?>
      </div>
      <div class="col-lg-4 mx-auto mt-5">
        <div class="card card-bordered">
          <div class="card-body">
            <h5 class="title border-bottom">GALERİ RESİM GÜNCELLEME FORMU</h5>
            <form action="" method="post" enctype="multipart/form-data">
              <p class="card-text"><input type="file" name="dosya" /></p>
              <p class="card-text"><input type="hidden" name="introid" value="<?php echo $gelenintroid; ?>" /></p>
              <input type="submit" name="buton" value="YÜKLE" class="btn btn-primary mb-1" />
            </form>
            <p class="card-text text-left text-danger border-top">
              * izin verilen formatlar : jgp-png <br />
              * izin verilen max.boyut : 5 MB
            </p>
          </div>
        </div>
      </div>
    <?php
              endif;
              echo '</div></div></div>';
            }
            //-------------------GALERİ BİTTİ-----------------------

            //--------------------VİDEOLAR BAŞLADI-----------------------
            function videolar($vt)
            { //Mevcut videolar getiriliyor.

              echo '<div class="row text-center">
    <div class="col-lg-12 breadcrumbBack">
    <h4 class="float-left mt-3 text-info mb-2">
    <a href="control.php?sayfa=videoekle" class="ti-plus eklemebuton p-1  mr-2 mt-3"></a>
    VİDEO YÖNETİMİ</h4>
    <h6 class="float-right mt-3 text-muted mb-2">
    <a href="control.php?sayfa=videolar&tercih=1" class="ti-check bg-success p-1 text-white mr-2 mt-3"></a>
    <a href="control.php?sayfa=videolar&tercih=0" class="ti-close bg-danger p-1 text-white mr-2 mt-3"></a>
    </h6>
    </div>';
              if (@$_GET["tercih"] != "") :
                $introbilgiler = self::sorgum($vt, "select * from videolar where durum=" . $_GET["tercih"], 2);
              else :
                $introbilgiler = self::sorgum($vt, "select * from videolar", 2);
              endif;
              while ($sonbilgi = $introbilgiler->fetch(PDO::FETCH_ASSOC)) :
                echo '<div class="col-lg-4 col-md-4 p-1"> 
      <div class="row card-bordered  p-1 m-1">
      <div class="col-lg-12">
      <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/' . $sonbilgi["link"] . '" allowfullscreen></iframe>
      </div>
      <kbd class="bg-white text-dark p-2" style="position:absolute; bottom:30px; right:10px;">
      SIRA:' . $sonbilgi["siralama"] . ' Durum:' . $sonbilgi["durum"] . '
        <a href="control.php?sayfa=videoguncelle&id=' . $sonbilgi["id"] . '" class="ti-reload m-2 text-success" style="font-size:20px;"></a>'; ?>
      <a onclick="silmedenSor('control.php?sayfa=videosil&id=<?php echo $sonbilgi["id"]; ?>');return false" class="ti-trash m-2 text-danger" style="font-size:20px;"></a>
      <?php echo '
      </kbd>
      </div>
      </div>
  </div>';
              endwhile;
              echo '</div>';
            }
            //VİDEO EKLEME
            function videoekleme($vt)
            {
              echo '<div class="row text-center">
  <div class="col-lg-12 mt-4">';
              if ($_POST) :
                $videoyol = htmlspecialchars(strip_tags($_POST["videoyol"]));
                $siralama = htmlspecialchars(strip_tags($_POST["siralama"]));
                $durum = htmlspecialchars(strip_tags($_POST["durum"]));
                if (empty($videoyol) || empty($siralama)) :
      ?><script>
          BilgiPenceresi("control.php?sayfa=videolar", "BAŞARISIZ", "Alanlar boş olamaz.", "warning");
        </script><?php
                else :
                  self::sorgum($vt, "insert into videolar (link,siralama,durum) VALUES('$videoyol','$siralama','$durum')", 0);
                  ?><script>
          BilgiPenceresi("control.php?sayfa=videolar", "BAŞARILI", "Video başarıyla yüklendi.", "success");
        </script><?php
                endif;
              else :
                  ?>
      <div class="col-lg-12 breadcrumbBack text-left text-muted p-1">
        <?php $this->SayfaNavi($vt, "videolar", "Videolar", "Video Ekle"); ?>
      </div>
      <div class="col-lg-4 mx-auto mt-5">
        <div class="card card-bordered ">
          <div class="card-body">
            <h5 class="title border-bottom">VİDEO EKLEME FORMU</h5>
            <form action="" method="post">
              <p class="card-text"><input type="text" name="videoyol" class="form-control" placeholder="Video yolu" required="required" /></p>
              <p class="card-text"><input type="text" name="siralama" class="form-control" placeholder="Video sırası" required="required" /></p>
              <p class="card-text">
                <select name="durum" class="form-control">
                  <option value="1">Aktif</option>
                  <option value="0">Pasif</option>
                </select>
              </p>
              <input type="submit" name="buton" value="EKLE" class="btn btn-primary mb-1" />
            </form>
          </div>
        </div>
      </div>
    <?php
              endif;
              echo '</div></div></div>';
            }
            //video silme
            function videosil($vt)
            {
              $introid = $_GET["id"];
              echo '<div class="row text-center">
 <div class="col-lg-12">
 ';
              //veritabanı ver silme
              self::sorgum($vt, "delete from videolar where id=$introid", 0);
    ?><script>
      BilgiPenceresi("control.php?sayfa=videolar", "BAŞARILI", "Video başarıyla silindi.", "success");
    </script><?php
            }
            //video Güncelle
            function videguncelleme($vt)
            {
              $gelenintroid = $_GET["id"];
              $introbilgiler = self::sorgum($vt, "select * from videolar where id=$gelenintroid", 2);
              $sonbilgi = $introbilgiler->fetch(PDO::FETCH_ASSOC);
              $tumvideolar = self::sorgum($vt, "select * from videolar", 2);
              echo '<div class="row text-center">
  <div class="col-lg-12 mt-4">';
              if ($_POST) :
                $videoyol = htmlspecialchars(strip_tags($_POST["videoyol"]));
                $siralama = htmlspecialchars(strip_tags($_POST["siralama"]));
                $mevcutsira = htmlspecialchars(strip_tags($_POST["mevcutsira"]));
                $durum = htmlspecialchars(strip_tags($_POST["durum"]));
                if (empty($videoyol) || empty($siralama)) :
              ?><script>
          BilgiPenceresi("control.php?sayfa=videolar", "BAŞARISIZ", "Alanlar boş olamaz.", "warning");
        </script><?php
                else :
                  self::sorgum($vt, "update videolar set siralama=$mevcutsira where siralama=$siralama", 0);
                  self::sorgum($vt, "update videolar set link='$videoyol',siralama=$siralama,durum=$durum where id=$gelenintroid", 0);
                  ?><script>
          BilgiPenceresi("control.php?sayfa=videolar", "BAŞARILI", "Video başarıyla güncellendi..", "success");
        </script><?php
                endif;
              else :
                  ?>
      <div class="col-lg-12 breadcrumbBack text-left text-muted p-1">
        <?php $this->SayfaNavi($vt, "videolar", "Videolar", "Video Güncelle"); ?>
      </div>
      <div class="col-lg-4 mx-auto mt-5">
        <div class="card card-bordered ">
          <div class="card-body">
            <h5 class="title border-bottom">VİDEO GÜNCELLEME FORMU</h5>
            <form action="" method="post">
              <p class="card-text text-warning">Video Linki<input type="text" name="videoyol" class="form-control" value="<?php echo  $sonbilgi["link"]; ?>" /></p>
              <p class="card-text text-warning">Video Sırası : <?php echo $sonbilgi["siralama"]; ?>
                <select name="siralama" class="form-control p-2">
                  <?php
                  while ($tumvideolarSon = $tumvideolar->fetch(PDO::FETCH_ASSOC)) :
                    if ($tumvideolarSon["siralama"] != $sonbilgi["siralama"]) :
                      echo '<option value="' . $tumvideolarSon["siralama"] . '">' . $tumvideolarSon["siralama"] . '</option>';
                    endif;
                  endwhile;
                  ?>
                </select>
              </p>
              <p class="card-text text-warning">Video Durumu
                <select name="durum" class="form-control p-2">
                  <?php
                  if ($sonbilgi["durum"] == 0) :
                    echo '<option value="1">Aktif</option>
           <option value="0" selected="selected">Pasif</option>';
                  else :
                    echo '<option value="1" selected="selected">Aktif</option>
            <option value="0">Pasif</option>';
                  endif;
                  ?>
                </select>
              </p>
              <input type="hidden" name="mevcutsira" value="<?php echo $sonbilgi["siralama"]; ?>" />
              <input type="submit" name="buton" value="GÜNCELLE" class="btn btn-primary mb-1" />
            </form>
          </div>
        </div>
      </div>
    <?php
              endif;

              echo '</div></div></div>';
            }

            //--------------------VİDEOLAR BİTTİ-----------------------

             //--------------------HAKKIMIZDA BAŞLANGIÇ-----------------------
            function hakkimizda($vt)
            {
              echo '<div class="row text-center">
    <div class="col-lg-12 border-bottom breadcrumbBack">
    <h4 class="float-left mt-3 text-info">Hakkımızda</h4>
    </div>';
              if (!$_POST) :
                $sonbilgi = self::sorgum($vt, "select * from hakkimizda", 1);
                echo '<div class="col-lg-6 mx-auto">
      <div class="row border border-light p-1 m-1">
      <div class="col-lg-3 border-bottom bg-light" id="hakkimizdayazilar">
      Resim
      </div>
      <div class="col-lg-9 border-bottom">
        <img src="../../' . $sonbilgi["resim"] . '"><br>
      <form action="" method="post" enctype="multipart/form-data">
      <input type="file" name="dosya">
      </div>

      <div class="col-lg-3 border-bottom bg-light pt-3" id="hakkimizdayazilarn">
      <span class="text-danger"> TR</span> - Başlık
      </div>
      <div class="col-lg-9 border-bottom">
      <input type="text" name="baslik_tr" class="form-control m-2" value="' . $sonbilgi["baslik_tr"] . '">
      </div>
      <div class="col-lg-3 border-bottom bg-light pt-3" id="hakkimizdayazilarn">
      <span class="text-info"> EN</span> - Başlık
      </div>
      <div class="col-lg-9 border-bottom">
      <input type="text" name="baslik_en" class="form-control m-2" value="' . $sonbilgi["baslik_en"] . '">
      </div>
      <div class="col-lg-3 bg-light" id="hakkimizdayazilar">
      <span class="text-danger"> TR</span> - İçerik
      </div>
      <div class="col-lg-9">
      <textarea name="icerik_tr" class="form-control" rows="8" id="editor1">' . $sonbilgi["icerik_tr"] . '</textarea>'; ?>
      <script>
        ClassicEditor
          .create(document.querySelector('#editor1'))
          .catch(error => {
            console.error(error);
          });
      </script>
      <?php
                echo '</div>
      <div class="col-lg-3 bg-light" id="hakkimizdayazilar">
     <span class="text-info"> EN</span> - İçerik
      </div>
      <div class="col-lg-9 mt-5">
      <textarea name="icerik_en" class="form-control" rows="8" id="editor2">' . $sonbilgi["icerik_en"] . '</textarea>
      '; ?>
      <script>
        ClassicEditor
          .create(document.querySelector('#editor2'))
          .catch(error => {
            console.error(error);
          });
      </script>
      <?php
                echo '
      </div>
      <div class="col-lg-12 border-top">
      <input type="submit" name="guncel" value="GÜNCELLE" class="btn btn-primary m-2">
      </form>
      </div>
      </div>';
              else :
                $baslik_tr = htmlspecialchars($_POST["baslik_tr"]);
                $icerik_tr = $_POST["icerik_tr"];
                $baslik_en = htmlspecialchars($_POST["baslik_en"]);
                $icerik_en = $_POST["icerik_en"];
                if (@$_FILES["dosya"]["name"] !== "") :
                  if ($_FILES["dosya"]["size"] < (1024 * 1024 * 5)) :
                    $izinverilen = array("image/png", "image/jpeg");
                    if (in_array($_FILES["dosya"]["type"], $izinverilen)) :
                      $dosyaminyolu = '../img/' . $_FILES["dosya"]["name"];
                      move_uploaded_file($_FILES["dosya"]["tmp_name"], $dosyaminyolu);
                      $veritabaniicin = str_replace('../', '', $dosyaminyolu);
                    endif;
                  endif;
                endif;
                if (@$_FILES["dosya"]["name"] !== "") :
                  self::sorgum($vt, "update hakkimizda set 
        baslik_tr='$baslik_tr',
        baslik_en='$baslik_en',
        icerik_tr='$icerik_tr',
        icerik_en='$icerik_en,resim='$veritabaniicin'", 0);
      ?><script>
          BilgiPenceresi("control.php?sayfa=hakkimiz", "BAŞARILI", "Güncelleme başarılı", "success");
        </script><?php
                else :
                  ?><script>
          BilgiPenceresi("control.php?sayfa=hakkimiz", "BAŞARILI", "Güncelleme başarılı", "success");
        </script><?php
                  self::sorgum($vt, "update hakkimizda set  
        baslik_tr='$baslik_tr',
        baslik_en='$baslik_en',
        icerik_tr='$icerik_tr',
        icerik_en='$icerik_en'", 0);
                endif;
                echo '</div>';
              endif; //en ana if
            }
            //--------------------HAKKIMIZDA BİTTİ-----------------------  



            //--------------HİZMETLER BAŞLANGIÇ-----
            function hizmetlerhepsi($vt)
            {
              echo '<div class="row text-center">
    <div class="col-lg-12 breadcrumbBack">
    <h4 class="float-left mt-3 text-info mb-2">
    <a href="control.php?sayfa=hizmetekle" class="ti-plus eklemebuton p-1  mr-2 mt-3 "></a>
    Hizmetler Ayarları</h4> </div>';
              //$introbilgiler=$vt->prepare("select * from galeri");
              $introbilgiler = self::sorgum($vt, "select * from hizmetler", 2);
              while ($sonbilgi = $introbilgiler->fetch(PDO::FETCH_ASSOC)) :
                echo '<div class="col-lg-6">
    <div class="row card-bordered p-1 m-1 bg-light">
    <div class="col-lg-9 pt-1 pb-1">
    <h5>' . $sonbilgi["baslik_tr"] . ' - ' . $sonbilgi["baslik_en"] . '</h5>
    </div>
    <div class="col-lg-2 text-right">
    <a href="control.php?sayfa=hizmetguncelle&id=' . $sonbilgi["id"] . '" class="ti-reload  text-success" style="font-size:20px;"></a>
   '; ?>

      <a onclick="silmedenSor('control.php?sayfa=hizmetsil&id=<?php echo $sonbilgi["id"]; ?>');return false" class="ti-trash m-2 text-danger" style="font-size:20px;"></a>

    <?php echo '
    </div>
    <div class="col-lg-12 border-top text-secondary">
    ' . $sonbilgi["icerik_tr"] . ' 
    </div>
    <div class="col-lg-12 border-top text-secondary">
    ' . $sonbilgi["icerik_en"] . ' 
    </div>
    </div>
    </div>';
              endwhile;
              echo '</div>';
            } //vt resimleri geldi

            //HİZMET EKLEME
            function hizmetekleme($vt)
            {
    ?>

    <div class="col-lg-12 breadcrumbBack text-left text-muted p-1">
      <?php $this->SayfaNavi($vt, "hizmetler", "Hizmetler", "Hizmet Ekle"); ?>
    </div>
    <?php
              echo '<div class="row text-center">
  <div class="col-lg-12 border-bottom">
  <h3 class=" mt-3 text-info">HİZMET EKLE<h3>
  </div>';
              if (!$_POST) :
                echo '<div class="col-lg-6 mx-auto mt-3">
  <div class="row card-bordered p-1 m-1 bg-light">
  <div class="col-lg-2 pt-3">
  <span class="text-danger">TR</span>-Başlık
  </div>
  <div class="col-lg-9 p-2">
      <form action="" method="post">
      <input type="text" name="baslik_tr" class="form-control" />
  </div>

  <div class="col-lg-2 pt-3">
  <span class="text-info">EN</span>-Başlık
  </div>
  <div class="col-lg-9 p-2">
      <form action="" method="post">
      <input type="text" name="baslik_en" class="form-control" />
  </div>

  <div class="col-lg-2 pt-3">
  <span class="text-danger">TR</span>-İçerik
  </div>
  <div class="col-lg-9 p-2">
      <form action="" method="post">
      <input type="text" name="icerik_tr" class="form-control" id="editor3" />
      '; ?>

      <script>
        ClassicEditor
          .create(document.querySelector('#editor3'))
          .catch(error => {
            console.error(error);
          });
      </script>
      <?php
                echo '
  </div>

  <div class="col-lg-2 pt-3">
  <span class="text-info">EN</span>-İçerik
  </div>
  <div class="col-lg-9 p-2">
      <form action="" method="post">
      <input type="text" name="icerik_en" class="form-control" id="editor4" />
      '; ?>
      <script>
        ClassicEditor
          .create(document.querySelector('#editor4'))
          .catch(error => {
            console.error(error);
          });
      </script>
      <?php
                echo '
  </div>

  <div class="col-lg-12 border-top p-2">
  <input type="submit" name="buton" value="Hizmet Ekle" class="btn btn-primary"/>
  </form>
  </div>
  </div>
  </div>';
              else :
                $baslik_tr = htmlspecialchars($_POST["baslik_tr"]);
                $baslik_en = htmlspecialchars($_POST["baslik_en"]);
                $icerik_tr = $_POST["icerik_tr"];
                $icerik_en = $_POST["icerik_en"];

                if ($baslik_tr == "" && $baslik_en == "" && $icerik_tr == "" && $icerik_en == "") :
                  echo '<div class="col-lg-6 mx-auto">
          <div class="alert alert-danger mt-5">
          Veriler boş olamaz.</div></div>';
                  header("refresh:2,url=control.php?sayfa=hizmetler");
                else :
                  self::sorgum($vt, "insert into hizmetler (baslik_tr,baslik_en,icerik_tr,icerik_en) values('$baslik_tr','$baslik_en','$icerik_tr','$icerik_en')", 0);
      ?><script>
          BilgiPenceresi("control.php?sayfa=hizmetler", "BAŞARILI", "Hizmet başarıyla eklendi.", "success");
        </script><?php
                endif;
              endif;
              echo '</div>';
            } //HİZMET ekleme bitti
            function hizmetguncelleme($vt)
            {
                  ?>
    <div class="col-lg-12 breadcrumbBack text-left text-muted p-1">
      <?php $this->SayfaNavi($vt, "hizmetler", "Hizmetler", "Hizmet Güncelle"); ?>
    </div>
    <?php
              echo '<div class="row text-center">
    <div class="col-lg-12 border-bottom">
    <h3 class=" mt-3 text-info">HİZMET GÜNCELLE<h3>
    </div>';
              /* gelen id alınacak
    id ile veritabanından bilgiler alınacak
    inputlara o veriler yazılacak
    hidden ile id postiçin tasınacak
    $introbilgiler=$vt->prepare("select * from hizmetler");
    */
              $kayitid = $_GET["id"];
              $kayitbilgial = self::sorgum($vt, "select * from hizmetler where id=$kayitid", 1);
              if (!$_POST) :

                echo '<div class="col-lg-7 mx-auto">
    <div class="row card-bordered p-1 m-1 bg-light mt-2">

    <div class="col-lg-2 pt-3">
    <span class="text-danger">TR</span>Başlık
    </div>
    <div class="col-lg-9 p-2">
    <form action="" method="post">
    <input type="text" name="baslik_tr" class="form-control" value="' . $kayitbilgial["baslik_tr"] . '"/>
    </div>

    <div class="col-lg-2 pt-3">
    <span class="text-info">EN</span>Başlık
    </div>
    <div class="col-lg-9 p-2">
    <input type="text" name="baslik_en" class="form-control" value="' . $kayitbilgial["baslik_en"] . '"/>
    </div>


    <div class="col-lg-12 border-top p-2 ">
    <span class="text-danger">TR</span>İçerik
    </div>
    <div class="col-lg-12 border-top p-2">
    <textarea name="icerik_tr" rows="5" class="form-control" id="editor5">' . $kayitbilgial["icerik_tr"] . '</textarea>
    '; ?>

      <script>
        ClassicEditor
          .create(document.querySelector('#editor5'))
          .catch(error => {
            console.error(error);
          });
      </script>
      <?php
                echo '
    </div>
    <div class="col-lg-12 border-top p-2 ">
    <span class="text-info">EN</span>İçerik
    </div>
    <div class="col-lg-12 border-top p-2">
    <textarea name="icerik_en" rows="5" class="form-control" id="editor6">' . $kayitbilgial["icerik_en"] . '</textarea>
    '; ?>
      <script>
        ClassicEditor
          .create(document.querySelector('#editor6'))
          .catch(error => {
            console.error(error);
          });
      </script>
      <?php
                echo '
    </div>
    <div class="col-lg-12 border-top p-2">
    <input type="hidden" name="kayitidsi" value="' . $kayitid . '" />
    <input type="submit" name="buton" value="Hizmet Güncelle" class="btn btn-primary"/>
    </form>
    </div>
    </div>
    </div>';
              else :
                $baslik_tr = htmlspecialchars($_POST["baslik_tr"]);
                $icerik_tr = $_POST["icerik_tr"];
                $baslik_en = htmlspecialchars($_POST["baslik_en"]);
                $icerik_en = $_POST["icerik_en"];
                $kayitidsi = htmlspecialchars($_POST["kayitidsi"]);
                if ($baslik_tr == "" && $icerik_tr == "" && $icerik_en == "" && $baslik_en == "") :
                  echo '<div class="col-lg-6 mx-auto">
            <div class="alert alert-danger mt-5">
            Veriler boş olamaz.</div></div>';
                  header("refresh:2,url=control.php?sayfa=hizmetler");
                else :
                  self::sorgum($vt, "update hizmetler set baslik_tr='$baslik_tr',baslik_en='$baslik_en',icerik_tr='$icerik_tr',icerik_en='$icerik_en' where id=$kayitidsi", 0);
      ?><script>
          BilgiPenceresi("control.php?sayfa=hizmetler", "BAŞARILI", "Hizmet başarıyla güncellendi.", "success");
        </script><?php
                endif;
              endif;
              echo '</div>';
            } //hizmet guncelleme bitti
            function hizmetsil($vt)
            {
              $kayitid = $_GET["id"];
              echo '<div class="row text-center">
<div class="col-lg-12">';
      //vtden sileme
      self::sorgum($vt, "delete  from hizmetler where id=$kayitid", 0);
      ?><script>
      BilgiPenceresi("control.php?sayfa=hizmetler", "BAŞARILI", "Hizmet başarıyla silindi.", "success");
    </script><?php

            } //hizmet sil
            //--------------HİZMETLER BİTİŞ-----

            //--------------REFERANSLAR BAŞLANGIÇ-----
            function referanslarhepsi($vt)
            {
              echo '<div class="row text-center">
  <div class="col-lg-12 breadcrumbBack">
  <h4 class="float-left mt-3 text-info mb-2">
  <a href="control.php?sayfa=refekle" class="ti-plus eklemebuton p-1  mr-2 mt-3"></a>
 Referans Ayarları</h4> </div>';
              //$introbilgiler=$vt->prepare("select * from referanslar");
              $introbilgiler = self::sorgum($vt, "select * from referanslar", 2);
              while ($sonbilgi = $introbilgiler->fetch(PDO::FETCH_ASSOC)) :
                echo '<div class="col-lg-2">
  <div class="row card-bordered  p-1 m-1">
  <div class="col-lg-12">
  <img src="../' . $sonbilgi["resimyol"] . '">
  </div>
  '; ?>

      <a onclick="silmedenSor('control.php?sayfa=refsil&id=<?php echo $sonbilgi["id"]; ?>');return false" class="ti-trash m-2 text-danger" style="font-size:20px;"></a>
    <?php echo '
  </div>
  </div>';
              endwhile;
              echo '</div>';
            } //vt resimleri geldi
            function refekleme($vt)
            {
    ?>
    <div class="col-lg-12 breadcrumbBack text-left text-muted p-1">
      <?php $this->SayfaNavi($vt, "ref", "Referanslar", "Referans Ekle"); ?>
    </div>
    <?php
              echo '<div class="row text-center">
  <div class="col-lg-12">';
              if ($_POST) :

                //dosya bos mu dolumu
                //boyut uygunmu
                //uzanttı 
                //son
                if ($_FILES["dosya"]["name"] == "") :
    ?><script>
          BilgiPenceresi("control.php?sayfa=ref", "BAŞARISIZ", "Dosya yüklenmedi. Alan boş olamaz.", "warning");
        </script><?php
                else : //bos degilese
                  if ($_FILES["dosya"]["size"] > (1024 * 1024 * 5)) :

                  ?><script>
            BilgiPenceresi("control.php?sayfa=ref", "BAŞARISIZ", "Dosya yüklenmedi. Dosya boyutu çok fazla!", "warning");
          </script><?php
                  else : //boyut uygunsa
                    $izinverilen = array("image/png", "image/jpeg");
                    if (!in_array($_FILES["dosya"]["type"], $izinverilen)) :
                    ?><script>
              BilgiPenceresi("control.php?sayfa=ref", "BAŞARISIZ", "Dosya yüklenmedi. İzin verilen uzantı değil!", "warning");
            </script><?php
                    else : //artık her şey tamam
                      $dosyaminyolu = '../img/referans/' . $_FILES["dosya"]["name"];
                      move_uploaded_file($_FILES["dosya"]["tmp_name"], '../img/referans/'
                        . $_FILES["dosya"]["name"]);
                      ?><script>
              BilgiPenceresi("control.php?sayfa=ref", "BAŞARILI", "Dosya başarıyla yüklendi", "success");
            </script><?php
                      //veritabanına ekleme-----------
                      $dosyaminyolu2 = str_replace('../', '', $dosyaminyolu);
                      $kayıtekle = self::sorgum($vt, "insert into referanslar (resimyol) VALUES('$dosyaminyolu2')", 0);
                    endif;
                  endif;
                endif;
              else :
                      ?>
      <div class="col-lg-4 mx-auto mt-5">
        <div class="card card-bordered">
          <div class="card-body mt-3">
            <h5 class="title border-bottom">REFERANS RESİM YÜKLEME FORMU</h5>
            <form action="" method="post" enctype="multipart/form-data">
              <p class="card-text">
                <input type="file" name="dosya" />
              </p>
              <input type="submit" name="buton" value="YÜKLE" class="btn btn-primary mb-1" />
            </form>
            <p class="card-text text-left text-danger border-top">
              * İzin verilen formatlar : jpeg, png<br />
              * izn verilen max. boyut : 5Mb
            </p>
          </div>
        </div>
      </div>
    <?php
              endif;
              echo '</div></div>';
            }
            function refsil($vt)
            {
              $introid = $_GET["id"];
              $verial = self::sorgum($vt, "select * from referanslar where id=$introid", 1);
              echo '<div class="row text-center">
  <div class="col-lg-12">';
              //dosyayıdasil
              unlink("../" . $verial["resimyol"]);
              //vtden sileme

              self::sorgum($vt, "delete  from referanslar where id=$introid", 0);
    ?><script>
      BilgiPenceresi("control.php?sayfa=ref", "BAŞARILI", "Dosya başarıyla silindi", "success");
    </script><?php
            }
            //--------------REFERANSLAR BİTİŞ-----


            //--------------MÜŞTERİ YORUMLARI BAŞLANGIÇ------
            function yorumlarhepsi($vt)
            {
              echo '<div class="row text-center">
  <div class="col-lg-12 breadcrumbBack">
  <h4 class="float-left mt-3 text-info mb-2">
  <a href="control.php?sayfa=yorumlarekle" class="ti-plus eklemebuton p-1  mr-2 mt-3"></a>
  Müşteri Yorumları</h4> </div>';
              //$introbilgiler=$vt->prepare("select * from galeri");
              $introbilgiler = self::sorgum($vt, "select * from yorumlar", 2);
              while ($sonbilgi = $introbilgiler->fetch(PDO::FETCH_ASSOC)) :
                echo '<div class="col-lg-4">
  <div class="row card-bordered p-1 m-1 bg-light" style="border-radius:10px;">
  <div class="col-lg-9 pt-1 text-left">
  <h5>İsim:' . $sonbilgi["isim"] . '</h5>
  </div>
  <div class="col-lg-3 text-right p-2">
  <a href="control.php?sayfa=yorumlarguncelle&id=' . $sonbilgi["id"] . '" class="ti-reload  text-success" style="font-size:20px;"></a>'; ?>
      <a onclick="silmedenSor('control.php?sayfa=yorumlarsil&id=<?php echo $sonbilgi["id"]; ?>');return false" class="ti-trash m-2 text-danger" style="font-size:20px;"></a>
    <?php echo '
  </div>
  <div class="col-lg-12 border-top text-secondary">
  ' . $sonbilgi["icerik"] . '
  </div>

  </div>
  </div>';
              endwhile;
              echo '</div>';
            } //yorumlar geldi
            function yorumlarekleme($vt)
            {
    ?>
    <div class="col-lg-12 breadcrumbBack text-left text-muted p-1">
      <?php $this->SayfaNavi($vt, "yorumlar", "Yorumlar", "Yorum Ekle"); ?>
    </div>
    <?php
              echo '<div class="row text-center">
  <div class="col-lg-12 border-bottom">
  <h3 class=" mt-3 text-info">YORUM EKLE<h3>
  </div>';
              if (!$_POST) :

                echo '<div class="col-lg-6 mx-auto">
  <div class="row card-bordered p-1 m-1 bg-light mt-4">
  <div class="col-lg-2 pt-3">
  İsim
  </div>
  <div class="col-lg-9 p-2">
  <form action="" method="post">
  <input type="text" name="isim" class="form-control"/>
  </div>
  <div class="col-lg-12 border-top p-2 ">
  Mesaj
  </div>
  <div class="col-lg-12 border-top p-2">
  <textarea name="mesaj" rows="5" class="form-control" id="editor7"></textarea>
  '; ?>

      <script>
        ClassicEditor
          .create(document.querySelector('#editor7'))
          .catch(error => {
            console.error(error);
          });
      </script>
      <?php
                echo '
  </div>
  <div class="col-lg-12 border-top p-2">
  <input type="submit" name="buton" value="Yorum Ekle" class="btn btn-primary"/>
  </form>
  </div>
  </div>
  </div>';
              else :
                $isim = htmlspecialchars($_POST["isim"]);
                $mesaj = $_POST["mesaj"];
                if ($isim == "" && $mesaj == "") :
                  echo '<div class="col-lg-6 mx-auto">
          <div class="alert alert-danger mt-5">
          Veriler boş olamaz.</div></div>';
                  header("refresh:2,url=control.php?sayfa=yorumlar");
                else :
                  self::sorgum($vt, "insert into yorumlar (icerik,isim) values('$mesaj','$isim')", 0);
      ?><script>
          BilgiPenceresi("control.php?sayfa=yorumlar", "BAŞARILI", "Yorum başarıyla eklendi.", "success");
        </script><?php
                endif;
              endif;
              echo '</div>';
            } //yorum ekleme bitti
            function yorumlarguncelleme($vt)
            {
                  ?>
    <div class="col-lg-12 breadcrumbBack text-left text-muted p-1">
      <?php $this->SayfaNavi($vt, "yorumlar", "Yorumlar", "Yorum Güncelle"); ?>
    </div>
    <?php
              echo '<div class="row text-center">
  <div class="col-lg-12 border-bottom">
  <h3 class=" mt-3 text-info">YORUM GÜNCELLE<h3>
  </div>';
              $kayitid = $_GET["id"];
              $kayitbilgial = self::sorgum($vt, "select * from yorumlar where id=$kayitid", 1);
              if (!$_POST) :

                echo '<div class="col-lg-6 mx-auto">
  <div class="row card-bordered p-1 m-1 bg-light mt-4">
  <div class="col-lg-2 pt-3">
  İsim
  </div>
  <div class="col-lg-9 p-2">
  <form action="" method="post">
  <input type="text" name="isim" class="form-control" value="' . $kayitbilgial["isim"] . '"/>
  </div>
  <div class="col-lg-12 border-top p-2 ">
  Mesaj
  </div>
  <div class="col-lg-12 border-top p-2">
  <textarea name="mesaj" rows="5" class="form-control" id="editor8">' . $kayitbilgial["icerik"] . '</textarea>
  '; ?>
      <script>
        ClassicEditor
          .create(document.querySelector('#editor8'))
          .catch(error => {
            console.error(error);
          });
      </script>
      <?php

                echo '
  </div>
  <div class="col-lg-12 border-top p-2">
  <input type="hidden" name="kayitidsi" value="' . $kayitid . '" />
  <input type="submit" name="buton" value="Yorum Güncelle" class="btn btn-primary"/>
  </form>
  </div>
  </div>
  </div>';
              else :
                 $isim = self::veriTemizle($_POST["isim"]);
                 
                $mesaj = $_POST["mesaj"];
                $kayitidsi = htmlspecialchars($_POST["kayitidsi"]);
                if ($isim == "" && $mesaj == "") :

      ?><script>
          BilgiPenceresi("control.php?sayfa=yorumlar", "BAŞARISIZ", "Veriler boş olamaz.", "warning");
        </script><?php

                else :
                  self::sorgum($vt, "update yorumlar set icerik='$mesaj',isim='$isim' where id=$kayitidsi", 0);

                  ?><script>
          BilgiPenceresi("control.php?sayfa=yorumlar", "BAŞARILI", "Yorum başarıyla güncellendi.", "success");
        </script><?php

                endif;
              endif;
              echo '</div>';
            } //yorum guncelleme bitti
            function yorumlarsil($vt)
            {
              $kayitid = $_GET["id"];
              echo '<div class="row text-center">
<div class="col-lg-12">';
              //vtden sileme
              self::sorgum($vt, "delete  from yorumlar where id=$kayitid", 0);
                  ?><script>
                 BilgiPenceresi("control.php?sayfa=yorumlar", "BAŞARILI", "Yorum başarıyla silindi.", "success");
                </script><?php
            }
            //--------------MÜŞTERİ YORUMLARI BİTİŞ------




            //--------------DUYURU VE HABER BARI BAŞLADI-------
            function haberler($vt)
            {

              echo '<div class="row text-center">
<div class="col-lg-12 breadcrumbBack border-bottom"><h4 class="float-left mt-3 text-info mb-2">
<a href="control.php?sayfa=haberekle" class="ti-plus eklemebuton p-1  mr-2 mt-3"></a>
HABER VE DUYURULAR</h4>
</div>';
              $introbilgiler = self::sorgum($vt, "select * from haberler", 2);
              while ($sonbilgi = $introbilgiler->fetch(PDO::FETCH_ASSOC)) :
                echo '<div class="col-lg-6 mt-3">
    <div class="row card-bordered p-1 m-1 bg-light">
      <div class="col-lg-10 pt-1 pb-1 text-left text-danger">
        <b class="text-dark"> TARİH : </b>  ' . $sonbilgi["tarih"] . '					
      </div>
      <div class="col-lg-2 text-right p-2">
      <a href="control.php?sayfa=haberguncelle&id=' . $sonbilgi["id"] . '" class="ti-reload text-success" style="font-size:20px;"></a>
        '; ?>

      <a onclick="silmedenSor('control.php?sayfa=habersil&id=<?php echo $sonbilgi["id"]; ?>');return false" class="ti-trash m-2 text-danger" style="font-size:20px;"></a>
    <?php echo '
      </div>
      <div class="col-lg-12 border-top text-secondary text-left bg-white"><b class="text-dark">TR :</b> 
      ' . $sonbilgi["icerik_tr"] . '
      </div>
      <div class="col-lg-12 border-top text-secondary text-left bg-white"><b class="text-dark">EN :</b> 
      ' . $sonbilgi["icerik_en"] . '
      </div>
  </div>		
</div>';

              endwhile;
              echo '</div>';
            } // haber geliyor
    function haberekleme($vt)
            {
    ?>
    <div class="col-lg-12 breadcrumbBack text-left text-muted p-1">
      <?php $this->SayfaNavi($vt, "haberler", "Haber & Duyuru", "Haber & Duyuru Ekle"); ?>
    </div>
    <?php
              echo '<div class="row text-center">
<div class="col-lg-12 border-bottom"><h3 class="mt-3 text-info">HABER EKLE</h3>
</div>';
              if (!$_POST) :

                echo '<div class="col-lg-6 mx-auto">
    <div class="row card-bordered p-1 m-1 bg-light mt-3">
      <div class="col-lg-12 border-top p-2">
      <form action="" method="post">
     <span class="text-danger">TR</span> - İçerik
      </div>
      <div class="col-lg-12 border-top p-2">
      <textarea name="icerik_tr" rows="5" class="form-control" id="editor9"></textarea>
      '; ?>
      <script>
        ClassicEditor
          .create(document.querySelector('#editor9'))
          .catch(error => {
            console.error(error);
          });
      </script>
      <?php
                echo '
      </div>
      <div class="col-lg-12 border-top p-2">
      <span class="text-info">EN</span>- İçerik
      </div>
      <div class="col-lg-12 border-top p-2">
      <textarea name="icerik_en" rows="5" class="form-control" id="editor10"></textarea>
      '; ?>
      <script>
        ClassicEditor
          .create(document.querySelector('#editor10'))
          .catch(error => {
            console.error(error);
          });
      </script>
      <?php
                echo '
      </div>
      <div class="col-lg-12 border-top p-2">
      <input type="submit" name="buton" value="HABER EKLE" class="btn btn-primary">
      </form>
      </div>
  </div>		    
</div>';
              else :
                $icerik_tr = $_POST["icerik_tr"];
                $icerik_en = $_POST["icerik_en"];
                if ($icerik_tr == "" && $icerik_en == "") :
      ?><script>
          BilgiPenceresi("control.php?sayfa=haberler", "BAŞARISIZ", "Veriler boş olamaz.", "warning");
        </script><?php
                else :
                  self::sorgum($vt, "insert into haberler (icerik_tr,icerik_en) VALUES('$icerik_tr','$icerik_en')", 0);
                  ?><script>
          BilgiPenceresi("control.php?sayfa=haberler", "BAŞARILI", "Duyuru-Haber ekleme başarılı", "success");
        </script><?php
                endif;
              endif;
              echo '</div>';
            } // haber ekle

            function haberguncelleme($vt)
            {
                  ?>
    <div class="col-lg-12 breadcrumbBack text-left text-muted p-1">
      <?php $this->SayfaNavi($vt, "haberler", "Haber & Duyuru", "Haber & Duyuru Güncelle"); ?>
    </div>
    <?php
              echo '<div class="row text-center">
<div class="col-lg-12 border-bottom"><h3 class="mt-3 text-info">HABER GÜNCELLE</h3>
</div>';
              $kayitid = $_GET["id"];
              $kayitbilgial = self::sorgum($vt, "select * from haberler where id=$kayitid", 1);
              if (!$_POST) :
                echo '<div class="col-lg-6 mx-auto">
    <div class="row card-bordered p-1 m-1 bg-light mt-4">
      <div class="col-lg-12 border-top p-2">
      <form action="" method="post">
      <span class="text-danger">TR</span>- İçerik
      </div>
      <div class="col-lg-12 border-top p-2">
      <textarea name="icerik_tr" rows="5" class="form-control" id="editor11">' . $kayitbilgial["icerik_tr"] . '</textarea>
      '; ?>
      <script>
        ClassicEditor
          .create(document.querySelector('#editor11'))
          .catch(error => {
            console.error(error);
          });
      </script>
      <?php
                echo '
      </div>
        <div class="col-lg-12 border-top p-2">
      <span class="text-info">EN</span>- İçerik
      </div>
      <div class="col-lg-12 border-top p-2">
      <textarea name="icerik_en" rows="5" class="form-control" id="editor12">' . $kayitbilgial["icerik_en"] . '</textarea>
      '; ?>
      <script>
        ClassicEditor
          .create(document.querySelector('#editor12'))
          .catch(error => {
            console.error(error);
          });
      </script>
      <?php
                echo '
      </div>
      <div class="col-lg-12 border-top p-2">
      <input type="hidden" name="kayitidsi" value="' . $kayitid . '">
      <input type="submit" name="buton" value="HABER GÜNCELLE" class="btn btn-primary">
      </form>
      </div>
  </div>		
</div>';
              else :
                  
                $icerik_tr = $_POST["icerik_tr"];
                $icerik_en = $_POST["icerik_en"];
                $kayitidsi = htmlspecialchars($_POST["kayitidsi"]);
                if ($icerik_tr == "" && $icerik_en == "") :
      ?><script>
          BilgiPenceresi("control.php?sayfa=haberler", "BAŞARISIZ", "Veriler boş olamaz", "warning");
        </script><?php
                else :
                  self::sorgum($vt, "update haberler set icerik_tr='$icerik_tr',icerik_en='$icerik_en',tarih=CURRENT_TIMESTAMP() where id=$kayitidsi", 0);
                  ?><script>
          BilgiPenceresi("control.php?sayfa=haberler", "BAŞARILI", "Duyuru-Haber güncelleme başarılı.", "success");
        </script><?php
                endif;
              endif;
              echo '</div>';
            } // haber güncelle

            function habersil($vt)
            {
              $kayitid = $_GET["id"];
              echo '<div class="row text-center">
<div class="col-lg-12">';
              self::sorgum($vt, "delete from haberler where id=$kayitid", 0);
                  ?><script>
      BilgiPenceresi("control.php?sayfa=haberler", "BAŞARILI", "Duyuru-Haber silme işlemi başarılı.", "success");
    </script><?php
            } // haber sil
            //DUYURU VE HABER BARI BİTTİ
              
            //---------BÜLTENE KAYIT BAŞLADI---------------
            //bülten satır sayısını veriyor
            function satirsayisi($db)
            {
              return parent::sorgum($db, "select * from bulten", 2)->rowCount();
            }
            //bülten mail arama formu
            function Aramaformu($vt)
            {
              $mail = $_POST["mail"];
              if ($mail == "") :
              ?><script>
        BilgiPenceresi("control.php?sayfa=bulten", "BAŞARISIZ", "Mail Adresi Girilmeli", "warning");
      </script><?php
              else :
                $sorgusonuc = parent::sorgum($vt, "select * from bulten where mail LIKE '%$mail%'", 2);
                while ($sonuclar = $sorgusonuc->fetch(PDO::FETCH_ASSOC)) :
                  echo '<div class="col-lg-2 ">
          <div class="row border font-weight-bold p-2 mt-3">

              <div class="col-lg-8">
              ' . $sonuclar["mail"] . '
              </div>
              <div class="col-lg-4 p-0 text-right">    
                 <a href="control.php?sayfa=bulten&icislem=sil&id=' . $sonuclar["id"] = '. " class="ti-trash text-danger mr-2" style="font-size:20px;"></a>
                 <a href="control.php?sayfa=bulten&icislem=guncelle&id=' . $sonuclar["id"] = '. " class="ti-reload text-success" style="font-size:20px;"></a>
              </div>
          </div>
       </div>';
                endwhile;
              endif;
            }
            //bülten mail silme işlemi
            function MailSil($vt)
            {
              parent::sorgum($vt, "delete from bulten where id=" . $_GET["id"], 0);
                ?><script>
      BilgiPenceresi("control.php?sayfa=bulten", "BAŞARILI", "Mail adresi başarıyla silindi.", "success");
    </script><?php
            }
            //bülten mail güncelleme
            function MailGuncelle($vt)
            {
              echo '<div class="col-lg-12 mt-5 text-center">';
              $gelenbilgi = parent::sorgum($vt, "select * from bulten where id=" . $_GET["id"], 2);
              $mevcutKayit = $gelenbilgi->fetch(PDO::FETCH_ASSOC);
              if (!$_POST) :
                echo '<div class="row card-bordered p-1 m-1 bg-white col-lg-4 mx-auto">
        <div class="col-lg-4 pt-3 text-danger border-right font-weight-bold">
        Mail Adresi
        </div>
        <div class="col-lg-8 p-2">
          <form action="" method="post">
          <input type="text" name="mail" class="form-control" value="' . $mevcutKayit["mail"] . '"/>
        </div>
       <div class="col-lg-12 border-top p-2">
          <input type="hidden" name="kayitidsi" value="' . $_GET["id"] . '" />
          <input type="submit" name="buton" value="Mail Güncelle" class="btn btn-primary"/>
       </form>
       </div>
  </div>
  </div>';
              else :
                $mail = htmlspecialchars($_POST["mail"]);
                $kayitidsi = htmlspecialchars($_POST["kayitidsi"]);
                if ($mail == "") :
              ?><script>
          BilgiPenceresi("control.php?sayfa=bulten", "BAŞARISIZ", "Mail boş olamaz.", "warning");
        </script><?php
                else :
                  self::sorgum($vt, "update bulten set mail='$mail' where id=$kayitidsi", 0);

                  ?><script>
          BilgiPenceresi("control.php?sayfa=bulten", "BAŞARILI", "Mail adresi başarıyla güncellendi", "success");
        </script><?php
                endif;
              endif;
              echo '</div>';
            }
            //bülten mail guncelleme bitti
            //bülten bakım işlemleri-aynı olan maillerin silinmesini sağlamak için.
            function bakim($vt)
            {
              $deger = parent::sorgum($vt, "select max(id) as id from bulten GROUP BY mail HAVING COUNT(*) > 1", 2);
              //$dEger=parent::sorgum($db,"SELECT DISTINCT mail from bulten",2);
              if ($deger->rowCount() != 0) :
                while ($d = $deger->fetch(PDO::FETCH_ASSOC)) :
                  $this->idller = $d["id"];
                endwhile;
                parent::sorgum($vt, "Delete from bulten where ID IN (" . implode(",", $this->idler) . ")");
                echo '<div class="col-lg-6 mx-auto">
   <div class="alert alert-success mt-5">
  Toplam mükerrer sayi: ' . $deger->rowCount() . '<br>
   Mükerrer Kayıtlar Silindi.</div>
   </div>';
                header("refresh:2,url=control.php?sayfa=bakim");
              else :
                echo '<div class="col-lg-6 mx-auto">
  <div class="alert alert-info mt-5">Mükerrer Kayıt Yok.</div>
  </div>';
                header("refresh:2,url=control.php?sayfa=bakim");
              endif;
            }
            function bulten($vt)
            {
              echo '<div class="row text-center">

  <div class="col-lg-12  border-bottom">
  <h4 class="float-left mt-3 text-info mb-2">
  Bülten Ayarları</h4> </div>
    <div class="col-lg-12">
      <div class="row bg-light pt-2 text-dark border-dark mt-1 text-center">
        <div class="col-lg-2">
          <form action="control.php?sayfa=bulten&icislem=ara" method="post">
          <input type="text" name="mail" class="form-control" placeholder="Aranacak Mail Adresi" required="required">
        </div>
        <div class="col-lg-1 border-right">
           <input type="submit" name="btn" value="ARA" class="btn btn-success"/>
        </form>
        </div>
        <div class="col-lg-3">
          <form action="cikti.php" method="post">
         <h5 class="border-bottom">Çıktı Formatı</h5> 
         <label class="text-danger font-weight-bold">Excel</label> <input type="radio" name="tercih" value="excel" class="m-2">
         <label class="text-danger font-weight-bold">Txt</label> <input type="radio" name="tercih" value="txt" class="m-2">
        </div>
        <div class="col-lg-1 ">
           <input type="submit" name="btn" value="AKTAR" class="btn btn-success "/>
        </form>
        </div>
        <div class="col-lg-3 border-right">
      <h5 class="pt-3"> Toplam Kayıt: <label class="text-danger ">' . self::satirsayisi($vt) . '</label></h5> 
        </div>
        <div class="col-lg-1 text-center mx-auto">
        <form action="control.php?sayfa=bulten&icislem=bakim" method="post">
        <input type="submit" name="btn" value="BAKIM" class="btn btn-info "/>
        </form>
        </div>
      </div>
  </div>';
              //BURASI BANA SONUÇLARI DÖNDÜRECEK
              echo  '<div class="col-lg-12">
        <div class="row bg-light pt-2 text-dark border-dark mt-1 text-center">';
              @$icislem = $_GET["icislem"];
              switch ($icislem):
                case "ara":
                  self::Aramaformu($vt);
                  break;
                case "sil":
                  self::MailSil($vt);
                  break;
                case "guncelle":
                  self::MailGuncelle($vt);
                  break;
                case "bakim":
                  self::bakim($vt);
                  break;
              endswitch;
              echo '</div></div></div>';
            } //BÜLTEN GELİYOR
            //--------------BÜLTENE KAYIT BİTTİ-------------------
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
          }

              ?>