<!DOCTYPE html>

<?php
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
?>

<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="Content-Language" content="pl" />
		<meta name="Author" content="Sebastian Minkowski" />
		<title>@lemmgator - My hobby</title>
		<link rel="stylesheet" href="./css/style.css"/>
		<script src="./js/kolorujtlo.js" type="text/javascript"></script>
		<script src="./js/timedate.js" type="text/javascript"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	</head>

	<body>
		<div class="main">
			<table style="width: 100%">
				<tr>
					<td><a href="index.php">Main</td>
					<td><a href="index.php?idp=breakcore">Breakcore</td>
					<td><a href="index.php?idp=inspiration">Inspiration</td>
					<td><a href="index.php?idp=music">My Music</td>
					<td><a href="index.php?idp=audio">Audio Services</td>
					<td><a href="index.php?idp=contacts">Contacts</td>
					<td><a href="index.php?idp=filmy">Videos</td>
				</tr>
			</table>
		<br>
			<?php
				$strona = '';
				if($_GET['idp'] == '') 
				{$strona = './html/main.html';}
				if($_GET['idp'] == 'breakcore') 
				{$strona = './html/breakcore.html';}
				if($_GET['idp'] == 'inspiration') 
				{$strona = './html/inspiration.html';}
				if($_GET['idp'] == 'music') 
				{$strona = './html/music.html';}
				if($_GET['idp'] == 'audio') 
				{$strona = './html/audio.html';}
				if($_GET['idp'] == 'contacts') 
				{$strona = './html/contacts.html';}
				if($_GET['idp'] == 'filmy') 
				{$strona = './html/filmy.html';}
				if($_GET['idp'] == 'js') 
				{$strona = './html/js.html';}
				if(file_exists($strona))
				{
					include($strona);
				}
			?>
			
			<a href="index.php?idp=js"><img src="./img/lemm.png" alt="lemm working on tunes"></a>
			
			<div class="footer">
			   <?php
				$nr_indeksu = '164412';
				$nrGrupy = 'ISI3';
				echo 'Autor: Sebastian Minkowski '.$nr_indeksu.' grupa '.$nrGrupy.' <br/><br/>';
				?>
			</div>
		</div>
	</body>
</html>