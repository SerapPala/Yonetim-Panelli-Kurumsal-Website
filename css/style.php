<?php 
include_once("../config/genel.php");
class tasarimrenklerim extends PDO {

    function __construct()
    { //ayarlar geliyor.

        //Hatayı yakalayabilmem için try catch kullanıyorum.
        try {
            $baglanti = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", DB_KULAD,DB_SIFRE); 
         
            $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Artık hata yakalamaya çalışıyorum.Herhangi bir hata olduğunda error u yakalayabilmek içinonu try catch bloğu arasında yazarak yakalamaya çalışıyorum.

        } catch (PDOException $e) {

            die($e->getMessage()); //die yani bir hata var ise
        }
        $ayarcek = $baglanti->prepare("select * from tasarim");
	$ayarcek->execute();
	$sorguson=$ayarcek->fetch();	

	$this->topbar=$sorguson["topbar"];
	$this->iletisimicon=$sorguson["iletisimicon"];
	$this->sosyalrenk=$sorguson["sosyalrenk"];
	$this->logo=$sorguson["logo"];
	$this->basliklar=$sorguson["basliklar"];
	}
}
$renkler = new tasarimrenklerim;
header("Content-type:text/css");
?>



body {
    background: #fefefe;
    color: rgb(201, 199, 199);
    font-family: "Open Sans", sans-serif;
}

a {
    color: #45adb3;
    transition: 0.5s;
}

a:hover,
a:active,
a:focus {
    color: #74d9df;
    outline: none;
    text-decoration: none;
}

p {
    padding: 0;
    margin: 0 0 30px 0;
}

h1,
h2,
h3,
h4,
h5,
h6 {
    font-family: "Montserrat", sans-serif;
    font-weight: 400;
    margin: 0 0 20px 0;
    padding: 0;
}


/* Back to top button */

.back-to-top {
    position: fixed;
    display: none;
    background: #45adb3;
    color: #fff;
    padding: 6px 12px 9px 12px;
    font-size: 16px;
    border-radius: 2px;
    right: 15px;
    bottom: 15px;
    transition: background 0.5s;
}

.back-to-top:focus {
    background: #000;
    color: #fff;
    outline: none;
}

.back-to-top:hover {
    background: #000;
    color: #fff;
}


/*--------------------------------------------------------------
# Top Bar
--------------------------------------------------------------*/

#topbar {
    background:  #<?=$renkler->topbar?>;
    font-size: 15px;
    padding: 0;
    list-style-type: none;
    box-shadow: inset 0 0 1px #fff;
    border: 1px solid #e3e6e8;
}
#topbar .contact-info{
  color: #<?=$renkler->sosyalrenk?>;
}
#topbar .contact-info a {
    line-height: 1;
     color: #<?=$renkler->sosyalrenk?>;
}

#topbar .contact-info a:hover {
    color: #<?=$renkler->iletisimicon?>;
}

#topbar .contact-info i {
    color: #<?=$renkler->iletisimicon?>;
    padding: 4px;
}

#topbar .contact-info .fa-phone {
    padding-left: 20px;
    margin-left: 20px;
    border-left: 1px solid #e9e9e9;
}

#topbar .social-links a {
   color: #<?=$renkler->sosyalrenk?>;
    padding: 4px 12px;
    display: inline-block;
    line-height: 1px;
    border-left: 1px solid #e9e9e9;
}

#topbar .social-links a:hover {
   color: #FCE38A;
}

#topbar .social-links a:first-child {
    border-left: 0;
}


/*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/

#header {

  padding: 20px 0;
  height: 84px;
  transition: all 0.5s;
  z-index: 997;
  background: #FEFEFE;
  box-shadow: 0px 6px 9px 0px rgba(0, 0, 0, 0.06);
}

#header #logo h1 {
  font-size: 42px;
  margin: 0;
  padding: 0;
  line-height: 1;
  font-family: "Montserrat", sans-serif;
  font-weight: 700;
  padding:4px;
  border-radius:10px;
}


#header #logo h1 a {
    color: #<?=$renkler->logo?>;
    line-height: 1;
    display: inline-block;
}


#header #logo h1 a span {
  color: #<?=$renkler->logo?>;
  
}

#header #logo img {
  padding-top: 7px;
  margin: 0;
}


/*--------------------------------------------------------------
# Intro Section
--------------------------------------------------------------*/

#intro {
  width: 100%;
  height: 58vh;
  position: relative;
  background: url("../img/intro-carousel/1.jpg") no-repeat;
  background-size: cover;
}

#intro .intro-content {
  position: absolute;
  bottom: 0;
  top: 0;
  left: 0;
  right: 0;
  z-index: 10;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -ms-flex-direction: column;
  flex-direction: column;
  text-align: center;
}

#intro .intro-content h2 {
  color: #323846;
  margin-bottom: 30px;
  font-size: 64px;
  font-weight: 700;
}

#intro .intro-content h2 span {
  color: #45adb3;
  text-decoration: underline;
}

#intro .intro-content .btn-get-started,
#intro .intro-content .btn-projects {
  font-family: "Raleway", sans-serif;
  font-size: 15px;
  font-weight: bold;
  letter-spacing: 1px;
  display: inline-block;
  padding: 10px 32px;
  border-radius: 2px;
  transition: 0.5s;
  margin: 10px;
  color: #fff;
}

#intro .intro-content .btn-get-started {
  background: #323846;
  border: 2px solid #323846;
}

#intro .intro-content .btn-get-started:hover {
  background: none;
  color: #323846;
}

#intro .intro-content .btn-projects {
  background: #45adb3;
  border: 2px solid #45adb3;
}

#intro .intro-content .btn-projects:hover {
  background: none;
  color: #45adb3;
}

#intro #intro-carousel {
  z-index: 8;
}

#intro #intro-carousel::before {
  content: '';
  background-color: rgba(255, 255, 255, 0.7);
  position: absolute;
  height: 100%;
  width: 100%;
  top: 0;
  right: 0;
  left: 0;
  bottom: 0;
  z-index: 7;
}

#intro #intro-carousel .item {
  width: 100%;
  height: 60vh;
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  transition-property: opacity;
}

/*--------------------------------------------------------------
# Navigation Menu
--------------------------------------------------------------*/


/* Nav Menu Essentials */

.nav-menu,
.nav-menu * {
    margin: 0;
    padding: 0;
    list-style: none;
}

.nav-menu ul {
    position: absolute;
    display: none;
    top: 100%;
    left: 0;
    z-index: 99;
}

.nav-menu li {
    position: relative;
    white-space: nowrap;
}

.nav-menu>li {
    float: left;
}

.nav-menu li:hover>ul,
.nav-menu li.sfHover>ul {
    display: block;
}

.nav-menu ul ul {
    top: 0;
    left: 100%;
}

.nav-menu ul li {
    min-width: 180px;
}


/* Nav Menu Arrows */

.sf-arrows .sf-with-ul {
    padding-right: 22px;
}

.sf-arrows .sf-with-ul:after {
    content: "\f107";
    position: absolute;
    right: 8px;
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
}

.sf-arrows ul .sf-with-ul:after {
    content: "\f105";
}


/* Nav Meu Container */

#nav-menu-container {
    float: right;
    margin: 0;
}


/* Nav Meu Styling */

.nav-menu a {
    padding: 10px 8px;
    text-decoration: none;
    display: inline-block;
    color: #<?=$renkler->logo?>;
    font-family: "Raleway", sans-serif;
    font-weight: 700;
    font-size: 14px;
    outline: none;
}

.nav-menu li:hover>a,
.nav-menu .menu-active>a {
    color: #45adb3;
}

.nav-menu>li {
    margin-left: 10px;
}

.nav-menu ul {
    margin: 4px 0 0 0;
    padding: 10px;
    box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
    background: #fff;
}

.nav-menu ul li {
    transition: 0.3s;
}

.nav-menu ul li a {
    padding: 10px;
    color: #333;
    transition: 0.3s;
    display: block;
    font-size: 13px;
    text-transform: none;
}

.nav-menu ul li:hover>a {
    color: #45adb3;
}

.nav-menu ul ul {
    margin: 0;
}


/* Mobile Nav Toggle */

#mobile-nav-toggle {
    position: fixed;
    right: 0;
    top: 0;
    z-index: 999;
    margin: 20px 20px 0 0;
    border: 0;
    background: none;
    font-size: 24px;
    display: none;
    transition: all 0.4s;
    outline: none;
    cursor: pointer;
}

#mobile-nav-toggle i {
    color: #555;
}


/* Mobile Nav Styling */

#mobile-nav {
    position: fixed;
    top: 0;
    padding-top: 18px;
    bottom: 0;
    z-index: 998;
    background: rgba(52, 59, 64, 0.9);
    left: -260px;
    width: 260px;
    overflow-y: auto;
    transition: 0.4s;
}

#mobile-nav ul {
    padding: 0;
    margin: 0;
    list-style: none;
}

#mobile-nav ul li {
    position: relative;
}

#mobile-nav ul li a {
    color: #fff;
    font-size: 16px;
    overflow: hidden;
    padding: 10px 22px 10px 15px;
    position: relative;
    text-decoration: none;
    width: 100%;
    display: block;
    outline: none;
}

#mobile-nav ul li a:hover {
    color: #fff;
}

#mobile-nav ul li li {
    padding-left: 30px;
}

#mobile-nav ul .menu-has-children i {
    position: absolute;
    right: 0;
    z-index: 99;
    padding: 15px;
    cursor: pointer;
    color: #fff;
}

#mobile-nav ul .menu-has-children i.fa-chevron-up {
    color: #45adb3;
}

#mobile-nav ul .menu-item-active {
    color: #45adb3;
}

#mobile-body-overly {
    width: 100%;
    height: 100%;
    z-index: 997;
    top: 0;
    left: 0;
    position: fixed;
    background: rgba(52, 59, 64, 0.9);
    display: none;
}


/* Mobile Nav body classes */

body.mobile-nav-active {
    overflow: hidden;
}

body.mobile-nav-active #mobile-nav {
    left: 0;
}

body.mobile-nav-active #mobile-nav-toggle {
    color: #fff;
}


/*--------------------------------------------------------------
# Sections
--------------------------------------------------------------*/


/* Sections Header
--------------------------------*/

.section-header {
    margin-bottom: 30px;
}

.section-header h2 {
    color: #<?=$renkler->basliklar?>;
    text-transform: uppercase;
    font-weight: 700;
    position: relative;
    padding-bottom: 20px;
}

.section-header h2::before {
    content: '';
    position: absolute;
    display: block;
    width: 50px;
    height: 3px;
    background: #45adb3;
    bottom: 0;
    left: 0;
}

.section-header p {
    padding: 0;
    margin: 0;
}


/* About Section
--------------------------------*/

#hakkimizda {
    padding: 60px 0 30px 0;
}

#hakkimizda .hakkimizda-img {
    overflow: hidden;
}

#hakkimizda .hakkimizda-img img {
    margin-left: -15px;
    max-width: 100%;
}

#hakkimizda .content h2 {
    color: #323846;
    font-weight: 700;
    font-size: 36px;
    font-family: "Raleway", sans-serif;
}

#hakkimizda .content h3 {
    color: #555;
    font-weight: 300;
    font-size: 18px;
    line-height: 26px;
    font-style: italic;
}

#hakkimizda .content p {
    line-height: 26px;
}

#hakkimizda .content p:last-child {
    margin-bottom: 0;
}

#hakkimizda .content i {
    font-size: 20px;
    padding-right: 4px;
    color: #45adb3;
}

#hakkimizda .content ul {
    list-style: none;
    padding: 0;
}

#hakkimizda .content ul li {
    padding-bottom: 10px;
}


/* Services Section
--------------------------------*/

#hizmetler {
    padding: 30px 0 0 0;
}

#hizmetler .box {
    padding: 40px;
    margin-bottom: 40px;
    box-shadow: 10px 10px 15px rgba(73, 78, 92, 0.1);
    background: #fff;
    transition: 0.4s;
    color:#283149;
    font-size:16px;
}

#hizmetler .box:hover {
    box-shadow: 0px 0px 30px rgba(73, 78, 92, 0.15);
    transform: translateY(-10px);
    -webkit-transform: translateY(-10px);
    -moz-transform: translateY(-10px);
}

#hizmetler .box .icon {
    float: left;
}

#hizmetler .box .icon i {
    color: #444;
    font-size: 64px;
    transition: 0.5s;
    line-height: 0;
    margin-top: 34px;
}

#hizmetler .box .icon i:before {
    background: #323846;
    background: linear-gradient(45deg, #45adb3 0%, #a3ebd5 100%);
    background-clip: border-box;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

#hizmetler .box h4 {
    margin-left: 100px;
    font-weight: 700;
    margin-bottom: 15px;
    font-size: 22px;
}

#hizmetler .box h4 a {
    color: #444;
}

#hizmetler .box p {
    font-size: 14px;
    margin-left: 100px;
    margin-bottom: 0;
    line-height: 24px;
}


/* Clients Section
--------------------------------*/

#referanslar {
    padding: 30px 0;
}

#referanslar img {
    max-width: 100%;
    opacity: 0.5;
    transition: 0.3s;
    padding: 15px 0;
}

#referanslar img:hover {
    opacity: 1;
}

#referanslar .owl-nav,
#referanslar .owl-dots {
    margin-top: 5px;
    text-align: center;
}

#referanslar .owl-dot {
    display: inline-block;
    margin: 0 5px;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background-color: #ddd;
}

#referanslar .owl-dot.active {
    background-color: #45adb3;
}


/* Our Portfolio Section
--------------------------------*/

#galeri {
    padding: 30px 0;
}

#galeri .galeri-overlay {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 1;
    transition: all ease-in-out 0.4s;
}

#galeri .galeri-item {
    overflow: hidden;
    position: relative;
    padding: 0;
    vertical-align: middle;
    text-align: center;
}

#galeri .galeri-item h2 {
    color: #ffffff;
    font-size: 24px;
    margin: 0;
    text-transform: capitalize;
    font-weight: 700;
}

#galeri .galeri-item img {
    transition: all ease-in-out 0.4s;
    width: 100%;
}

#galeri .galeri-item:hover img {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
}

#galeri .galeri-item:hover .galeri-overlay {
    opacity: 1;
    background: rgba(0, 0, 0, 0.7);
}

#galeri .galeri-info {
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}


/* Testimonials Section
--------------------------------*/

#yorumlar {
    padding: 30px 0;
}

#yorumlar .testimonial-item {
    box-sizing: content-box;
    padding: 30px 30px 0 30px;
    margin: 30px 15px;
    text-align: center;
    min-height: 350px;
    box-shadow: 0px 2px 12px rgba(0, 0, 0, 0.08);
}

#yorumlar .testimonial-item .testimonial-img {
    width: 90px;
    border-radius: 50%;
    border: 4px solid #fff;
    margin: 0 auto;
}

#yorumlar .testimonial-item h3 {
    font-size: 18px;
    font-weight: bold;
    margin: 10px 0 5px 0;
    color: #111;
}

#yorumlar .testimonial-item h4 {
    font-size: 14px;
    color: #999;
    margin: 0;
}

#yorumlar .testimonial-item .quote-sign-left {
    margin-top: -15px;
    padding-right: 10px;
    display: inline-block;
    width: 37px;
}

#yorumlar .testimonial-item .quote-sign-right {
    margin-bottom: -15px;
    padding-left: 10px;
    display: inline-block;
    max-width: 100%;
    width: 37px;
}

#yorumlar .testimonial-item p {
    font-style: italic;
    margin: 0 auto 15px auto;
}

#yorumlar .owl-nav,
#yorumlar .owl-dots {
    margin-top: 5px;
    text-align: center;
}

#yorumlar .owl-dot {
    display: inline-block;
    margin: 0 5px;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background-color: #ddd;
}

#yorumlar .owl-dot.active {
    background-color: #45adb3;
}


/* Contact Section
--------------------------------*/

#iletisim {
    padding: 30px 0;
}

#iletisim .contact-info {
    margin-bottom: 20px;
    text-align: center;
}

#iletisim .contact-info i {
    font-size: 48px;
    display: inline-block;
    margin-bottom: 10px;
    color: #45adb3;
}

#iletisim .contact-info address,
#iletisim .contact-info p {
    margin-bottom: 0;
    color: #000;
}

#iletisim .contact-info h3 {
    font-size: 18px;
    margin-bottom: 15px;
    font-weight: bold;
    text-transform: uppercase;
    color: #999;
}

#iletisim .contact-info a {
    color: #000;
}

#iletisim .contact-info a:hover {
    color: #45adb3;
}

#iletisim .contact-address,
#iletisim .contact-phone,
#iletisim .contact-email {
    margin-bottom: 20px;
}

#iletisim #google-map {
    height: 290px;
    margin-bottom: 20px;
}

#iletisim .form #sendmessage {
    color: #45adb3;
    border: 1px solid #45adb3;
    display: none;
    text-align: center;
    padding: 15px;
    font-weight: 600;
    margin-bottom: 15px;
}

#iletisim .form #errormessage {
    color: red;
    display: none;
    border: 1px solid red;
    text-align: center;
    padding: 15px;
    font-weight: 600;
    margin-bottom: 15px;
}

#iletisim .form #sendmessage.show,
#iletisim .form #errormessage.show,
#iletisim .form .show {
    display: block;
}

#iletisim .form .validation {
    color: red;
    display: none;
    margin: 0 0 20px;
    font-weight: 400;
    font-size: 13px;
}

#iletisim .form input,
#iletisim .form textarea {
    padding: 10px 14px;
    border-radius: 0;
    box-shadow: none;
    font-size: 15px;
}

#iletisim .form button[type="submit"] {
    background: #45adb3;
    border: 0;
    border-radius: 3px;
    padding: 10px 30px;
    color: #fff;
    transition: 0.4s;
    cursor: pointer;
}

#iletisim .form button[type="submit"]:hover {
    background: #2dc899;
}


/*--------------------------------------------------------------
# Footer
--------------------------------------------------------------*/

#footer {
    background: #f2f5f8;
    padding: 0 0 30px 0;
    font-size: 14px;
}

#footer .copyright {
    text-align: center;
    padding-top: 30px;
}

#footer .credits {
    text-align: center;
    font-size: 13px;
    color: #555;
}

#footer .credits a {
    color: #323846;
}

@media (min-width: 768px) {
    #iletisim .contact-address,
    #iletisim .contact-phone,
    #iletisim .contact-email {
        padding: 20px 0;
    }
    #iletisim .contact-phone {
        border-left: 1px solid #ddd;
        border-right: 1px solid #ddd;
    }
}

@media (min-width: 769px) {
    #call-to-action .cta-btn-container {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: end;
        -webkit-justify-content: flex-end;
        -ms-flex-pack: end;
        justify-content: flex-end;
    }
}

@media (max-width: 768px) {
    .back-to-top {
        bottom: 15px;
    }
    #header {
        padding: 20px 0;
        height: 74px;
    }
    #header #logo h1 {
        font-size: 34px;
    }
    #header #logo img {
        max-height: 40px;
    }
    #nav-menu-container {
        display: none;
    }
    #mobile-nav-toggle {
        display: inline;
    }
    #hakkimizda .hakkimizda-img {
        height: auto;
    }
    #hakkimizda .hakkimizda-img img {
        margin-left: 0;
        padding-bottom: 30px;
    }
}

@media (max-width: 767px) {
    #intro .intro-content h2 {
        font-size: 34px;
    }
    #hizmetler .box .box {
        margin-bottom: 20px;
    }
    #hizmetler .box .icon {
        float: none;
        text-align: center;
        padding-bottom: 15px;
    }
    #hizmetler .box h4,
    #hizmetler .box p {
        margin-left: 0;
        text-align: center;
    }
    #yorumlar .testimonial-item {
        margin: 30px 10px;
    }
}

@media (max-width: 576px) {
    #iletisim #google-map {
        margin-top: 20px;
    }
}