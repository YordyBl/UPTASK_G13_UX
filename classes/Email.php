<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;
class Email
{
    protected $email;
    protected $nombre;
    protected $token;
    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }
    public function enviarConfirmacion()
    {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '1a052d70ee50c5';
        $mail->Password = '924de4990fe584';
        $mail->setFrom('cuentas@Uxgrupo13.com');
        $mail->addAddress('cuentas@Uxgrupo13.com','uptask.com' );
        $mail->Subject = 'Confirma tu cuenta';
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';
        $contenido='<html>';
        $contenido.="<p><strong> Hola ". $this->email. "</strong> Has Creado Tu cuenta en UptTask, Solo debes confirmarla en el siguiente enlace</p>";
        $contenido.="<p>Presiona aquí: <a href='http://localhost:3000/confirmar?token=". $this->token ."' > Confirmar Cuenta </a></p>";
        $contenido.='</html>';
        $mail->Body = $contenido;
        $mail->send();
    }
    public function enviarInstrucciones()
    {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '1a052d70ee50c5';
        $mail->Password = '924de4990fe584';
        $mail->setFrom('cuentas@Uxgrupo13.com');
        $mail->addAddress('cuentas@Uxgrupo13.com','uptask.com' );
        $mail->Subject = 'Reestrablece tu correo';
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';
        $contenido='<html>';
        $contenido.="<p><strong> Hola ". $this->nombre. "</strong> Para recuperar tu contraseña dale click al siguiente enlace: </p>";
        $contenido.="<p> <a href='http://localhost:3000/reestablecer?token=". $this->token ."' > Reestablecer contraseña </a></p>";
        $contenido.="<p>Si tu no hiciste la solicitud puedes ignorar el mensaje</p>";
        $contenido.='</html>';
        $mail->Body = $contenido;
        $mail->send();
    }
}
