<?php

class teknik {


     function cacheKontrol($dosyaadi,$saniye){

        //CACHE- KOPYALAMA İŞLEMİ-TÜM KODLARIN DERLENMİŞ HALİNİN TUTULACAĞI DOSYA BU.
        $cachedosya="cache/".$dosyaadi.".html";
        //bu dosyamı 10  saniyede bir yenile
        //şimdiki zamandan -10 saniye düşürdü   //dosyanın değişiklik zamanını gösterir filemtime
        if(file_exists($cachedosya) && (time () - $saniye < filemtime ($cachedosya)))://bu sayfanın daha önce kopyası alındıysa yani cachelendiyse
        include($cachedosya);
        exit();
        endif;

    }

    


     function cacheOlustur($dosyaadi){

                $cachedosya="cache/".$dosyaadi.".html";
                //Tüm sayfayı kopyalamak cache işlemi için en sona bunu yazıyorum
                $dosyam=fopen($cachedosya,"w");
                fwrite($dosyam,ob_get_contents());
                fclose($dosyam);
                ob_end_flush();
    }


    function dilKontrol(){

        @$dil = $_GET["dil"];
if ($dil=="tr" || $dil=="en") :
  @$_SESSION["dil"] = $dil;
  
 // header("Location:index.php");
elseif (!isset($_SESSION["dil"])) :
  $_SESSION["dil"] = "tr";
endif;

}




}