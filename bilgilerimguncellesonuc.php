<?php
if(isset($_SESSION["kullanici"])){ 
  
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
       if (($geleneposta!="") and ($gelensifre!="") and ($gelensifretekrar!="") and ($gelentelefon!="")){
            if($gelensifre!=$gelensifretekrar){
                     header("Location:index.php?sk=22");
                     exit();     
           }else{
                if($gelensifre=="eskisifre"){
                    $sifredegistirmedurumu  =   0;   
                }else{
                    $sifredegistirmedurumu  =   1;
                }
                       if($eposta!=$geleneposta){
                        
                          $kontrolsorgusu    =   $baglanti->prepare("SELECT * from uyeler where eposta=?");
                          $kontrolsorgusu->execute([$geleneposta]);
                          $kullanicisayisi     =   $kontrolsorgusu->rowcount();    
                              if($kullanicisayisi>0){
                                 header("Location:index.php?sk=23");
                                 exit(); 
                              }   
                       }
                            
                        if($sifredegistirmedurumu  ==   1){
                       $uyeguncelleme    =   $baglanti->prepare("UPDATE uyeler set isimsoyisim=? , eposta = ? , telefon = ? , sifre=? WHERE id = ? limit 1");
                       $uyeguncelleme->execute([$gelenisimsoyisim , $geleneposta , $gelentelefon , $md5lisifre, $kullaniciid]);

                        }else{
                       $uyeguncelleme    =   $baglanti->prepare("UPDATE uyeler set isimsoyisim=? , eposta = ? , telefon = ? WHERE id = ? limit 1");
                       $uyeguncelleme->execute([$gelenisimsoyisim , $geleneposta , $gelentelefon , $kullaniciid]);

                        }
                       $guncellekontrol     =   $uyeguncelleme->rowcount();

                        if($guncellekontrol>0){
                            $_SESSION["kullanici"]  =   $geleneposta;
                            Header("Location:index.php?sk=20");
                            exit();   
                    }else{ 
                      
                     Header("Location:index.php?sk=21");
                     exit(); 
                    }
                    }

 }else{
            header("Location:index.php?sk=21");
            exit();
        }
    }else{

             header("Location:index.php");
            exit();
    }
?>
