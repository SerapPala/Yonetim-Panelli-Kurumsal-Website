<?php               
        include_once("fonksiyon.php");
                        
        class tasarim extends kurumsal{

            public 
            $hakkimizdatercih,
            $habertercih,
            $hiztercih,
            $galtercih,
            $videotercih,
            $reftercih,
            $yorumtercih,
            $bultentercih;

            function __construct(){ 
                $baglanti=new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", DB_KULAD,DB_SIFRE); 

                $introal=$baglanti->prepare("select * from tasarim");
                $introal->execute();
                $gelen=$introal->fetch();

            

                $this->hakkimizdatercih=$gelen["hakkimizdatercih"];
                $this->habertercih=$gelen["habertercih"];
                $this->hiztercih=$gelen["hiztercih"];
                $this->galtercih=$gelen["galtercih"];
                $this->videotercih=$gelen["videotercih"];
                $this->reftercih=$gelen["reftercih"];
                $this->yorumtercih=$gelen["yorumtercih"];
                $this->bultentercih=$gelen["bultentercih"];
               
                

                parent::__construct();
            
            }



            function HakkimizdatasarimDuzen($baglanti){

                if ($this->hakkimizdatercih==0) :
                          //goster   
                    echo '<section id="hakkimizda" class="wow fadeInUp">
                          <div class="container">';
                            parent::hakkimizda($baglanti); 
                           
                            echo  '<div class="bg-light" id="about">
<div class="about-wrapper">
<div class="container">

<div class="col-lg-12">
<div class="about-inner inner pt--100 pt_sm--40 pt_md--40">

<div class="tab-wrapper mt--30">
<ul class="nav nav-tabs tab-style--1" id="myTab" role="tablist">
<li class="nav-item">
<a class="nav-link active" id="mainskill" data-toggle="tab" href="#rn-mainskill" role="tab" aria-controls="mainskill" aria-selected="true">Yeteneklerim</a>
</li>
<li class="nav-item">
<a class="nav-link" id="awards" data-toggle="tab" href="#rn-awards" role="tab" aria-controls="awards" aria-selected="false">Sertifikalarım</a>
</li>
<li class="nav-item">
<a class="nav-link" id="experience" data-toggle="tab" href="#rn-experience" role="tab" aria-controls="experience" aria-selected="false">Deneyimlerim</a>
</li>
<li class="nav-item">
<a class="nav-link" id="education" data-toggle="tab" href="#rn-education" role="tab" aria-controls="education" aria-selected="false">Eğitimlerim</a>
</li>
</ul>
<div class="tab-content" id="myTabContent">
<div class="tab-pane fade show active" id="rn-mainskill" role="tabpanel" aria-labelledby="mainskill">
<div class="single-tab-content">
<ul>
<li>
<a href="#">Yazılım Dilleri<span> -Html (Çok İyi ) , Php ( Az ) </span></a> </li>
<li>
<a href="#">CSS Teknolojileri <span> -CSS ( İyi ) , SASS ( İyi ) </span></a> </li>
<li>
<a href="#">Frameworkler <span> - Bootstrap ( İyi ), Javascript ( İyi ) ,JQery ( İyi ) , ReactJS ( Orta )</span></a> </li>
<li>
<a href="#">Geliştirme Araçları <span> -Webpack ( İyi ) , Gulp ( İyi ) , NPM ( İyi ) </span></a> </li>
<li>
<a href="#">Sunucu Kontrol Panelleri <span> -Cpanel ( İyi ) , Directadmin ( İyi ) </span></a> </li>
<li>
<a href="#">Versiyon Kontrol Sistemleri <span> -GIT ( Orta ) </span></a> </li>
<li>
 <a href="#">Veri Tabanı Yönetim Sistemleri <span> -Mysql ( Orta ) </span></a> </li>
</ul>
</div>
</div>
<div class="tab-pane fade" id="rn-awards" role="tabpanel" aria-labelledby="awards">
<div class="single-tab-content">
<ul>
<li>
<a href="#">Etkili İletişim Teknikleri Eğitimi <span> -İstanbul Boğaziçi Enstitüsü</span></a>Mayıs 2020 
</li>

<li>
<a href="#">HTML5 ve CSS3 Eğitimi <span> -İstanbul İşletme Enstitüsü</span></a>Mayıs 2020 
</li>

<li>
<a href="#">SEO Eğitimi <span> -İstanbul İşletme Enstitüsü</span></a>Mayıs 2020
</li>

<li>
<a href="#">İnsan Kaynakları Yönetimi Uzmanlığı <span> -İstanbul Boğaziçi Enstitüsü</span></a>Mayıs 2020 </li>

<li>
<a href="#">İngilizce (A1-A2) <span> -İstanbul İşletme Enstitüsü</span></a>Mayıs 2020 </li>

<li>
<a href="#">İnsan Kaynakları Asistanlığı <span> -İstanbul İşletme Enstitüsü</span></a>Mayıs 2020 </li>

<li>
<a href="#">İnsan Kaynakları Yönetimi Eğitimi <span> -İstanbul İşletme Enstitüsü</span></a>Mayıs 2020 </li>

<li>
<a href="#">Devlet Yardımları ve Uygulamaları (Teşvik) Eğitimi <span> -Dumlupınar Üniversitesi SEM </span></a>Aralık 2011 </li>

<li>
<a href="#">ISO 9001:2008 Kalite Yönetim Sistemi Temel Eğitimi <span> -Dumlupınar Üniversitesi SEM </span></a>Aralık 2011 </li>

<li>
<a href="#">İş Yeri Açma Belgesi(Web Programlama- Atatürk Anadolu Teknik Lise) <span> -Milli Eğitim Bakanlığı </span></a>Temmuz 2011 </li>

<li>
<a href="#">Css Eğitimi <span> -BTK Akademi </span></a>Ekim 2020 
</li>
</ul>
</div>
</div>
<div class="tab-pane fade" id="rn-experience" role="tabpanel" aria-labelledby="experience">
<div class="single-tab-content">
<ul>
<li>
<a href="#">Call Center Operator <span> -Alpata Gıda A.Ş.</span></a>2017 - Devam </li>

<li>
<a href="#">Call Center Operator <span> -Alpata Gıda A.Ş.</span></a>2015 - 2016 </li>
<li>
<a href="#">Satış Temsilcisi <span> -Pola Concept</span></a>2013-2015 </li>
<li>
<a href="#">30 Günlük Zorunlu Staj <span> -Kütahya Belediyesi/Destek Hizmetleri</span></a>2013
</li>
<li>
<a href="#">30 Günlük Zorunlu Staj <span> -Kütahya Halk Sağlığı Merkezi</span></a>2011
</li>
</ul>
</div>
</div>
<div class="tab-pane fade" id="rn-education" role="tabpanel" aria-labelledby="education">
<div class="single-tab-content">
<ul>
<li>
<a href="#">Yönetim Bilişim Sistemleri <span> -İstanbul Üniversitesi AUZEF
</span></a>2020 - 2024
</li>
<li>
<a href="#">Pedagojik Formasyon Eğitimi (Branş:Adalet Öğretmenliği)<span> -Bülent Ecevit Üniversitesi
</span></a>2016-2017
</li>
<li>
<a href="#">Kamu Yönetimi<span> -Anadolu Üniversitesi
</span></a>2013-2017
</li>
<li>
<a href="#">İşletme Yönetimi<span> -Dumlupınar Üniversitesi
</span></a>2011-2013
</li>
<li>
<a href="#">Web Programlama<span> -Atatürk Anadolu Teknik Lise
</span></a>2008-2011
</li>


</ul>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>';  
                    echo  '</div></section>';
                   
                endif;
            }

            function haberTasarimDuzen($baglanti){

                if ($this->habertercih==0) :
                //goster   
                    
                        parent::haberler($baglanti,$this->haberlerMetin);    
                      
                endif;

            }
 

            function HizmettasarimDuzen($baglanti){

                if ($this->hiztercih==0) :
                //goster   
                    echo '<section id="hizmetler">
                        <div class="container">';
                        parent::hizmetler($baglanti,$this->hizmetlerbaslik);    
                    echo'</div> </section>';       
                endif;

            }


            function GaleritasarimDuzen($baglanti){

                if ($this->galtercih==0) :
                          //goster   
                    echo '<section id="galeri" class="wow fadeInUp">
                          <div class="container">';
                            parent::galerimiz($baglanti,$this->galeribaslik);   
                    echo  '</div></section>';                   
                endif;

            }

            function VideotasarimDuzen($baglanti){

                if ($this->videotercih==0) :
                          //goster   
                    echo '<section id="videolar" class="wow fadeInUp">';
                            parent::videolar($baglanti,$this->galeribaslik);   
                    echo '</section>';                   
                endif;

            }

            function ReftasarimDuzen($baglanti){

                if ($this->reftercih==0) :
                        //goster 
                    echo ' <section id="referanslar" class="wow fadeInUp">
                        <div class="container">';
                        parent:: referans($baglanti,$this->referansbaslik);  
                    echo'</div> </section>';
                endif;
           
            }
    
            function YorumtasarimDuzen($baglanti){

                if ($this->yorumtercih==0) :
                          //goster   
                    echo '<section id="yorumlar" class="wow fadeInUp">
                          <div class="container">';
                            parent::yorumlar($baglanti,$this->yorumbaslik);   
                    echo  '</div></section>';                   
                endif;

            }

            function BultentasarimDuzen($baglanti){

                if ($this->bultentercih==0) :

                    echo '<div id="bultentutucu">
                     <div class="row text-center">
                            <div class="col-lg-12"><h4 class="pt-2 border-bottom">Bültene Kayıt Olun</h4></div>
                     </div>
                 
                        <form id="bultenform">
                          <div class="row text-center"> 
                              <div class="col-md-3 offset-md-3"><input type="text" name="mail" class="form-control" placeholder="Mail Adresi"  "/>            </div>
                              <div class="col-md-3"><input type="button" name="btn" id="bultenbtn" value="KAYIT OL" class="btn btn-info"/>  </div>
                              </div>
                        </form> 
                      </div>
                  </div>
              </div>
      
              <div id="bultensonuc"></div>';

                endif;

            }



            //TASARIM BÖLÜMLERİBAŞLADI
            function TasarimBolumleri($baglanti){

                $bolumler = $baglanti->prepare("select * from tasarimbolumler order by siralama asc;");
                $bolumler->execute();
        
                while ($bolumlerson = $bolumler->fetch(PDO::FETCH_ASSOC)) :

                  $class=$bolumlerson["classAd"];

                  $this-> $class($baglanti);

                endwhile;

            }
           //TASARIM BÖLÜMLERİ BİTTİ

        }