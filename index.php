<?php
    # Directorio Proyecto
    define('DIR', __DIR__);
    # Incluir archivos de configuraciones
    require DIR . '/config/autoload.php';
    require DIR . '/vendor/autoload.php';
    require DIR . '/libraries/envmnt.php';
    
    # Cargar el enrutador
    use App\Core\Load;
    use App\Core\Router;
    
    # Crear instancia del enrutador
    $router = new Router();
    # Crear instancia para cargar las rutas
    $config = new Load($router);
    # Manejar la solicitud
    $router->handleRequest();

    exit();

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    // Configuración de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->SMTPDebug = 3;
        $mail->isSMTP();
        $mail->Host = 'smtp.office365.com';  // Cambia al servidor SMTP que uses
        $mail->SMTPAuth = true;
        $mail->Username = 'monitor.arcgis@transmilenio.gov.co';  // Cambia al tuyo
        $mail->Password = '&sbK4t3}k2Bj';          // Cambia a tu contraseña
        //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;  // El puerto puede variar según el servidor SMTP

        // Configuración de los destinatarios
        $mail->setFrom('monitor.arcgis@transmilenio.gov.co', 'Transmilenio');
        $mail->addAddress('adisonzenemij@gmail.com', 'Adison Jimenez');

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Correo de Prueba';
        $mail->Body    = 'Este es un mensaje de prueba usando PHPMailer.';
        $mail->AltBody = 'Este es un mensaje de prueba usando PHPMailer en texto plano.';

        // Enviar el correo
        $mail->send();
        echo 'Correo enviado correctamente';
    } catch (Exception $e) {
        echo "El correo no pudo enviarse. Error: {$mail->ErrorInfo}";
    }
?>
