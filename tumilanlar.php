<?php
if(isset($_REQUEST["kategoriid"])){
	$gelenkategoriid               =   sayiliiceriklerifiltrele(guvenlik($_REQUEST["kategoriid"]));
	$kategorikosulu                =   " AND kategoriid ='" . $gelenkategoriid . "'";
	$sayfalamakosulu          	   =   "&kategoriid=" . $gelenkategoriid;
	}else{
		$gelenkategoriid           =   "";
		$kategorikosulu            =   "";
		$sayfalamakosulu           =   "";
    $fiyatsayfalamakosulu      =   "";
    $bolgesayfalamakosulu      =   "";
    $tipsayfalamakosulu        =   "";

	}
	if(isset($_REQUEST["aramaicerigi"])){
		$gelenaramaicerigi     =   guvenlik($_REQUEST["aramaicerigi"]);
		$aramakosulu           =   " AND ilanadi like '%" . $gelenaramaicerigi . "%'"; 
		$sayfalamakosulu       .=   "&aramaicerigi=" . $gelenaramaicerigi;
		}else{
		$aramakosulu           =   "";
		$sayfalamakosulu       .=   "";
		}
    $fiyati = "";
    if(isset($_REQUEST["fiyat"])){
    $gelenfiyatsecimi = ($_REQUEST["fiyat"]);
    if($gelenfiyatsecimi==1){
      $fiyati = " AND ilanfiyati BETWEEN 200000 AND 300000"; 
    }elseif($gelenfiyatsecimi==2){
      $fiyati = " AND ilanfiyati BETWEEN 300001 AND 450000"; 
    }elseif($gelenfiyatsecimi==3){
      $fiyati = " AND ilanfiyati BETWEEN 450001 AND 650000"; 
    }elseif($gelenfiyatsecimi==4){
      $fiyati = " AND ilanfiyati > 650001"; 
    }
      $gelenfiyatkosulu           =   guvenlik($_REQUEST["fiyat"]);
      $fiyataramakosulu           =   $fiyati; 
      $fiyatsayfalamakosulu       .=   "&fiyat=" . $gelenfiyatkosulu;
      }else{
      $fiyataramakosulu           =   "";
      $fiyatsayfalamakosulu       .=   "";
      }
      $bolgesi = "";
      if(isset($_REQUEST["bolge"])){
      $gelenbolgesecimi = ($_REQUEST["bolge"]);
      if($gelenbolgesecimi==1){
        $bolgesi = " AND adresmahalle = 'Zafer Mah.'"; 
      }elseif($gelenbolgesecimi==2){
        $bolgesi = " AND adresmahalle = 'Hürriyet Mah.'"; 
      }elseif($gelenbolgesecimi==3){
        $bolgesi = " AND adresmahalle = 'Çobançeşme'"; 
      }elseif($gelenbolgesecimi==4){
        $bolgesi = " AND adresmahalle = 'Fevzi Çakmak'"; 
      }elseif($gelenbolgesecimi==5){
        $bolgesi = " AND adresmahalle = 'Yenibosna Merkez'"; 
      }elseif($gelenbolgesecimi==6){
        $bolgesi = " AND adresmahalle = 'Cumhuriyet'"; 
      }elseif($gelenbolgesecimi==7){
        $bolgesi = " AND adresmahalle = 'Soğanlı'"; 
      }elseif($gelenbolgesecimi==8){
        $bolgesi = " AND adresmahalle = 'Siyavuşpaşa'"; 
      }elseif($gelenbolgesecimi==9){
        $bolgesi = " AND adresmahalle = 'Şirinevler'"; 
      }elseif($gelenbolgesecimi==10){
        $bolgesi = " AND adresmahalle = 'Kocasinan'"; 
      }
        $gelenbolgekosulu           =   guvenlik($_REQUEST["bolge"]);
        $bolgearamakosulu           =   $bolgesi; 
        $bolgesayfalamakosulu       .=   "&bolge=" . $gelenbolgekosulu;
        }else{
        $bolgearamakosulu           =   "";
        $bolgesayfalamakosulu       .=   "";
        }
        $tip = "";
        if(isset($_REQUEST["tip"])){
        $gelentipsecimi = ($_REQUEST["tip"]);
        if($gelentipsecimi==1){
          $tip = " AND kategorituru = 'Satılık Daire' or kategorituru = 'Satılık İşyeri' or kategorituru = 'Satılık Arsa'"; 
        }elseif($gelentipsecimi==2){
          $tip = " AND kategorituru = 'Kiralık Daire' or kategorituru = 'Kiralık İşyeri' or kategorituru = 'Kiralık Günlük'"; 
        }
          $gelentipkosulu           =   guvenlik($_REQUEST["tip"]);
          $tiparamakosulu           =   $tip; 
          $tipsayfalamakosulu       .=   "&tip=" . $gelentipkosulu;
          }else{
          $tiparamakosulu           =   "";
          $tipsayfalamakosulu       .=   "";
          }
    
	$sayfalamaicinsolvesagbutonsayisi    = 2;
	$sayfabasinagosterilecekkayitsayisi  = 9;
	$toplamkayitsayisisorgusu            =   $baglanti->prepare("SELECT * from ilanlar where yayindurumu='1' $kategorikosulu $aramakosulu $fiyataramakosulu $bolgearamakosulu $tiparamakosulu order by id desc");
	$toplamkayitsayisisorgusu->execute();
	$toplamkayitsayisisorgusu            =   $toplamkayitsayisisorgusu->rowcount();
	$sayfalamayabaslanacakkayitsayisi    =   ($sayfalama * $sayfabasinagosterilecekkayitsayisi)-$sayfabasinagosterilecekkayitsayisi;
	$bulunansayfasayisi                  =   ceil($toplamkayitsayisisorgusu/$sayfabasinagosterilecekkayitsayisi);
	
?> 
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="index.php">Anasayfa</a> / Tüm İlanlar</span>
    <h2>Tüm İlanlar</h2>
</div>
</div>
<!-- banner -->

<div class="container">
<div class="properties-listing spacer">

<div class="row">
<div class="col-lg-3 col-sm-4 ">

   <div class="search-form"><h4><span class="glyphicon glyphicon-search"></span> İlan Arama</h4>
   <form action="index.php?sk=34" method="POST">
   <?php if($gelenkategoriid!=""){?>
   <input type="hidden" name="kategoriid" value="<?php echo $gelenkategoriid; ?>">
   <?php } ?>
    <input type="text" class="form-control" placeholder="Arama Yap" name="aramaicerigi">
          <div class="row">
          <div class="col-lg-12">
              <select name="tip" class="form-control">
              <option>Konut Tipi</option>
              <option value="1">Satılık</option>
              <option value="2">Kiralık</option>
              </select>
            </div><br /><br />
            <div class="col-lg-12">
              <select name="fiyat" class="form-control">
                <option>Fiyat Aralığı</option>
                <option value="1">₺200,000 - ₺300,000</option>
                <option value="2">₺300,000 - ₺450,000</option>
                <option value="3">₺450,000 - ₺650,000</option>
                <option value="4">₺700,000 - Üzeri</option>
              </select>
            </div>
          </div>
          <div class="row">
          <div class="col-lg-12">
          <select name="bolge" class="form-control">
                <option>Bölge</option>
                <option value="1">Zafer Mah.</option>
                <option value="2">Hürriyet Mah.</option>
                <option value="3">Çobançeşme</option>
                <option value="4">Fevzi Çakmak</option>
                <option value="5">Yenibosna Merkez</option>
                <option value="6">Cumhuriyet</option>
                <option value="7">Soğanlı</option>
                <option value="8">Siyavuşpaşa</option>
                <option value="9">Şirinevler</option>
                <option value="10">Kocasinan</option>
              </select>
              </div>
          </div>
          <input type="submit" class="btn btn-primary" value="Arama Yap">
   </form>
  </div>

<div class="hot-properties hidden-xs">
<h4>Benzer İlanlar</h4>
<?php 

  $ilanlarsorgusu = $baglanti->prepare("SELECT * from ilanlar where yayindurumu='1' $kategorikosulu $aramakosulu $fiyataramakosulu $bolgearamakosulu $tiparamakosulu order by id asc limit $sayfalamayabaslanacakkayitsayisi,$sayfabasinagosterilecekkayitsayisi");
  $ilanlarsorgusu->execute();
  $ilansayisi = $ilanlarsorgusu->rowcount();
  $ilankayitlari = $ilanlarsorgusu->fetchall(PDO::FETCH_ASSOC);
  $dongusayisi=1;
  $sutunadetsayisi=4;
  foreach ($ilankayitlari as $kayitlar){

  if(($kayitlar["kategorituru"]=="Satılık Daire") or ($kayitlar["kategorituru"]=="Satılık İşyeri") or ($kayitlar["kategorituru"]=="Satılık Arsa")){ ?>
             
             
             <div class="row">
                <div class="col-lg-4 col-sm-5"><img src="resimler/ilanresimleri/satilikilanlar/<?php echo donusumlerigeridondur($kayitlar["ilanresmibir"]); ?>" class="img-responsive img-circle" alt="properties"></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="index.php?sk=35&id=<?php echo donusumlerigeridondur($kayitlar["id"])?>"><?php echo donusumlerigeridondur($kayitlar["ilanadi"]);?></a></h5>
                  <p class="price"><?php echo fiyatbicimlendir(donusumlerigeridondur($kayitlar["ilanfiyati"]));?>₺</p> </div>
              </div>

              <?php }else{ ?> 

                <div class="row">
                <div class="col-lg-4 col-sm-5"><img src="resimler/ilanresimleri/kiralikilanlar/<?php echo donusumlerigeridondur($kayitlar["ilanresmibir"]); ?>" class="img-responsive img-circle" alt="properties"></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="index.php?sk=35&id=<?php echo donusumlerigeridondur($kayitlar["id"])?>"><?php echo donusumlerigeridondur($kayitlar["ilanadi"])?></a></h5>
                  <p class="price"><?php echo fiyatbicimlendir(donusumlerigeridondur($kayitlar["ilanfiyati"]));?>₺</p> </div>
              </div>

              <?php } 
			$dongusayisi++;
		if ($dongusayisi>$sutunadetsayisi) {
			$dongusayisi=1;
			} 
		}
    ?>
</div>
</div>
<div class="col-lg-9 col-sm-8">
<div class="sortby clearfix">
  <div class="pull-left" style="margin-top: 10px; margin-bottom:10px;">
  <div style="text-align: left; margin-top:10px;">Toplam <?php echo $bulunansayfasayisi;?> Sayfada, <?php echo $toplamkayitsayisisorgusu;?> Adet Kayıt Bulunmaktadır  </div>
   <!-- <span><a href="index.php?sk=34&siralama=1">Fiyata Göre Artan</a></span> | <span><a href="index.php?sk=34&siralama=2">Fiyata Göre Azalan</span> | <span><a href="index.php?sk=34&siralama=3">Önce En Yeniler</span> | <span><a href="index.php?sk=34&siralama=4">En Çok Görüntülenenler</span> -->
  </div>
</div>
<div class="row">
<?php
  $ilanlarsorgusu = $baglanti->prepare("SELECT * from ilanlar where yayindurumu='1' $kategorikosulu $aramakosulu $fiyataramakosulu $bolgearamakosulu $tiparamakosulu order by id desc limit $sayfalamayabaslanacakkayitsayisi,$sayfabasinagosterilecekkayitsayisi");
  $ilanlarsorgusu->execute();
  $ilansayisi = $ilanlarsorgusu->rowcount();
  $ilankayitlari = $ilanlarsorgusu->fetchall(PDO::FETCH_ASSOC);
  $dongusayisi=1;
  $sutunadetsayisi=4;
  foreach ($ilankayitlari as $kayitlar){
  ?>
     <!-- properties -->
      <div class="col-lg-4 col-sm-6">
<div class="properties">
      <?php  if(($kayitlar["kategorituru"]=="Satılık Daire") or ($kayitlar["kategorituru"]=="Satılık İşyeri") or ($kayitlar["kategorituru"]=="Satılık Arsa")){ ?>

        <div class="image-holder"><img src="resimler/ilanresimleri/satilikilanlar/<?php echo donusumlerigeridondur($kayitlar["ilanresmibir"]); ?>" class="img-responsive" alt="properties">

        <?php }elseif(($kayitlar["kategorituru"]=="Kiralık Daire") or ($kayitlar["kategorituru"]=="Kiralık İşyeri") or ($kayitlar["kategorituru"]=="Kiralık Günlük")){ ?> 

          <div class="image-holder"><img src="resimler/ilanresimleri/kiralikilanlar/<?php echo donusumlerigeridondur($kayitlar["ilanresmibir"]); ?>" class="img-responsive" alt="properties">
<?php } ?>

          <?php if(($kayitlar["kategorituru"]=="Satılık Daire") or ($kayitlar["kategorituru"]=="Satılık İşyeri") or ($kayitlar["kategorituru"]=="Satılık Arsa")){ ?> 
            <div class="status sold">Salih Emlak'tan Satılık</div>  <?php }else{ ?><div class="status new">Salih Emlak'tan Kiralık</div> <?php } ?> 
        </div>
        <h4 style="height: 55px;"><a href="index.php?sk=35&id=<?php echo donusumlerigeridondur($kayitlar["id"])?>"><?php echo donusumlerigeridondur($kayitlar["ilanadi"])?></a></h4>
        <p class="price">
       <?php if(($kayitlar["kategorituru"]=="Satılık Daire") or ($kayitlar["kategorituru"]=="Satılık İşyeri") or ($kayitlar["kategorituru"]=="Satılık Arsa")){ ?>Fiyat : <?php }else{ ?>Kira :  <?php } echo fiyatbicimlendir(donusumlerigeridondur($kayitlar["ilanfiyati"]));?>₺</p>
        <p class="area"><span class="glyphicon glyphicon-map-marker"></span> <?php echo donusumlerigeridondur($kayitlar["adresilce"]); ?> / <?php echo donusumlerigeridondur($kayitlar["adresmahalle"]); ?></p>
        <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Metrekare"><?php echo donusumlerigeridondur($kayitlar["metrekare"]);?></span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Oda Sayısı"><?php echo donusumlerigeridondur($kayitlar["odasayisi"]);?></span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bina Yaşı"><?php echo donusumlerigeridondur($kayitlar["binayasi"]);?></span></div>
        <a class="btn btn-primary" href="index.php?sk=35&id=<?php echo donusumlerigeridondur($kayitlar["id"])?>">İlana Git</a>
      </div>
      </div>
      <!-- properties -->
      <?php
			$dongusayisi++;
		if ($dongusayisi>$sutunadetsayisi) {
			$dongusayisi=1;
			} 
		}

																							
      if($bulunansayfasayisi>1){
      ?>
      </div>
    <div class="sayfalamaalanikapsayicisi" align="center">

      <div class="sayfalamaalaniicinumaraalanikapsayicisi">		
    <?php
    if ($sayfalama>1){
    echo "<span class='sayfalamapasif'><a href='index.php?sk=34" . $sayfalamakosulu ."&syf=1'><<</a> </span>";
    $sayfalamaicinsayfadegerinibirgerial   =   $sayfalama-1;
    echo "<span class='sayfalamapasif'><a href='index.php?sk=34" . $sayfalamakosulu ."&syf=". $sayfalamaicinsayfadegerinibirgerial .  "'><</a> </span>";                                       
    }
    for($sayfalamaicinsayfaindexdegeri=$sayfalama-$sayfalamaicinsolvesagbutonsayisi;$sayfalamaicinsayfaindexdegeri<=
      $sayfalama+$sayfalamaicinsolvesagbutonsayisi; $sayfalamaicinsayfaindexdegeri++){
    if(($sayfalamaicinsayfaindexdegeri>0) and ($sayfalamaicinsayfaindexdegeri<=$bulunansayfasayisi)){
    if($sayfalama==$sayfalamaicinsayfaindexdegeri){
    echo "<span class='sayfalamaaktif'> " . $sayfalamaicinsayfaindexdegeri . "</span>";
    }else{
      echo "<span class='sayfalamapasif'><a href='index.php?sk=34" . $sayfalamakosulu ."&syf=". $sayfalamaicinsayfaindexdegeri . "'> ". 
          $sayfalamaicinsayfaindexdegeri . "</a> </span>";    
    }                                           
    }                                        
    }
    if($sayfalama!=$bulunansayfasayisi){
    $sayfalamaicinsayfadegerinibirilerial   =   $sayfalama+1;
    echo "<span class='sayfalamapasif'><a href='index.php?sk=34" . $sayfalamakosulu ."&syf=". $sayfalamaicinsayfadegerinibirilerial . "'>></a> </span>";   
    echo "<span class='sayfalamapasif'><a href='index.php?sk=34" . $sayfalamakosulu ."&syf=". $bulunansayfasayisi  . "'>>></a> </span>";

    }                                     
    ?>   
    </div>

    </div> 
  <?php    }    ?>
    
  <!--    <div class="center">
      <ul class="pagination"> 

          <li><a href="#">«</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li><a href="#">»</a></li>
        </ul>
      </div> -->

</div>
</div>
</div>
</div>
</div>
