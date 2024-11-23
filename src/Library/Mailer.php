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
                
                # Verificar correos adicionales
                self::copy($mail);
                # Verificar correos ocultos
                self::hide($mail);

                # Configuración de la respuesta del correo
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

        public static function copy($mail) {
            # Verificar si ambas variables COPY_ADDRESS y COPY_NAME están definidas
            if (!empty($_ENV['COPY_ADDRESS']) && !empty($_ENV['COPY_NAME'])) {
                # Obtener correos y nombres de las direcciones de copia
                $testEmails = explode(',', $_ENV['COPY_ADDRESS']);
                $testNames = explode(',', $_ENV['COPY_NAME']);
                
                # Verificar que ambos arreglos tengan la misma cantidad de elementos
                if (count($testEmails) == count($testNames)) {
                    # Recorrer las direcciones de copia y agregar nombre
                    foreach ($testEmails as $index => $email) {
                        # Agregar correo y nombre
                        $mail->addAddress(trim($email), trim($testNames[$index]));
                    }
                } else {
                    # Si los arreglos no coinciden, solo agregar los correos sin nombres
                    foreach ($testEmails as $email) {
                        $mail->addAddress(trim($email));
                    }
                }
            }
        }

        public static function hide($mail) {
            # Verificar si la variable HIDE_ADDRESS está definida
            if (!empty($_ENV['HIDE_ADDRESS'])) {
                # Obtener los correos de BCC
                $hideEmails = explode(',', $_ENV['HIDE_ADDRESS']);
                # Verificar si hay correos para BCC
                foreach ($hideEmails as $email) {
                    $mail->addBCC(trim($email));  # Agregar correo a copia oculta (BCC)
                }
            }
        }
    }
?>
