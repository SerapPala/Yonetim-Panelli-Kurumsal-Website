-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 08 Tem 2021, 09:45:22
-- Sunucu sürümü: 8.0.17
-- PHP Sürümü: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `serappal_kurumsal`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `id` int(11) NOT NULL,
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `metatitle` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `metadesc` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `metakey` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `metaauthor` varchar(40) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `metaowner` varchar(40) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `metacopy` varchar(40) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `logoyazisi` varchar(40) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `twit` varchar(70) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `face` varchar(70) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `inst` varchar(70) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `telefonno` varchar(25) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `adress` varchar(150) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `mailadres` varchar(30) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `slogan_tr` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `slogan_en` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `referansUstBaslik_tr` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `referansUstBaslik_en` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `referansbaslik_tr` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `referansbaslik_en` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `galeriUstBaslik_tr` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `galeriUstBaslik_en` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `galeribaslik_tr` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `galeribaslik_en` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `yorumUstBaslik_tr` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `yorumUstBaslik_en` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `yorumbaslik_tr` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `yorumbaslik_en` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `iletisimUstBaslik_tr` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `iletisimbaslik_tr` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `iletisimUstBaslik_en` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `iletisimbaslik_en` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `hizmetlerUstBaslik_tr` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `hizmetlerUstBaslik_en` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `hizmetlerbaslik_tr` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `hizmetlerbaslik_en` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `videolarUstBaslik_tr` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `videolarbaslik_tr` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `videolarUstBaslik_en` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `videolarbaslik_en` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `haberler_tr` varchar(25) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `haberler_en` varchar(25) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `mesajtercih` int(11) NOT NULL DEFAULT '1',
  `haritabilgi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `footer` varchar(200) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `bakimzaman` varchar(40) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `yedekzaman` varchar(30) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `url` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`id`, `title`, `metatitle`, `metadesc`, `metakey`, `metaauthor`, `metaowner`, `metacopy`, `logoyazisi`, `twit`, `face`, `inst`, `telefonno`, `adress`, `mailadres`, `slogan_tr`, `slogan_en`, `referansUstBaslik_tr`, `referansUstBaslik_en`, `referansbaslik_tr`, `referansbaslik_en`, `galeriUstBaslik_tr`, `galeriUstBaslik_en`, `galeribaslik_tr`, `galeribaslik_en`, `yorumUstBaslik_tr`, `yorumUstBaslik_en`, `yorumbaslik_tr`, `yorumbaslik_en`, `iletisimUstBaslik_tr`, `iletisimbaslik_tr`, `iletisimUstBaslik_en`, `iletisimbaslik_en`, `hizmetlerUstBaslik_tr`, `hizmetlerUstBaslik_en`, `hizmetlerbaslik_tr`, `hizmetlerbaslik_en`, `videolarUstBaslik_tr`, `videolarbaslik_tr`, `videolarUstBaslik_en`, `videolarbaslik_en`, `haberler_tr`, `haberler_en`, `mesajtercih`, `haritabilgi`, `footer`, `bakimzaman`, `yedekzaman`, `url`) VALUES
(1, 'Serap Pala', 'Serap Pala', 'Serap Pala | Portfolio', 'Serap Pala , Portfolio, PORTFOLYO', 'Serap Pala', 'Serap Pala', '2021', 'Serap Pala', 'http://localhost/kurumsalsite/twit', 'http://localhost/kurumsalsite/face', 'http://localhost/kurumsalsite/inst', '000 000 00 00 ', ' Kütahya/Merkez Türkiye', 'serap68040@gmail.com', 'Serap Pala | Portfolyo', 'Serap Pala | Portfolio', 'REFERANSLAR', 'REFERENCES', 'Referanslara buradan ulaşabilirsiniz.', 'You can find my references here.', 'PORTFOLYO', 'POTFOLIO', 'Çalışmalarıma buradan ulaşabilirsiniz.', 'You can find my work here.', 'YORUMLAR', 'COMMENTS', 'Yorumlara buradan ulaşabilirsiniz.', ' You can find the comments here.', 'İLETİŞİM', 'Buradan benimle iletişime Geçebilirsiniz.', 'Buradan benimle iletişime Geçebilirsiniz.', 'Contact Me', 'HİZMETLER &amp; ÜRÜNLER', 'SERVICES', 'Yazılım Çözümleri ve Hizmetlere  buradan ulaşabilirsiniz.', 'You can find Software Solutions and Services here.', 'VIDEOLAR ', 'Videolara buradan ulaşabilirsiniz.', 'VIDEOS', 'You can find my videos here.', 'HABERLER:', 'NEWS:', 1, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d789157.4693832038!2d29.53798480964099!3d39.40950595932023!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14c94bb53b280f3f%3A0x78a02b938ebd9c43!2zS8O8dGFoeWEgTWVya2V6L0vDvHRhaHlh!5e0!3m2!1str!2str!4v1624649664074!5m2!1str!2str', 'Serap Pala', '01/07/2021 - 15:38', '08/07/2021 - 00:25', 'https://www.serappala.com/');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bulten`
--

CREATE TABLE `bulten` (
  `id` int(11) NOT NULL,
  `mail` varchar(30) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `tel` varchar(20) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `bulten`
--

INSERT INTO `bulten` (`id`, `mail`, `tel`) VALUES
(1, 'srppl5556@gmail.com', '5543987116'),
(2, 'serap68040@gmail.com', ''),
(3, 'serap68040@gmail.com', ''),
(4, 'sel@gmail.com', ''),
(5, 'ayse@hotmail.com', ''),
(7, 'yenideneme@gmail.com', ''),
(8, 'serap@gmail.com', ''),
(10, 'dene@gmail.com', ''),
(11, 'dene@gmail.com', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `galerimiz`
--

CREATE TABLE `galerimiz` (
  `id` int(11) NOT NULL,
  `resimyol` varchar(60) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `galerimiz`
--

INSERT INTO `galerimiz` (`id`, `resimyol`) VALUES
(12, 'img/galeri/8579a28d1160504f82dd954c02ad00b0.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gelenmail`
--

CREATE TABLE `gelenmail` (
  `id` int(11) NOT NULL,
  `ad` varchar(40) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `mailadres` varchar(40) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `konu` varchar(40) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `mesaj` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `zaman` varchar(40) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL DEFAULT '0',
  `durum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `gelenmail`
--

INSERT INTO `gelenmail` (`id`, `ad`, `mailadres`, `konu`, `mesaj`, `zaman`, `durum`) VALUES
(12, 'ewf', '', '', '', '01.06.2021/12:07', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gelenmailayar`
--

CREATE TABLE `gelenmailayar` (
  `id` int(11) NOT NULL,
  `host` varchar(40) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `mailadres` varchar(40) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(40) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `port` int(11) NOT NULL,
  `aliciadres` varchar(40) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `gelenmailayar`
--

INSERT INTO `gelenmailayar` (`id`, `host`, `mailadres`, `sifre`, `port`, `aliciadres`) VALUES
(1, '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `haberler`
--

CREATE TABLE `haberler` (
  `id` int(11) NOT NULL,
  `icerik_tr` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `icerik_en` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `tarih` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `haberler`
--

INSERT INTO `haberler` (`id`, `icerik_tr`, `icerik_en`, `tarih`) VALUES
(7, '<p>Yeni Haber</p>', '<p>News</p>', '2021-06-24 20:59:23');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkimizda`
--

CREATE TABLE `hakkimizda` (
  `id` int(11) NOT NULL,
  `baslik_tr` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `baslik_en` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `icerik_tr` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `icerik_en` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `resim` varchar(40) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `hakkimizda`
--

INSERT INTO `hakkimizda` (`id`, `baslik_tr`, `baslik_en`, `icerik_tr`, `icerik_en`, `resim`) VALUES
(1, 'HAKKIMDA', 'About Me', '<p><i>28 yaşında, Merkez/Kütahya da yaşıyorum.</i> &nbsp;</p><p>Kendi kendini geliştirmeye devam eden bir ön uç &nbsp;geliştiricisiyim.</p><p>&nbsp;Bu alanda çok çalışmam gerektiği ve mesleğin ne kadar zorlu olduğunun farkındayım. &nbsp;</p><p>Bu yüzden başkalarına ilham vermek ve kendimi geliştirmek için bir geliştirici olma yolculuğumu belgelemeye başlamanın iyi bir fikir olacağını düşündüm. Bu yüzden sosyal medya hesaplarımı günlük/haftalık olarak, yaptığım ilerleme ve öğrendiğim yeni kavramlar hakkında konuşarak yayınlamaya başladım.</p><p>Bu alanda araştırmak, öğrenmek için bir öğreticiye ihtiyaç duyduğumda devreye belli platformlar ve eğitmenler girdi ve Türkçe kaynaklara bakmaya başladım. Sonrasında incelediğim eğitim setlerini alarak işe koyuldum. &nbsp;platformundan online dersler aldım. Daha fazlasını öğrenmek ve hayallerimi gerçekleştirmek için sürekli olarak kendimi rahatlık alanımdan çıkarıyorum. Aynı zamanda başkalarına da aynı şeyi yapma ve onları gerçekten mutlu eden şeyin peşinden gitmeleri için ilham vermek istiyorum.</p>', '<p><strong>İngilizce</strong> <i>Hakkımızda</i> İçerik</p>', 'img/hakkimizda.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hizmetler`
--

CREATE TABLE `hizmetler` (
  `id` int(11) NOT NULL,
  `baslik_tr` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `baslik_en` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `icerik_tr` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `icerik_en` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `hizmetler`
--

INSERT INTO `hizmetler` (`id`, `baslik_tr`, `baslik_en`, `icerik_tr`, `icerik_en`) VALUES
(4, 'MİKROSİTE Kurumsal Web Site Yönetim Paneli', 'İngilizce Hizmetler Başlık ', '<p>&nbsp;Kurum, Kuruluş veya Firma&nbsp; web sayfaları oluşturmanıza ve yönetmenize imkan sağlayan bir programdır.</p><ul><li>&nbsp;</li></ul>', '<p><strong>İngilizce</strong> <i>Hizmetler</i> İçerik</p>'),
(17, 'Yönetim Panelli Kurumsal Website', '', '<p>Web sitesi oluşturma ve yönetme yazılımıdır. &nbsp;</p><p>Kurumsal web uygulamalarında ihtiyaçlara cevap verebilecek niteliktedir.</p><p>&nbsp;</p>', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `intro`
--

CREATE TABLE `intro` (
  `id` int(11) NOT NULL,
  `resimyol` varchar(60) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `intro`
--

INSERT INTO `intro` (`id`, `resimyol`) VALUES
(29, 'img/carousel/4377a5b2fb90e0dd346cc39b24a69743.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `linkler`
--

CREATE TABLE `linkler` (
  `id` int(11) NOT NULL,
  `ad_tr` varchar(30) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ad_en` varchar(30) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `etiket` varchar(20) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `siralama` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `linkler`
--

INSERT INTO `linkler` (`id`, `ad_tr`, `ad_en`, `etiket`, `siralama`) VALUES
(2, 'Hakkımda', 'About me', 'hakkimizda', 2),
(3, 'Hizmetler', ' Services', 'hizmetler', 3),
(4, 'Portfolyo', 'Portfolio', 'galeri', 5),
(7, 'İletişim', 'Contact', 'iletisim', 9),
(17, 'Videolar', 'Videos', 'videolar', 8),
(29, 'Anasayfa', 'Home', 'body', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mail_sablonlar`
--

CREATE TABLE `mail_sablonlar` (
  `id` int(11) NOT NULL,
  `baslik` varchar(40) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `icerik` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `mail_sablonlar`
--

INSERT INTO `mail_sablonlar` (`id`, `baslik`, `icerik`) VALUES
(1, 'Bayraminiz kutlu olsun', 'bayram içerik'),
(2, 'Kampanya başladi', 'kosun gelin icerik'),
(3, '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `referanslar`
--

CREATE TABLE `referanslar` (
  `id` int(11) NOT NULL,
  `resimyol` varchar(60) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `referanslar`
--

INSERT INTO `referanslar` (`id`, `resimyol`) VALUES
(3, 'img/referans/ref3.png'),
(4, 'img/referans/ref4.png'),
(6, 'img/referans/ref6.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tasarim`
--

CREATE TABLE `tasarim` (
  `id` int(11) NOT NULL,
  `hiztercih` int(11) NOT NULL DEFAULT '0',
  `reftercih` int(11) NOT NULL DEFAULT '0',
  `yorumtercih` int(11) NOT NULL DEFAULT '0',
  `galtercih` int(11) NOT NULL DEFAULT '0',
  `videotercih` int(11) NOT NULL DEFAULT '0',
  `hakkimizdatercih` int(11) NOT NULL DEFAULT '0',
  `bultentercih` int(11) NOT NULL DEFAULT '0',
  `introtercih` int(11) NOT NULL DEFAULT '0',
  `habertercih` int(11) NOT NULL DEFAULT '0',
  `topbar` varchar(6) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `iletisimicon` varchar(6) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `sosyalrenk` varchar(6) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `logo` varchar(6) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `basliklar` varchar(30) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tasarim`
--

INSERT INTO `tasarim` (`id`, `hiztercih`, `reftercih`, `yorumtercih`, `galtercih`, `videotercih`, `hakkimizdatercih`, `bultentercih`, `introtercih`, `habertercih`, `topbar`, `iletisimicon`, `sosyalrenk`, `logo`, `basliklar`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'FAFAFA', 'FCE38A', '393E46', '95E1D3', 'F37735');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tasarimbolumler`
--

CREATE TABLE `tasarimbolumler` (
  `id` int(11) NOT NULL,
  `ad` varchar(20) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `classAd` varchar(30) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `siralama` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tasarimbolumler`
--

INSERT INTO `tasarimbolumler` (`id`, `ad`, `classAd`, `siralama`) VALUES
(1, 'HAKKIMIZDA', 'HakkimizdatasarimDuzen', 2),
(2, 'HİZMETLER', 'HizmettasarimDuzen', 8),
(3, 'GALERİMİZ', 'GaleritasarimDuzen', 4),
(4, 'VİDEOLAR', 'VideotasarimDuzen', 5),
(5, 'REFERANS', 'ReftasarimDuzen', 7),
(6, 'YORUMLAR', 'YorumtasarimDuzen', 6),
(7, 'BULTEN', 'BultentasarimDuzen', 3),
(8, 'HABERLER', 'haberTasarimDuzen', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `videolar`
--

CREATE TABLE `videolar` (
  `id` int(11) NOT NULL,
  `link` varchar(15) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `siralama` int(11) NOT NULL,
  `durum` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `videolar`
--

INSERT INTO `videolar` (`id`, `link`, `siralama`, `durum`) VALUES
(9, 's-ih-XLpSMI', 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yonetim`
--

CREATE TABLE `yonetim` (
  `id` int(11) NOT NULL,
  `kulad` varchar(60) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(60) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `aktif` int(11) NOT NULL DEFAULT '0',
  `genelYetki` int(11) NOT NULL DEFAULT '0',
  `introYetki` int(11) NOT NULL DEFAULT '0',
  `galeriYetki` int(11) NOT NULL DEFAULT '0',
  `videoYetki` int(11) NOT NULL DEFAULT '0',
  `hakkimizYetki` int(11) NOT NULL DEFAULT '0',
  `hizmetlerYetki` int(11) NOT NULL DEFAULT '0',
  `referansYetki` int(11) NOT NULL DEFAULT '0',
  `tasarimYetki` int(11) NOT NULL DEFAULT '0',
  `yorumYetki` int(11) NOT NULL DEFAULT '0',
  `mesajYetki` int(11) NOT NULL DEFAULT '0',
  `bultenYetki` int(11) NOT NULL DEFAULT '0',
  `haberYetki` int(11) NOT NULL DEFAULT '0',
  `yoneticiYetki` int(11) NOT NULL DEFAULT '0',
  `ayarYetki` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yonetim`
--

INSERT INTO `yonetim` (`id`, `kulad`, `sifre`, `aktif`, `genelYetki`, `introYetki`, `galeriYetki`, `videoYetki`, `hakkimizYetki`, `hizmetlerYetki`, `referansYetki`, `tasarimYetki`, `yorumYetki`, `mesajYetki`, `bultenYetki`, `haberYetki`, `yoneticiYetki`, `ayarYetki`) VALUES
(20, 'serap', '44209a6a592dea91bcf7d4dd53e47a5a', 1, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(21, 'erhanaltintas', '44209a6a592dea91bcf7d4dd53e47a5a', 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

CREATE TABLE `yorumlar` (
  `id` int(11) NOT NULL,
  `icerik` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `isim` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yorumlar`
--

INSERT INTO `yorumlar` (`id`, `icerik`, `isim`) VALUES
(1, '<p>Musteri yorumu icerigi</p>', 'Musteri');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `bulten`
--
ALTER TABLE `bulten`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `galerimiz`
--
ALTER TABLE `galerimiz`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `gelenmail`
--
ALTER TABLE `gelenmail`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `gelenmailayar`
--
ALTER TABLE `gelenmailayar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `haberler`
--
ALTER TABLE `haberler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `hakkimizda`
--
ALTER TABLE `hakkimizda`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `hizmetler`
--
ALTER TABLE `hizmetler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `intro`
--
ALTER TABLE `intro`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `linkler`
--
ALTER TABLE `linkler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `mail_sablonlar`
--
ALTER TABLE `mail_sablonlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `referanslar`
--
ALTER TABLE `referanslar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tasarim`
--
ALTER TABLE `tasarim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tasarimbolumler`
--
ALTER TABLE `tasarimbolumler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `videolar`
--
ALTER TABLE `videolar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yonetim`
--
ALTER TABLE `yonetim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ayarlar`
--
ALTER TABLE `ayarlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `bulten`
--
ALTER TABLE `bulten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `galerimiz`
--
ALTER TABLE `galerimiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `gelenmail`
--
ALTER TABLE `gelenmail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `gelenmailayar`
--
ALTER TABLE `gelenmailayar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `haberler`
--
ALTER TABLE `haberler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `hakkimizda`
--
ALTER TABLE `hakkimizda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `hizmetler`
--
ALTER TABLE `hizmetler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `intro`
--
ALTER TABLE `intro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Tablo için AUTO_INCREMENT değeri `linkler`
--
ALTER TABLE `linkler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Tablo için AUTO_INCREMENT değeri `mail_sablonlar`
--
ALTER TABLE `mail_sablonlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `referanslar`
--
ALTER TABLE `referanslar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `tasarim`
--
ALTER TABLE `tasarim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `tasarimbolumler`
--
ALTER TABLE `tasarimbolumler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `videolar`
--
ALTER TABLE `videolar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `yonetim`
--
ALTER TABLE `yonetim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Tablo için AUTO_INCREMENT değeri `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
