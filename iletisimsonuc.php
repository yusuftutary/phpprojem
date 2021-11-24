<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'framework/PHPMailer/src/Exception.php';
require 'framework/PHPMailer/src/PHPMailer.php';
require 'framework/PHPMailer/src/SMTP.php';

if (isset($_POST["isimsoyisim"])){
    $gelenisimsoyisim  = guvenlik($_POST["isimsoyisim"]);   
}else{
    $gelenisimsoyisim="";
}
if (isset($_POST["eposta"])){
    $geleneposta  = guvenlik($_POST["eposta"]);
}else{
    $geleneposta="";
}
if (isset($_POST["telefon"])){
    $gelentelefon  = guvenlik($_POST["telefon"]);
}else{
    $gelentelefon="";
}
if (isset($_POST["mesaj"])){
    $gelenmesaj  = guvenlik($_POST["mesaj"]);
}else{
    $gelenmesaj="";
}
if (($gelenisimsoyisim!="") and ($geleneposta!="") and ($gelentelefon!="") and ($gelenmesaj!="")){
        $mailicerikhazirla = "İsim Soyisim : " . $gelenisimsoyisim . "<br /> E-Posta Adresi : " . $geleneposta . 
                             "<br /> Telefon Numarası : " .  $gelentelefon . "<br /> Mesaj : " . $gelenmesaj;
        $mail = new PHPMailer(true);
        try{
        $mail->SMTPDebug     = 0;                                                   
        $mail->isSMTP();                                                                      
        $mail->Host          = donusumlerigeridondur($sitemailhostadresi); 
        $mail->SMTPAuth      = true; 
        $mail->Charset       = "UTF-8";                                                               
        $mail->Username      = donusumlerigeridondur($sitemailadresi);   
        $mail->Password      = donusumlerigeridondur($sitemailsifresi);  
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
        $mail->addAddress(donusumlerigeridondur($sitemailadresi), donusumlerigeridondur($siteadi));                                      
        $mail->addReplyTo($geleneposta, $gelenisimsoyisim);
        $mail->isHTML(true);                   
        $mail->Subject = donusumlerigeridondur($siteadi) . 'İletişim Formu Mesajı';
        $mail->MsgHTML($mailicerikhazirla);
        $mail->send();
        header("Location:index.php?sk=5");
        exit();    
    }catch (Exception $e) { 
        header("Location:index.php?sk=6");
        exit();    
    }

    if ($havalebildirimikaydetkontrol>0) {

    }
    }else
    {
    header("Location:index.php");
    exit();
    }
?>