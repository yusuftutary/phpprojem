<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="index.php?sk=0">Anasayfa</a> / Havale Bildirim Formu</span>
    <h2>Havale Bildirim Formu</h2>
</div>
</div>
<!-- banner -->
<div id="cerceve">
	<div id="sinir">
	<div id="TamSayfaCerceveAlaniIciYuzdeEllilikSolAlan">
					<div class="basliklar">
						<div class="ustbaslik">
							Havale Bildirim Formu
						</div>
						<div class="altbaslik">
							Tamamlanmış Olan Ödeme İşleminizi Bildirin.
						</div>
					</div>
					<form action="index.php?sk=38" method="post">
						<div class="TamSayfaCerceveAlaniIciFormElemanlariBaslikMetni">İsim Soyisim</div>
						<div class="TamSayfaCerceveAlaniIciFormElemanlariIcinSatirAlani"><input name="isimsoyisim" type="text" class="FormElemanlariTextInputlari" tabindex="1" required></div>
					
						<div class="TamSayfaCerceveAlaniIciFormElemanlariBaslikMetni">E-Mail Adresi</div>
						<div class="TamSayfaCerceveAlaniIciFormElemanlariIcinSatirAlani"><input name="eposta" type="email" class="FormElemanlariTextInputlari" tabindex="2" required></div>
					
						<div class="TamSayfaCerceveAlaniIciFormElemanlariBaslikMetni">Cep Telefonu</div>
						<div class="TamSayfaCerceveAlaniIciFormElemanlariIcinSatirAlani"><input name="telefon" type="tel" class="FormElemanlariTextInputlari" tabindex="3" required></div>
					
						<div class="TamSayfaCerceveAlaniIciFormElemanlariBaslikMetni">Banka Adı</div>
						<div class="TamSayfaCerceveAlaniIciFormElemanlariIcinSatirAlani"><select name="bankasecimi" type="text" class="selectalanlari" tabindex="4" required>
						<?php 
                        	   $bankalarsorgusu    =   $baglanti->prepare("SELECT * from bankahesaplarimiz ORDER BY bankaadi ASC");
                        	   $bankalarsorgusu->execute();
                        	   $bankalarsayisi     =   $bankalarsorgusu->rowcount();
                        	   $bankakayitlari           =   $bankalarsorgusu->fetchall(PDO::FETCH_ASSOC);
                        	       foreach ($bankakayitlari as $bankalar){
                        	?>
						<option value="<?php echo donusumlerigeridondur($bankalar["id"]); ?>"><?php echo donusumlerigeridondur($bankalar["bankaadi"]); ?></option>
						<?php 
                               }
                        	?>
					</select></div>
					
						<div class="TamSayfaCerceveAlaniIciFormElemanlariBaslikMetni">Açıklama</div>
						<div class="TamSayfaCerceveAlaniIciFormElemanlariIcinSatirAlani"><textarea name="aciklama" class="FormElemanlariTextArealari" tabindex="5" required></textarea></div>
						
						<div class="ButonlarIcinKapsamaAlani"><input type="submit" value="Bildirim Gönder" class="FormElemanlariYesilButonlar" tabindex="6"></div>
					</form>
				</div>
				<div id="TamSayfaCerceveAlaniIciYuzdeEllilikSagAlan">
					<div class="basliklar">
						<div class="ustbaslik">
							İşleyiş
						</div>
						<div class="altbaslik">
							Havale / EFT işlemlerinin kontrolü.
						</div>
					</div>
					
					<div class="TamSayfaCerceveAlaniIciBilgiParagraflariKapsamaAlani">
						<div class="TamSayfaCerceveAlaniIciBilgiParagraflariResimliBaslikMetniAlani">
							<img src="resimler/Banka20x20.png" border="0" alt="" title=""><span class="TamSayfaCerceveAlaniIciBilgiParagraflariResimliBaslikMetni">Havale / EFT işlemi</span>
						</div>
						<div class="TamSayfaCerceveAlaniIciBilgiParagraflariAciklamaMetni">Banka hesaplarımız sayfasında bulunan banka bilgilerinden faydalanarak EFT / Havale işlemlerinizi gerçekleştirebilirsiniz. Herhangi bir sorun yaşamanız durumunda bizlere iletişim formu aracılığıyla ulaşabilirsiniz.</div>
					</div>
					
					<div class="TamSayfaCerceveAlaniIciBilgiParagraflariKapsamaAlani">
						<div class="TamSayfaCerceveAlaniIciBilgiParagraflariResimliBaslikMetniAlani">
							<img src="resimler/DokumanKirmiziKalemli20x20.png" border="0" alt="" title=""><span class="TamSayfaCerceveAlaniIciBilgiParagraflariResimliBaslikMetni">Bildirim İşlemi</span>
						</div>
						<div class="TamSayfaCerceveAlaniIciBilgiParagraflariAciklamaMetni">Ödeme başarılı bir şekilde yapıldıktan sonra yan tarafta bulunan havale bildirim formunu istenen tüm bilgileri eksiksiz oalcak şekilde doldurarak bize iletebilirsiniz.</div>
					</div>
					
					<div class="TamSayfaCerceveAlaniIciBilgiParagraflariKapsamaAlani">
						<div class="TamSayfaCerceveAlaniIciBilgiParagraflariResimliBaslikMetniAlani">
							<img src="resimler/CarklarSiyah20x20.png" border="0" alt="" title=""><span class="TamSayfaCerceveAlaniIciBilgiParagraflariResimliBaslikMetni">Kontroller</span>
						</div>
						<div class="TamSayfaCerceveAlaniIciBilgiParagraflariAciklamaMetni">"Havale Bildirim Formu"'nuz tarafımıza ulaştığı anda ilgili departman tarafından yapılan havale / EFT işlemi banka üzerinden kontrol edilir.</div>
					</div>
					
					<div class="TamSayfaCerceveAlaniIciBilgiParagraflariKapsamaAlani">
						<div class="TamSayfaCerceveAlaniIciBilgiParagraflariResimliBaslikMetniAlani">
							<img src="resimler/InsanlarSiyah20x20.png" border="0" alt="" title=""><span class="TamSayfaCerceveAlaniIciBilgiParagraflariResimliBaslikMetni">Onay / Red</span>
						</div>
						<div class="TamSayfaCerceveAlaniIciBilgiParagraflariAciklamaMetni">Yapılan havale bildirim işlemi kontrol edildikten sonra başarılı olduğu yani hesaba geçtiği tespit edilirse tarafınıza dönüş yapılarak bilgilendirme sağlanır.</div>
					</div>
					

				</div>
	</div>
</div>