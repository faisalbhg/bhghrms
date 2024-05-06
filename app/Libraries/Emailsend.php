<?php

namespace App\Libraries;
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception;

class Emailsend
{
	function send_mail($from_email = NULL,$from_name = NULL, $to_email = NULL, $to_name = NULL,$cc_email = NULL, $bcc_email = NULL, $send_subj = NULL, $send_body = NULL,$attachment = NULL,$type=NULL)
	{
		require APPPATH.'ThirdParty/PHPMailer/src/Exception.php';
		require APPPATH.'ThirdParty/PHPMailer/src/PHPMailer.php';
		require APPPATH.'ThirdParty/PHPMailer/src/SMTP.php';


	    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions 
	    try {
	        //Server settings
	        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
	        $mail->isSMTP();                                            // Send using SMTP
	        $mail->Host       = 'smtp.office365.com';                    // Set the SMTP server to send through
	        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
	        $mail->Username   = 'noreply@buhaleeba.ae';                     // SMTP username
	        $mail->Password   = 'it@@1010';                               // SMTP password
	        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
	        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

	        //Recipients
	        $mail->setFrom('noreply@buhaleeba.ae', 'Buhaleeba Group HR');
	        $to_email = 'faisal@buhaleeba.ae';
	        $mail->addAddress($to_email, $to_name);     // Add a recipient
	        #$mail->addAddress('ellen@example.com');               // Name is optional
	        $mail->addReplyTo($from_email, $from_name);
	        if($cc_email)
	        {
	        	$mail->addCC($cc_email);
	        }
	        if($bcc_email)
	        {
	        	$mail->addBCC($bcc_email);
	        }


	        // Attachments
	        if($attachment)
	        {
	        	$mail->addAttachment($attachment);         // Add attachments
	        }
	        #$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

	        // Content
	        $mail->isHTML(true);                                  // Set email format to HTML
	        $mail->Subject = $send_subj;
	        
	        if($type==1)
	        {
	        	$message = view('emails/interviewScheduleTemplate',$send_body);	
	        }
	        else if($type==2)
	        {
	        	$message = view('emails/internalNotificationTemplate',$send_body);
	        }
	        
	        $mail->Body    = $message;

	        
	        #$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	        $mail->send();
	        return true;
	    } catch (Exception $e) {
	        //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	        return false;
	    }
	} 

	function forgot_mail($from_email = NULL,$from_name = NULL, $to_email = NULL, $to_name = NULL,$cc_email = NULL, $bcc_email = NULL, $send_subj = NULL, $send_body = NULL,$attachment = NULL)
	{
		require APPPATH.'ThirdParty/PHPMailer/src/Exception.php';
		require APPPATH.'ThirdParty/PHPMailer/src/PHPMailer.php';
		require APPPATH.'ThirdParty/PHPMailer/src/SMTP.php';


	    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions 
	    try {
	        //Server settings
	        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
	        $mail->isSMTP();                                            // Send using SMTP
	        $mail->Host       = 'smtp.office365.com';                    // Set the SMTP server to send through
	        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
	        $mail->Username   = 'noreply@buhaleeba.ae';                     // SMTP username
	        $mail->Password   = 'it@@1010';                               // SMTP password
	        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
	        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

	        //Recipients
	        $mail->setFrom('noreply@lmi.ae', 'LMI');
	        $mail->addAddress($to_email, $to_name);     // Add a recipient
	        #$mail->addAddress('ellen@example.com');               // Name is optional
	        $mail->addReplyTo($from_email, $from_name);
	        if($cc_email)
	        {
	        	$mail->addCC($cc_email);
	        }
	        if($bcc_email)
	        {
	        	$mail->addBCC($bcc_email);
	        }


	        // Attachments
	        if($attachment)
	        {
	        	$mail->addAttachment($attachment);         // Add attachments
	        }
	        #$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

	        // Content
	        $mail->isHTML(true);                                  // Set email format to HTML
	        $mail->Subject = $send_subj;
	        
	        if($send_body['type']=='customerFollowup')
	        {
	        	$message = view('emails/customerFollowup',$send_body);
	        	$mail->Body    = $message;
	        }
	        else if($send_body['type']=='forgot_password')
	        {
	        	$send_body['clientData'] = $send_body['emailData'];
	        	$send_body['url'] = base_url().'/reset-password/'.$send_body['emailData']->reset_hash;
	        	//echo '<pre>'; print_r($send_body);exit;
	        	$message = view('emails/forgot_password',$send_body);
	        	
	        }
	        else
	        {
	        	$message = view('emails/normal',$send_body);
	        }

	        $mail->Body    = $message;
	        
	        #$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	        $mail->send();
	        
	        return true;
	    } catch (Exception $e) {
	        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	        return false;
	    }
	} 
}
