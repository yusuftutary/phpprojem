<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'framework/PHPMailer/src/Exception.php';
require 'framework/PHPMailer/src/PHPMailer.php';
require 'framework/PHPMailer/src/SMTP.php';

if (isset($_POST["eposta"])){
    $geleneposta  = guvenlik($_POST["eposta"]);
}else{
    $geleneposta="";
}
if ($geleneposta!=""){
    $kontrolsorgusu    =   $baglanti->prepare("SELECT * from uyeler where eposta=? and silinmedurumu=?");
    $kontrolsorgusu->execute([$geleneposta,0]);
    $kullanicisayisi     =   $kontrolsorgusu->rowcount();
    $kullanicikaydi      =   $kontrolsorgusu->fetch(PDO::FETCH_ASSOC);
        if($kullanicisayisi>0){
           $mailicerikhazirla  =   "Merhaba Sayın ". $kullanicikaydi["isimsoyisim"] . " <br /><br /> Sitemiz üzerinde bulunan hesabınızın şifresini sıfırlamak için lütfen <a href='". $sitelinki ."/index.php?sk=46&aktivasyonkodu=". $kullanicikaydi["aktivasyonkodu"] . "&eposta=". $kullanicikaydi["eposta"] . "'>Buraya Tıklayınız </a>". $siteadi;
           $mail = new PHPMailer(true);
            try{
            $mail->SMTPDebug     = 0;                                                      //Enable verbose debug output
            $mail->isSMTP();                                                                               //Send using SMTP
            $mail->Host          = donusumlerigeridondur($sitemailhostadresi);                             //Set the SMTP server to send through
            $mail->SMTPAuth      = true; 
            $mail->Charset       = "UTF-8";                                                                     //Enable SMTP authentication
            $mail->Username      = donusumlerigeridondur($sitemailadresi);                                //SMTP username
            $mail->Password      = donusumlerigeridondur($sitemailsifresi);                                  //SMTP password
            $mail->SMTPSecure    = 'tls'; 
            $mail->Port          = 587;
            $mail->SMTPOptions   = array(
                                            'ssl' => array(
                                                            'verify_peer'      => false,
                                                            'verify_peer_name' => false,
                                                            'allow_self_signed' => true
                                                     )
                                   );
            $mail->setFrom(donusumlerigeridondur($sitemailadresi), donusumlerigeridondur($siteadi));
            $mail->addAddress(donusumlerigeridondur($kullanicikaydi["eposta"]), donusumlerigeridondur($kullanicikaydi["isimsoyisim"]));                                                //Add a recipient
            $mail->addReplyTo(donusumlerigeridondur($sitemailadresi), donusumlerigeridondur($siteadi));
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject =  donusumlerigeridondur($siteadi).'Şifre Sıfırlama';
            $mail->MsgHTML($mailicerikhazirla);
            $mail->send(); 
            Header("Location:index.php?sk=43");
            exit();
            }catch (Exception $e) { 
                header("Location:index.php?sk=44");
                exit();    
            }              
    }else{
        header("Location:index.php?sk=45");
        exit();    
   }  
    }    
?>