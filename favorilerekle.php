<?php if(isset($_SESSION["kullanici"])){    

if (isset($_GET["id"])){
    $gelenid  = guvenlik($_GET["id"]);   
}else{
    $gelenid="";
}
if($gelenid!=""){
    $favorikontrolsorgusu    =   $baglanti->prepare("SELECT * from favoriler where ilanid=? and uyeid=? limit 1");
    $favorikontrolsorgusu->execute([$gelenid,$kullaniciid]);
    $favorikontrolsayisi     =   $favorikontrolsorgusu->rowcount();
        if($favorikontrolsayisi>0){
            header("location:index.php?sk=28");
            exit(); 
        }else{
            $favorieklemesorgusu    =   $baglanti->prepare("INSERT into favoriler(ilanid,uyeid) values(?,?)");
            $favorieklemesorgusu->execute([$gelenid,$kullaniciid]);
            $favorieklemesayisi     =   $favorieklemesorgusu->rowcount();
            if($favorieklemesayisi>0){
                header("location:index.php?sk=24");
                exit();  
            }else{
            header("location:index.php?sk=27");
            exit();                      
            }
        }

    }else{
        header("location:index.php");
        exit();    
    }
}else{
header("location:index.php");
exit();    
}
?>
