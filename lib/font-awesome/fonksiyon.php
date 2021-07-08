<?php include_once("fonksiyon.php");

class kurumsal
{ //sayfa dahil edildiğinde hiçbir şarta bağlı kalmadan direkt çalışacak.
    //bu çalışır çalışmaz da sitenin verilerini veritabanına aktarmış olacağım.

    //şimdi aşağıdaki değişkenleri tanımlayacağım.Bunlar veritabanında oluşturduğum alanlar için tek tek.
    public $normaltitle, $metatitle, $metadesc, $metakey, $metaaout, $metaown, $metacopy, $logoyazi, $tvit,
        $face, $inst, $telno, $mailadres, $normaladres,
        $slogan, $haberlerMetin,
        $referansUstBaslik, $referansbaslik,
        $galeriUstBaslik, $galeribaslik,
        $videolarUstBaslik, $videolarbaslik,
        $yorumUstBaslik, $yorumbaslik,
        $hizmetlerUstBaslik, $hizmetlerbaslik,
        $iletisimUstBaslik, $iletisimbaslik,
        $haritabilgi, $footer;

    public $adresBilgi, $telefonBilgi, $adBilgi, $mailBilgi, $konuBilgi, $butonBilgi;


    protected $linkidleri = array();


    //şimdi tekrar güncel veritabanı değerlerim site ile eşitlenecek.
    function __construct()
    { //ayarlar geliyor.

        //Hatayı yakalayabilmem için try catch kullanıyorum.
        try {
            $baglanti = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", DB_KULAD,DB_SIFRE); 
            //localhosttan bağlandığım için localhost
            //oluşturduğum veritabanımın adı kurumsaldı.
            //yine veritabanı oluştururken charseti utf8 olarak belirtmiştim.
            //veritabanı kullanıcı adım root idi.
            //veritabanı şifrem.
            //Alt satır hata yakalamak  için sabittir. Burayı her projede kullanabilirim artık.
            $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Artık hata yakalamaya çalışıyorum.Herhangi bir hata olduğunda error u yakalayabilmek içinonu try catch bloğu arasında yazarak yakalamaya çalışıyorum.

        } catch (PDOException $e) {

            die($e->getMessage()); //die yani bir hata var ise
        }

        $ayarcek = $baglanti->prepare("select * from ayarlar");
        //sonra bu ayarları execute ederek çalıştırmam lazım.
        $ayarcek->execute(); //şimdi gelen sonuçları diziye atmam lazım.
        $sorguson = $ayarcek->fetch();

        //ilk denemek için 
        $this->normaltitle = $sorguson["title"]; //veritabanında title olarak kullandığım için.
        $this->metatitle = $sorguson["metatitle"];
        $this->metadesc = $sorguson["metadesc"];
        $this->metakey = $sorguson["metakey"];
        $this->metaauthor = $sorguson["metaauthor"];
        $this->metaowner = $sorguson["metaowner"];
        $this->metacopy = $sorguson["metacopy"];
        $this->logoyazisi = $sorguson["logoyazisi"];
        $this->twit = $sorguson["twit"];
        $this->face = $sorguson["face"];
        $this->inst = $sorguson["inst"];
        $this->telno = $sorguson["telefonno"];
        $this->mailadres = $sorguson["mailadres"];
        $this->adress = $sorguson["adress"];
        $this->haritabilgi = $sorguson['haritabilgi'];
        $this->footer = $sorguson['footer'];
        $this->URL = $sorguson['url'];


        if ($_SESSION["dil"] == "tr") :

            //SLOGAN TR
            $this->slogan = $sorguson["slogan_tr"];
            //HABERLER TR
            $this->haberlerMetin = $sorguson["haberler_tr"];
            //REFERANS BAŞLIK VE REFERANS ÜST BAŞLIK TR
            $this->referansbaslik = $sorguson["referansbaslik_tr"];
            $this->referansUstBaslik = $sorguson["referansUstBaslik_tr"];
            //GALERİ BAŞLIK VE GALERİ ÜST BAŞLIK TR
            $this->galeribaslik = $sorguson["galeribaslik_tr"];
            $this->galeriUstBaslik = $sorguson["galeriUstBaslik_tr"];
            //VİDEOLAR BAŞLIK VE GALERİ ÜST BAŞLIK TR
            $this->videolarbaslik = $sorguson["videolarbaslik_tr"];
            $this->videolarUstBaslik = $sorguson["videolarUstBaslik_tr"];
            //YORUM  BAŞLIK VE YORUM ÜST BAŞLIK TR
            $this->yorumbaslik = $sorguson["yorumbaslik_tr"];
            $this->yorumUstBaslik = $sorguson["yorumUstBaslik_tr"];
            //HİZMETLER  BAŞLIK VE HİZMETLER ÜST BAŞLIK TR
            $this->hizmetlerbaslik = $sorguson["hizmetlerbaslik_tr"];
            $this->hizmetlerUstBaslik = $sorguson["hizmetlerUstBaslik_tr"];
            //İLETİŞİM  BAŞLIK VE İLETİŞİM ÜST BAŞLIK TR
            $this->iletisimbaslik = $sorguson["iletisimbaslik_tr"];
            $this->iletisimUstBaslik = $sorguson["iletisimUstBaslik_tr"];
            //İLETİŞİM  İÇERİKLERİ  TR
            $this->adresBilgi = "ADRES";
            $this->telefonBilgi = "TELEFON NUMARASI";
            $this->mailBilgiKendi = "MAİL ADRES";
            $this->adBilgi = "Adınız";
            $this->guvenlikBilgi = "Güvenlik Kodunu Girin";
            $this->mailBilgi = "Mail Adresiniz";
            $this->konuBilgi = "Mesaj Konusu";
            $this->butonBilgi = "Gönder";


        elseif ($_SESSION["dil"] == "en") :
            //SLOGAN EN
            $this->slogan = $sorguson["slogan_en"];
            //HABERLER EN
            $this->haberlerMetin = $sorguson["haberler_en"];
            //REFERANS BAŞLIK VE REFERANS ÜST BAŞLIK EN
            $this->referansbaslik = $sorguson["referansbaslik_en"];
            $this->referansUstBaslik = $sorguson["referansUstBaslik_en"];
            //GALERİ BAŞLIK VE GALERİ ÜST BAŞLIK EN
            $this->galeribaslik = $sorguson["galeribaslik_en"];
            $this->galeriUstBaslik = $sorguson["galeriUstBaslik_en"];
            //VİDEOLAR BAŞLIK VE GALERİ ÜST BAŞLIK EN
            $this->videolarbaslik = $sorguson["videolarbaslik_en"];
            $this->videolarUstBaslik = $sorguson["videolarUstBaslik_en"];
            //YORUM  BAŞLIK VE YORUM ÜST BAŞLIK EN
            $this->yorumbaslik = $sorguson["yorumbaslik_en"];
            $this->yorumUstBaslik = $sorguson["yorumUstBaslik_en"];
            //HİZMETLER  BAŞLIK VE HİZMETLER ÜST BAŞLIK EN
            $this->hizmetlerbaslik = $sorguson["hizmetlerbaslik_en"];
            $this->hizmetlerUstBaslik = $sorguson["hizmetlerUstBaslik_en"];
            //İLETİŞİM  BAŞLIK VE İLETİŞİM ÜST BAŞLIK EN
            $this->iletisimbaslik = $sorguson["iletisimbaslik_en"];
            $this->iletisimUstBaslik = $sorguson["iletisimUstBaslik_en"];
            //İLETİŞİM  İÇERİKLERİ  EN
            $this->adresBilgi = "ADDRESS";
            $this->telefonBilgi = "PHONE NUMBER";
            $this->mailBilgiKendi = "MAİL ADRESS";
            $this->adBilgi = "Your name";
            $this->guvenlikBilgi = "Enter security code";
            $this->mailBilgi = "Your e-mail address";
            $this->konuBilgi = "Message Subject";
            $this->butonBilgi = "Send";

        endif;
    }


    
   //-----GENEL SORGU BAŞLADI----------
  function sorgum($vt, $sorgu, $tercih = 0)
  {
   // $al = $vt->prepare($sorgu);
   $sonuc= $al->execute();
    if ($tercih == 1) :
      return $al->fetch();
    elseif ($tercih == 2) :
      return $al;
      elseif ($tercih == 3) :
        return $sonuc;
    endif;
  }
  //-----GENEL SORGU BİTTİ----------


      
  //-----Ekleme SORGU BAŞLADI----------
  function Eklemesorgum($vt, $sorgu, $tercih = 0)
  {
 
  }
  //-----Ekleme SORGU BİTTİ----------


    function introbak($baglanti)
    { //intro geliyor

        $introal = $baglanti->prepare("select * from intro");
        $introal->execute();
        while ($sonucum = $introal->fetch(PDO::FETCH_ASSOC)) :
            echo '<div class="item" style="background-image:url(' . $this->URL . $sonucum["resimyol"] . ');"></div>';
        endwhile;
    }




    function haberler($baglanti, $baslik = false)
    { //haberler geliyor
        $introal = $baglanti->prepare('SELECT * from haberler');
        $introal->execute();

        echo '<div class="container wow fadeInUp">

        <div class="row mt-2  pt-3  border-secondary  border-bottom">
  
          <div class="col-lg-3 col-md-3 text-right ">
            <h5> ' . $this->haberlerMetin . '</h5>
        
          </div>
  
          <div class="col-lg-9 col-md-9 text-info text-left" id="news-container1">
          
            <ul style="list-style-type:none;">';


        while ($sonucum = $introal->fetch(PDO::FETCH_ASSOC)) :

            echo '<li>' . $sonucum["icerik_" . $_SESSION["dil"]] . ' ' . $sonucum["tarih"] . ' </li>';
        endwhile;

        echo '</ul>
  
          </div>

        </div>
      </div>';
    }


    function hakkimizda($baglanti)
    { //hakkimizda geliyor

        $introal = $baglanti->prepare("select * from hakkimizda");
        $introal->execute();

        $sonucum = $introal->fetch();

        echo '<section id="hakkimizda" class="wow fadeInUp">
        <div class="container">
        
        
        
        <div class="row">
        
    <div class="col-lg-3 hakkimizda-img">
    <img src="' . $this->URL . $sonucum["resim"] . '"  alt="' . $this->URL . $sonucum["resim"] . '-Hakkında"/>
    
    </div>
  
    
    <div class="col-lg-9 content">
    <h2>' . $sonucum["baslik_" . $_SESSION["dil"]] . '</h2>
    <h3>' . $sonucum["icerik_" . $_SESSION["dil"]] . '</h3>
    
     </div>

  </div>
  </div>
  </section>';
    }

    function hizmetler($baglanti, $baslik = false)
    {
        $introal = $baglanti->prepare('SELECT * from hizmetler');
        $introal->execute();


        echo '<div class="section-header">
     <h2>' . $this->hizmetlerUstBaslik . '</h2>
     <p>' . $baslik . '</p>
     </div>
     <div class="row">';
        while ($sonucum = $introal->fetch(PDO::FETCH_ASSOC)) :
            echo '         <div class="col-lg-6">
        <div class="box wow fadeInTop">
        <div class="icon"> 
        <i class="fa fa-certificate"></i>
        </div>
        <h4 class="title"> <a href="#">' . $sonucum["baslik_" . $_SESSION["dil"]] . '</a></h4>
        <p class="description">' . $sonucum["icerik_" . $_SESSION["dil"]] . '</p>
        </div>
        </div>';
        endwhile;

        echo '</div>';
    }



    function referans($baglanti, $baslik = false)
    { //referanslar geliyor

        $introal = $baglanti->prepare("select * from referanslar");
        $introal->execute();

        echo ' <div class="section-header">
    <h2>' . $this->referansUstBaslik . '</h2>
    <p>' . $baslik . '</p>
        </div>
     <div class="owl-carousel clients-carousel">';

        while ($sonucum = $introal->fetch(PDO::FETCH_ASSOC)) :

               echo '    <img src="' . $this->URL . $sonucum["resimyol"] . '" alt="Referans-' . $this->URL . $sonucum["id"] . '" />';

        endwhile;
        echo '</div>';
    }



    function galerimiz($baglanti, $baslik = false)
    { //galerimiz geliyor

        $introal = $baglanti->prepare("select * from galerimiz");
        $introal->execute();

        echo  '<section id="galerimiz" class="wow fadeInUp">
        <div class="container">

    <div class="section-header">
        <h2>' . $this->galeriUstBaslik . '</h2>
        <p>' . $baslik . '</p>
        </div>
     </div>
     
     <div class="container-fluid">
     <div class="row no-gutters">';

        while ($sonucum = $introal->fetch(PDO::FETCH_ASSOC)) :

            echo '<div class="col-lg-3 col-md-4">         
        <div class="galeri-item wow fadeInUp">  
        
             
                   
                   
        <a href="' . $this->URL . $sonucum["resimyol"] . '" class="galeri-popup">
        
        <img src="' . $this->URL . $sonucum["resimyol"] . '" alt="Galeri-' . $this->URL . $sonucum["id"] . '" />
         
        
        <div class="galeri-overlay">
       </div>
       </a>
       </div>
       </div>';

        endwhile;

        echo '</div></div>
        </section>';
    }


    function videolar($baglanti, $baslik = false)
    { //videolar geliyor

        $videoal = $baglanti->prepare("select * from videolar where durum=1 order by siralama asc;");
        $videoal->execute();

        echo  '<div class="container">

    <div class="section-header">
    <h2>' . $this->videolarUstBaslik . '</h2>
    <p>';
        echo $this->videolarbaslik;
        echo '</p>
        </div>
     </div>
     
     <div class="container">
     <div class="row no-gutters">';

        while ($sonucum = $videoal->fetch(PDO::FETCH_ASSOC)) :

            echo '<div class="col-lg-4 col-md-4 p-1"> 
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/' . $sonucum["link"] . '" allowfullscreen></iframe>
                        </div>
                    </div>';


        endwhile;

        echo '</div></div>';
    }





    function yorumlar($baglanti, $baslik = false)
    { //yorumlar geliyor

        $introal = $baglanti->prepare("select * from yorumlar");
        $introal->execute();


        echo '<div class="section-header">
            <h2>' . $this->yorumUstBaslik . '</h2>
            <p>' . $baslik . '</p>
        </div>
 
        <div class="owl-carousel testimonials-carousel">';


        while ($sonucum = $introal->fetch(PDO::FETCH_ASSOC)) :

            echo '<div class="testimonial-item">
                    <p>
                    <img src="' .$this->URL.'/img/sol.png" class="quote-sign-left" />
                    ' . $sonucum["icerik"] . '
                    <img src="' .$this->URL.'/img/sag.png" class="quote-sign-right" />
                    </p>
                    <img src="' .$this->URL.'/img/yorum.jpg" class="testimonial-img" alt="Musteri Yorum-' . $sonucum["id"] . '" />
                    <h3>' . $sonucum["isim"] . '</h3>
                </div>';

        endwhile;

        echo ' </div>';
    }


    function linkler($db)
    {



        $tercihbak = $db->prepare("select hiztercih,videotercih from tasarim");
        $tercihbak->execute();
        $gelen = $tercihbak->fetch();

        $arama = $db->prepare("select * from linkler where ad_tr LIKE ? or ad_tr  LIKE ?");
        $arama->execute(array('hizmet%', 'video%'));



        while ($d = $arama->fetch()) :

            $this->linkidleri[] = $d["id"];


        endwhile;


        $linkal = $db->prepare("select * from linkler order by siralama asc;");
        $linkal->execute();


        $sayi = 0;

        while ($linkson = $linkal->fetch(PDO::FETCH_ASSOC)) :

            if ($sayi == 0) :
                echo '<li class="menu-active"><a href="#' . $linkson["etiket"] . '">' . $linkson["ad_" . $_SESSION["dil"]] . '</a></li>';
                $sayi == 1;
            else :


                if ($linkson["id"] == $this->linkidleri[0]) :


                    if ($gelen["hiztercih"] == 0) :
                        echo '<li><a href="#' . $linkson["etiket"] . '">' . $linkson["ad_" . $_SESSION["dil"]] . '</a></li>';

                    else :
                        continue; //bunun yazıldıgı yerden döngü başa döndürülür.


                    endif;





                elseif ($linkson["id"] == $this->linkidleri[1]) :


                    if ($gelen["videotercih"] == 0) :
                        echo '<li><a href="#' . $linkson["etiket"] . '">' . $linkson["ad_" . $_SESSION["dil"]] . '</a></li>';

                    else :
                        continue; //bunun yazıldıgı yerden döngü başa döndürülür.


                    endif;


                    echo '<li><a href="#' . $linkson["etiket"] . '">' . $linkson["ad_" . $_SESSION["dil"]] . '</a></li>';


                endif;


            endif;

        endwhile;
    }
}