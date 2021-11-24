<?php if(isset($_SESSION["kullanici"])){ ?>

<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="index.php?sk=0">Anasayfa</a> / Hesabım / Bilgilerim</span>
    <h2>Bilgilerim</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="spacer">
<div class="row register">
  <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">
    <form action="index.php?sk=18" method="POST">
       <h4>Isim Soyisim</h4>
      <p><?php echo $isimsoyisim;?></p>
      <h4>E-Mail Adresi</h4>
      <p><?php echo $eposta;?></p>
      <h4>Telefon Numarası</h4>
      <p><?php echo $telefon;?></p>
      <button type="submit" class="btn btn-success" name="Submit">Bilgilerimi Güncelle</button> 
      </form>       
  </div>
</div>
</div>
</div>

<?php 
}else{
    header("location:index.php");
    exit();    
}
?>