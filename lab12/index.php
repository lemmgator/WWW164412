<!DOCTYPE html>

<?php
	// plik index.php generuje strony dynamicznie z bazy danych
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
?>

<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="Content-Language" content="pl" />
		<meta name="Author" content="Sebastian Minkowski" />
		<title>@lemmgator - My hobby</title>
		<link rel="stylesheet" href="./css/style.css"/>
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
					<td><a href="index.php?idp=filmy">Videos</td>
					<td><a href="sklep.php">My Store</td>
				</tr>
			</table>
			<br>
			<?php
			
				// łączenie z bazą danych oraz funkcjonalność szukania ID stron z bazy danych
				
				include('cfg.php');
				include('showpage.php');
				
				// odpowiednia strona jest generowana przy podaniu właściwego idp
				$strona = '';
				if($_GET['idp'] == '') 
				{echo PokazPodstrone(1);}
				if($_GET['idp'] == 'breakcore') 
				{echo PokazPodstrone(2);}
				if($_GET['idp'] == 'inspiration') 
				{echo PokazPodstrone(3);}
				if($_GET['idp'] == 'music') 
				{echo PokazPodstrone(4);}
				if($_GET['idp'] == 'audio') 
				{echo PokazPodstrone(5);}
				if($_GET['idp'] == 'contacts') 
				{echo PokazPodstrone(6);}
				if($_GET['idp'] == 'filmy') 
				{echo PokazPodstrone(7);}
				if($_GET['idp'] == 'js') 
				{echo PokazPodstrone(8);}
				if($_GET['idp'] == 'admin') 
				{echo PokazPodstrone(9);}
			?>
			
			<div class="footer">
				<a href="index.php?idp=js"><img src="./img/lemm.png" alt="lemm working on tunes"></a><br>
				<?php
					// stopka :)
					$nr_indeksu = '164412';
					$nrGrupy = 'ISI3';
					echo 'Autor: Sebastian Minkowski '.$nr_indeksu.' grupa '.$nrGrupy.' <br/><br/>';
					echo '<a href="./admin/admin.php">login</a> | <a href="./contact.php">contact me</a>'
				?>
			</div>
			
		</div>
	</body>
</html>