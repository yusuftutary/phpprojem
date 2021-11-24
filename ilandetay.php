<?php
if(isset($_REQUEST["id"])){
$gelenid                 =   sayiliiceriklerifiltrele(guvenlik($_REQUEST["id"]));

$ilanhitguncelle             =   $baglanti->prepare("UPDATE ilanlar set goruntulenmesayisi=goruntulenmesayisi+1 where id=? and yayindurumu= ? limit 1");
$ilanhitguncelle->execute([$gelenid,1]);

$ilansorgusu             =   $baglanti->prepare("SELECT * from ilanlar where id=? and yayindurumu= ? limit 1");
$ilansorgusu->execute([$gelenid,1]);
$ilansayisi              =   $ilansorgusu->rowcount();
$ilandetay        =   $ilansorgusu->fetch(PDO::FETCH_ASSOC);
if($ilansayisi>0){
$kategorituru                =   $ilandetay["kategorituru"];
if(($kategorituru=="Satılık Daire") or ($kategorituru=="Satılık İşyeri") or ($kategorituru=="Satılık Arsa")){
$resimklasoru="satilikilanlar";
}elseif(($kategorituru=="Kiralık Daire") or ($kategorituru=="Kiralık İşyeri") or ($kategorituru=="Kiralık Günlük")){
$resimklasoru="kiralikilanlar";
}
?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="index.php?sk=0">Anasayfa</a> / İlan Detayı</span>
    <h2>İlan Detayı</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="properties-listing spacer">

<div class="row">
<div class="col-lg-3 col-sm-4 hidden-xs">

<div class="hot-properties hidden-xs">
<h4>Benzer İlanlar</h4>

<?php 

  $ilanlarsorgusu = $baglanti->prepare("SELECT * from ilanlar where yayindurumu='1' order by id asc limit 6");
  $ilanlarsorgusu->execute();
  $ilanlarsayisi = $ilanlarsorgusu->rowcount();
  $ilankayitlari = $ilanlarsorgusu->fetchall(PDO::FETCH_ASSOC);
  $dongusayisi=1;
  $sutunadetsayisi=4;
  foreach ($ilankayitlari as $kayitlar){ ?>
             
             
             <div class="row">
             <?php  if(($kayitlar["kategorituru"]=="Satılık Daire") or ($kayitlar["kategorituru"]=="Satılık İşyeri") or ($kayitlar["kategorituru"]=="Satılık Arsa")){ ?>
                <div class="col-lg-4 col-sm-5"><img src="resimler/ilanresimleri/satilikilanlar/<?php echo donusumlerigeridondur($kayitlar["ilanresmibir"]); ?>" class="img-responsive img-circle" alt="properties"></div>
                <?php }elseif(($kayitlar["kategorituru"]=="Kiralık Daire") or ($kayitlar["kategorituru"]=="Kiralık İşyeri") or ($kayitlar["kategorituru"]=="Kiralık Günlük")){ ?> 
                  <div class="col-lg-4 col-sm-5"><img src="resimler/ilanresimleri/kiralikilanlar/<?php echo donusumlerigeridondur($kayitlar["ilanresmibir"]); ?>" class="img-responsive img-circle" alt="properties"></div>

                  <?php } ?>


                <div class="col-lg-8 col-sm-7">
                  <h5><a href="index.php?sk=35&id=<?php echo donusumlerigeridondur($kayitlar["id"])?>"><?php echo donusumlerigeridondur($kayitlar["ilanadi"])?></a></h5>
                  <p class="price"><?php echo fiyatbicimlendir(donusumlerigeridondur($kayitlar["ilanfiyati"]));?>₺</p> </div>
              </div>

              <?php 
			$dongusayisi++;
		if ($dongusayisi>$sutunadetsayisi) {
			$dongusayisi=1;
			} 
		}
    ?>

</div>

<div class="advertisement">
  <h4></h4>
  <img src="images/advertisements.jpg" class="img-responsive" alt="advertisement">

</div>

</div>

<div class="col-lg-9 col-sm-8 ">

<h2><?php echo donusumlerigeridondur($ilandetay["ilanadi"])?></h2>
<div class="row">
  <div class="col-lg-8">
  <div class="property-images">
    <!-- Slider Starts -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators hidden-xs">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <?php if(donusumlerigeridondur($ilandetay["ilanresmiiki"])!=""){ ?>  
        <li data-target="#myCarousel" data-slide-to="1" class="1"></li>
        <?php }if(donusumlerigeridondur($ilandetay["ilanresmiuc"])!=""){ ?>  
        <li data-target="#myCarousel" data-slide-to="2" class="2"></li>
        <?php }if(donusumlerigeridondur($ilandetay["ilanresmidort"])!=""){ ?>  
        <li data-target="#myCarousel" data-slide-to="3" class="3"></li>
        <?php }if(donusumlerigeridondur($ilandetay["ilanresmibes"])!=""){ ?>  
        <li data-target="#myCarousel" data-slide-to="4" class="4"></li>
        <?php }if(donusumlerigeridondur($ilandetay["ilanresmialti"])!=""){ ?>  
        <li data-target="#myCarousel" data-slide-to="5" class="5"></li>
        <?php }if(donusumlerigeridondur($ilandetay["ilanresmiyedi"])!=""){ ?>  
        <li data-target="#myCarousel" data-slide-to="6" class="6"></li>
        <?php }if(donusumlerigeridondur($ilandetay["ilanresmisekiz"])!=""){ ?>  
        <li data-target="#myCarousel" data-slide-to="7" class="7"></li>
        <?php }if(donusumlerigeridondur($ilandetay["ilanresmidokuz"])!=""){ ?>  
        <li data-target="#myCarousel" data-slide-to="8" class="8"></li>
        <?php }if(donusumlerigeridondur($ilandetay["ilanresmion"])!=""){ ?>  
        <li data-target="#myCarousel" data-slide-to="9" class="9"></li>
        <?php } ?>
      </ol>
      <div class="carousel-inner">
            <!-- Item 1 -->
            <div class="item active">
            <img src="resimler/ilanresimleri/<?php echo $resimklasoru;?>/<?php echo donusumlerigeridondur($ilandetay["ilanresmibir"]); ?>" class="properties" alt="properties" />
            </div>
            <!-- #Item 1 -->
            <?php if(donusumlerigeridondur($ilandetay["ilanresmiiki"])!=""){ ?>  
            <!-- Item 2 -->
            <div class="item 1">
            <img src="resimler/ilanresimleri/<?php echo $resimklasoru;?>/<?php echo donusumlerigeridondur($ilandetay["ilanresmiiki"]); ?>" class="properties" alt="properties" />
            </div>
            <!-- #Item 2 -->
            <?php }if(donusumlerigeridondur($ilandetay["ilanresmiuc"])!=""){ ?>  
            <!-- Item 3 -->
            <div class="item 2">
            <img src="resimler/ilanresimleri/<?php echo $resimklasoru;?>/<?php echo donusumlerigeridondur($ilandetay["ilanresmiuc"]); ?>" class="properties" alt="properties" />
            </div>
            <!-- #Item 3 -->
            <?php }if(donusumlerigeridondur($ilandetay["ilanresmidort"])!=""){ ?>  
            <!-- Item 4 -->
            <div class="item 3">
            <img src="resimler/ilanresimleri/<?php echo $resimklasoru;?>/<?php echo donusumlerigeridondur($ilandetay["ilanresmidort"]); ?>" class="properties" alt="properties" />
            </div>
            <!-- # Item 4 -->
            <?php }if(donusumlerigeridondur($ilandetay["ilanresmibes"])!=""){ ?>  
            <!-- Item 5 -->
            <div class="item 4">
            <img src="resimler/ilanresimleri/<?php echo $resimklasoru;?>/<?php echo donusumlerigeridondur($ilandetay["ilanresmibes"]); ?>" class="properties" alt="properties" />
            </div>
            <!-- # Item 5 -->
            <?php }if(donusumlerigeridondur($ilandetay["ilanresmialti"])!=""){ ?>  
            <!-- Item 6 -->
            <div class="item 5">
            <img src="resimler/ilanresimleri/<?php echo $resimklasoru;?>/<?php echo donusumlerigeridondur($ilandetay["ilanresmialti"]); ?>" class="properties" alt="properties" />
            </div>
            <!-- # Item 6 -->
            <?php }if(donusumlerigeridondur($ilandetay["ilanresmiyedi"])!=""){ ?>  
            <!-- Item 7 -->
            <div class="item 6">
            <img src="resimler/ilanresimleri/<?php echo $resimklasoru;?>/<?php echo donusumlerigeridondur($ilandetay["ilanresmiyedi"]); ?>" class="properties" alt="properties" />
            </div>
            <!-- # Item 7 -->
            <?php }if(donusumlerigeridondur($ilandetay["ilanresmisekiz"])!=""){ ?>  
            <!-- Item 8 -->
            <div class="item 7">
            <img src="resimler/ilanresimleri/<?php echo $resimklasoru;?>/<?php echo donusumlerigeridondur($ilandetay["ilanresmisekiz"]); ?>" class="properties" alt="properties" />
            </div>
            <!-- # Item 8 -->
            <?php }if(donusumlerigeridondur($ilandetay["ilanresmidokuz"])!=""){ ?>  
            <!-- Item 9 -->
            <div class="item 8">
            <img src="resimler/ilanresimleri/<?php echo $resimklasoru;?>/<?php echo donusumlerigeridondur($ilandetay["ilanresmidokuz"]); ?>" class="properties" alt="properties" />
            </div>
            <!-- # Item 9 -->
            <?php }if(donusumlerigeridondur($ilandetay["ilanresmion"])!=""){ ?>  
            <!-- Item 10 -->
            <div class="item 9">
            <img src="resimler/ilanresimleri/<?php echo $resimklasoru;?>/<?php echo donusumlerigeridondur($ilandetay["ilanresmion"]); ?>" class="properties" alt="properties" />
            </div> 
            <!-- # Item 10 -->
            <?php } ?>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
<!-- #Slider Ends -->

  </div>
  
  <div class="spacer"><h4><span class="glyphicon glyphicon-th-list"></span> Açıklamalar 
  <?php if (isset($_SESSION["kullanici"])){ ?> 
  <a href="index.php?sk=26&id=<?php echo $ilandetay["id"];?>" class="btn btn-primary" style="width: 150px; float:right; vertical-align:top;">Favorilere Ekle</a>
  <?php }else{ ?>
    <a data-toggle="modal" data-target="#loginpop" class="btn btn-primary" style="width: 150px; float:right; vertical-align:top; cursor:pointer;">Favorilere Ekle</a>
    <?php } ?> 
</h4>
  <p><?php echo donusumlerigeridondur($ilandetay["ilanaciklamasi"]); ?></p>

  </div>
  <div><h4><span class="glyphicon glyphicon-map-marker"></span> Konum</h4>
<div class="well"><iframe width="100%" height="335" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3010.7929331225755!2d28.836070415197977!3d41.0079051793007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14caa4bdb9ef4af9%3A0xc4a69a9549df970c!2sSAL%C4%B0H%20EMLAK!5e0!3m2!1str!2str!4v1630318394056!5m2!1str!2str" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe></div>
  </div>

  </div>
  <div class="col-lg-4">
  <div class="col-lg-12  col-sm-6">
<div class="property-info">
<p class="price"><?php echo fiyatbicimlendir(donusumlerigeridondur($ilandetay["ilanfiyati"])); ?> ₺</p>
  <p class="area"><span class="glyphicon glyphicon-map-marker"></span> <?php echo donusumlerigeridondur($ilandetay["adresilce"]); ?> / <?php echo donusumlerigeridondur($ilandetay["adresmahalle"]); ?></p>

    <h6><span class="glyphicon glyphicon-home"></span> Özellikler</h6>
    <div class="profile">
    <span style="font-weight: bold;">İlan Numarası  </span><span style="padding-left: 20px;">: <?php echo donusumlerigeridondur($ilandetay["id"]); ?></span><br />
    <span style="font-weight: bold;">İlan Tarihi  </span><span style="padding-left: 46px;">: <?php echo tamtarih(donusumlerigeridondur($ilandetay["ilantarihi"])); ?></span><br />
    
    <?php if($ilandetay["depozito"]!=""){ ?>
    <span style="font-weight: bold;">Depozito  </span><span style="padding-left: 52px;">: <?php echo donusumlerigeridondur($ilandetay["depozito"]); ?></span><br />
    <?php }?>
    <span style="font-weight: bold;">Emlak Tipi  </span><span style="padding-left: 42px;">: <?php echo donusumlerigeridondur($ilandetay["kategorituru"]); ?></span><br />
    <span style="font-weight: bold;">Metrekare  </span><span style="padding-left: 46px;">: <?php echo donusumlerigeridondur($ilandetay["metrekare"]); ?></span><br />
    <span style="font-weight: bold;">Oda Sayısı  </span><span style="padding-left: 41px;">: <?php echo donusumlerigeridondur($ilandetay["odasayisi"]); ?></span><br />
    <span style="font-weight: bold;">Bina Yaşı  </span><span style="padding-left: 50px;">: <?php echo donusumlerigeridondur($ilandetay["binayasi"]); ?></span><br />
    <span style="font-weight: bold;">Kat Sayısı  </span><span style="padding-left: 46px;">: <?php echo donusumlerigeridondur($ilandetay["katsayisi"]); ?></span><br />
    <span style="font-weight: bold;">Bulunduğu Kat  </span><span style="padding-left: 15px;">: <?php echo donusumlerigeridondur($ilandetay["bulundugukat"]); ?></span><br />
    <span style="font-weight: bold;">Isıtma Tipi  </span><span style="padding-left: 44px;">: <?php echo donusumlerigeridondur($ilandetay["isitmatipi"]); ?></span><br />
    <span style="font-weight: bold;">Balkon  </span><span style="padding-left: 65px;">: <?php echo donusumlerigeridondur($ilandetay["balkon"]); ?></span><br />
    <span style="font-weight: bold;">Banyo Sayısı  </span><span style="padding-left: 28px;">: <?php echo donusumlerigeridondur($ilandetay["banyosayisi"]); ?></span><br />
    <span style="font-weight: bold;">Eşya Durumu  </span><span style="padding-left: 25px;">: <?php echo donusumlerigeridondur($ilandetay["esya"]); ?></span><br />
    <span style="font-weight: bold;">Kullanım Durumu  </span><span style="padding-left: -2px;">: <?php echo donusumlerigeridondur($ilandetay["kullanimdurumu"]); ?></span><br />
    <span style="font-weight: bold;">Aidat  </span><span style="padding-left: 77px;">: <?php echo donusumlerigeridondur($ilandetay["aidat"]); if($ilandetay["aidat"]!="Belirtilmemiş"){?> ₺<?php } ?></span><br />
    <span style="font-weight: bold;">Kredi Durumu  </span><span style="padding-left: 23px;">: <?php echo donusumlerigeridondur($ilandetay["kredidurumu"]); ?></span><br />
    <span style="font-weight: bold;">Tapu Durumu</span><span style="padding-left: 30px;">: <?php echo donusumlerigeridondur($ilandetay["tapudurumu"]); ?></span><br />

  </div>
  <div class="profile">
  <span class="glyphicon glyphicon-user"></span> Danışman
  <p>Selçuk TUTAR<br>0(545) 833 34 50</p>
  </div>
</div>
</div>
</div>
</div>
</div>
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