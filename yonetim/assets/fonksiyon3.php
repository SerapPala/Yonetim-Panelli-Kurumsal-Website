<?php
class yonetim3 extends yonetim
{
   protected $tercihArray = array("Açık", "Kapalı");
   private $veriler = array();
   protected $idler = array();
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

					<div class="col-lg-6 pt-3 border-right text-danger border-bottom text-right">HABER</div><div class="col-lg-6 p-2 border-bottom" >';		
            self::tasarimGetir($kayitbilgial["habertercih"],"habertercih",1,2);


         
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
                  echo '<div class="col-lg-4 ">
          <div class="row border font-weight-bold p-2 mt-3">

              <div class="col-lg-9">
              ' . $sonuclar["mail"] . '
              </div>
              <div class="col-lg-3 p-0 text-right">    
                 <a href="control.php?sayfa=bulten&icislem=sil&id='.$sonuclar["id"].' "class="ti-trash text-danger mr-2" style="font-size:20px;"></a>
                 <a href="control.php?sayfa=bulten&icislem=guncelle&id='.$sonuclar["id"].' "    class="ti-reload text-success" style="font-size:20px;"></a>
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
                  parent::sorgum($vt, "update bulten set mail='$mail' where id=$kayitidsi", 0);

                  ?><script>
          BilgiPenceresi("control.php?sayfa=bulten", "BAŞARILI", "Mail adresi başarıyla güncellendi", "success");
        </script><?php
                endif;
              endif;
              echo '</div>';
            }
            //bülten mail guncelleme bitti
            //bülten bakım işlemleri-aynı olan maillerin silinmesini sağlamak için.
  //bülten bakım işlemleri-aynı olan maillerin silinmesini sağlamak için.
  function bakim($db)
  {
 
    $deger = parent::sorgum($db, "select max(id) as id from bulten GROUP BY mail HAVING COUNT(*) > 1", 2);
 
    //$deger=parent::sorgum($db,"SELECT DISTINCT mail from bulten",2);
 
    if ($deger->rowCount() != 0) :
 
      while ($d = $deger->fetch(PDO::FETCH_ASSOC)) :
 
        $this->idller = $d["id"];
 
 
      endwhile;
 
      parent::sorgum($db, "Delete from bulten where ID IN (" . implode(",", $this->idler) . ")");
 
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


            //----------İSTATİSTİK  BAR BAŞLADI-----------------
            function istatistikbar($vt)
            {

              echo '<div class="row w-100">

					<div class="col-lg-3 col-md-6  mt-2">
					<div class="card text-center border border-dark" >
					<div class="card-body">
					<h5 class="card-title  p-2 bg-dark text-white "> INTRO</h5>	
					<p class="card-text"><h3><kbd class="text-warning">
          ' . parent::sorgum($vt, "select * from intro", 2)->rowCount() . '
          </kbd></h3></p>   
					</div>
					</div>
					</div>

          <div class="col-lg-3 col-md-6  mt-2">
					<div class="card text-center border border-dark" >
					<div class="card-body">
					<h5 class="card-title  p-2 bg-dark text-white "> HABERLER</h5>	
					<p class="card-text"><h3><kbd class="text-warning">
          ' . parent::sorgum($vt, "select * from haberler", 2)->rowCount() . '
          </kbd></h3></p>   
					</div>
					</div>
					</div>
          
					<div class="col-lg-3 col-md-6  mt-2">
					<div class="card text-center border border-dark" >
					<div class="card-body">
					<h5 class="card-title  p-2 bg-dark text-white ">GALERİ</h5>	
					<p class="card-text"><h3><kbd class="text-warning">
          ' . parent::sorgum($vt, "select * from galerimiz", 2)->rowCount() . '
          </kbd></h3></p>   
					</div>
					</div>
					</div>

          <div class="col-lg-3 col-md-6  mt-2">
					<div class="card text-center border border-dark" >
					<div class="card-body">
					<h5 class="card-title  p-2 bg-dark text-white ">VİDEO</h5>	
					<p class="card-text"><h3><kbd class="text-warning">
          ' . parent::sorgum($vt, "select * from videolar", 2)->rowCount() . '
          </kbd></h3></p>   
					</div>
					</div>
					</div>

          <div class="col-lg-3 col-md-6  mt-2">
					<div class="card text-center border border-dark" >
					<div class="card-body">
					<h5 class="card-title  p-2 bg-dark text-white ">HİZMETLER</h5>	
					<p class="card-text"><h3><kbd class="text-warning">
          ' . parent::sorgum($vt, "select * from hizmetler", 2)->rowCount() . '
          </kbd></h3></p>   
					</div>
					</div>
					</div>


          <div class="col-lg-3 col-md-6  mt-2">
					<div class="card text-center border border-dark" >
					<div class="card-body">
					<h5 class="card-title  p-2 bg-dark text-white ">REFERANSLAR</h5>	
					<p class="card-text"><h3><kbd class="text-warning">
          ' . parent::sorgum($vt, "select * from referanslar", 2)->rowCount() . '
          </kbd></h3></p>   
					</div>
					</div>
					</div>

          <div class="col-lg-3 col-md-6  mt-2">
					<div class="card text-center border border-dark" >
					<div class="card-body">
					<h5 class="card-title  p-2 bg-dark text-white ">YORUMLAR</h5>	
					<p class="card-text"><h3><kbd class="text-warning">
          ' . parent::sorgum($vt, "select * from yorumlar", 2)->rowCount() . '
          </kbd></h3></p>   
					</div>
					</div>
					</div>
          
          <div class="col-lg-3 col-md-6  mt-2">
					<div class="card text-center border border-dark" >
					<div class="card-body">
					<h5 class="card-title  p-2 bg-dark text-white ">BÜLTEN</h5>	
					<p class="card-text"><h3><kbd class="text-warning">
          ' . parent::sorgum($vt, "select * from bulten", 2)->rowCount() . '
          </kbd></h3></p>   
					</div>
					</div>
					</div>
		</div>';
            }
            //----------İSTATİSTİK  BAR BİTTİ-------------
function mailgonderme() {	
	
		$sablonlar=parent::sorgum("select * from mail_sablonlar",2);
		
					
			while ($sonsablonlar=$sablonlar->fetch(PDO::FETCH_ASSOC)) :	
				$sablonsecenekler.='<option value="'.$sonsablonlar["id"].'" 
	data-baslik="'.$sonsablonlar["baslik"].'"
	data-icerik="'.$sonsablonlar["icerik"].'">'.$sonsablonlar["baslik"].'</option>';
			endwhile;

			
	?>
			<div class="row text-center">
			
			<div class="col-lg-12 border-bottom sayfabasliklari"><h5 class="float-left mt-3 mb-2">MAİL İŞLEMLERİ</h5></div>
				</div>
			
			<div class="row text-center">
			
			<div class="col-xl-10 col-lg-10 col-md-10 mx-auto col-sm-12 mailincercevesi mt-2">
					<div class="row text-center" >
							<div class="col-xl-12 col-lg-12 col-md-12 mx-auto col-sm-12 baslik" >
									<div class="row">
										<div class="col-xl-4 col-lg-4 col-md-4 mx-auto col-sm-12 text-left borderright">
												<div class="row">
												<div class="col-xl-5 col-lg-5 col-md-5 mx-auto col-sm-12 p-2 pt-3">
												<i class="ti-plus mr-2 text-success font-weight-bold" id="sablonekle"></i><span class="baslikrenk">ŞABLONLAR</span>
												</div>
												
												<div class="col-xl-7 col-lg-7 col-md-7 mx-auto col-sm-12" id="sablonduzensecme">
												<select name="sablonduzen" class="form-control p-0 mt-2">
												
												
												
												<option value="0">Düzen için Seç</option>
												
												<?php 
							echo $sablonsecenekler;
												?>
												</select>
												</div>										
											</div>
										</div>
										
										<div class="col-xl-4 col-lg-4 col-md-4 mx-auto col-sm-12 borderright">
												<div class="row">
												<div class="col-xl-5 col-lg-5 col-md-5 mx-auto col-sm-12 p-2 pt-3  baslikrenk">ŞABLON SEÇ
												</div>
												
												<div class="col-xl-7 col-lg-7 col-md-7 mx-auto col-sm-12" id="sablonsecme">
												<select name="sablonsec" class="form-control p-0 mt-2">
												<option value="0">Şablon Seç</option>
												
																<?php 
							echo $sablonsecenekler;
												?>
												</select>
												</div>										
											</div>
										
										
										</div>
										<div class="col-xl-4 col-lg-4 col-md-4 mx-auto col-sm-12 ">
										
										
											<div class="row text-right">
												<div class="col-xl-6 col-lg-6 col-md-6 mx-auto col-sm-12 p-2 m-1">
												<form id="toplumailyuklemeform">
												<input type="file" name="dosya">
												</div>
												
												<div class="col-xl-6 col-lg-6 col-md-6 mx-auto col-sm-12 ">
												<input type="button" class="btn btn-success btn-sm mt-2" value="YÜKLE" id ="mailyukle">
												</form>
												</div>										
											</div>
										
										
										
										</div>
									
									
									</div>
							
							</div>
<div class="col-xl-12 col-lg-12 col-md-12 mx-auto col-sm-12  borderbot text-center" id="sablonduzenleme"></div>
							
							<div class="col-xl-6 col-lg-6 col-md-6 mx-auto col-sm-12 borderright borderbot">
							<div class="row">
							<div class="col-xl-12 col-lg-12 col-md-12 mx-auto col-sm-12 text-center p-2 borderbot">
							<span class="baslikrenk">MAİLLER</span>
							</div>
							<div class="col-xl-12 col-lg-12 col-md-12 mx-auto col-sm-12 text-center">
								<form id="mailgondermeform">							
							
							<textarea name="mailler" rows="10" class="form-control p-2 mb-1 mt-1" placeholder="Mailleri giriniz"></textarea>
							</div>
							
							</div>
							
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 mx-auto col-sm-12 borderbot">
							
							<div class="row">
							<div class="col-xl-12 col-lg-12 col-md-12 mx-auto col-sm-12 text-center p-2 borderbot">
								<div class="row">
								<div class="col-xl-4 col-lg-4 col-md-4 mx-auto col-sm-12 pt-2">
								<span class="baslikrenk">MAİL BAŞLIK</span>
								</div>
								
								<div class="col-xl-8 col-lg-8 col-md-8 mx-auto col-sm-12 ">
								<input type="text" class="form-control" name="baslik" placeholder="Mail Başlığını giriniz" >
								</div>
								</div>
							</div>
							
							<div class="col-xl-12 col-lg-12 col-md-12 mx-auto col-sm-12 text-center p-2 borderbot">
							<span class="baslikrenk">MAİL İÇERİK</span>
							</div>
							<div class="col-xl-12 col-lg-12 col-md-12 mx-auto col-sm-12 text-center">
							<textarea name="mail" rows="7" class="form-control p-2 mb-1 mt-1" placeholder="Mail içeriğini yazınız"></textarea>
							</div>
							
							
							</div>
					
					</div>
					
					<div class="col-xl-4 col-lg-4 col-md-4 mx-auto col-sm-12 text-center ">
						<div class="row">
							<div class="col-xl-2 col-lg-2 col-md-2 mx-auto col-sm-12 text-center p-2" id="load">
							
							</div>
							<div class="col-xl-10 col-lg-10 col-md-10 mx-auto col-sm-12 text-center" id="bilgi">
							
							</div>
						
						</div>
					
					
					</div>	
					
			<div class="col-xl-4 col-lg-4 col-md-4 mx-auto col-sm-12 text-center ">
					<input type="button" id="mailbtn" class="btn btn-primary mt-1 mb-1" value="GÖNDER">
						</form>
					</div>	
					
						<div class="col-xl-4 col-lg-4 col-md-4 mx-auto col-sm-12 text-center ">
											<div class="row ">
							<div class="col-xl-4 col-lg-4 col-md-4 mx-auto col-sm-12 text-center mt-2" id="durdurunbutonu">
														
							
							</div>
								<div class="col-xl-4 col-lg-4 col-md-4 mx-auto col-sm-12 text-center m-1" >
								<select name="zamansec" class="form-control p-0 mt-2">
								<option value="10000">10</option>
								<option value="20000">20</option>
								<option value="30000">30</option>
								<option value="45000">45</option>
								<option value="60000">60</option>							
									</select>
							
							</div>
								<div class="col-xl-4 col-lg-4 col-md-4 mx-auto col-sm-12 text-center mt-2">
								<input type="button" class="btn btn-dark btn-sm" value="ZAMANLI" id="zamanlibtn">
							
							</div>
							
							</div>
						
						</div>
					
					</div>	
					
			</div>
			
			</div>
			
			
		
			<?php
			
			
			
				
		} 
          }
        
  ?>

          
        
