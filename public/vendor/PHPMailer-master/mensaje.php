 <?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once 'vendor/autoload.php';

class email
{
	static function envio($email, $cuerpo, $asunto, $archivo = ''){
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
			
		    
		    //$mail->addAddress('ellen@example.com');
		    // $mail->addReplyTo('info@example.com', 'Information');
		    // $mail->addCC('cc@example.com');
		    // $mail->addBCC('bcc@example.com');
			
		    if ($archivo != null) {
				# code...
				$path = 'pdf/';
				$file = $path.$archivo.'.pdf';
				$nombre = "pdf/".$archivo;
				$mail->addAttachment($file);
			}
			   $mail->isHTML(true);
		//    opciones de envio

			   $body = $cuerpo;
			   $mail->Subject = $asunto;
			   $mail->Body    =  $body;
			   $mail->AltBody = strip_tags($body);
			   # code...
			$mail->send();
			$mail->ClearAllRecipients();
			return true;
		} catch (Exception $e) {
		    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
		}
	}	
}

		
?>