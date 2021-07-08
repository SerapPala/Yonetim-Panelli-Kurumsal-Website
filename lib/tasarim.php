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
