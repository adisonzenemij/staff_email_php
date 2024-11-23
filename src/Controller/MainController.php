<?php
    namespace App\Controller;

    use App\Core\Render;
    use App\Library\Mailer;

    class MainController {
        final public function __construct() {}

        final public function index() {
            # Cargar datos si es necesario
            $data = ['title' => 'test',];
            # Cargar las diferentes plantillas
            $templates = ['main'];
            # Renderiar plantilla y configuracion
            Render::view($templates, $data);
            # Ejecutar correo electrónico
            $this->testing();
        }

        public function testing() {
            # Enviar correo electronico
            $result = Mailer::sending();
            # Imprimir resultado
            echo $result;
        }
    }
?>
