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

if (isset($_POST["telefon"])){
    $gelentelefon  = guvenlik($_POST["telefon"]);
}else{
    $gelentelefon="";
}

$md5lisifre     = md5($gelensifre);
if (($gelenisimsoyisim!="") and ($geleneposta!="") and ($gelensifre!="") and ($gelensifretekrar!="") and ($gelentelefon!="")){

       if($gelensifre!=$gelensifretekrar){
                 header("Location:index.php?sk=13");
                 exit();     
       }else{
            $kontrolsorgusu    =   $baglanti->prepare("SELECT * from uyeler where eposta=?");
            $kontrolsorgusu->execute([$geleneposta]);
            $kullanicisayisi     =   $kontrolsorgusu->rowcount();
            if($kullanicisayisi>0){
                 header("Location:index.php?sk=12");
                 exit();
                
            }else{
            $uyeekle    =   $baglanti->prepare("INSERT into uyeler(isimsoyisim,eposta,sifre,telefon,durumu,silinmedurumu,kayittarihi,kayitipadresi) values(?,?,?,?,?,?,?,?)");
            $uyeekle->execute([$gelenisimsoyisim,$geleneposta,$md5lisifre,$gelentelefon,1,0,$zamandamgasi,$ipadresi]);
            $kayitkontrol     =   $uyeekle->rowcount();  
                if($kayitkontrol>0){
                    Header("Location:index.php?sk=10");
                    exit(); 
                 }else{
                    Header("Location:index.php?sk=11");
                    exit(); 
                }
                     
                }
            }
    }else{
        header("Location:index.php?sk=11");
        exit();
    }

?>