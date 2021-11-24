<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'frameworks/PHPMailer/src/Exception.php';
require 'frameworks/PHPMailer/src/PHPMailer.php';
require 'frameworks/PHPMailer/src/SMTP.php';

if (isset($_GET["eposta"])){
    $geleneposta  = guvenlik($_GET["eposta"]);
}else{
    $geleneposta="";
}
 if (isset($_GET["aktivasyonkodu"])){
    $gelenaktivasyonkodu  = guvenlik($_GET["aktivasyonkodu"]);
}else{
    $gelenaktivasyonkodu="";
}
if (isset($_POST["sifre"])){
    $gelensifre  = guvenlik($_POST["sifre"]);
}else{
    $gelensifre="";
}
if (isset($_POST["sifretekrar"])){
    $gelensifretekrar  = guvenlik($_POST["sifretekrar"]);
}else{
    $gelensifretekrar="";
}
$md5lisifre     = md5($gelensifre);

if (($gelensifre!="") and ($gelensifretekrar!="") and ($geleneposta!="") and ($gelenaktivasyonkodu!="")){
    if($gelensifre!=$gelensifretekrar){
        header("Location:index.php?sk=50");
        exit();     
    }else{
            $sifreguncelle    =   $baglanti->prepare("UPDATE uyeler set sifre=? where eposta=? and aktivasyonkodu=? limit 1");
            $sifreguncelle->execute([$md5lisifre,$geleneposta,$gelenaktivasyonkodu]);
            $kontrol     =   $sifreguncelle->rowcount();  
                if($kontrol>0){  
                     Header("Location:index.php?sk=48");
                    exit();
                }else{
                     Header("Location:index.php?sk=49");
                        exit();  
                }    
     }   
    }else{
        header("Location:index.php?sk=53");
        exit();
    }
?>