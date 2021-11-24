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
          $tip = " AND kategorituru = 'Satılık Daire'"; 
        }elseif($gelentipsecimi==2){
          $tip = " AND kategorituru = 'Kiralık Daire'"; 
        }
          $gelentipkosulu           =   guvenlik($_REQUEST["tip"]);
          $tiparamakosulu           =   $tip; 
          $tipsayfalamakosulu       .=   "&tip=" . $gelentipkosulu;
          }else{
          $tiparamakosulu           =   "";
          $tipsayfalamakosulu       .=   "";
          }
    
	$sayfalamaicinsolvesagbutonsayisi    = 2;
	$sayfabasinagosterilecekkayitsayisi  = 6;
	$toplamkayitsayisisorgusu            =   $baglanti->prepare("SELECT * from ilanlar where yayindurumu='1' $kategorikosulu $aramakosulu $fiyataramakosulu $bolgearamakosulu $tiparamakosulu order by id desc");
	$toplamkayitsayisisorgusu->execute();
	$toplamkayitsayisisorgusu            =   $toplamkayitsayisisorgusu->rowcount();
	$sayfalamayabaslanacakkayitsayisi    =   ($sayfalama * $sayfabasinagosterilecekkayitsayisi)-$sayfabasinagosterilecekkayitsayisi;
	$bulunansayfasayisi                  =   ceil($toplamkayitsayisisorgusu/$sayfabasinagosterilecekkayitsayisi);
	
?> 
<div class="">
      <div id="slider" class="sl-slider-wrapper">
        <div class="sl-slider">

          <?php 

          $ilanlarsorgusu1 = $baglanti->prepare("SELECT * from ilanlar where yayindurumu='1' order by ilantarihi desc limit 5");
          $ilanlarsorgusu1->execute();
          $ilansayisi1 = $ilanlarsorgusu1->rowcount();
          $ilankayitlari1 = $ilanlarsorgusu1->fetchall(PDO::FETCH_ASSOC);
          $dongusayisi1=1;
          $resimklasoru1   = "";

          foreach ($ilankayitlari1 as $kayitlar2){
          if(($kayitlar2["kategorituru"]=="Satılık Daire") or ($kayitlar2["kategorituru"]=="Satılık İşyeri") or ($kayitlar2["kategorituru"]=="Satılık Arsa")){
          $resimklasoru = "satilikilanlar";
          }else{
          $resimklasoru = "kiralikilanlar";
          } 
          if($dongusayisi1==1){
            $sliderresim  = ' <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
            <div class="sl-slide-inner"> <div class="bg-img bg-img-1"></div> ';
          }if($dongusayisi1==2){
            $sliderresim  = '<div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
            <div class="sl-slide-inner"> <div class="bg-img bg-img-2"></div> ';
          }if($dongusayisi1==3){
            $sliderresim  = '<div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
            <div class="sl-slide-inner"> <div class="bg-img bg-img-3"></div> ';
          }if($dongusayisi1==4){
            $sliderresim  = '<div class="sl-slide" data-orientation="vertical" data-slice1-rotation="-5" data-slice2-rotation="25" data-slice1-scale="2" data-slice2-scale="1">
            <div class="sl-slide-inner"> <div class="bg-img bg-img-4"></div> ';
          }if($dongusayisi1==5){
            $sliderresim  = '<div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
            <div class="sl-slide-inner"> <div class="bg-img bg-img-5"></div> ';
          }
          ?>

              <?php echo $sliderresim; ?>

              <h2><a href="index.php?sk=35&id=<?php echo donusumlerigeridondur($kayitlar2["id"])?>"><?php echo donusumlerigeridondur($kayitlar2["ilanadi"])?></a></h2>
              <blockquote>              
              <p class="location"><span class="glyphicon glyphicon-map-marker"></span> <?php echo donusumlerigeridondur($kayitlar2["adresilce"])?> / <?php echo donusumlerigeridondur($kayitlar2["adresmahalle"])?></p>
              <p><?php echo donusumlerigeridondur($kayitlar2["metrekare"])?> Metrekare <?php echo donusumlerigeridondur($kayitlar2["odasayisi"])?> <?php echo donusumlerigeridondur($kayitlar2["kategorituru"])?></p>
              <cite><?php echo fiyatbicimlendir(donusumlerigeridondur($kayitlar2["ilanfiyati"]))?>₺</cite>
              </blockquote>
            </div>
          </div>
          
    <?php      $dongusayisi1++;
		}
?>
        </div><!-- /sl-slider -->

        <nav id="nav-dots" class="nav-dots">
          <span class="nav-dot-current"></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </nav>

      </div><!-- /slider-wrapper -->
</div>

<div class="banner-search">
  <div class="container"> 
    <!-- banner -->
    <h3>Satın Al & Kirala</h3>
    <div class="searchbar">
      <div class="row">
        <div class="col-lg-6 col-sm-6">
        <form action="index.php?sk=0" method="POST">
        <?php if($gelenkategoriid!=""){?>
        <input type="hidden" name="kategoriid" value="<?php echo $gelenkategoriid; ?>">
        <?php } ?>
          <input type="text" class="form-control" placeholder="İlan Arama" name="aramaicerigi">
          <div class="row">
            <div class="col-lg-3 col-sm-3 ">
              <select name="tip" class="form-control">
              <option>Emlak Tipi</option>
              <option value="1">Satılık</option>
              <option value="2">Kiralık</option>
              </select>
            </div>
            <div class="col-lg-3 col-sm-4">
              <select name="fiyat" class="form-control">
                <option>Fiyat Aralığı</option>
                <option value="1">₺200,000 - ₺300,000</option>
                <option value="2">₺300,000 - ₺450,000</option>
                <option value="3">₺450,000 - ₺650,000</option>
                <option value="4">₺700,000 - Üzeri</option>
              </select>
            </div>
            <div class="col-lg-3 col-sm-4">
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
              <div class="col-lg-3 col-sm-4">
              <input type="submit" class="btn btn-success" value="Arama Yap">
              </div>        

          </div>
        </form>
        </div>
        <?php if(isset($_SESSION["kullanici"])){ ?>
          <div class="col-lg-5 col-lg-offset-1 col-sm-6 ">
          <p>Arama Yaparak İstediğiniz İlanlara Ulaşmak İçin Yan Taraftaki Alanı Kullanabilirsiniz.</p>
        </div>



          <?php }else{ ?>
        <div class="col-lg-5 col-lg-offset-1 col-sm-6 ">
          <p>Şimdi <a href ="index.php?sk=8">Üye Olun</a> ve Tüm Emlak Fırsatlarından Haberdar Olun.</p>
          <button class="btn btn-info"   data-toggle="modal" data-target="#loginpop">Giriş Yap</button>
        </div>
        <?php }?>
      </div>
    </div>
  </div>
</div>
<!-- banner -->
<div class="container">
  <div class="properties-listing spacer"> <a href="index.php?sk=34" class="pull-right viewall">Tüm Listeyi Görüntüle</a>
    <h2>Öne Çıkanlar</h2>
    <div id="owl-example" class="owl-carousel">

    <?php 

    $ilanlarsorgusu = $baglanti->prepare("SELECT * from ilanlar where yayindurumu='1' $kategorikosulu $aramakosulu $fiyataramakosulu $bolgearamakosulu $tiparamakosulu order by id desc limit 20");
    $ilanlarsorgusu->execute();
    $ilansayisi = $ilanlarsorgusu->rowcount();
    $ilankayitlari = $ilanlarsorgusu->fetchall(PDO::FETCH_ASSOC);
    $dongusayisi=1;
    $sutunadetsayisi=4;
    $resimklasoru   = "";

    foreach ($ilankayitlari as $kayitlar){
      if(($kayitlar["kategorituru"]=="Satılık Daire") or ($kayitlar["kategorituru"]=="Satılık İşyeri") or ($kayitlar["kategorituru"]=="Satılık Arsa")){
        $resimklasoru = "satilikilanlar";
      }else{
        $resimklasoru = "kiralikilanlar";
      } 
      ?>



      <div class="properties">
        <div class="image-holder"><img src="resimler/ilanresimleri/<?php echo $resimklasoru; ?>/<?php echo donusumlerigeridondur($kayitlar["ilanresmibir"]); ?>" class="img-responsive" alt="properties"/>
        <?php if(($kayitlar["kategorituru"]=="Satılık Daire") or ($kayitlar["kategorituru"]=="Satılık İşyeri") or ($kayitlar["kategorituru"]=="Satılık Arsa")){ ?> 
            <div class="status sold">Salih Emlak'tan Satılık</div>  <?php }else{ ?><div class="status new">Salih Emlak'tan Kiralık</div> <?php } ?> 
        </div>
        <h4 style="height: 55px;"><a href="index.php?sk=35&id=<?php echo donusumlerigeridondur($kayitlar["id"])?>"><?php echo donusumlerigeridondur($kayitlar["ilanadi"])?></a></h4>
        <p class="price"><?php if($resimklasoru == "satilikilanlar"){ ?>Fiyat : <?php }elseif($resimklasoru == "kiralikilanlar"){ ?>Kira : <?php } echo fiyatbicimlendir(donusumlerigeridondur($kayitlar["ilanfiyati"]));?>₺</p>
        <p style="height: 55px;" class="area"><span class="glyphicon glyphicon-map-marker"></span> <?php echo donusumlerigeridondur($kayitlar["adresilce"]); ?> / <?php echo donusumlerigeridondur($kayitlar["adresmahalle"]); ?></p>
        <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Metrekare"><?php echo donusumlerigeridondur($kayitlar["metrekare"]);?></span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Oda Sayısı"><?php echo donusumlerigeridondur($kayitlar["odasayisi"]);?></span>
      </div>
        <a class="btn btn-primary" href="index.php?sk=35&id=<?php echo donusumlerigeridondur($kayitlar["id"])?>">İlana Git</a>
      </div>

      <?php
			$dongusayisi++;
		if ($dongusayisi>$sutunadetsayisi) {
			$dongusayisi=1;
			} 
		}

			/*																				
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
  <?php    }  */  ?>


    
    </div>
  </div>
  <div class="spacer">
    <div class="row">
      <div class="col-lg-6 col-sm-9 recent-view">
        <h3>Hakkımızda</h3>
        <p>Bahçelievler’de gayrimenkul almak ta satmak ta artık çok kolay. Salih Emlak temiz, titiz, hızlı ve dürüst çalışma prensibiyle her zaman sizin yanınızda...<br>Yıllardır sektörün öncü firmalarından olmayı başaran Salih Emlak bir adım uzağınızda...<a href="index.php?sk=1">Devamını Oku</a></p>
      
      </div>
      <div class="col-lg-5 col-lg-offset-1 col-sm-3 recommended">
        <h3>Neden Salih Emlak ?</h3>
        <div id="myCarousel" class="carousel slide">
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1" class="1"></li>
            <li data-target="#myCarousel" data-slide-to="2" class="2"></li>
            <li data-target="#myCarousel" data-slide-to="3" class="3"></li>
          </ol>
          <!-- Carousel items -->
          <div class="carousel-inner">
            <div class="item active">
              <div class="row">
                <div class="col-lg-8">
                  <h5>Uygun Fiyatlar</h5>
                  <p class="price">Bütçenize Uygun Daireleri Bulabilirsiniz, Ofisimizi Ziyaret Ettiğinizde Size Alternatiflerle Birlikte Birçok Fırsat Sunuyoruz.</p>
                   </div>
              </div>
            </div>
            <div class="item ">
              <div class="row">
                <div class="col-lg-8">
                  <h5>Hızlı Hizmet</h5>
                  <p class="price">Uzman Ekibimizle Alış & Satış & Kiralama İşlemlerini 1 Güne Kadar Tamamlama Fırsatına Sahip Olabilirsiniz.</p>
                   </div>
              </div>
            </div>
            <div class="item ">
              <div class="row">
                <div class="col-lg-8">
                  <h5>Güvenilirlik</h5>
                  <p class="price">Bahçelievlerde 25 Yılı Aşkın Süredir Sizlere Hizmet Vermekteyiz, Aynı Güvenilirlikle Hizmet Vermeye de Devam Ediyoruz.</p>
                   </div>
              </div>
            </div>
            <div class="item ">
              <div class="row">
                <div class="col-lg-8">
                  <h5>Müşteri Bulmak</h5>
                  <p class="price">Daireniz Var, Satmak Ya da Kiralamak İstiyorsunuz Ama Müşteri mi Bulamıyorsunuz ? Telaş Etmeyin, Zengin Müşteri Portföyüyle Salih Emlak yanınızda.</p>
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
