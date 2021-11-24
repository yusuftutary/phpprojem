<?php 
require_once ("ayarlar/fonksiyonlar.php");
require_once ("ayarlar/ayar.php");
?>
<!DOCTYPE html>
<html lang="tr-TR">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Content-Language" content="tr">
<meta charset="utf-8">
<meta name="robots" content="index,follow">  	
<meta name="googlebot" content="index,follow"> 
<meta name="revisit-after" content="7 days"> 
<title><?php echo donusumlerigeridondur($sitetitle) ; ?></title>
<link type="image/png" rel="icon" href="resimler/favicon.png"> 
<meta name="description" content="<?php echo donusumlerigeridondur($sitedescription) ; ?>"> 
<meta name="keywords" content="<?php echo donusumlerigeridondur($sitekeywords) ; ?>"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css" />
<link rel="stylesheet" href="assets/style.css"/>
<script type="text/javascript" src="framework/JQuery/jquery-3.6.0.min.js" language;="javascript"></script>  
<script type="text/javascript" src="ayarlar/script.js" language="javascript"></script> 
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.js"></script>
<script src="assets/script.js"></script>

<!-- Owl stylesheet -->
<link rel="stylesheet" href="assets/owl-carousel/owl.carousel.css">
<link rel="stylesheet" href="assets/owl-carousel/owl.theme.css">
<script src="assets/owl-carousel/owl.carousel.js"></script>
<!-- Owl stylesheet -->
<!-- slitslider -->
    <link rel="stylesheet" type="text/css" href="assets/slitslider/css/style.css" />
    <link rel="stylesheet" type="text/css" href="assets/slitslider/css/custom.css" />
    <script type="text/javascript" src="assets/slitslider/js/modernizr.custom.79639.js"></script>
    <script type="text/javascript" src="assets/slitslider/js/jquery.ba-cond.min.js"></script>
    <script type="text/javascript" src="assets/slitslider/js/jquery.slitslider.js"></script>
<!-- slitslider -->
</head>
<body>
<!-- Header Starts -->
<div class="navbar-wrapper">
        <div class="navbar-inverse" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
              <ul class="nav navbar-nav navbar-right">
               <li><a href="index.php?sk=0">Anasayfa</a></li>
                <li><a href="index.php?sk=1">Hakkımızda</a></li>
                <li><a href="index.php?sk=2">Danışmanlarımız</a></li>         
                <li><a href="index.php?sk=3">İletişim</a></li>
                <?php if (isset($_SESSION["kullanici"])){ ?> 
                <li><a href="index.php?sk=17">Hesabım</a></li>
                <li><a href="index.php?sk=24">Favorilerim</a></li>
                <li><a href="index.php?sk=31">Çıkış Yap</a></li>
                <?php }else{ ?>
                <li><a data-toggle="modal" data-target="#loginpop" style="cursor: pointer;">Giriş Yap</a></li>
                <li><a href="index.php?sk=8">Üye Ol</a></li>
                <li><a data-toggle="modal" data-target="#loginpop" style="cursor: pointer;">Favorilerim</a></li>
                <?php } ?> 
              </ul>
            </div>
            <!-- #Nav Ends -->
          </div>
        </div>
    </div>
<!-- #Header Starts -->
<div class="container">
<!-- Header Starts -->
<div class="header">
<a href="index.php"><img src="images/logo.png" alt="Realestate"></a>
      <ul class="pull-right">
        <li><a href="index.php?sk=32">Satılıklar </a></li>
        <li><a href="index.php?sk=33">Kiralıklar </a></li>         
        <li><a href="index.php?sk=34">Tüm İlanlar</a></li>
      </ul>
</div>
<!-- #Header Starts -->
</div>