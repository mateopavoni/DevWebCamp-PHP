<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email {

    public $email;
    public $nombre;
    public $token;
    
    public function __construct($email, $nombre, $token)
    {
        $this->email  = $email;
        $this->nombre = $nombre;
        $this->token  = $token;
    }

    private function configurarMailer(): PHPMailer
    {
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host       = $_ENV['MAIL_HOST'];
        $mail->SMTPAuth   = true;
        $mail->Port       = $_ENV['MAIL_PORT'];
        $mail->Username   = $_ENV['MAIL_USERNAME'];
        $mail->Password   = $_ENV['MAIL_PASSWORD'];
        $mail->SMTPSecure = $_ENV['MAIL_ENCRYPTION'];

        $mail->setFrom(
            $_ENV['MAIL_FROM_ADDRESS'],
            $_ENV['MAIL_FROM_NAME']
        );

        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        return $mail;
    }

    public function enviarConfirmacion(): void
    {
        $mail = $this->configurarMailer();

        $mail->addAddress($this->email, $this->nombre);
        $mail->Subject = 'Confirma tu Cuenta';

        $mail->Body = "
            <html>
                <p><strong>Hola {$this->nombre}</strong>, has registrado correctamente tu cuenta en DevWebCamp, pero es necesario confirmarla.</p>
                <p>
                    Presiona aquí:
                    <a href='{$_ENV['HOST']}/confirmar-cuenta?token={$this->token}'>
                        Confirmar Cuenta
                    </a>
                </p>
                <p>Si tú no creaste esta cuenta, puedes ignorar este mensaje.</p>
            </html>
        ";

        $mail->send();
    }

    public function enviarInstrucciones(): void
    {
        $mail = $this->configurarMailer();

        $mail->addAddress($this->email, $this->nombre);
        $mail->Subject = 'Reestablece tu Password';

        $mail->Body = "
            <html>
                <p><strong>Hola {$this->nombre}</strong>, has solicitado reestablecer tu password.</p>
                <p>
                    Presiona aquí:
                    <a href='{$_ENV['HOST']}/recuperar?token={$this->token}'>
                        Reestablecer Password
                    </a>
                </p>
                <p>Si tú no solicitaste este cambio, puedes ignorar este mensaje.</p>
            </html>
        ";

        $mail->send();
    }
}
