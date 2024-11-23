<?php
    namespace App\Library;

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    class Mailer {
        public function send($to, $subject, $message) {
            // Cargar las variables de entorno
            $dotenv = Dotenv::createImmutable(__DIR__);
            $dotenv->load();
    
            // Crear una instancia de PHPMailer
            $mail = new PHPMailer(true);
            try {
                // Configuración del servidor SMTP
                $mail->isSMTP();
                $mail->Host = $_ENV['SMTP_HOST'];
                $mail->Port = $_ENV['SMTP_PORT'];
                $mail->SMTPAuth = true;
                $mail->Username = $_ENV['SMTP_USERNAME'];
                $mail->Password = $_ENV['SMTP_PASSWORD'];
                $mail->SMTPSecure = $_ENV['SMTP_ENCRYPTION'];
    
                // Remitente
                $mail->setFrom($_ENV['SMTP_FROM_ADDRESS'], $_ENV['SMTP_FROM_NAME']);
                $mail->addReplyTo($_ENV['SMTP_REPLY_TO_ADDRESS']);
                
                // Destinatario
                $mail->addAddress($to);
    
                // Contenido del correo
                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body    = $message;
    
                // Enviar el correo
                $mail->send();
                echo 'El correo ha sido enviado exitosamente';
            } catch (Exception $e) {
                echo "El correo no pudo ser enviado. Error: {$mail->ErrorInfo}";
            }
        }
    }
?>
