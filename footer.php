
<div class="footer">
<div class="container">
<div class="row">
    <div class="col-lg-3 col-sm-3">
            <h4>Kurumsal</h4>
            <ul class="row">
            <li class="col-lg-12 col-sm-12 col-xs-3"><a href="index.php?sk=0">Anasayfa</a></li>
            <li class="col-lg-12 col-sm-12 col-xs-3"><a href="index.php?sk=1">Hakkımızda</a></li>
            <li class="col-lg-12 col-sm-12 col-xs-3"><a href="index.php?sk=2">Danışmanlarımız</a></li>
            <li class="col-lg-12 col-sm-12 col-xs-3"><a href="index.php?sk=36">Banka Hesaplarımız</a></li>
            <li class="col-lg-12 col-sm-12 col-xs-3"><a href="index.php?sk=37">Havale Bildirim Formu</a></li>
            <li class="col-lg-12 col-sm-12 col-xs-3"><a href="index.php?sk=3">İletişim</a></li>
        </ul>
    </div>
    
    <div class="col-lg-3 col-sm-3">
            <h4>Üyelik ve Hizmetler</h4>
            <ul class="row">
            <?php if (empty($_SESSION["kullanici"])){ ?> 
            <li class="col-lg-12 col-sm-12 col-xs-3"><a data-toggle="modal" data-target="#loginpop" style="cursor: pointer;">Giriş Yap</a></li>
            <li class="col-lg-12 col-sm-12 col-xs-3"><a href="index.php?sk=8">Üye Ol</a></li>
            <?php }else{ ?>
            <li class="col-lg-12 col-sm-12 col-xs-3"><a href="index.php?sk=17">Hesabım</a></li>
            <li class="col-lg-12 col-sm-12 col-xs-3"><a href="index.php?sk=31">Çıkış Yap</a></li>
            <?php } ?> 
            <li class="col-lg-12 col-sm-12 col-xs-3"><a href="index.php?sk=7">Sık Sorulan Sorular</a></li>         
        </ul>
    </div>
    
    <div class="col-lg-3 col-sm-3">
            <h4>Bizi Takip Edin</h4>
            <a href="https://www.facebook.com/salihemlak/"><img src="images/facebook.png" alt="facebook"></a>
            <a href="https://twitter.com/salihemlak"><img src="images/twitter.png" alt="twitter"></a>
            <a href="https://www.linkedin.com/in/yusuf-tutar-16631099/"><img src="images/linkedin.png" alt="linkedin"></a>
            <a href="https://www.instagram.com/salih.emlak/"><img src="images/instagram.png" alt="instagram"></a>
    </div>

      <div class="col-lg-3 col-sm-3">
            <h4>Bize Ulaşın</h4>
            <p><b>İletişim</b><br>
            <span class="glyphicon glyphicon-map-marker"></span> Zafer Mah. Ahmet Yesevi Cad. Mühürdar Sk. 72/A Yenibosna - Bahçelievler / İstanbul <br>
            <span class="glyphicon glyphicon-envelope"></span> salihemlakyenibosna@gmail.com<br>
            <span class="glyphicon glyphicon-earphone"></span> 0(212) 639 72 98</p>
            </div>
        </div>
<p class="copyright">Copyright &copy; 2021 - Salih Emlak - Tüm Hakları Saklıdır. <br /> Bu Site YNY Web Tasarım Hizmetleri Tarafından Yapılmıştır.	</p>

</div></div>
<!-- Modal -->
<div id="loginpop" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="row">
        <div class="col-sm-6 login">
        <h4>Giris Yap</h4>
          <form action="index.php?sk=14" method="post" role="form">
        <div class="form-group">
          <label class="sr-only" for="exampleInputEmail2">E-Mail Adresi</label>
          <input type="email" class="form-control" id="exampleInputEmail2" placeholder="E-Mail Adresi" name="eposta" required>
        </div>
        <div class="form-group">
          <label class="sr-only" for="exampleInputPassword2">Şifre</label>
          <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Şifre" name="sifre" required>
        </div>
        <div class="checkbox">
          <label>
            <span style="float:right;"><a href="index.php?sk=41">Şifremi Unuttum</a></span>
          </label>
        </div>
        <button type="submit" class="btn btn-success">Giriş Yap</button>
      </form>          
        </div>
        <div class="col-sm-6">
          <h4>Yeni Üye Ol</h4>
          <p>Şimdi Üye Olun ve Tüm Emlak Fırsatlarından Haberdar Olun.</p>
          <button type="submit" class="btn btn-info"  onclick="window.location.href='index.php?sk=8'">Üye Ol</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.modal -->

</body>
</html>



