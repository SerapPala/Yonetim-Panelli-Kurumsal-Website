<?php include_once("assets/fonksiyon.php");
function sorgum($vt, $sorgu)
{
    $al=$vt->prepare($sorgu);
    if ($al->execute()):
    return true;
else:
    return false;
endif;
}
        switch($_GET["islem"]):
            case "tasarimguncelle";
                if($_POST):
                    $bolum= $_POST["bolum"];
                    $tercih= $_POST["tercih"];
                   echo sorgum($baglanti,"update tasarim set $bolum=$tercih");
                else:
                    ECHO "HATA VAR";
                endif;
            break;                        
        endswitch;
?>