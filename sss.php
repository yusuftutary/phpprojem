
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="index.php?sk=0">Anasayfa</a> / Sık Sorulan Sorular</span>
    <h2>Sık Sorulan Sorular</h2>
</div>
</div>
<!-- banner -->
          <?php 
        			$sorusorgusu          =   $baglanti->prepare("SELECT * from sorular");
        			$sorusorgusu->execute();
        			$sorusayisi           =   $sorusorgusu->rowcount();
        			$sorukayitlari        =   $sorusorgusu->fetchall(PDO::FETCH_ASSOC);
        			foreach ($sorukayitlari as $kayitlar) {	
    			?>
<div class="container">
<div class="spacer">
<div class="">
  <div class="col-lg-8  col-lg-offset-2">
  <h4 id="<?php echo $kayitlar["id"]; ?>" class="sorununbaslikalani" onClick="$.soruicerigigoster(<?php echo $kayitlar["id"]; ?>)" style="cursor:pointer; "><?php echo $kayitlar["soru"]; ?></h4>
  <p class="sorununcevapalani" style="display: none; margin-bottom:-20px;"><?php echo $kayitlar["cevap"]; ?></p>
  </div>
</div>
</div>
</div>
<?php 
}
?>


