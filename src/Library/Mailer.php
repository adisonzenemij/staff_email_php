<?php
    namespace App\Library;

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    class Mailer {
        public static function sending() {
            # Crear una instancia de PHPMailer
            $mail = new PHPMailer(true);
            try {
                # Configuración del servidor SMTP
                $mail->isSMTP();
                $mail->SMTPDebug  = $_ENV['SMTP_DEBUG'];
                $mail->Host       = $_ENV['SMTP_HOST'];
                $mail->Port       = $_ENV['SMTP_PORT'];
                $mail->SMTPAuth   = $_ENV['SMTP_AUTH'];
                $mail->Username   = $_ENV['SMTP_USER'];
                $mail->Password   = $_ENV['SMTP_PASS'];
                $mail->SMTPSecure = $_ENV['SMTP_ENCRY'];
    
                # Configuración del remitente
                $mail->setFrom($_ENV['FROM_ADDRESS'], $_ENV['FROM_NAME']);
                # Configuración del destinatario
                $mail->addAddress($_ENV['SEND_ADDRESS'], $_ENV['SEND_NAME']);
                # Configuración de la copia de usuario
                $mail->addReplyTo($_ENV['REPLY_ADDRESS'], $_ENV['REPLY_NAME']);
    
                # Contenido del correo
                $mail->isHTML(true);
                # Asunto del correo
                $mail->Subject = $_ENV['MAIL_SUBJECT'];
                # Cuerpo del correo en HTML
                $mail->Body    = $_ENV['MAIL_MESSAGE'];
                # Cuerpo alternativo en texto plano
                $mail->AltBody = $_ENV['MAIL_ALT_BODY'];
    
                # Enviar el correo
                $mail->send();
                # Retornar mensaje
                return 'Éxito: Correo enviado correctamente.';
            } catch (Exception $e) {
                # Retornar mensaje
                $large = "Importante: Correo no enviado.";
                $error = "Error: {$mail->ErrorInfo}";
                return $large . "<br/>" . $error;
            }
        }
    }
?>
