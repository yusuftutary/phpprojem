<?php 
session_start(); ob_start();
require_once ("header.php");
require_once ("ayarlar/ayar.php");
require_once ("ayarlar/fonksiyonlar.php");
require_once ("ayarlar/sitesayfalari.php");
if (isset($_REQUEST["sk"])) {
    $sayfakodudegeri = sayiliiceriklerifiltrele($_REQUEST["sk"]);
}else{
    $sayfakodudegeri = 0;
}
if (isset($_REQUEST["syf"])) {
    $sayfalama = sayiliiceriklerifiltrele($_REQUEST["syf"]);
}else{
    $sayfalama = 1;
}
 
		if ((!$sayfakodudegeri) or ($sayfakodudegeri=="") or ($sayfakodudegeri==0)){
			include($sayfa[0]);
		}else{
			include($sayfa[$sayfakodudegeri]);
		}
		require_once ("footer.php");
$baglanti = null;
ob_end_flush();
?>