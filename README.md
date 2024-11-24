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
Instalar Dependencias: composer require <dependency>
```

## Configuración
```yml
Environment: composer require vlucas/phpdotenv
```
```yml
Mailer: composer require phpmailer/phpmailer
```

# Depuración: 0 | 1 | 2 |3
SMTP_DEBUG=
# Autenticación: true | false
SMTP_AUTH=
# Servidor: smtp.gmail.com | smtp.office365.com
SMTP_HOST=
# Puerto: 25 | 465 | 587
SMTP_PORT=
# Usuario: Correo electrónico
SMTP_USER=
# Contraseña; Seguridad de aplicaciones
SMTP_PASS=
# CifradO: TLS | SSL
SMTP_ENCRY=

# Email Remitente: Correo electrónico
FROM_ADDRESS=
# Nombre Remitente: Persona destinataria
FROM_NAME=
# Respuesta Correo: Correo electrónico
REPLY_ADDRESS=
# Respuesta Persona: Otros destinatarios
REPLY_NAME=

# Email Destino: Correo electrónico
SEND_ADDRESS=
# Nombre Destino: Persona destinataria
SEND_NAME=
# Email Oculto: Correo electrónico
HIDE_ADDRESS=
# Nombre Oculto: Persona destinataria
HIDE_NAME=
# Copia Correo: Correo electrónico
COPY_ADDRESS=
# Copia Persona: Otros destinatarios
COPY_NAME=

# Asunto del correo electrónico
MAIL_SUBJECT=
# Cuerpo del correo electrónico
MAIL_MESSAGE=
# Mensaje extra para el correo electrónico
MAIL_ALT_BODY=

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