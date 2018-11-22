 <?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once 'vendor/autoload.php';

class email
{
	static function envio($email, $cuerpo, $asunto){
		$mail = new PHPMailer(true);                             
		try {
		    
		   $mail->SMTPDebug = 2;                                
		    $mail->isSMTP();                                      
		    $mail->Host = 'smtp.gmail.com'; 
		    $mail->SMTPAuth = true;                              
		    $mail->Username = 'ag2018169@gmail.com';                
		    $mail->Password = 'Afelipe99';                          
		    $mail->SMTPSecure = 'TLS';                            
		    $mail->Port = 587;                                    
			$mail->CharSet = 'UTF-8';
			$mail->Encoding = 'base64';
		    $mail->setFrom('ag2018169@gmail.com', 'DeserSOFT');
		    $mail->addAddress($email);     
		    // $path='assets/';
		    //   $nombreF=basename($_FILES['file']['name']);
		    //  $file=$path.$nombreF;
		    //  move_uploaded_file($_FILES['file']['tmp_name'],$file);

		    
		    //$mail->addAddress('ellen@example.com');
		    // $mail->addReplyTo('info@example.com', 'Information');
		    // $mail->addCC('cc@example.com');
		    // $mail->addBCC('bcc@example.com');

		    
		    // $mail->addAttachment($_FILES['file']['name']);
		  	//  $nombre="assets/".$nombreF;
		  	// $new="new.".$tipoF;
		    // $mail->addAttachment($nombre);
			   $mail->isHTML(true);
		//    opciones de envio

			   $body=$cuerpo;
			   $mail->Subject = $asunto;
			   $mail->Body    =  $body;
			   $mail->AltBody = strip_tags($body);
			   # code...
			$mail->send();
		} catch (Exception $e) {
		    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
		}
	}	
}

		
?>