<?php
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$baza = 'strona';
	
	$link = mysqli_connect($dbhost, $dbuser, $dbpass);
	if(!$link) echo '<b>przerwane połączenie </b>';
	if(!mysqli_select_db($link, $baza)) echo 'nie wybrano bazy';
	
	$login = 'lemmgator';
	$pass = 'Lemm1234';
?>