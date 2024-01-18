<link rel="stylesheet" href="./css/style_admin.css">

<?php

// załączamy zawartość pliku cfg.php

include('./cfg.php');

// funkcja PokazKategorie() wyświetla drzewko kategorii oraz umożliwia wywołanie funkcji PrzegladajKategorie()

function PokazKategorie($mother = 0, $ile = 0)
{
	// wyszukujemy w bazie danych kategorie o matce = $mother

	global $link;
    $query = "SELECT * FROM categories WHERE mother = '$mother'";
    $result = mysqli_query($link, $query);

	// jeśli udało się połączyć - kontynuujemy, w przeciwnym wypadku warunek wyrzuca odpowiedni komunikat
	
	if($result)
	{			
		$brak = 0;
			
		// jeśli istnieją kategorie - kontynuujemy, w przeciwnym wypadku warunek wyrzuca odpowiedni komunikat
			
		while($row = mysqli_fetch_array($result)) 
		{	
			$brak = 1;
			for($i=0; $i < $ile; $i++)
			{
					echo '<span; style="color: #FFFFFF;">.</span>';
			}
			echo '<b><span style="color:#FE3B1F;">'.$row['id'].'</span> '.$row['name'].'&nbsp;</b>';
			
			// sprawdzamy, czy kategorie mają produkty - w takim przypadku tworzy opcję przedstawiania produktów danej kategorii przy jej nazwie
			
			$idk = $row['id'];
			$query1 = "SELECT * FROM products WHERE category='$idk'";
			$result1 = mysqli_query($link ,$query1);
			
			if($row1 = mysqli_fetch_array($result1))
			{
				echo '<a href="sklep.php?fun=browse&id='.$row['id'].'"><b>show</b></a>';
			}
			
			echo '<br>';
			
			// wywołanie PokazKategorie() rekurencyjnie dla podkategorii
			
			PokazKategorie($row['id'], $ile+1);
		}
		if($brak == 0 && $ile == 0){
			echo "<center>No categories...</center>";
		}
	}else{
		echo "<center>Error while viewing the categories...</center>";
	}
}

// PrzegladajKategorie() wyświetla produkty o danej kategorii i umożliwia ich pokazanie

function PrzegladajKategorie($id)
{
	// wyszukujemy w bazie danych produktów o kategorii = $id
	
	global $link;
    $query =  "SELECT * FROM products WHERE category='$id'";
    $result = mysqli_query($link, $query);
	
	echo '<h2 class="naglowek">List of products</h2><center><table>';
	
	// jeśli udało się połączyć - kontynuujemy, w przeciwnym wypadku warunek wyrzuca odpowiedni komunikat
	
	if($result)
	{
		$brak = 0;
		
		// jeśli istnieją produkty o danej kategorii - kontynuujemy, w przeciwnym wypadku warunek wyrzuca odpowiedni komunikat
		
		while($row = mysqli_fetch_array($result)) 
		{
			if($brak == 0)
			{
				echo '<tr><th class="tn">id</th><th class="tn">name</th><th class="tn">price</th></tr>';
			}
			
			$brak = 1;
			$cena = round($row['price'] + ($row['price'] * $row['vat'] / 100), 2);
			
			// wyświetlamy produkt z możliwością jego pokazania
			
			echo '
			<tr>
				<td class="tdid">'.$row['id'].'</td>
				<td class="tdane">'.$row['title'].'</td>
				<td class="tdane">'.$cena.' PLN</td>
				<td class="tdedytuj"><a href="produkt_pokaz.php?id='.$row['id'].'"><b>show</b></a></td>
			</tr>';
		}
		
		if($brak == 0)
		{
			echo '<center>No products...</center>';
		}
		else
		{
			echo '</table></center><br>';
		}
	}	
	else
	{
		echo '<center>Error viewing products.</center>';
	}
	
}

echo '<h1 class="naglowek" style="padding-top: 32px">My store</h1>';
echo '<p style="text-align: center">Here you can buy either my tunes or vinyls I got for sale!</p>';
	
echo '<h2 class="naglowek">List of Categories</h2>';
echo '<p style="margin-left: 45%;">';

// wywołanie PokazKategorie()

PokazKategorie();

echo '</p>';

if(isset($_GET['fun']) && $_GET['fun'] == 'browse')
{
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		PrzegladajKategorie($id);
		echo '<p style="text-align: center"><a href="sklep.php">hide list</a></p>';
	}
}

echo '<center><a href="koszyk.php">show cart</a> | <a href="index.php">go back</a></center>';

?>