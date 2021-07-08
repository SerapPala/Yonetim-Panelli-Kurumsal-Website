<?php session_start();
include_once("config/genel.php");
include_once(ARAYUZ_YOL."lib/teknikfonksiyon.php");
$teknik = new teknik;
$teknik->dilKontrol();
$teknik->cacheKontrol(md5($_SERVER["REQUEST_URI"]), 2);
ob_start(); //bu sayfanın daha önce kopyası alınmadıysa yani cachelenmediyse,kopyalamaya nereden başlanacağını gösterir.
include_once(ARAYUZ_YOL."lib/fonksiyon.php");
include_once(ARAYUZ_YOL."lib/tasarim.php");
$sinif = new kurumsal;
$tas = new tasarim;



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="tr">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $sinif->normaltitle; ?></title>
  <meta name="title" content="<?php echo $sinif->metatitle; ?>" />
  <meta name="description" content="<?php echo $sinif->metadesc; ?>" />
  <meta name="keywords" content="<?php echo $sinif->metakey; ?>" />
  <meta name="author" content="<?php echo $sinif->metaauthor; ?>" />
  <meta name="metaowner" content="<?php echo $sinif->metaowner; ?>" />
  <meta name="copyright" content="<?php echo $sinif->metacopy; ?>" />

  <!-- Kütüphaneler -->
  <script src="<?php echo URL; ?>lib/jquery/jquery.min.js"></script>
  <script src="<?php echo URL; ?>lib/jquery/jquery-migrate.min.js"></script>
  <script src="<?php echo URL; ?>lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo URL; ?>lib/easing/easing.min.js"></script>
  <script src="<?php echo URL; ?>lib/superfish/hoverIntent.js"></script>
  <script src="<?php echo URL; ?>lib/superfish/superfish.min.js"></script>
  <script src="<?php echo URL; ?>lib/wow/wow.min.js"></script>
  <script src="<?php echo URL; ?>lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="<?php echo URL; ?>lib/magnific-popup/magnific-popup.min.js"></script>
  <script src="<?php echo URL; ?>lib/sticky/sticky.js"></script>
  <script src="<?php echo URL; ?>js/main.js"></script>
  <!-- Duyuru - Haber Barı için -->
  <script type="text/javascript" src="<?php echo URL; ?>js/jquery.js"></script>
  <script type="text/javascript" src="<?php echo URL; ?>js/jquery.vticker-min.js"></script>
  <script type="text/javascript">
    $(function() {

      $('#news-container1').vTicker({
        speed: 700,
        pause: 4000,
        animation: 'fade',
        mousePause: false,
        showItems: 1
      });
    });
  </script>
  <!-- Duyuru - Haber Barı için -->

  <!-- Fontlar -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">
  <link rel='stylesheet' id='royal_enqueue_Lato-css'  href='https://fonts.googleapis.com/css?family=Lato%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900&#038;ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='royal_enqueue_Droid_Serif-css'  href='https://fonts.googleapis.com/css?family=Droid+Serif%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900&#038;ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='royal_enqueue_Roboto-css'  href='https://fonts.googleapis.com/css?family=Roboto%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900&#038;ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='royal_enqueue_Bitter-css'  href='https://fonts.googleapis.com/css?family=Bitter%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900&#038;ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='royal_enqueue_Droid_Sans-css'  href='https://fonts.googleapis.com/css?family=Droid+Sans%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900&#038;ver=1.0.0' type='text/css' media='all' />
<link rel='stylesheet' id='royal_enqueue_Open_Sans-css'  href='https://fonts.googleapis.com/css?family=Open+Sans%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900&#038;ver=1.0.0' type='text/css' media='all' />

  <!-- Bootstrap stil dosyası -->
  <link href="<?php echo URL; ?>lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!--css-->
  <link href="<?php echo URL; ?>lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo URL; ?>lib/animate/animate.min.css" rel="stylesheet">
  <link href="<?php echo URL; ?>lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?php echo URL; ?>lib/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="<?php echo URL; ?>lib/ionicons/css/ionicons.css" rel="stylesheet">
  <link href="<?php echo URL; ?>lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="<?php echo URL; ?>css/style.php" rel="stylesheet">
  <script>
    $(document).ready(function(e) {

      $('#bultensonuc').hide();

      $("#gonderbtn").click(function() {


        var error = false;

        var form = $("#mailform").find('.form-group');

        form.children('input').each(function() {

          var i = $(this);
          i.css("border-color", "");

          if (i.val() == "") {
            i.css("border-color", "red");
            $('#mesajsonuc').show(500).html("Lütfen tüm alanları doldurun.");
            error = true;
          } else {
            error = false;
            $('#mesajsonuc').text("");
          }

        });

        if (form.children('textarea').val() == "") {
          form.children('textarea').css("border-color", "red");
          $('#mesajsonuc').show(500).html("Lütfen tüm alanları doldurun.");
          error = true;
        } else {
          error = false;
          $('#mesajsonuc').text("");
        }

        if (!error) {


          $.ajax({
            type: "POST",
            url: '<?php echo URL; ?>lib/mail/gonder.php',
            data: $('#mailform').serialize(),
            success: function(donen) {
              $('#mailform').trigger("reset");
              $('#formtutucu').fadeOut(500);
              $('#mesajsonuc').show(500).html(donen);
            },
          });

        }
      });
      
      $("#bultenbtn").click(function() {
        $.ajax({
          type: "POST",
          url: '<?php echo URL; ?>lib/islem.php?islem=bultenislem',
          data: $('#bultenform').serialize(),
          success: function(donen) {
            $('#bultenform').trigger("reset");
            $('#bultentutucu').fadeOut();
            $('#bultensonuc').html(donen).fadeIn();
          },
        });
      });
    });
  </script>

</head>


<body id="body" style="overflow-x: hidden">

  <!-- TOP BAR -->

  <section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">

      <div class="contact-info float-left">
        <i class="fa fa-envelope-o"></i><a href="mailto:<?php echo $sinif->mailadres; ?>"><?php echo $sinif->mailadres; ?></a>
        <i class="fa fa-phone"></i><?php echo $sinif->telno; ?>

      </div>
      <div class="social-links float-right">
        <a href="<?php echo $sinif->twit; ?>" class="twitter"><i class="fa fa-twitter"></i></a>
        <a href="<?php echo $sinif->face; ?>" class="facebook"><i class="fa fa-facebook"></i></a>
        <a href="<?php echo $sinif->inst; ?>" class="instagram"><i class="fa fa-instagram"></i></a>

        <a href="index.php?dil=tr" class="twitter">TR</a>
        <a href="index.php?dil=en" class="twitter">EN</a>
      </div>
    </div>

  </section>

  <!-- header -->
  <header id="header">
    <div class="container">
      <div id="logo" class="pull-left">
        <!--<h1><a href="#body" class="scrollto"><?php echo $sinif->logoyazisi; ?></h1>-->
        <img src="img/logo.png"/>
      </div>
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <?php $sinif->linkler($baglanti); ?>
        </ul>
      </nav>
    </div>
  </header>


  <!-- İNTRO -->
  <section id="intro">
    <div class="intro-content">
      <h2><?php echo $sinif->slogan; ?></h2>
    </div>
    <div id="intro-carousel" class="owl-carousel">
     <?php $sinif->introbak($baglanti); ?> 
    </div>
  </section>
  <!-- İNTRO -->


  






  
  <!-- ana main -->
  <main id="main">





    <!--TÜM BÖLÜMLERİN SIRALAMA KODLARI-->
    <?php $tas->TasarimBolumleri($baglanti); ?>
    <!--TÜM BÖLÜMLERİN SIRALAMA KODLARI-->


   <!-- iletişim -->

    <section id="iletisim" class="wow fadeInUp">

      <div class="container">


        <div class="section-header">
          <h2><?php echo $sinif->iletisimUstBaslik; ?></h2>
          <p><?php echo $sinif->iletisimbaslik; ?></p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3><?php echo $sinif->adresBilgi; ?></h3>
              <address><?php echo $sinif->adress; ?></address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3><?php echo $sinif->telefonBilgi; ?></h3>
              <p><a href="<?php echo $sinif->telno; ?>"><?php echo $sinif->telno; ?></a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3><?php echo $sinif->mailBilgiKendi; ?></h3>
              <p><a href="<?php echo $sinif->mailadres; ?>"><?php echo $sinif->mailadres; ?></a></p>
            </div>
          </div>
          </div>
    </section>


  </main>




  <!-- FOOTER BURASI -->
  <footer id="footer">

    <div class="container">
      <div class="row">

        <div class="col-lg-4">


        </div>


        <div class="col-lg-4">
          <div class="copyright">
            <?php echo $sinif->footer; ?>
            &copy; Copyright <strong><?php echo $sinif->metacopy; ?></strong>
          </div>
          <div class="credits">
            <meta name="owner" content="<?php echo $sinif->metaowner; ?>" />
          </div>
        </div>
      </div>
  </footer>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>



</body>

</html>

<?php $teknik->cacheOlustur(md5($_SERVER["REQUEST_URI"])); ?>