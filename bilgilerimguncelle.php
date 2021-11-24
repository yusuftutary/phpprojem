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
    <form action="index.php?sk=19" method="POST">
      <input type="text" class="form-control" value="<?php echo $isimsoyisim; ?>" name="isimsoyisim" required>
      <input type="email" class="form-control" value="<?php echo $eposta; ?>" name="eposta" required>
      <input type="password" class="form-control" value="eskisifre" name="sifre" required>
      <input type="password" class="form-control" value="eskisifre" name="sifretekrar" required>
      <input type="tel" class="form-control" value="<?php echo $telefon; ?>" name="telefon" required>
      <button type="submit" class="btn btn-success" name="Submit">Güncelle</button> 
      </form>       
  </div>
</div>
</div>
</div>