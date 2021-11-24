
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="index.php?sk=0">Anasayfa</a> / Banka Hesaplarımız</span>
    <h2>Banka Hesaplarımız</h2>
</div>
</div>
<!-- banner -->
<div id="cerceve">
	<div id="sinir">
		<div id="icerik">
			<div class="basliklar">
				<div class="ustbaslik">BANKA HESAPLARIMIZ</div>
				<div class="altbaslik">Ödemeleriniz İçin Çalıştığımız Bankalar Aşağıda Yer Almaktadır...</div>					
			</div>
			<div id="icerik">
			<div id="discerceve">
			<div id="cercevedenge">
				<?php 
					$bankalarsorgusu = $baglanti->prepare("SELECT * from bankahesaplarimiz");
					$bankalarsorgusu->execute();
					$bankasayisi = $bankalarsorgusu->rowcount();
					$bankakayitlari = $bankalarsorgusu->fetchall(PDO::FETCH_ASSOC);
					$dongusayisi=1;
					$sutunadetsayisi=3;
					
					foreach ($bankakayitlari as $kayitlar){
					?>

			<div class="cercevesinir">
				<div class="bankalogo">
					<img src="resimler/<?php echo donusumlerigeridondur($kayitlar["bankalogosu"]); ?>" border="0">
				</div>
					<table class="bankatablosu" width="100%" border="0" cellspacing="0" cellpadding="0">	
									<tbody>
										<tr>
											<td align="left" valign="top" class="baslik">Banka Adı</td>
											<td align="left" valign="top" class="nokta">:</td>
											<td align="left" valign="top" class="bilgiler"><?php echo donusumlerigeridondur($kayitlar["bankaadi"]); ?></td>
										</tr>
										<tr>
											<td align="left" valign="top" class="baslik">Banka Konumu</td>
											<td align="left" valign="top" class="nokta">:</td>
											<td align="left" valign="top" class="bilgiler"><?php echo donusumlerigeridondur($kayitlar["konumsehir"]); ?> / <?php echo donusumlerigeridondur($kayitlar["konumulke"]); ?></td>
										</tr>
										<tr>
											<td align="left" valign="top" class="baslik">Şube Bilgileri</td>
											<td align="left" valign="top" class="nokta">:</td>
											<td align="left" valign="top" class="bilgiler"><?php echo donusumlerigeridondur($kayitlar["subeadi"]); ?> / <?php echo donusumlerigeridondur($kayitlar["subekodu"]); ?></td>
										</tr>
										<tr>
											<td align="left" valign="top" class="baslik">Para Birimi</td>
											<td align="left" valign="top" class="nokta">:</td>
											<td align="left" valign="top" class="bilgiler"><?php echo donusumlerigeridondur($kayitlar["parabirimi"]); ?></td>
										</tr>
										<tr>
											<td align="left" valign="top" class="baslik">Hesap Sahibi</td>
											<td align="left" valign="top" class="nokta">:</td>
											<td align="left" valign="top" class="bilgiler"><?php echo donusumlerigeridondur($kayitlar["hesapsahibi"]); ?></td>
										</tr>
										<tr>
											<td align="left" valign="top" class="baslik">Hesap Numarası</td>
											<td align="left" valign="top" class="nokta">:</td>
											<td align="left" valign="top" class="bilgiler"><?php echo donusumlerigeridondur($kayitlar["hesapnumarasi"]); ?></td>
										</tr>
										<tr>
											<td align="left" valign="top" class="baslik">IBAN Numarası</td>
											<td align="left" valign="top" class="nokta">:</td>
											<td align="left" valign="top" class="bilgiler"><?php ibanbicimlendir(donusumlerigeridondur($kayitlar["ibannumarasi"])); ?></td>
										</tr>
									</tbody>
								</table>
												</div>
												<?php 
    								        if ($dongusayisi<$sutunadetsayisi) {
    								    ?>
										 <?php
    								        }
  							       $dongusayisi++;
  							       if ($dongusayisi>$sutunadetsayisi) {
  							           echo "</tr><tr>";
  							           $dongusayisi=1;
  							       }  							           
    							         else{       
						               }
    							     }
    							     ?>   					
									</div>
		</div>
				</div>
		</div>
	</div>
</div>