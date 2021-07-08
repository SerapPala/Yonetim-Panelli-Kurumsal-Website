<?php include_once("../config/genel.php");
include_once "assets/fonksiyon.php";
$yonetim = new yonetim();
$yonetim->DahilEt([
    'fonksiyon2' => 'yonetim2',
    'fonksiyon3' => 'yonetim3',
    'yetkikontrol' => 'yetkiKontrol',
]);
$yonetim->kontrolet('cot');
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <title>Web Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="<?php echo YONETİM_URL; ?>assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="<?php echo YONETİM_URL; ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo YONETİM_URL; ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo YONETİM_URL; ?>assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo YONETİM_URL; ?>assets/css/metisMenu.css">
    <link rel="stylesheet" href="<?php echo YONETİM_URL; ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo YONETİM_URL; ?>assets/css/slicknav.min.css">
    <link rel="stylesheet" href="<?php echo YONETİM_URL; ?>assets/css/typography.css">
    <link rel="stylesheet" href="<?php echo YONETİM_URL; ?>assets/css/default-css.css">
    <link rel="stylesheet" href="<?php echo YONETİM_URL; ?>assets/css/styles.css">
    <link rel="stylesheet" href="<?php echo YONETİM_URL; ?>assets/css/responsive.css">
    <script src="<?php echo YONETİM_URL; ?>assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <!--JQERY-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!--CKEDITOR-->
    <script src="https://cdn.ckeditor.com/ckeditor5/12.3.1/classic/ckeditor.js"></script>
    <!--SWEET ALERT-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?php echo YONETİM_URL; ?>assets/js/jscolor.js"></script>
    <script src="check/dist/js/bootstrap-checkbox.js" defer></script>
    <script type="text/javascript">
    function BilgiPenceresi(linkAdres, sonucbaslik, sonucmetin, sonuctur) {
        swal(sonucbaslik, sonucmetin, sonuctur, {
                buttons: {
                    catch: {
                        text: "KAPAT",
                        value: "tamam",
                    }
                },
            })
            .then((value) => {
                if (value == "tamam") {
                    window.location.href = linkAdres;
                }
            });
    }

    function silmedenSor(gidilecekLink) {
        swal({
                title: "Silmek istediğine emin misin?",
                text: "Silinen kayıt geri alınamaz.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = gidilecekLink;
                } else {
                    swal({
                        title: "Silme işleminden vazgeçtiniz",
                        icon: "warning",
                    });
                }
            });
    }
	</script>
</head>

<body>
    <div class="page-container">
        <!--/////////////////////////////////////SIDEBAR MENU BAŞLADI///////////////////////////-->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a class="" href="control.php">
                        WEB MANAGER
                        <!--<img src="assets/images/logo/logo.png" alt="logo" />-->
                    </a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">

                            <?php $yonetim->yetkiKontrol->LinkKontrol(); ?>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!--/////////////////////////////////////SIDEBAR MENU BİTTİ///////////////////////////-->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profil ayarlar çıkıs -->
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right  " style="max-height:40px;">
                            <h4 class="user-name dropdown-toggle " data-toggle="dropdown">
                                <i class="fa fa-user mr-2"></i>
                                <?php echo $yonetim->kuladial($baglanti); ?>
                                <i class="fa fa-angle-down"></i>
                            </h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="control.php?sayfa=ayarlar"
                                    disabled="disabled">Ayarlar</a>
                                <a class="dropdown-item" href="control.php?sayfa=cikis">Çıkış</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- header area end -->
            <!-- page title area start -->
            <!-- page title area end -->
            <div class="main-content-inner">
                <!-- sales report area start -->
                <div class="row">
                    <div class="col-lg-12 mt-2 bg-white text-center" style="min-height:500px;">

                        <?php
                        @$sayfa = $_GET['sayfa'];
                        switch ($sayfa):
                            case 'siteayar':
                                $yonetim->yetkiKontrol->BolumKontrol(
                                    'ayarYetki'
                                );
                                $yonetim->siteayar($baglanti);
                                break;


                                case 'cikis':
                                $yonetim->yetkiKontrol->BolumKontrol(
                                    'ayarYetki'
                                );
                                $yonetim->cikis($baglanti);
                                break;
                          

                            //-------------İNTRO BAŞLANGIÇ-----------
                            case 'introayar':
                                $yonetim->yetkiKontrol->BolumKontrol(
                                    'introYetki'
                                );
                                $yonetim->introayar($baglanti);
                                break;
                            case 'introresimguncelle':
                                $yonetim->yetkiKontrol->BolumKontrol(
                                    'introYetki'
                                );
                                $yonetim->introresimguncelleme($baglanti);
                                break;
                            case 'introresimsil':
                                $yonetim->yetkiKontrol->BolumKontrol(
                                    'introYetki'
                                );
                                $yonetim->introsil($baglanti);
                                break;
                            case 'introresimekle':
                                $yonetim->introresimekleme($baglanti);
                                break;
                            //------------İNTRO BİTİŞ--------------

                            //--------------GALERİ BAŞLANGIÇ-------
                            case 'galeriayar':
                                $yonetim->yetkiKontrol->BolumKontrol(
                                    'galeriYetki'
                                );
                                $yonetim->galeriayar($baglanti);
                                break;
                            case 'galeriguncelle':
                                $yonetim->yetkiKontrol->BolumKontrol(
                                    'galeriYetki'
                                );
                                $yonetim->galeriguncelleme($baglanti);
                                break;
                            case 'galerisil':
                                $yonetim->yetkiKontrol->BolumKontrol(
                                    'galeriYetki'
                                );
                                $yonetim->galerisil($baglanti);
                                break;
                            case 'galeriekle':
                                $yonetim->yetkiKontrol->BolumKontrol(
                                    'galeriYetki'
                                );
                                $yonetim->galeriekleme($baglanti);
                                break;
                            //--------------GALERİ BİTİŞ---------

                            //--------------VİDEOLAR BAŞLANGIÇ-------
                            case 'videolar':
                                $yonetim->yetkiKontrol->BolumKontrol(
                                    'videoYetki'
                                );
                                $yonetim->videolar($baglanti);
                                break;
                            case 'videoguncelle':
                                $yonetim->yetkiKontrol->BolumKontrol(
                                    'videoYetki'
                                );
                                $yonetim->videguncelleme($baglanti);
                                break;
                            case 'videosil':
                                $yonetim->yetkiKontrol->BolumKontrol(
                                    'videoYetki'
                                );
                                $yonetim->videosil($baglanti);
                                break;
                            case 'videoekle':
                                $yonetim->yetkiKontrol->BolumKontrol(
                                    'videoYetki'
                                );
                                $yonetim->videoekleme($baglanti);
                                break;
                            //--------------VİDEOLAR BİTİŞ---------

                            //--------------HAKKIMIZDA BAŞLANGIÇ-----
                            case 'hakkimiz':
                                $yonetim->yetkiKontrol->BolumKontrol(
                                    'hakkimizYetki'
                                );
                                $yonetim->hakkimizda($baglanti);
                                break;
                            //--------------HAKKIMIZDA BİTİŞ-----

                            //--------------HİZMETLER BAŞLANGIÇ-----
                            case 'hizmetler':
                                $yonetim->yetkiKontrol->BolumKontrol(
                                    'hizmetlerYetki'
                                );
                                $yonetim->hizmetlerhepsi($baglanti);
                                break;
                            case 'hizmetguncelle':
                                $yonetim->yetkiKontrol->BolumKontrol(
                                    'hizmetlerYetki'
                                );
                                $yonetim->hizmetguncelleme($baglanti);
                                break;
                            case 'hizmetsil':
                                $yonetim->yetkiKontrol->BolumKontrol(
                                    'hizmetlerYetki'
                                );
                                $yonetim->hizmetsil($baglanti);
                                break;
                            case 'hizmetekle':
                                $yonetim->yetkiKontrol->BolumKontrol(
                                    'hizmetlerYetki'
                                );
                                $yonetim->hizmetekleme($baglanti);
                                break;
                            //--------------HİZMETLER BİTİŞ-----

                            //--------------REFERANSLAR BAŞLANGIÇ-----
                            case 'ref':
                                $yonetim->yetkiKontrol->BolumKontrol(
                                    'referansYetki'
                                );
                                $yonetim->referanslarhepsi($baglanti);
                                break;
                            case 'refsil':
                                $yonetim->yetkiKontrol->BolumKontrol(
                                    'referansYetki'
                                );
                                $yonetim->refsil($baglanti);
                                break;
                            case 'refekle':
                                $yonetim->yetkiKontrol->BolumKontrol(
                                    'referansYetki'
                                );
                                $yonetim->refekleme($baglanti);
                                break;
                            //--------------REFERANSLAR BİTİŞ-----

                            //--------------YORUMLAR BAŞLANGIÇ-----
                            case 'yorumlar':
                                $yonetim->yetkiKontrol->BolumKontrol(
                                    'yorumYetki'
                                );
                                $yonetim->yorumlarhepsi($baglanti);
                                break;
                            case 'yorumlarguncelle':
                                $yonetim->yetkiKontrol->BolumKontrol(
                                    'yorumYetki'
                                );
                                $yonetim->yorumlarguncelleme($baglanti);
                                break;
                            case 'yorumlarsil':
                                $yonetim->yetkiKontrol->BolumKontrol(
                                    'yorumYetki'
                                );
                                $yonetim->yorumlarsil($baglanti);
                                break;
                            case 'yorumlarekle':
                                $yonetim->yetkiKontrol->BolumKontrol(
                                    'yorumYetki'
                                );
                                $yonetim->yorumlarekleme($baglanti);
                                break;
                            //--------------YORUMLAR BİTİŞ-----

                            //--------------DUYURU - HABER BARI BAŞLANGIÇ-----
                            case 'haberler':
                                $yonetim->yetkiKontrol->BolumKontrol(
                                    'haberYetki'
                                );
                                $yonetim->haberler($baglanti);
                                break;
                            case 'haberguncelle':
                                $yonetim->yetkiKontrol->BolumKontrol(
                                    'haberYetki'
                                );
                                $yonetim->haberguncelleme($baglanti);
                                break;
                            case 'habersil':
                                $yonetim->yetkiKontrol->BolumKontrol(
                                    'haberYetki'
                                );
                                $yonetim->habersil($baglanti);
                                break;
                            case 'haberekle':
                                $yonetim->yetkiKontrol->BolumKontrol(
                                    'haberYetki'
                                );
                                $yonetim->haberekleme($baglanti);
                                break;
                            //--------------DUYURU - HABER BARI BİTİŞ-----


                            //--------------KULLANICILARIN KENDİ AYARLARI  BAŞLANGIÇ----
                            case 'ayarlar':
                                $yonetim->yonetim2->ayarlar($baglanti);
                                break;

                            //--------------KULLANICILARIN KENDİ AYARLARI  BİTİŞ----

                           //--------------YÖNETİCİ AYAR  BAŞLANGIÇ----

                            case 'kulayar':
                                $yonetim->yetkiKontrol->BolumKontrol(
                                    'ayarYetki'
                                );
                                $yonetim->yonetim2->kullistele($baglanti);
                                break;
                            case 'yonsil':
                                $yonetim->yetkiKontrol->BolumKontrol(
                                    'yoneticiYetki'
                                );
                                $yonetim->yonetim2->yonsil($baglanti,$_GET["id"]);
                                break;
                            case 'yonekle':
                                $yonetim->yetkiKontrol->BolumKontrol(
                                    'yoneticiYetki'
                                );
                                $yonetim->yonetim2->yonekle($baglanti);
                                break;
                            case 'yoneticiguncelle':
                                $yonetim->yetkiKontrol->BolumKontrol(
                                    'yoneticiYetki'
                                );
                                $yonetim->yonetim2->yonGuncelle($baglanti);
                                break;
                            //--------------YÖNETİCİ AYAR BİTİŞ----

                            //--------------VERİTABANI BAKIM  BAŞLANGIÇ----
                            case 'bakim':
                                $yonetim->yetkiKontrol->BolumKontrol(
                                    'ayarYetki'
                                );
                                $yonetim->yonetim2->veribakim($baglanti);
                                break;
                            //--------------VERİTABANI BAKIM BİTİŞ----

                            //--------------VERİTABANI YEDEK  BAŞLANGIÇ----
                            case 'yedek':
                                $yonetim->yetkiKontrol->BolumKontrol(
                                    'ayarYetki'
                                );
                                $yonetim->yonetim2->yedek($baglanti);
                                break;
                            //--------------VERİTABANI YEDEK BİTİŞ----

                            //--------------TASARIM AYAR BAŞLANGIÇ----
                            case 'tas':
                                $yonetim->yetkiKontrol->BolumKontrol(
                                    'tasarimYetki'
                                );
                                $yonetim->yonetim3->tasarimYonetim($baglanti);
                                break;
                            case 'tasarimguncelle':
                                $yonetim->yetkiKontrol->BolumKontrol('tasarimYetki');
                                $yonetim->yonetim3->tasarimguncelleme(
                                    $baglanti
                                );
                                break;
                                case 'tasarimrenkler':
                                    $yonetim->yetkiKontrol->BolumKontrol('tasarimYetki');
                                    $yonetim->yonetim3->tasarimrenkguncelleme(
                                        $baglanti
                                    );
                                    break;
                            //--------------TASARIM AYAR  BİTİŞ----

                            //--------------LİNKLER BAŞLANGIÇ-----
                            case 'linkayar':
                                $yonetim->yetkiKontrol->BolumKontrol(
                                    'ayarYetki'
                                );
                                $yonetim->yonetim3->linkayar($baglanti);
                                break;
                            case 'linkguncelle':
                                $yonetim->yetkiKontrol->BolumKontrol(
                                    'ayarYetki'
                                );
                                $yonetim->yonetim3->linkguncelleme($baglanti);
                                break;
                            case 'linksil':
                                $yonetim->yetkiKontrol->BolumKontrol(
                                    'ayarYetki'
                                );
                                $yonetim->yonetim3->linksil($baglanti);
                                break;
                            case 'linkekle':
                                $yonetim->yetkiKontrol->BolumKontrol(
                                    'ayarYetki'
                                );
                                $yonetim->yonetim3->linkekleme($baglanti);
                                break;
                            //--------------LİNKLER BİTİŞ-----

                            //--------------BÜLTENE KAYIT BAŞLANGIÇ-----
                            case 'bulten':
                                $yonetim->yetkiKontrol->BolumKontrol(
                                    'bultenYetki'
                                );
                                $yonetim->yonetim3->bulten($baglanti);
                                break;
                            //--------------BÜLTENE KAYIT BİTİŞ-----
                            default:
                                if ($yonetim->yetkiKontrol->genelYetki == 1):
                                    $yonetim->yonetim3->istatistikbar(
                                        $baglanti
                                    );
                                elseif (
                                    $yonetim->yetkiKontrol->genelYetki == 2
                                ):
                                    $yonetim->introayar($baglanti);
                                elseif (
                                    $yonetim->yetkiKontrol->genelYetki == 3
                                ):
                                    $yonetim->yorumlarhepsi($baglanti);
                                endif;
                        endswitch;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo YONETİM_URL; ?>assets/js/vendor/jquery-2.2.4.min.js"></script>
    <script src="<?php echo YONETİM_URL; ?>assets/js/popper.min.js"></script>
    <script src="<?php echo YONETİM_URL; ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo YONETİM_URL; ?>assets/js/owl.carousel.min.js"></script>
    <script src="<?php echo YONETİM_URL; ?>assets/js/metisMenu.min.js"></script>
    <script src="<?php echo YONETİM_URL; ?>assets/js/jquery.slimscroll.min.js"></script>
    <script src="<?php echo YONETİM_URL; ?>assets/js/jquery.slicknav.min.js"></script>
    <script src="<?php echo YONETİM_URL; ?>assets/js/plugins.js"></script>
    <script src="<?php echo YONETİM_URL; ?>assets/js/scripts.js"></script>
    <!--TASARIM AÇIK KAPALI YAPILDIĞINDA ALERT ;-->
    <script src="<?php echo YONETİM_URL; ?>assets/js/notify.js"></script>
</body>
</html>