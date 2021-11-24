<?php 

if (isset($_POST["isimsoyisim"])){
    $gelenisimsoyisim  = guvenlik($_POST["isimsoyisim"]);   
}else{
    $gelenisimsoyisim="";
}
if (isset($_POST["eposta"])){
    $geleneposta  = guvenlik($_POST["eposta"]);
}else{
    $geleneposta="";
}
if (isset($_POST["telefon"])){
    $gelentelefon  = guvenlik($_POST["telefon"]);
}else{
    $gelentelefon="";
}
if (isset($_POST["bankasecimi"])){
    $gelenbankasecimi  = guvenlik($_POST["bankasecimi"]);
}else{
    $gelenbankasecimi="";
}
if (isset($_POST["aciklama"])){
    $gelenaciklama  = guvenlik($_POST["aciklama"]);
}else{
    $gelenaciklama="";
}
if (($gelenisimsoyisim!="") and ($geleneposta!="") and ($gelentelefon!="") and ($gelenbankasecimi!="")){
    $havalebildirimikaydet    =   $baglanti->prepare("INSERT into havalebildirimleri(bankaid,adisoyadi,mailadresi,telefonnumarasi,aciklama,islemtarihi,durum) values(?,?,?,?,?,?,?)");
    $havalebildirimikaydet->execute([$gelenbankasecimi,$gelenisimsoyisim,$geleneposta,$gelentelefon,$gelenaciklama,$zamandamgasi,0]);
    $havalebildirimikaydetkontrol     =   $havalebildirimikaydet->rowcount();
    if ($havalebildirimikaydetkontrol>0) {
        header("Location:index.php?sk=39");
        exit();
    }else{
        header("Location:index.php?sk=40");
        exit();
    }
}


















?>