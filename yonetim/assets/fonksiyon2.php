<?php
class yonetim2 extends yonetim
{
 protected $idler = array();
   protected $tercihArray = array("Açık", "Kapalı");
   private $veriler = array();
   
  //---------------------TASARIM YÖNETİM BAŞLADI---------------
 private function tasarimGetir($gelenTercih,$radioName,$id1,$id2) {
	?>
							<div id="demo3" data-id="hizmet" data-title="true"></div>
							<?php
							echo '<div class="switch-field">';
		foreach ($this->tercihArray as $key => $value) :	
				if ($gelenTercih==$key):		
				echo'<input type="radio" id="radio-'.$id1.'" name="'.$radioName.'" value="'.$key.'" checked="checked"  data-value="'.$radioName.'"/>
				<label for="radio-'.$id1.'">'.$value.'</label>';	
				else:	
				echo '<input type="radio" id="radio-'.$id2.'" name="'.$radioName.'" value="'.$key.'"  data-value="'.$radioName.'" />
				<label for="radio-'.$id2.'">'.$value.'</label>';
			endif;
		endforeach;	
		echo'</div>';
	}  // Tasarım getir	

//------TASARIM YÖNETİMİ BAŞLADI-----------

function tasarimYonetim($vt) {			
			echo '<div class="row text-center"><div class="col-lg-12 breadcrumbBack border-bottom "><h3 class="float-left mt-3 text-info mb-2">TASARIM YÖNETİMİ</h3></div>';
		$kayitbilgial=parent::sorgum($vt,"select * from tasarim",1);	
	if (!$_POST):
	
			echo '<div class="col-xl-4 col-xl-4 col-md-4 mx-auto"><div class="row card-bordered p-1 m-1 ">					
					<div class="col-lg-12  p-2 text-info border-bottom breadcrumbBack" ><h4>AKTİF & PASİF YÖNETİMİ</h4></div>	

					<div class="col-lg-6 pt-3 border-right text-danger border-bottom text-right">İNTRO</div><div class="col-lg-6 p-2 border-bottom" >';		
            self::tasarimGetir($kayitbilgial["introtercih"],"introtercih",1,2);

            echo'</div><div class="col-lg-6 pt-3 border-right text-danger text-right border-bottom">HABER</div><div class="col-lg-6 p-2 border-bottom">';
            self::tasarimGetir($kayitbilgial["habertercih"],"habertercih",3,4);	
         
            echo'</div><div class="col-lg-6 pt-3 border-right text-danger text-right border-bottom">HAKKIMIZDA</div><div class="col-lg-6 p-2 border-bottom">';
            self::tasarimGetir($kayitbilgial["hakkimizdatercih"],"hakkimizdatercih",5,6);	

            echo'</div>	<div class="col-lg-6 pt-3 border-right text-danger border-bottom text-right">HİZMETLER</div><div class="col-lg-6 p-2 border-bottom">';	
						self::tasarimGetir($kayitbilgial["hiztercih"],"hiztercih",7,8);		


            echo'</div>	<div class="col-lg-6 pt-3 border-right text-danger border-bottom text-right">GALERİ</div>	<div class="col-lg-6 p-2 border-bottom">';	
						self::tasarimGetir($kayitbilgial["galtercih"],"galtercih",9,10);


						echo'</div>	<div class="col-lg-6 pt-3 border-right text-danger text-right border-bottom">VİDEOLAR	</div>	<div class="col-lg-6 p-2 border-bottom">';
						self::tasarimGetir($kayitbilgial["videotercih"],"videotercih",11,12);


						echo'</div><div class="col-lg-6 pt-3 border-right text-danger border-bottom  text-right">MÜŞTERİ YORUMLARI	</div><div class="col-lg-6 p-2 border-bottom">';		
						self::tasarimGetir($kayitbilgial["yorumtercih"],"yorumtercih",13,14);		
            
            
            echo'</div>	<div class="col-lg-6 pt-3 border-right text-danger border-bottom text-right">REFERANSLAR</div><div class="col-lg-6 p-2 border-bottom">';	
						self::tasarimGetir($kayitbilgial["reftercih"],"reftercih",15,16);		
            

            echo'</div><div class="col-lg-6 pt-3 border-right text-danger text-right ">BÜLTEN</div><div class="col-lg-6 p-2">';
						self::tasarimGetir($kayitbilgial["bultentercih"],"bultentercih",17,18);	


            
						echo'</div>												
						<div class="col-lg-12 border-top p-2">	<input type="hidden" name="kayitidsi" value="'.$kayitbilgial["id"].'"></div></div>	</div>';
			$tasarimbilgial=parent::sorgum($vt,"select * from tasarimbolumler order by siralama asc;",2);	

     $renklerial=parent::sorgum($vt,"select * from tasarim",1);
echo '<div class="col-lg-4 col-xl-4 col-md-4 mx-auto hafifgri"><table class="table table-striped mt-1 table-bordered">
					<tbody><tr>	<td colspan="3" class=" text-info "><h4>TASARIM RENKLERİ</h4></td></tr>';
					
					
					echo '<tr><td class="pt-4">ÜST ALAN</td>					
					<td>
					<form action ="control.php?sayfa=tasarimrenkler" method="POST">
					<input type="text" class="form-control jscolor" value="'.$renklerial["topbar"].'" name="topbar"></td>
					
					</tr>
					<tr><td class="pt-4">İLETİŞİM ICON</td>					
					<td><input type="text" class="form-control jscolor" value="'.$renklerial["iletisimicon"].'" name="iletisimicon"></td>
					
					</tr>
					<tr><td class="pt-4">SOSYAL ICONLAR</td>					
					<td><input type="text" class="form-control jscolor" value="'.$renklerial["sosyalrenk"].'" name="sosyalrenk"></td>
					
					</tr>
					<tr><td class="pt-4">LOGO LİNK</td>					
					<td><input type="text" class="form-control jscolor" value="'.$renklerial["logo"].'" name="logo"></td>
					
					</tr>
					<tr><td class="pt-4">BÖLÜM BAŞLIKLARI</td>					
					<td><input type="text" class="form-control jscolor" value="'.$renklerial["basliklar"].'" name="basliklar"></td>
					
					</tr>
					<tr>				
					<td colspan="2"><input type="submit" class="btn btn-success" value="DEĞİŞTİR" ></form></td>
					
					</tr>';					
								
					echo'</tbody></table></div>';
      
			echo '<div class="col-xl-4 col-xl-4 col-md-4 mx-auto "><table class="table table-striped mt-1 table-bordered">
					<tbody><tr>	<td colspan="3" class=" text-info breadcrumbBack "><h4>BÖLÜM SIRALAMASI</h4></td></tr>';
					while ($bolumson=$tasarimbilgial->fetch(PDO::FETCH_ASSOC)):
					echo '<tr><td>'.$bolumson["ad"].'</td>
					<td>'.$bolumson["siralama"].'</td>
					<td><a href="control.php?sayfa=tasarimguncelle&id='.$bolumson["id"].'" class="ti-reload text-success" style="font-size:20px;"></a></td></tr>';					
					endwhile;					
					echo'</tbody></table></div></div>';		
		
endif;	
}  //Tasarım yönetim		
function tasarimrenkguncelleme($vt) {		
			
  if ($_POST) :
  
  $topbar=parent::veriTemizle($_POST["topbar"]);
  $iletisimicon=parent::veriTemizle($_POST["iletisimicon"]);
  $sosyalrenk=parent::veriTemizle($_POST["sosyalrenk"]);
  $logo=parent::veriTemizle($_POST["logo"]);
  $basliklar=parent::veriTemizle($_POST["basliklar"]);
  parent::sorgum($vt,"update tasarim set topbar='$topbar', iletisimicon='$iletisimicon',sosyalrenk='$sosyalrenk',logo='$logo',basliklar='$basliklar'",0);
  ?><script> BilgiPenceresi("control.php?sayfa=tas","BAŞARILI","RENK GÜNCELLEMESİ BAŞARILI","success"); </script> <?php	
  else:
  
  header("refresh:2,url=control.php?sayfa=tas");	
  
  endif;
  
  

}  //bölüm güncelle	

            //---------------BÖLÜM GÜNCELLEME BAŞLADI------------
            function tasarimguncelleme($vt)
            {
              $linklerebak = parent::sorgum($vt, "select * from tasarimbolumler", 2);
              echo '<div class="row text-center">
  <div class="col-lg-12 border-bottom ">
  <h3 class=" mt-3 text-info text-left">Bölüm Güncelle<h3>
  </div>';
              $kayitid = $_GET["id"];
              $kayitbilgial = parent::sorgum($vt, "select * from tasarimbolumler where id=$kayitid", 1);
              if (!$_POST) :

                echo '<div class="col-lg-9 mx-auto ">
<div class="row card-bordered p-1 m-1 bg-light mt-5 ">
<div class="col-lg-2 p-2 border-bottom border-right p-2 text-info">
    İLGİLİ BÖLÜM
</div>
<div class=" text-left col-lg-9 p-2 border-bottom text-info">
<b> ' . $kayitbilgial["ad"] . ' </b>
</div>
<div class="col-lg-2 pt-3 border-right bg-light p-2 ">
<form action="" method="post">
<span class="text-info">Bölüm Sırası:<br><b>' . $kayitbilgial["siralama"] . ' </span></b>
</div>
<div class="col-lg-9 p-2 ">
  <select name="gideceksira"  class="form-control p-2 bg-white" />';

                while ($sonbilgi = $linklerebak->fetch(PDO::FETCH_ASSOC)) :
                  if ($sonbilgi["siralama"] != $kayitbilgial["siralama"]) :
                    echo '  <option  value="' . $sonbilgi["siralama"] . '">' . $sonbilgi["siralama"] . '-' . $sonbilgi["ad"] . '</option>';
                  endif;
                endwhile;
                echo '</select>
  
</div>

  <div class="col-lg-12 border-top p-2">
  <input type="hidden" name="kayitidsi" value="' . $kayitid . '" />
  <input type="hidden" name="mevcutsira" value="' . $kayitbilgial["siralama"] . '" />
  <input type="submit" name="buton" value="Bölüm Güncelle" class="btn btn-primary"/>

  </form>
  </div>

  </div>
  </div>';
              else :
                $gideceksira = htmlspecialchars($_POST["gideceksira"]);
                $mevcutsira = htmlspecialchars($_POST["mevcutsira"]);
                $kayitidsi = htmlspecialchars($_POST["kayitidsi"]);
                if ($gideceksira == "") :
                  echo '<div class="col-lg-6 mx-auto">
          <div class="alert alert-danger mt-5">
          Veriler boş olamaz.</div></div>';
                  header("refresh:2,url=control.php?sayfa=tas");
                else :
                  parent::sorgum($vt, "update tasarimbolumler set siralama=$mevcutsira where siralama=$gideceksira", 0);
                  //burada sıralar yer değiştiriyor.
                  parent::sorgum($vt, "update tasarimbolumler set siralama=$gideceksira where id=$kayitidsi", 0);
                ?><script>
          BilgiPenceresi("control.php?sayfa=tas", "BAŞARILI", "Sıralama başarıyla güncellendi.", "success");
        </script><?php

                endif;
              endif;
              echo '</div>';
            } //
            //--------------BÖLÜM  GÜNCELLEME BİTTİ---------












            //--------------LİNKLER BAŞLANGIÇ---------------
            function linkayar($vt)
            {
              echo '<div class="row text-center">
  <div class="col-lg-12 breadcrumbBack">
  <h4 class="float-left mt-3 text-info mb-4">
  <a href="control.php?sayfa=linkekle" class="ti-plus bg-info p-1 text-dark mr-2 mt-3"></a>
  Link Kontrol</h4> </div>'; 
              $introbilgiler = parent::sorgum($vt, "select * from linkler", 2);
              while ($sonbilgi = $introbilgiler->fetch(PDO::FETCH_ASSOC)) :
                echo '<div class="col-lg-6">
  <div class="row card-bordered p-1 m-1 bg-light">
  <div class="col-lg-9 pt-1 pb-1">
  <h5><kbd class="float-left bg-dark text-light ">Sıra:' . $sonbilgi["siralama"] . '   </kbd> ' . $sonbilgi["ad_tr"] . ' - ' . $sonbilgi["ad_en"] . '</h5>
  </div>
  <div class="col-lg-2 text-right">
  <a href="control.php?sayfa=linkguncelle&id=' . $sonbilgi["id"] . '" class="ti-reload  text-success" style="font-size:20px;"></a>

  '; ?>
      <a onclick="silmedenSor('control.php?sayfa=linksil&id=<?php echo $sonbilgi["id"]; ?>');return false" class="ti-trash m-2 text-danger" style="font-size:20px;"></a>
    <?php echo '
  </div>
  <div class="col-lg-12 border-top text-secondary">
  ' . $sonbilgi["etiket"] . ' 
  </div>

  </div>
  </div>';
              endwhile;
              echo '</div>';
            } //vt resimleri geldi
            //LİNK EKLEME
            function linkekleme($vt)
            {
    ?>
    <div class="col-lg-12 breadcrumbBack text-left text-muted p-1">
      <?php $this->SayfaNavi($vt, "linkayar", "Link Kontrol", "Link Ekle"); ?>
    </div>
    <?php
              $introbilgiler = parent::sorgum($vt, "select * from linkler order by siralama desc LIMIT 1", 2);
              ($sonbilgi = $introbilgiler->fetch(PDO::FETCH_ASSOC));
              $sayi = $sonbilgi["siralama"] + 1;
              echo '<div class="row text-center">
  <div class="col-lg-12">
  <h3 class=" mt-3 text-info">Link Ekle<h3>
  </div>';
              if (!$_POST) :
                echo '<div class="col-lg-6 mx-auto">
  <div class="row card-bordered p-1 m-1 bg-light mt-4">
  <div class="col-lg-2 pt-3">
  <span class="text-danger">TR</span>-Link
  </div>
  <div class="col-lg-9 p-2">
      <form action="" method="post">
      <input type="text" name="ad_tr" class="form-control" />
      
  </div>
  <div class="col-lg-2 pt-3">
  <span class="text-info">EN</span>-Link
  </div>
  <div class="col-lg-9 p-2">
      <form action="" method="post">
      <input type="text" name="ad_en" class="form-control" />
  </div>
  <div class="col-lg-2 pt-3">
  <span class="text-dark">Etiket</span>
  </div>
  <div class="col-lg-9 p-2">
      <form action="" method="post">
      <input type="text" name="etiket" class="form-control" />
  </div>
  <div class="col-lg-2 pt-3">
  <span class="text-dark">Link Sırası</span>
  </div>
  <div class="col-lg-9 p-2">
    <select name="sira"  class="form-control"/>
    <option value="' . $sayi . '">' . $sayi . '</option>
    </select>
  </div>
  <div class="col-lg-12 border-top p-2">
  <input type="submit" name="buton" value="Link Ekle" class="btn btn-primary"/>
  </form>
  </div>
  </div>
  </div>';
              else :
                $ad_tr = htmlspecialchars($_POST["ad_tr"]);
                $ad_en = htmlspecialchars($_POST["ad_en"]);
                $etiket = htmlspecialchars($_POST["etiket"]);
                $sira = htmlspecialchars($_POST["sira"]);
                if ($ad_tr == "" && $ad_en == "" && $etiket == "") :

    ?><script>
          BilgiPenceresi("control.php?sayfa=linkler", "BAŞARISIZ", "Veriler boş olamaz.", "warning");
        </script><?php
                else :
                  parent::sorgum($vt, "insert into linkler (ad_tr,ad_en,etiket,siralama) values('$ad_tr','$ad_en','$etiket','$sira')", 0);
                  ?><script>
          BilgiPenceresi("control.php?sayfa=linkayar", "BAŞARILI", "Link  Ekleme başarılı.", "success");
        </script><?php
                endif;
              endif;
              echo '</div>';
            } //LİNK ekleme bitti

            //LİNK GÜNCELLEME
            function linkguncelleme($vt)
            {
                  ?>
    <div class="col-lg-12 breadcrumbBack text-left text-muted p-1">
      <?php $this->SayfaNavi($vt, "linkayar", "Link Kontrol", "Link Güncelle"); ?>
    </div>
    <?php
              $linklerebak = parent::sorgum($vt, "select * from linkler", 2);
              echo '<div class="row text-center">
    <div class="col-lg-12 border-bottom">
    <h3 class=" mt-3 text-info">Link Guncelleme<h3>
    </div>';

              $kayitid = $_GET["id"];
              $kayitbilgial = parent::sorgum($vt, "select * from linkler where id=$kayitid", 1);
              if (!$_POST) :

                echo '<div class="col-lg-9 mx-auto">
  <div class="row card-bordered p-1 m-1 bg-light mt-5">
  <div class="col-lg-2 pt-3">
  <span class="text-danger">TR</span>-Link
  </div>
  <div class="col-lg-9 p-2">
      <form action="" method="post">
      <input type="text" name="ad_tr" class="form-control" value="' . $kayitbilgial["ad_tr"] . '"/>
  </div>
  <div class="col-lg-2 pt-3">
  <span class="text-info">EN</span>-Link
  </div>
  <div class="col-lg-9 p-2">
      <form action="" method="post">
      <input type="text" name="ad_en" class="form-control" value="' . $kayitbilgial["ad_en"] . '"/>
  </div>
  <div class="col-lg-2 pt-3">
  <span>Etiket</span>
  </div>
  <div class="col-lg-9 p-2">
      <form action="" method="post">
      <input type="text" name="etiket" class="form-control" value="' . $kayitbilgial["etiket"] . '"/>
  </div>
  <div class="col-lg-2 pt-3">
  <span class="text-dark">Link Sırası:<b> ' . $kayitbilgial["siralama"] . ' </span></b>
  </div>
  <div class="col-lg-9 p-2">
    <select name="gideceksira"  class="form-control p-2" />';

                while ($sonbilgi = $linklerebak->fetch(PDO::FETCH_ASSOC)) :
                  if ($sonbilgi["siralama"] != $kayitbilgial["siralama"]) :
                    echo '  <option  value="' . $sonbilgi["siralama"] . '">' . $sonbilgi["siralama"] . '-' . $sonbilgi["ad_tr"] . '-' . $sonbilgi["ad_en"] . '</option>';
                  endif;
                endwhile;

                echo '</select>
    
  </div>
    <div class="col-lg-12 border-top p-2">
    <input type="hidden" name="kayitidsi" value="' . $kayitid . '" />
    <input type="hidden" name="mevcutsira" value="' . $kayitbilgial["siralama"] . '" />
    <input type="submit" name="buton" value="Link Güncelle" class="btn btn-primary"/>

    </form>
    </div>

    </div>
    </div>';
              else :
                $ad_tr = htmlspecialchars($_POST["ad_tr"]);
                $ad_en = htmlspecialchars($_POST["ad_en"]);
                $etiket = htmlspecialchars($_POST["etiket"]);
                $gideceksira = htmlspecialchars($_POST["gideceksira"]);
                $mevcutsira = htmlspecialchars($_POST["mevcutsira"]);
                $kayitidsi = htmlspecialchars($_POST["kayitidsi"]);
                if ($ad_tr == "" && $ad_en == "" && $etiket == "") :
    ?><script>
          BilgiPenceresi("control.php?sayfa=linkayar", "BAŞARISIZ", "Veriler boş olamaz.", "warning");
        </script><?php
                else :
                  parent::sorgum($vt, "update linkler set siralama=$mevcutsira where siralama=$gideceksira", 0);
                  parent::sorgum($vt, "update linkler set ad_tr='$ad_tr',ad_en='$ad_en',etiket='$etiket',siralama=$gideceksira where id=$kayitidsi", 0);
                  ?><script>
          BilgiPenceresi("control.php?sayfa=linkayar", "BAŞARILI", "Link güncelleme başarılı.", "success");
        </script><?php

                endif;
              endif;
              echo '</div>';
            } //
            //LİNK GÜNCELLEME BİTTİ

            //link silme
            function linksil($vt)
            {
              $kayitid = $_GET["id"];
              echo '<div class="row text-center">
<div class="col-lg-12">';
              //vtden sileme
              parent::sorgum($vt, "delete  from linkler where id=$kayitid", 0);
                  ?><script>
      BilgiPenceresi("control.php?sayfa=linkayar", "BAŞARILI", "Link başarıyla silindi", "success");
    </script><?php

            } //link silme bitti
            //--------------LİNKLER BİTTİ------------

 


            //--KULLANICI AYARLARI BAŞLANGIÇ-------------
            function ayarlar($baglanti)
            {
              $id = self::coz($_COOKIE["kulbilgi"]);
              $sonuc = parent::sorgum($baglanti, "SELECT * FROM yonetim where id=$id", 1);
              if ($_POST) :
                @$kulad = htmlspecialchars($_POST["kulad"]);
                @$eskisif = htmlspecialchars($_POST["sifre"]);
                @$yenisif = htmlspecialchars($_POST["yenisifre"]);
                @$yenisif2 = htmlspecialchars($_POST["yenisifre2"]);
                //eski şifreyi şifrele ve vt ile karsılastır.
                //yeni sifreler aynımı kontrol et
                //
                if ($kulad == "" || $eskisif == "" || $yenisif == "" || $yenisif2 == "") :


      ?><script>
BilgiPenceresi("control.php?sayfa=ayarlar", "BAŞARISIZ", "Alanlar boş geçilemez.", "warning");
</script><?php

                else :
                  $sifrelihal = md5(sha1(md5($eskisif)));
                  if ($sonuc['sifre'] != $sifrelihal) :

                  ?><script>
BilgiPenceresi("control.php?sayfa=ayarlar", "BAŞARISIZ", "Eski şifre hatalı girildi.", "warning");
</script><?php

                  else :
                    if ($yenisif != $yenisif2) :

                    ?><script>
BilgiPenceresi("control.php?sayfa=ayarlar", "BAŞARISIZ", "Yeni şifreler eşleşmiyor.", "warning");
</script><?php

                    else :
                      $yenisifson = md5(sha1(md5($yenisif)));
                      $guncelleme = $baglanti->prepare("update yonetim set 
              kulad=?,sifre=? where id=$id");
                      $guncelleme->bindParam(1, $kulad, PDO::PARAM_STR);
                      $guncelleme->bindParam(2, $yenisifson, PDO::PARAM_STR);
                      $guncelleme->execute();

                      ?><script>
BilgiPenceresi("control.php?sayfa=ayarlar", "BAŞARILI", "Bilgiler başarıyla güncellendi.", "success");
</script><?php

                    endif;
                  endif;
                endif;

              else :
                      ?>
<form action="control.php?sayfa=ayarlar" method="post">
    <div class="row text-center mt-5">
        <div class="col-lg-5 mx-auto">
            <div class="col-lg-12 mx-auto mb-3">
                <h3 class="text-info">Kullanıcı Ayarları</h3>
            </div>
            <div class="col-lg-12 mx-auto border">
                <div class="row">
                    <div class="col-lg-4 border-right pt-3 text-left">
                        <span id="siteayarfont">Kullanıcı Adı</span>
                    </div>
                    <div class="col-lg-8 p-1">
                        <input type="text" name="kulad" class="form-control" value="<?php echo $sonuc['kulad']; ?>" />
                    </div>
                </div>
            </div>
            <!--ara-->
            <div class="col-lg-12 mx-auto border">
                <div class="row">
                    <div class="col-lg-4 border-right pt-3 text-left">
                        <span id="siteayarfont">Şifre</span>
                    </div>
                    <div class="col-lg-8 p-1">
                        <input type="password" name="sifre" class="form-control" />
                    </div>
                </div>
            </div>
            <!--ara-->
            <div class="col-lg-12 mx-auto border">
                <div class="row">
                    <div class="col-lg-4 border-right pt-3 text-left">
                        <span id="siteayarfont">Yeni Sifre</span>
                    </div>
                    <div class="col-lg-8 p-1">
                        <input type="password" name="yenisifre" class="form-control" />
                    </div>
                </div>
            </div>
            <!--ara-->
            <div class="col-lg-12 mx-auto border">
                <div class="row">
                    <div class="col-lg-4 border-right pt-3 text-left">
                        <span id="siteayarfont">Yeni Sifre Tekrar</span>
                    </div>
                    <div class="col-lg-8 p-1">
                        <input type="password" name="yenisifre2" class="form-control" />
                    </div>
                </div>
            </div>

            <div class="col-lg-12 mx-auto mt-2">
                <input type="submit" name="buton" class="btn btn-info m-1" value="Değiştir" />
            </div>
        </div>
    </div>
</form>
<?php
              endif;
            }

            //--KULLANICI AYARLARI BİTİŞ-------------


            //--CHECKBOX-------------
            function CheckBoxDuzenle($name)
            {

              if (isset($_POST[$name])) :
                return 1;

              else :
                return 0;
              endif;
            }


            function CheckKontrol($isim, $mevcutyetki)
            {

              if ($mevcutyetki == 1) :

                echo '<input type="checkbox" name="' . $isim . '" id="check" checked="checked"/>';

              else :

                echo '<input type="checkbox" name="' . $isim . '" id="check"/>';
              endif;
            }
            //--CHECKBOX-------------


          

             // kullanıcı yönetimi baslangıc
             
             //---KULLANICILARI LİSTELE-----
            function kullistele($vt)
            {
              $al = parent::sorgum($vt, "select * from yonetim", 2);
              echo '<div class="row text-center">
  <div class="col-lg-6 mt-5 mx-auto">
  <div class="card">
  <div class="card-body ">
  <h4 class="header-title text-info">
  <a href="control.php?sayfa=yonekle" class="ti-plus bg-success p-1 text-white mr-2 mt-3"></a>
  KULLANICILAR </h4>
  <div class="single-table">
  <div class="table-responsive">
  <table class="table text-center border">
  <thead class="text-uppercase">
  <tr>
  <th scope="col" class="border-right breadcrumbBack">Ad</th>
  <th scope="col" class="border-right breadcrumbBack">Genel Yetki</th>
  <th scope="col" class="border-right breadcrumbBack">İşlem</th>
  </tr>
  </thead>
  <tbody>';
              while ($yonson = $al->fetch(PDO::FETCH_ASSOC)) :
                echo '<tr>
      <th scope="row" class="border-right">' . $yonson["kulad"] . '</th>
      <th scope="row" class="border-right">';

                switch ($yonson["genelYetki"]):


                  case "1";
                    echo "<span class='text-success'>Tam Yetki</span>";
                    break;
                  case "2";
                    echo "<span class='text-warning'>Editör Yetki</span>";
                    break;
                  case "3";
                    echo "<span class='text-primary'>Üye Yetki</span>";
                    break;
                endswitch;



                echo '</th>
      <th scope="row">
       <a href="control.php?sayfa=yoneticiguncelle&id=' . $yonson["id"] . '" class="ti-reload  text-success" id="guncelleBtn"></a>
      
      '; ?>

<a onclick="silmedenSor('control.php?sayfa=yonsil&id=<?php echo $yonson["id"]; ?>');return false"
    class="ti-trash m-2 text-danger" style="font-size:20px;"></a>

<?php echo '
      
      </th>
      </tr>';
              endwhile;

              echo '</tbody>
  </table>
  </div></div></div></div></div>';
            }        
            //---KULLANICILARI LİSTELE-----
            
            //---YÖNETİCİ SİL-----
            function yonsil($vt, $id)
            {


    ?><script>
BilgiPenceresi("control.php?sayfa=kulayar", "BAŞARILI", "Yonetici silindi.", "success");
</script><?php

              parent::sorgum($vt, "delete from yonetim where id=$id", 0);
            }
       //---YÖNETİCİ SİL-----

            //-----------YÖNETİCİ EKLEME  BAŞLADI------------------
            function yonekle($vt)
            {

              ?>
<div class="col-lg-12 breadcrumbBack text-left text-muted p-1">
    <?php $this->SayfaNavi($vt, "kulayar", "Yönetici Ayarları", "Yönetici Ekle"); ?>
</div>
<?php


              if ($_POST) :
                //KULLANICI ADI-ŞİFRE-YENİ ŞİFRE
                $kulad = htmlspecialchars($_POST["kulad"]);
                $yenisif = htmlspecialchars($_POST["yenisifre"]);
                $yenisif2 = htmlspecialchars($_POST["yenisifre2"]);
                //FORM ELEMANLARI
                $genelYetki = htmlspecialchars($_POST["genelYetki"]);

                $introYetki =     $this->CheckBoxDuzenle("introYetki");
                $galeriYetki =    $this->CheckBoxDuzenle("galeriYetki");
                $videoYetki =     $this->CheckBoxDuzenle("videoYetki");
                $hakkimizYetki =  $this->CheckBoxDuzenle("hakkimizYetki");
                $hizmetlerYetki = $this->CheckBoxDuzenle("hizmetlerYetki");
                $referansYetki =  $this->CheckBoxDuzenle("referansYetki");
                $tasarimYetki =   $this->CheckBoxDuzenle("tasarimYetki");
                $yorumYetki =     $this->CheckBoxDuzenle("yorumYetki");
                $mesajYetki =     $this->CheckBoxDuzenle("mesajYetki");
                $bultenYetki =    $this->CheckBoxDuzenle("bultenYetki");
                $haberYetki =     $this->CheckBoxDuzenle("haberYetki");
                $yoneticiYetki =  $this->CheckBoxDuzenle("yoneticiYetki");
                $ayarYetki =      $this->CheckBoxDuzenle("ayarYetki");

                if (empty($kulad) || empty($yenisif) || empty($yenisif2)) :

    ?><script>
BilgiPenceresi("control.php?sayfa=yonekle", "BAŞARISIZ", "Alanlar boş geçilemez.", "warning");
</script><?php

                else :

                  if ($yenisif != $yenisif2) :

                  ?><script>
BilgiPenceresi("control.php?sayfa=yonekle", "BAŞARISIZ", "Şifreler eşleşmiyor.", "warning");
</script><?php

                  else :
                    $yenisifson = md5(sha1(md5($yenisif)));
                    $ekle = $vt->prepare("insert into yonetim (kulad,sifre,genelYetki,introYetki,galeriYetki,videoYetki,hakkimizYetki,hizmetlerYetki,referansYetki,tasarimYetki,yorumYetki,mesajYetki,bultenYetki,haberYetki,yoneticiYetki,ayarYetki) 
                    values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                    //KULLANICI ADI- YENİ ŞİFRE
                    $ekle->bindParam(1, $kulad, PDO::PARAM_STR);
                    $ekle->bindParam(2, $yenisifson, PDO::PARAM_STR);
                    //FORM ELEMANLARI
                    $ekle->bindParam(3, $genelYetki, PDO::PARAM_INT);
                    $ekle->bindParam(4, $introYetki, PDO::PARAM_INT);
                    $ekle->bindParam(5, $galeriYetki, PDO::PARAM_INT);
                    $ekle->bindParam(6, $videoYetki, PDO::PARAM_INT);
                    $ekle->bindParam(7, $hakkimizYetki, PDO::PARAM_INT);
                    $ekle->bindParam(8, $hizmetlerYetki, PDO::PARAM_INT);
                    $ekle->bindParam(9, $referansYetki, PDO::PARAM_INT);
                    $ekle->bindParam(10, $tasarimYetki, PDO::PARAM_INT);
                    $ekle->bindParam(11, $yorumYetki, PDO::PARAM_INT);
                    $ekle->bindParam(12, $mesajYetki, PDO::PARAM_INT);
                    $ekle->bindParam(13, $bultenYetki, PDO::PARAM_INT);
                    $ekle->bindParam(14, $haberYetki, PDO::PARAM_INT);
                    $ekle->bindParam(15, $yoneticiYetki, PDO::PARAM_INT);
                    $ekle->bindParam(16, $ayarYetki, PDO::PARAM_INT);
                    $ekle->execute();

                    ?><script>
BilgiPenceresi("control.php?sayfa=yonekle", "BAŞARILI", "Yönetici eklendi.", "success");
</script><?php

                  endif;
                endif;


              else :
                    ?>
<form action="control.php?sayfa=yonekle" method="post">
    <div class="row text-center">
        <div class="col-lg-5 mx-auto mt-3">
            <div class="col-lg-12 mx-auto border">
                <h3 class="text-info">Yönetici Ekle

                </h3>
            </div>
            <div class="col-lg-12 mx-auto border">
                <div class="row">
                    <div class="col-lg-5 border-right pt-3 text-left">
                        <span id="siteayarfont">Kullanıcı Adı</span>
                    </div>
                    <div class="col-lg-7 p-1">
                        <input type="text" name="kulad" class="form-control" />
                    </div>
                </div>
            </div>
            <!--Yeni Şifre-->
            <div class="col-lg-12 mx-auto border">
                <div class="row">
                    <div class="col-lg-5 border-right pt-3 text-left">
                        <span id="siteayarfont">Yeni Sifre</span>
                    </div>
                    <div class="col-lg-7 p-1">
                        <input type="password" name="yenisifre" class="form-control" />
                    </div>
                </div>
            </div>
            <!--Yeni Şifre-->

            <!--Yeni Şifre Tekrar-->
            <div class="col-lg-12 mx-auto border">
                <div class="row">
                    <div class="col-lg-5 border-right pt-3 text-left">
                        <span id="siteayarfont">Yeni Sifre (Tekrar)</span>
                    </div>
                    <div class="col-lg-7 p-1">
                        <input type="password" name="yenisifre2" class="form-control" />
                    </div>
                </div>
            </div>
            <!--Yeni Şifre Tekrar-->

            <!--Genel Yetki-->
            <div class="col-lg-12 mx-auto border">
                <div class="row">
                    <div class="col-lg-5 border-right pt-3 text-left">
                        <span id="siteayarfont">Genel Yetki</span>
                    </div>
                    <div class="col-lg-7 p-1">
                        <select name="genelYetki">
                            <option value="1">Tam Yetki</option>
                            <option value="2">Editör Yetki</option>
                            <option value="3">Üye Yetki</option>
                        </select>
                    </div>
                </div>
            </div>
            <!--Genel Yetki-->

            <!--İntro Yetki-->
            <div class="col-lg-12 mx-auto border">
                <div class="row">
                    <div class="col-lg-5 border-right pt-3 text-left">
                        <span id="siteayarfont">İntro Yetki</span>
                    </div>
                    <div class="col-lg-7 pt-2 mt-2 text-left">
                        <input type="checkbox" name="introYetki" id="check" />
                    </div>
                </div>
            </div>
            <!--İntro Yetki-->

            <!--Galeri Yetki-->
            <div class="col-lg-12 mx-auto border">
                <div class="row">
                    <div class="col-lg-5 border-right pt-3 text-left">
                        <span id="siteayarfont">Galeri Yetki</span>
                    </div>
                    <div class="col-lg-7 pt-2 mt-2 text-left">
                        <input type="checkbox" name="galeriYetki" id="check" />
                    </div>
                </div>
            </div>
            <!--Galeri Yetki-->

            <!--Video Yetki-->
            <div class="col-lg-12 mx-auto border">
                <div class="row">
                    <div class="col-lg-5 border-right pt-3 text-left">
                        <span id="siteayarfont">Video Yetki</span>
                    </div>
                    <div class="col-lg-7 pt-2 mt-2 text-left">
                        <input type="checkbox" name="videoYetki" id="check" />
                    </div>
                </div>
            </div>
            <!--Video  Yetki-->

            <!--Hakkımızda Yetki-->
            <div class="col-lg-12 mx-auto border">
                <div class="row">
                    <div class="col-lg-5 border-right pt-3 text-left">
                        <span id="siteayarfont">Hakkımızda Yetki</span>
                    </div>
                    <div class="col-lg-7 pt-2 mt-2 text-left">
                        <input type="checkbox" name="hakkimizYetki" id="check" />
                    </div>
                </div>
            </div>
            <!--Hakkımızda Yetki-->

            <!--Hizmetler Yetki-->
            <div class="col-lg-12 mx-auto border">
                <div class="row">
                    <div class="col-lg-5 border-right pt-3 text-left">
                        <span id="siteayarfont">Hizmetler Yetki</span>
                    </div>
                    <div class="col-lg-7 pt-2 mt-2 text-left">
                        <input type="checkbox" name="hizmetlerYetki" id="check" />
                    </div>
                </div>
            </div>
            <!--Hizmetler  Yetki-->

            <!--Referanslar Yetki-->
            <div class="col-lg-12 mx-auto border">
                <div class="row">
                    <div class="col-lg-5 border-right pt-3 text-left">
                        <span id="siteayarfont">Referanslar Yetki</span>
                    </div>
                    <div class="col-lg-7 pt-2 mt-2 text-left">
                        <input type="checkbox" name="referansYetki" id="check" />
                    </div>
                </div>
            </div>
            <!--Referanslar  Yetki-->

            <!--Tasarım Yetki-->
            <div class="col-lg-12 mx-auto border">
                <div class="row">
                    <div class="col-lg-5 border-right pt-3 text-left">
                        <span id="siteayarfont">Tasarım Yetki</span>
                    </div>
                    <div class="col-lg-7 pt-2 mt-2 text-left">
                        <input type="checkbox" name="tasarimYetki" id="check" />
                    </div>
                </div>
            </div>
            <!--Tasarım Yetki-->

            <!--Yorum Yetki-->
            <div class="col-lg-12 mx-auto border">
                <div class="row">
                    <div class="col-lg-5 border-right pt-3 text-left">
                        <span id="siteayarfont">Yorum Yetki</span>
                    </div>
                    <div class="col-lg-7 pt-2 mt-2 text-left">
                        <input type="checkbox" name="yorumYetki" id="check" />
                    </div>
                </div>
            </div>
            <!--Yorum Yetki-->

            <!--Mesaj Yetki-->
            <div class="col-lg-12 mx-auto border">
                <div class="row">
                    <div class="col-lg-5 border-right pt-3 text-left">
                        <span id="siteayarfont">Mesaj Yetki</span>
                    </div>
                    <div class="col-lg-7 pt-2 mt-2 text-left">
                        <input type="checkbox" name="mesajYetki" id="check" />
                    </div>
                </div>
            </div>
            <!--Mesaj Yetki-->

            <!--Bülten Yetki-->
            <div class="col-lg-12 mx-auto border">
                <div class="row">
                    <div class="col-lg-5 border-right pt-3 text-left">
                        <span id="siteayarfont">Bülten Yetki</span>
                    </div>
                    <div class="col-lg-7 pt-2 mt-2 text-left">
                        <input type="checkbox" name="bultenYetki" id="check" />
                    </div>
                </div>
            </div>
            <!--Bülten Yetki-->

            <!--Haber Yetki-->
            <div class="col-lg-12 mx-auto border">
                <div class="row">
                    <div class="col-lg-5 border-right pt-3 text-left">
                        <span id="siteayarfont">Haber & Duyuru Yetki</span>
                    </div>
                    <div class="col-lg-7 pt-2 mt-2 text-left">
                        <input type="checkbox" name="haberYetki" id="check" />
                    </div>
                </div>
            </div>
            <!--Haber Yetki-->

            <!--Yönetici Yetki-->
            <div class="col-lg-12 mx-auto border">
                <div class="row">
                    <div class="col-lg-5 border-right pt-3 text-left">
                        <span id="siteayarfont">Yönetici Yetki</span>
                    </div>
                    <div class="col-lg-7 pt-2 mt-2 text-left">
                        <input type="checkbox" name="yoneticiYetki" id="check" />
                    </div>
                </div>
            </div>
            <!--Yönetici Yetki-->

            <!--Ayar Yetki-->
            <div class="col-lg-12 mx-auto border">
                <div class="row">
                    <div class="col-lg-5 border-right pt-3 text-left">
                        <span id="siteayarfont">Ayar Yetki</span>
                    </div>
                    <div class="col-lg-7 pt-2 mt-2 text-left">
                        <input type="checkbox" name="ayarYetki" id="check" />
                    </div>
                </div>
            </div>
            <!--Ayar Yetki-->

            <div class="col-lg-12 mx-auto mt-2">
                <input type="submit" name="buton" class="btn btn-info m-1" value="Yönetici Ekle" />
            </div>
        </div>
    </div>
</form>
<?php
              endif;
            }
            //-----------YÖNETİCİ EKLEME BİTTİ------------------




            //-----------YÖNETİCİ GÜNCELLEME  BAŞLADI------------------
            function yonGuncelle($baglanti)
            {
    ?>
<div class="col-lg-12 breadcrumbBack text-left text-muted p-1">
    <?php $this->SayfaNavi($baglanti, "kulayar", "Yönetici Ayarları", "Yönetici Güncelle"); ?>
</div>
<?php

              if ($_POST) :
                //KULLANICI ADI - İD
                $kulad = htmlspecialchars($_POST["kulad"]);
                $yonid = htmlspecialchars($_POST["yonid"]);
                //FORM ELEMANLARI
                $genelYetki = htmlspecialchars($_POST["genelYetki"]);
                $introYetki =     $this->CheckBoxDuzenle("introYetki");
                $galeriYetki =    $this->CheckBoxDuzenle("galeriYetki");
                $videoYetki =     $this->CheckBoxDuzenle("videoYetki");
                $hakkimizYetki =  $this->CheckBoxDuzenle("hakkimizYetki");
                $hizmetlerYetki = $this->CheckBoxDuzenle("hizmetlerYetki");
                $referansYetki =  $this->CheckBoxDuzenle("referansYetki");
                $tasarimYetki =   $this->CheckBoxDuzenle("tasarimYetki");
                $yorumYetki =     $this->CheckBoxDuzenle("yorumYetki");
                $mesajYetki =     $this->CheckBoxDuzenle("mesajYetki");
                $bultenYetki =    $this->CheckBoxDuzenle("bultenYetki");
                $haberYetki =     $this->CheckBoxDuzenle("haberYetki");
                $yoneticiYetki =  $this->CheckBoxDuzenle("yoneticiYetki");
                $ayarYetki =      $this->CheckBoxDuzenle("ayarYetki");
                if (empty($kulad)) :
    ?><script>
BilgiPenceresi("control.php?sayfa=yoneticiguncelle", "BAŞARISIZ", "Alanlar boş geçilemez.", "warning");
</script><?php
                else :
                  $ekle = $baglanti->prepare("update yonetim set 
        kulad=?,
        genelYetki=?,
        introYetki=?,
        galeriYetki=?,
        videoYetki=?,
        hakkimizYetki=?,
        hizmetlerYetki=?,
        referansYetki=?,
        tasarimYetki=?,
        yorumYetki=?,
        mesajYetki=?,
        bultenYetki=?,
        haberYetki=?,
        yoneticiYetki=?,
        ayarYetki=? where id=" . $yonid);
                  //KULLANICI ADI- İD
                  $ekle->bindParam(1, $kulad, PDO::PARAM_STR);
                  //FORM ELEMANLARI
                  $ekle->bindParam(2, $genelYetki, PDO::PARAM_INT);
                  $ekle->bindParam(3, $introYetki, PDO::PARAM_INT);
                  $ekle->bindParam(4, $galeriYetki, PDO::PARAM_INT);
                  $ekle->bindParam(5, $videoYetki, PDO::PARAM_INT);
                  $ekle->bindParam(6, $hakkimizYetki, PDO::PARAM_INT);
                  $ekle->bindParam(7, $hizmetlerYetki, PDO::PARAM_INT);
                  $ekle->bindParam(8, $referansYetki, PDO::PARAM_INT);
                  $ekle->bindParam(9, $tasarimYetki, PDO::PARAM_INT);
                  $ekle->bindParam(10, $yorumYetki, PDO::PARAM_INT);
                  $ekle->bindParam(11, $mesajYetki, PDO::PARAM_INT);
                  $ekle->bindParam(12, $bultenYetki, PDO::PARAM_INT);
                  $ekle->bindParam(13, $haberYetki, PDO::PARAM_INT);
                  $ekle->bindParam(14, $yoneticiYetki, PDO::PARAM_INT);
                  $ekle->bindParam(15, $ayarYetki, PDO::PARAM_INT);
                  $ekle->execute();
                  ?><script>
BilgiPenceresi("control.php?sayfa=yonekle", "BAŞARILI", "Yönetici ayarları güncellendi.", "success");
</script><?php
                endif;
              else :
                $al = parent::sorgum($baglanti, "select * from yonetim where id=" . $_GET["id"], 2);
                $yonson = $al->fetch(PDO::FETCH_ASSOC);
                  ?>
<form action="control.php?sayfa=yoneticiguncelle" method="post">
    <div class="row text-center">
        <div class="col-lg-5 mx-auto mt-3">
            <div class="col-lg-12 mx-auto border">
                <h3 class="text-info">Yönetici Güncelle
                </h3>
            </div>
            <div class="col-lg-12 mx-auto border">
                <div class="row">
                    <div class="col-lg-5 border-right pt-3 text-left">
                        <span id="siteayarfont">Kullanıcı Adı</span>
                    </div>
                    <div class="col-lg-7 p-1">
                        <input type="text" name="kulad" class="form-control" value="<?php echo $yonson["kulad"]; ?>" />
                    </div>
                </div>
            </div>
            <!--Genel Yetki-->
            <div class="col-lg-12 mx-auto border">
                <div class="row">
                    <div class="col-lg-5 border-right pt-3 text-left">
                        <span id="siteayarfont">Genel Yetki</span>
                    </div>
                    <div class="col-lg-7 p-1">
                        <select name="genelYetki" class="form-control p-1">
                            <?php
                    $yetkiler = array(1 => "Tam Yetki", 2 => "Editör Yetki", 3 => "Üye Yetki");
                    foreach ($yetkiler as $key => $deger) :
                      if ($yonson["genelYetki"] == $key) :
                        echo '<option value="' . $key . '" selected="selected">' . $deger . '</option>';
                      else :
                        echo '<option value="' . $key . '">' . $deger . '</option>';
                      endif;
                    endforeach;
                    ?>
                        </select>
                    </div>
                </div>
            </div>
            <!--Genel Yetki-->

            <!--İntro Yetki-->
            <div class="col-lg-12 mx-auto border">
                <div class="row">
                    <div class="col-lg-5 border-right pt-3 text-left">
                        <span id="siteayarfont">İntro Yetki</span>
                    </div>
                    <div class="col-lg-7 pt-2 mt-2 text-left">
                        <?php $this->CheckKontrol("introYetki", $yonson["introYetki"]); ?>
                    </div>
                </div>
            </div>
            <!--İntro Yetki-->

            <!--Galeri Yetki-->
            <div class="col-lg-12 mx-auto border">
                <div class="row">
                    <div class="col-lg-5 border-right pt-3 text-left">
                        <span id="siteayarfont">Galeri Yetki</span>
                    </div>
                    <div class="col-lg-7 pt-2 mt-2 text-left">
                        <?php $this->CheckKontrol("galeriYetki", $yonson["galeriYetki"]); ?>
                    </div>
                </div>
            </div>
            <!--Galeri Yetki-->

            <!--Video Yetki-->
            <div class="col-lg-12 mx-auto border">
                <div class="row">
                    <div class="col-lg-5 border-right pt-3 text-left">
                        <span id="siteayarfont">Video Yetki</span>
                    </div>
                    <div class="col-lg-7 pt-2 mt-2 text-left">
                        <?php $this->CheckKontrol("videoYetki", $yonson["videoYetki"]); ?>
                    </div>
                </div>
            </div>
            <!--Video  Yetki-->

            <!--Hakkımızda Yetki-->
            <div class="col-lg-12 mx-auto border">
                <div class="row">
                    <div class="col-lg-5 border-right pt-3 text-left">
                        <span id="siteayarfont">Hakkımızda Yetki</span>
                    </div>
                    <div class="col-lg-7 pt-2 mt-2 text-left">
                        <?php $this->CheckKontrol("hakkimizYetki", $yonson["hakkimizYetki"]); ?>
                    </div>
                </div>
            </div>
            <!--Hakkımızda Yetki-->

            <!--Hizmetler Yetki-->
            <div class="col-lg-12 mx-auto border">
                <div class="row">
                    <div class="col-lg-5 border-right pt-3 text-left">
                        <span id="siteayarfont">Hizmetler Yetki</span>
                    </div>
                    <div class="col-lg-7 pt-2 mt-2 text-left">
                        <?php $this->CheckKontrol("hizmetlerYetki", $yonson["hizmetlerYetki"]); ?>
                    </div>
                </div>
            </div>
            <!--Hizmetler  Yetki-->

            <!--Referanslar Yetki-->
            <div class="col-lg-12 mx-auto border">
                <div class="row">
                    <div class="col-lg-5 border-right pt-3 text-left">
                        <span id="siteayarfont">Referanslar Yetki</span>
                    </div>
                    <div class="col-lg-7 pt-2 mt-2 text-left">
                        <?php $this->CheckKontrol("referansYetki", $yonson["referansYetki"]); ?>
                    </div>
                </div>
            </div>
            <!--Referanslar  Yetki-->

            <!--Tasarım Yetki-->
            <div class="col-lg-12 mx-auto border">
                <div class="row">
                    <div class="col-lg-5 border-right pt-3 text-left">
                        <span id="siteayarfont">Tasarım Yetki</span>
                    </div>
                    <div class="col-lg-7 pt-2 mt-2 text-left">
                        <?php $this->CheckKontrol("tasarimYetki", $yonson["tasarimYetki"]); ?>
                    </div>
                </div>
            </div>
            <!--Tasarım Yetki-->

            <!--Yorum Yetki-->
            <div class="col-lg-12 mx-auto border">
                <div class="row">
                    <div class="col-lg-5 border-right pt-3 text-left">
                        <span id="siteayarfont">Yorum Yetki</span>
                    </div>
                    <div class="col-lg-7 pt-2 mt-2 text-left">
                        <?php $this->CheckKontrol("yorumYetki", $yonson["yorumYetki"]); ?>
                    </div>
                </div>
            </div>
            <!--Yorum Yetki-->

            <!--Mesaj Yetki-->
            <div class="col-lg-12 mx-auto border">
                <div class="row">
                    <div class="col-lg-5 border-right pt-3 text-left">
                        <span id="siteayarfont">Mesaj Yetki</span>
                    </div>
                    <div class="col-lg-7 pt-2 mt-2 text-left">
                        <?php $this->CheckKontrol("mesajYetki", $yonson["mesajYetki"]); ?>
                    </div>
                </div>
            </div>
            <!--Mesaj Yetki-->

            <!--Bülten Yetki-->
            <div class="col-lg-12 mx-auto border">
                <div class="row">
                    <div class="col-lg-5 border-right pt-3 text-left">
                        <span id="siteayarfont">Bülten Yetki</span>
                    </div>
                    <div class="col-lg-7 pt-2 mt-2 text-left">
                        <?php $this->CheckKontrol("bultenYetki", $yonson["bultenYetki"]); ?>
                    </div>
                </div>
            </div>
            <!--Bülten Yetki-->

            <!--Haber Yetki-->
            <div class="col-lg-12 mx-auto border">
                <div class="row">
                    <div class="col-lg-5 border-right pt-3 text-left">
                        <span id="siteayarfont">Haber & Duyuru Yetki</span>
                    </div>
                    <div class="col-lg-7 pt-2 mt-2 text-left">
                        <?php $this->CheckKontrol("haberYetki", $yonson["haberYetki"]); ?>
                    </div>
                </div>
            </div>
            <!--Haber Yetki-->

            <!--Yönetici Yetki-->
            <div class="col-lg-12 mx-auto border">
                <div class="row">
                    <div class="col-lg-5 border-right pt-3 text-left">
                        <span id="siteayarfont">Yönetici Yetki</span>
                    </div>
                    <div class="col-lg-7 pt-2 mt-2 text-left">
                        <?php $this->CheckKontrol("yoneticiYetki", $yonson["yoneticiYetki"]); ?>
                    </div>
                </div>
            </div>
            <!--Yönetici Yetki-->

            <!--Ayar Yetki-->
            <div class="col-lg-12 mx-auto border">
                <div class="row">
                    <div class="col-lg-5 border-right pt-3 text-left">
                        <span id="siteayarfont">Ayar Yetki</span>
                    </div>
                    <div class="col-lg-7 pt-2 mt-2 text-left">
                        <?php $this->CheckKontrol("ayarYetki", $yonson["ayarYetki"]); ?>
                    </div>
                </div>
            </div>
            <!--Ayar Yetki-->

            <div class="col-lg-12 mx-auto mt-2">
                <input type="hidden" name="yonid" value="<?php echo $yonson["id"];  ?>" />
                <input type="submit" name="buton" class="btn btn-info m-1" value="Yönetici Güncelle" />
            </div>
        </div>
    </div>
</form>
<?php
              endif;
            }
            //-----------YÖNETİCİ GÜNCELLEME BİTTİ------------------












   //----------VERİTABANI BAKIM BAŞLADI-------------------
            function veribakim($db)
            {
              echo '<div class="row text-center">
              <div class="col-lg-12 text-center">';
              if ($_POST) :
                $tablolar = parent::sorgum($db, "SHOW TABLES", 2);
                while ($tabloson = $tablolar->fetch(PDO::FETCH_ASSOC)) :
                  $db->query("REPAIR TABLE " . $tabloson["Tables_in_serappal_kurumsal"]);
                  $db->query("OPTIMIZE TABLE " . $tabloson["Tables_in_serappal_kurumsal"]);
                  echo '<div class="alert alert-success mt-1 col-lg-3 mx-auto"><b>' . $tabloson["Tables_in_serappal_kurumsal"] . "</b> tablosu bakımı başarıyla tamamlandı.</div>";
                endwhile;
                echo '</div>';
                $zaman = date('d/m/Y - H:i');
                $tablolar = parent::sorgum($db, "update ayarlar set bakimzaman='$zaman'", 0);
              else :
                    ?>
<div class="col-lg-6 mx-auto mt-5 ">
    <div class="card card-bordered">
        <div class="card-body">
            <h5 class="title border-bottom">VERİTABANI BAKIM YAP</h5>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <input type="submit" name="buton" value="BAKIMI BAŞLAT" class="btn btn-primary mb-1" />
            </form>
            <?php
                              $zamanbak = parent::sorgum($db, "select bakimzaman from ayarlar", 1);
                              echo '<div class="alert alert-warning mt-1 mx-auto">
                              En son yapılan bakım zamanı: <b>' . $zamanbak["bakimzaman"] . '</b></div>';
                          ?>
        </div>
    </div>
</div>
<?php
              endif;
              echo '</div>';
            }
            //------------VERİTABANI BAKIM BİTTİ---------------


              //----------VERİTABANI YEDEK BAŞLADI-------------------TÜM PROJELERDE KULLANILABİLİR.

              function yedek($db)//YEDEK ANA FONKSİYON BAŞLADI
              {
                echo '<div class="row text-center">
                <div class="col-lg-12 text-center">';
                if ($_POST) :
                      $this->yedekal($db);
                  echo '</div>';
                else :
                      ?>
<div class="col-lg-6 mx-auto mt-5 ">
    <div class="card card-bordered">
        <div class="card-body">
            <h5 class="title border-bottom">VERİTABANI YEDEK AL</h5>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <input type="submit" name="buton" value="YEDEK AL" class="btn btn-primary mb-1" />
            </form>
            <?php
                                $zamanbak = parent::sorgum($db, "select yedekzaman from ayarlar", 1);
                                echo '<div class="alert alert-warning mt-1 mx-auto">
                                En son alınan yedek zamanı: <b>' . $zamanbak["yedekzaman"] . '</b></div>';
                            ?>
        </div>
    </div>
</div>
<?php
               endif;
                echo '</div>';
              }//YEDEK ANA FONKSİYON BİTTİ


              function yedekal($db) {
		
                $tables=array();
                
                $result=parent::sorgum($db,"SHOW TABLES",2);
                while ($tabloson=$result->fetch(PDO::FETCH_ASSOC)) :	
                  $tables[]=$tabloson["Tables_in_serappal_kurumsal"];
                
                endwhile;
                // karakter seti tanımla
                // veritabanlarının içine tek tek gir
                // veritabanlarının verilerini tek tek al
                $return="SET NAMES utf8;";
                
                foreach ($tables as $tablo):
                $veriler=parent::sorgum($db,"SELECT * FROM $tablo",2);
                $numColumns=$veriler->columnCount();
                
                $return.="DROP TABLE IF EXISTS $tablo;";
                
                $olustur=parent::sorgum($db,"SHOW CREATE TABLE $tablo",2);
                $sonuc=$olustur->fetch(PDO::FETCH_ASSOC);
                $return.="\n\n".$sonuc["Create Table"].";\n\n";
                
                      for ($i=0; $i<$numColumns; $i++):
                      
                        while ($row=$veriler->fetch(PDO::FETCH_NUM)):
                        $return.="INSERT INTO $tablo VALUES(";
                          
                            for ($a=0; $a<$numColumns; $a++):	
                      if (isset($row[$a])):  $return.='"'.$row[$a].'"'; else: $return.='""'; endif;	
                      
                      if ($a<($numColumns-1)): $return.=',';  endif;
                                 
                            endfor;
                        $return.=");\n";
                        
                        endwhile;
            
                      endfor;
                
                $return.="\n\n\n";
                endforeach;
                
                $dosyaolustur=fopen('assets/DbYedekleri/yedek-'.date('d.m.Y').'.sql','w+');
                fwrite($dosyaolustur,$return);
                fclose($dosyaolustur);
                
                $zaman=date('d/m/Y - H:i');
                parent::sorgum($db,"update ayarlar set yedekzaman='$zaman'",0);	
                echo '<div class="alert alert-success mt-1  mx-auto">YEDEK BAŞARIYLA ALINDI.</div>';
                
                } // YEDEK İÇİN İŞLEM YAPAN FONKSİYON

                   
          }
        
  ?>