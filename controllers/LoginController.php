<?php
namespace Controller;

use Model\UserModel;
use Model\VO\UserVO;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

final class LoginController extends Controller
{

    public function login()
    {
        $this->loadView("login");
    }

    public function fazerLogin()
    {
        $vo = new UserVO(0, $_POST['login'], $_POST['senha']);

        if (empty($_POST["senha"])) {
            header("Location: ./login");
            exit();
        }

        $model = new UserModel();
        $result = $model->doLogin($vo);

        if (empty($result)) {
            header("Location: ./login");
            exit();
        } else {
            if ($result->getNivel() > 1) {
                header("Location: ./estagios");
                exit();
            } else {
                header("Location: ./estagiosSecao");
                exit();
            }
        }
    }

    public function logout()
    {
        session_destroy();
        header("Location: ./");
    }

    public function recuperarSenha()
    {
        $this->loadView("recuperarSenha");
    }

    public function resetSenha()
    {
        $token = $_GET["token"];
        $model = new UserModel();
        $result = $model->validateRecoveryToken($token);

        if ($result["status"]) {
            $this->loadView("resetSenha");
        } else {
            echo "Token Inválido";
        }

    }

    public function enviarRecuperacao()
    {
        $email = $_POST['email'];

        if (empty($email)) {
            $this->loadView("resetSenha", [
                "erro" => "Por favor, informe seu email.",
            ]);
            return;
        }

        $model = new UserModel();
        $user = $model->verificaEmail($email);

        if (!$user) {
            $this->loadView("recuperarSenha", [
                "erro" => "Email não cadastrado.",
            ]);
            return;
        }

        $token = bin2hex(random_bytes(50));
        $tokenExpiration = date('Y-m-d H:i:s', strtotime('+1 hour'));

        $model->updateRecoveryToken($user->getId(), $token, $tokenExpiration);

        $resetLink = "http://localhost/trabEstagios/resetSenha?token=" . $token;

        $this->sendEmail($email, "Recuperação de Senha", "Clique no link abaixo para recuperar sua senha:<br><a href='" . $resetLink . "'>Recuperar Senha</a>");

        echo "Instruções de recuperação de senha enviadas para seu e-mail.";
    }

    public function processarNovaSenha()
    {
        $userModel = new UserModel();

        $token = $_POST['token'];
        $newPassword = $_POST['nova_senha'];
        $confirmPassword = $_POST['confirmar_nova_senha'];

        $user = $userModel->validateRecoveryToken($token);

        if ($newPassword !== $confirmPassword) {

            $this->loadView("resetSenha", [
                "token" => $token,
                "erro" => "A senha e a confirmação não coincidem.",
            ]);
            exit();
        }
        $updateResult = $userModel->updatePassword($user['userId'], $newPassword);

        if ($updateResult) {
            $userModel->updateRecoveryToken($user['userId'], null, null);
            echo "Senha redefinida com Sucesso";
            echo "<br><a href='./login'>Ir para Login</a>";
            exit();
        }

        $this->loadView("resetSenha", [
            "token" => $token,
            "erro" => 'Erro ao redefinir a senha. Tente novamente.',
        ]);
    }

    public function sendEmail($toEmail, $subject, $body)
    {
        require 'vendor/phpmailer/phpmailer/src/Exception.php';
        require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
        require 'vendor/phpmailer/phpmailer/src/SMTP.php';

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'sistema.estagio00@gmail.com';
            $mail->Password = 'ehkpunvukuqrvgoq';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            $mail->setFrom('sistema.estagio00@gmail.com', 'Sistema Estágio');
            $mail->addAddress($toEmail);
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $body;

            $mail->send();
        } catch (Exception $e) {
            echo "Erro ao enviar e-mail: {$mail->ErrorInfo}";
        }
    }
}
