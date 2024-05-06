<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    class QRMailer{
        private $mail;
    
        public function __construct(){
            $this->mail = new PHPMailer(true);
        }
    
        public function send($msg, $qrvalue, $recipient_email, $recipient_name){
            try {
                $this->mail->isSMTP();
                $this->mail->Host = SMTP_HOST;
                $this->mail->SMTPAuth = true;
                $this->mail->Username = MAIL_USERNAME;
                $this->mail->Password = MAIL_PASS;
                $this->mail->SMTPSecure = 'tls';
                $this->mail->Port = 587;
    
                $this->mail->setFrom(MAIL_USERNAME . str_replace('smtp.', '@', SMTP_HOST), MAILER_NAME);
                $this->mail->addAddress($recipient_email, $recipient_name);
    
                $this->mail->isHTML(true);
                $this->mail->Subject = 'QR Code Attachment';
                $this->mail->Body = $msg;
    
                $qr = new QrGenerator();
                $attachment = $qr->generateFromStream($qrvalue);
                
                $this->mail->addStringAttachment($attachment, 'qr_code.png', 'base64', 'image/png');

                $this->mail->send();
                return true;
            } catch (Exception $e) {                
                echo 'Message could not be sent. Mailer Error: ', $this->mail->ErrorInfo;
                return false;
            }
        }
    }