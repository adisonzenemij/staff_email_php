<h1 align="center">🔥 Proyecto Email 🧑‍💻</h1>

## Introducción


## Requisitos
* Composer
* PHP

## Instalación
```yml
Clonar Repostorio: git clone <project>
```
```yml
Añadir Dependencias: composer require <dependency>
Instalar Dependencias: composer install
Actualizar Proyecto: composer dump-autoload
```

## Configuración
```yml
Environment: composer require vlucas/phpdotenv
```
```yml
Mailer: composer require phpmailer/phpmailer
```

## Variables Entorno
```yml
### Configuración Básica ###
APP_PROJECT: Nombre del proyecto
APP_FRAMEWORK: Framework utilizado [none | other]
APP_VERSION: Versión de la aplicación
APP_DEBUG: Depuración activada [true | false]
```
```yml
### Configuración SMTP ###
SMTP_DEBUG: Depuración según valores [0 | 1 | 2 | 3]
SMTP_AUTH: Autenticación según valores [true | false]
SMTP_HOST: Servidor según valores [smtp.gmail.com | smtp.office365.com]
SMTP_PORT: Puerto según valores [25 | 465 | 587]
SMTP_USER: Usuario o correo electrónico
SMTP_PASS: Contraseña o seguridad de aplicaciones
SMTP_ENCRY: Cifrado según valores [TLS | SSL]

### Configuración Remitente ###
FROM_ADDRESS: Email Remitente (correo electrónico)
FROM_NAME: Nombre del Remitente (persona destinataria)
REPLY_ADDRESS: Dirección de Respuesta (correo electrónico)
REPLY_NAME: Nombre del Remitente de Respuesta (persona destinataria)

### Configuración Destinatarios ###
SEND_ADDRESS: Email Destino (correo electrónico)
SEND_NAME: Nombre Destino (persona destinataria)
HIDE_ADDRESS: Email Oculto (correo electrónico)
HIDE_NAME: Nombre del Destinatario Oculto (persona destinataria)
COPY_ADDRESS: Emails en Copia (separados por comas)
COPY_NAME: Nombres de las Personas en Copia (separados por comas)

### Configuración Mensajes ###
MAIL_SUBJECT: Asunto del correo electrónico
MAIL_MESSAGE: Cuerpo principal del correo electrónico
MAIL_ALT_BODY: Cuerpo alternativo o mensaje extra del correo electrónico
```

## Páginas Oficiales
<div align="center">
    <a href="https://www.adisonjimenez.net" target="_blank">
        <span>Web Principal 🌐</span>
    </a>
    |
    <a href="https://www.engsoft.app" target="_blank">
        <span>Web Desarrollo 💻</span>
    </a>
</div>