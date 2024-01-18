<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
		<?php
			$nr_indeksu = '164412';
			$nrGrupy = 'ISI3';
			echo 'Sebastian Minkowski '.$nr_indeksu.' grupa '.$nrGrupy.' <br /><br />';
			
			echo 'Zastosowanie metody include() <br />';
			include 'nuta.php';
			include 'nuta.php';
			echo '<br/>';
			
			echo 'Zastosowanie metody require_once() <br/>';
			require_once 'muzyka.php'; 
			require_once 'muzyka.php';
			echo '<br/>';
			
			echo 'Zastosowanie if, else, elseif, switch <br/>';
			$a = 50;
			
			if($a == 100)
			{
				echo 'a = 100 <br/>';
			}
			elseif($a > 100)
			{
				echo 'a > 100';
			}
			else
			{
				echo 'a < 100 <br/>';
			}
			
			switch($a) {
				case 50:
					echo "a=50 <br/>";
					break;
				case 75:
					echo "a=75 <br/>";
					break;
				default:
					echo "a /= 50 i a /= 75 <br/>";
			}
			
			echo '<br/>';
			
			echo 'Zastosowanie pętli while() i for() <br/>';
			$b = 10;
			while($b > 0)
			{
				echo 'b = '.$b.'<br/>';
				$b-=1;
			}
			for($c = 10; $c > 0; $c--)
			{
				echo 'c = '.$c.'<br/>';
			}
			echo '<br/>';
			
			echo 'Zastosowanie typów zmiennych $_GET, $_POST, $_SESSION <br/>';
			echo '$_GET to tablica asocjacyjna zmiennych przekazywana do '
			. 'bieżącego skryptu poprzez parametry adresu URL '
			. '(metoda HTTP GET).<br/>';
			echo '$_POST to tablica asocjacyjna zmiennych przekazywana do '
			. 'bieżącego skryptu metodą żądania HTTP POST.<br/>';
			session_start();
			echo '$_SESSION to tablica asocjacyjna zawierająca zmienne sesji '
			. 'dostępne dla bieżącego skryptu.<br/>';
			$_SESSION['zmienna1']='wartosc1';
			echo 'zmienna1 = '.$_SESSION["zmienna1"].'<br/>';
		?>
    </body>
</html>
