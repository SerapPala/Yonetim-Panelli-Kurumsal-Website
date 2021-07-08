<?php

//DB AYARLAR
define ("DB_HOST", "localhost");
define ("DB_NAME", "serappal_kurumsal");
define ("DB_KULAD", "root");
define ("DB_SIFRE", "serap2828");


//GENEL AYARLAR
define ("URL", "http://localhost/PROJELER/kurumsalsite/OnePageT/");
define ("YONETİM_URL", "http://localhost/PROJELER/kurumsalsite/OnePageT/yonetim/");
define ("RESIMYOL", "hhttp://localhost/PROJELER/kurumsalsite/OnePageT/img/");

define ("DOCUMENT", $_SERVER["DOCUMENT_ROOT"]);
define ("ARAYUZ_YOL",DOCUMENT."/PROJELER/kurumsalsite/OnePageT/");
define ("YONETİM_YOL",DOCUMENT."/PROJELER/kurumsalsite/OnePageT/yonetim/");

try {
    $baglanti = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", DB_KULAD,DB_SIFRE); 
    $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

} catch (PDOException $e) {
    die($e->getMessage()); 
}

?>