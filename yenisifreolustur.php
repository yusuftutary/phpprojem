<?php 

if (isset($_GET["aktivasyonkodu"])){
    $gelenaktivasyonkodu  = guvenlik($_GET["aktivasyonkodu"]);
}else{
    $gelenaktivasyonkodu="";
}
if (isset($_GET["eposta"])){
    $geleneposta  = guvenlik($_GET["eposta"]);
}else{
    $geleneposta="";
}
if (($geleneposta!="") and ($gelenaktivasyonkodu!="")){    
    $kontrolsorgusu    =   $baglanti->prepare("SELECT * from uyeler where eposta=? and aktivasyonkodu=?");
    $kontrolsorgusu->execute([$geleneposta,$gelenaktivasyonkodu]);
    $kullanicisayisi     =   $kontrolsorgusu->rowcount();
    $kullanicikaydi      =   $kontrolsorgusu->fetch(PDO::FETCH_ASSOC);
        if($kullanicisayisi>0){
?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="index.php?sk=0">Anasayfa</a> / Yeni Şifre Belirleme</span>
    <h2>Yeni Şifre Belirleme</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="spacer">
<div class="row register">
  <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">
    <form action="index.php?sk=47&eposta=<?php echo $geleneposta; ?>&aktivasyonkodu=<?php echo $gelenaktivasyonkodu; ?>" method="POST">
      <input type="password" class="form-control" placeholder="Şifre" name="sifre" required style="margin-top: 100px;">
      <input type="password" class="form-control" placeholder="Şifre Tekrar" name="sifretekrar" required style="margin-top: 100px;">
      <input type="submit" class="btn btn-success" name="Submit" value="Şifre Oluştur">
      </form>       
  </div>
</div>
</div>
</div>

<?php
        }else{
          header("Location:index.php");
          exit();    
       }
       }else{
            header("Location:index.php");
            exit();
           }
?>