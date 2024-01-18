<link rel="stylesheet" href="./css/style_admin.css">

<?php

include('cfg.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

function PokazKontakt(){
	echo '
    <div><br>
        <h1 class="naglowek">Send mail:</h1>
            <form method="post" enctype="multipart/form-data" action="'.$_SERVER['REQUEST_URI'].'">
                <table>
					<tr><td>name:</td><td><input type="text" name="imie" required/></td></tr>
                    <tr><td>email:</td><td><input type="text" name="email" required/td></tr>
					<tr><td>subject:</td><td><input type="text" name="temat" required/></td></tr>
                    <tr><td>message:</td><td><textarea name="tresc" rows=10 cols=50 required></textarea></td></tr>                 
                    <tr><td></td><td><input type="submit" name="wyslij_mail"  value="Send mail" /></td></tr>
                </table>
            </form>
    </div>
	';
}

function WyslijMailKontakt(){
	
	global $config;
	PokazKontakt();
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wyslij_mail'])) {
		$mail = new PHPMailer(true);
		
        try {
            $mail->SMTPDebug = 0; 
            $mail->isSMTP();
            $mail->Host = $config['smtp_host'];
            $mail->SMTPAuth = $config['smtp_auth'];
            $mail->Username = $config['smtp_username'];
            $mail->Password = $config['smtp_password'];
            $mail->SMTPSecure = $config['smtp_secure'];
            $mail->Port = $config['smtp_port'];

            $mail->setFrom($_POST['email'], $_POST['imie']);
			$mail->AddReplyTo($_POST['email'], $_POST['imie']);
            $mail->addAddress("lemmgator@gmail.com");
            $mail->isHTML(false);
            $mail->Subject = $_POST['temat'];
            $mail->Body = $_POST['tresc'];

            $mail->send();
			echo 'Mail sent!';
			exit();
        } catch (Exception $e) {
             echo 'Mail could not go through.....';
        }
    } 
}

function Zapomniane_haslo()
{
    $wynik = '
    <div>
        <h1 class="naglowek">Forgot your password?</h1>
		<form method="post" name="mail" enctype="multipart/form-data" action="' . $_SERVER['REQUEST_URI'] . '">
			<table class="formularz">
				<tr><td>login:</td><td><input type="text" name="emailf" required /></td></tr>
				<tr><td>email:</td><td><input type="text" name="emaild" required /></td></tr>
				<tr><td>&nbsp;</td><td><input type="submit" name="submit" value="Remind me" /></td></tr>
			</table>
		</form>
    </div>
    ';

    return $wynik;
}

function PrzypomnijHaslo()
{
    global $link;
    global $config;
	global $login;
	global $pass;
    echo Zapomniane_haslo();

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
		if($login == $_POST['emailf'])
		{
			$mail = new PHPMailer(true);
	
			try {
				$mail->SMTPDebug = 0;
				$mail->isSMTP();
				$mail->Host = $config['smtp_host'];
				$mail->SMTPAuth = $config['smtp_auth'];
				$mail->Username = $config['smtp_username'];
				$mail->Password = $config['smtp_password'];
				$mail->SMTPSecure = $config['smtp_secure'];
				$mail->Port = $config['smtp_port'];

				$mail->setFrom('lemmgator@gmail.com', 'Lemm');
				$mail->addAddress($_POST['emaild']);

				$mail->isHTML(false);
				$mail->Subject = 'Remember your password better!';
				$mail->Body = 'Twoje hasło: ' . $pass;

				$mail->send();
				echo "Check your email for the password!";
				exit();
			} catch (Exception $e) {
				echo 'Mail could not go through.....';
			}
		}
		else{
			echo 'Your login is not in our database.';
		}
	}
}

WyslijMailKontakt();
PrzypomnijHaslo();

?>