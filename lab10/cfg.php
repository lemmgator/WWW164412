<?php

	// dzięki pliku cfg.php możemy połączyć się z bazą danych
	// zawiera login i hasło do logowania do panelu CMS
	// zawiera również konfiguracje związane z wysyłaniem maili przez smtp
	// wszystko działa, tylko nie chcę zostawiać w pliku realnego hasła aplikacji w smtp_password
	
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$baza = 'strona';
	
	$link = mysqli_connect($dbhost, $dbuser, $dbpass);
	if(!$link) echo '<b>przerwane połączenie </b>';
	if(!mysqli_select_db($link, $baza)) echo 'nie wybrano bazy';

	$config = array(
		'smtp_host' => 'smtp.gmail.com',
		'smtp_auth' => true,
		'smtp_username' => 'lemmgator@gmail.com',
		'smtp_password' => 'x',
		'smtp_secure' => 'tls',
		'smtp_port' => 587,
	);
		
	$login = 'lemmgator';
	$pass = 'Lemm1234';
?>