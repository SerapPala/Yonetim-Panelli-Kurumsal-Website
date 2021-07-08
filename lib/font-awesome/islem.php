<?php 
try {
    $baglanti = new PDO("mysql:host=localhost;dbname=serappal_kurumsal;charset=utf8", "serappal_serap", "serap2828"); 
    
    $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

} catch (PDOException $e) {

    die($e->getMessage()); 
}

@$hareket=$_GET["islem"];

switch($hareket):

case "bultenislem":

    $gelenmail=htmlspecialchars(strip_tags($_POST["mail"]));

    if(!$_POST):

        echo "Posttan gelmiyosun";

    else:
        //girilen adresin gerçekten mail olup olmadığı
        //boş olup olmaması
       $sunucu=substr($gelenmail,strpos($gelenmail,'@')+1);

            $error=array();
            getmxrr($sunucu,$error);

            if(count($error)>0):
                        //diğer kontroller ve veritabanı işlemi
                        //gelen mailin daha önce kayıt edilip edilmediğini kontrol edebilirim.

                        $kayiet=$baglanti->prepare("insert into bulten (mail) VALUES ('$gelenmail')");
                        $kayiet->execute();

            echo '<div class="alert alert-success mt-2">Başarıyla Kayıt Olundu.<br>Teşekkür Ederim.</div>';

            else:
                echo '<div class="alert alert-danger mt-2">Girilen Adres Geçersiz</div>';


            endif;
    endif;

break;

endswitch;


?>