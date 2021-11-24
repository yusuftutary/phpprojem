<?php if(isset($_SESSION["kullanici"])){    

        if (isset($_GET["id"])){
            $gelenid  = guvenlik($_GET["id"]);   
        }else{
            $gelenid="";
        }
            if($gelenid!=""){
                $favorisil    =   $baglanti->prepare("DELETE from favoriler where ilanid=? and uyeid=? LIMIT 1");
                $favorisil->execute([$gelenid, $kullaniciid]);
                $favorisilmesayisi     =   $favorisil->rowcount();
                if($favorisilmesayisi>0){
                header("location:index.php?sk=24");
                exit();    
                }else{
                header("location:index.php?sk=30");
                exit();                      
                }
            }else{  
                header("location:index.php?sk=30");
                exit();    
            }
}else{
    header("location:index.php");
    exit();    
}
?>
