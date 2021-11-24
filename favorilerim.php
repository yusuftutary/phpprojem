<?php if(isset($_SESSION["kullanici"])){  
      $sayfalamaicinsolvesagbutonsayisi    = 2;
      $sayfabasinagosterilecekkayitsayisi  = 5;
      $toplamkayitsayisisorgusu            =   $baglanti->prepare("SELECT * from favoriler where uyeid = ? order by id asc");
      $toplamkayitsayisisorgusu->execute([$kullaniciid]);
      $toplamkayitsayisisorgusu            =   $toplamkayitsayisisorgusu->rowcount();
      $sayfalamayabaslanacakkayitsayisi    =   ($sayfalama * $sayfabasinagosterilecekkayitsayisi)-$sayfabasinagosterilecekkayitsayisi;
      $bulunansayfasayisi                  =   ceil($toplamkayitsayisisorgusu/$sayfabasinagosterilecekkayitsayisi);
  ?>
  

<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="index.php?sk=0">Anasayfa</a> / Hesabım / Favorilerim</span>
    <h2>Favorilerim</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="spacer">
<div class="row contact">
      <div style="height: 20px;">
              <div style="background: #cccccc; color: black; font-weight: bold; float:left; padding-left:2px;" >&nbsp;İlan Resmi</div>
              <div style="background: #cccccc; color: black; font-weight: bold; float:left; padding-left:35px;">İlan Başlığı</div>
							<div style="background: #cccccc; color: black; font-weight: bold; float:left; padding-left:440px;">İlan Kategori</div>
              <div style="background: #cccccc; color: black; font-weight: bold; float:left; padding-left:45px; ">İlan Fiyatı</div>  
							<div style="background: #cccccc; color: black; font-weight: bold; float:left; padding-left:109px;">Yayın Durumu</div>
							<div style="background: #cccccc; color: black; font-weight: bold; float:left; padding-left:50px; padding-right:7px;">Favorilerden Kaldır</div>
			</div>
      <?php 
                        $favorilersorgusu        =   $baglanti->prepare("SELECT * from favoriler where uyeid = ? order by id desc limit $sayfalamayabaslanacakkayitsayisi,$sayfabasinagosterilecekkayitsayisi");
                        $favorilersorgusu->execute([$kullaniciid]);
                        $favorilersayisi         =   $favorilersorgusu->rowcount();
                        $favorilerkayitlari      =   $favorilersorgusu->fetchall(PDO::FETCH_ASSOC);
                        if($favorilersayisi>0){
                            foreach ($favorilerkayitlari as $favorilersatirlar){ 
                                $ilanlarsorgusu  =   $baglanti->prepare("SELECT * from ilanlar where id = ? limit 1");
                                $ilanlarsorgusu->execute([$favorilersatirlar["ilanid"]]);
                                $ilankaydi       =   $ilanlarsorgusu->fetch(PDO::FETCH_ASSOC);
                                $ilanadi         =   $ilankaydi["ilanadi"];
                                $ilanturu	     =   $ilankaydi["kategorituru"];
                                $ilanresmi	     =   $ilankaydi["ilanresmibir"];
                                $ilanfiyati      =   $ilankaydi["ilanfiyati"];
							    $yayindurumu     =   $ilankaydi["yayindurumu"];

                                    if(($ilanturu == "Satılık Daire") or ($ilanturu == "Satılık İşyeri") or ($ilanturu == "Satılık Arsa")){
                                    $resimklasoruadi    =   "satilikilanlar";                                        
                                    }elseif(($ilanturu=="Kiralık Daire") or ($ilanturu == "Kiralık İşyeri") or ($ilanturu == "Kiralık Günlük")){                                        
                                    $resimklasoruadi    =   "kiralikilanlar";
                                    }
									if($yayindurumu==0){
										$yayindurumu="Yayında Değil";
									}else{
										$yayindurumu="Yayında";
									}
                         ?>  
                         			<div class="favorilerurunler">

                                      <div class="favorilerresimler">
                                      <a href="index.php?sk=35&id=<?php echo donusumlerigeridondur($ilankaydi["id"]);?>"><img src="resimler/ilanresimleri/<?php echo $resimklasoruadi;?>/<?php echo donusumlerigeridondur($ilanresmi);?>"></a>
                                      </div>

                                      <div class="favorilerurunadi">
                                      <a href="index.php?sk=35&id=<?php echo donusumlerigeridondur($ilankaydi["id"]);?>" style="color:#646464; text-decoration:none;"><?php echo donusumlerigeridondur($ilanadi);?></a>
                                      </div>

                                      <div class="favorilerturfiyatdurum">
                                      <a href="index.php?sk=35&id=<?php echo donusumlerigeridondur($ilankaydi["id"]);?>" style="color:#646464; text-decoration:none;"><?php echo donusumlerigeridondur($ilanturu);?></a>
                                      </div>

                                      <div class="favorilerturfiyatdurum">
                                      <a href="index.php?sk=35&id=<?php echo donusumlerigeridondur($ilankaydi["id"]);?>" style="color:#646464; text-decoration:none;"><?php echo fiyatbicimlendir(donusumlerigeridondur($ilanfiyati));?>&nbsp;TL</a>
                                      </div>
                                      <div class="favorilerturfiyatdurum">
                                      <a href="index.php?sk=35&id=<?php echo donusumlerigeridondur($ilankaydi["id"]);?>" style="color:#646464; text-decoration:none;"><?php echo donusumlerigeridondur($yayindurumu);?></a>
                                      </div>
                                      <div class="favorilersilikonu">
                                      <a href="index.php?sk=29&id=<?php echo donusumlerigeridondur($ilankaydi["id"]);?>"><img src="resimler/SilDaireli20x20.png" border="0"></a>
                                      </div>
                                </div>  

                                <?php 
                                }
                             if($bulunansayfasayisi>1){
                               ?>     
                         <div class="sayfalamaalanikapsayicisi" align="center">
                             <div class="sayfalamaalaniicimetinalanikapsayicisi">
                                Toplam <?php echo $bulunansayfasayisi;?> Sayfada, <?php echo $toplamkayitsayisisorgusu;?> Adet Kayıt Bulunmaktadır    
                             </div>
                                 <div class="sayfalamaalaniicinumaraalanikapsayicisi">
                                     <?php
                                     if ($sayfalama>1){
                                         echo "<span class='sayfalamapasif'><a href='index.php?sk=24&syf=1'><<</a> </span>";
                                         $sayfalamaicinsayfadegerinibirgerial   =   $sayfalama-1;
                                         echo "<span class='sayfalamapasif'><a href='index.php?sk=24&syf=". $sayfalamaicinsayfadegerinibirgerial . "'><</a> </span>";
                                         
                                     }
                                     
                                     for($sayfalamaicinsayfaindexdegeri=$sayfalama-$sayfalamaicinsolvesagbutonsayisi;$sayfalamaicinsayfaindexdegeri<=
                                             $sayfalama+$sayfalamaicinsolvesagbutonsayisi; $sayfalamaicinsayfaindexdegeri++){
                                         if(($sayfalamaicinsayfaindexdegeri>0) and ($sayfalamaicinsayfaindexdegeri<=$bulunansayfasayisi)){
                                            if($sayfalama==$sayfalamaicinsayfaindexdegeri){
                                            echo "<span class='sayfalamaaktif'> " . $sayfalamaicinsayfaindexdegeri . "</span>";
                                            }else{
                                             echo "<span class='sayfalamapasif'><a href='index.php?sk=24&syf=". $sayfalamaicinsayfaindexdegeri . "'> ". 
                                                     $sayfalamaicinsayfaindexdegeri . "</a> </span>";    
                                            }
                                             
                                         }
                                          
                                     }

                                     if($sayfalama!=$bulunansayfasayisi){
                                         $sayfalamaicinsayfadegerinibirilerial   =   $sayfalama+1;
                                         echo "<span class='sayfalamapasif'><a href='index.php?sk=24&syf=". $sayfalamaicinsayfadegerinibirilerial . "'>></a> </span>";   
                                         echo "<span class='sayfalamapasif'><a href='index.php?sk=24&syf=". $bulunansayfasayisi  . "'>>></a> </span>";
                                        
                                     }
                                     
                                     ?>                             
                             </div>
                         </div>
						 <?php 
                            
						}

					}else{ ?>   

				<div class="altbaslik">Favorilere Eklediğiniz Herhangi Bir İlan Bulunmamaktadır.</div>

				<?php } ?>

</div>
</div>
</div>
<?php 
}else{
    header("location:index.php");
    exit();    
}
?>