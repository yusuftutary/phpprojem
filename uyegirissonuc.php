<?php 
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
$md5lisifre     = md5($gelensifre);
if (($geleneposta!="") and ($gelensifre!="")){
    $kontrolsorgusu    =   $baglanti->prepare("SELECT * from uyeler where eposta=? and sifre=? and silinmedurumu=?");
    $kontrolsorgusu->execute([$geleneposta,$md5lisifre,0]);
    $kullanicisayisi     =   $kontrolsorgusu->rowcount();
    $kullanicikaydi      =   $kontrolsorgusu->fetch(PDO::FETCH_ASSOC);
    if($kullanicisayisi>0){  
            $_SESSION["kullanici"]=$geleneposta;
             if($_SESSION["kullanici"]==$geleneposta){
                 header("Location:index.php?sk=17");
                 exit();                
             }else{
                 header("Location:index.php?sk=15");
                 exit();    
             }           
        header("Location:index.php");
        exit();     
    
    }else{
        header("Location:index.php?sk=16");
        exit();
    }
}else{
    header("Location:index.php?sk=15");
    exit();
}
?>
