<link rel="stylesheet" href="../css/style_admin.css">

<?php

// będziemy korzystali z łączenia bazy danych z pliku cfg.php

include('../cfg.php');

// DodajKategorie() wyświetla formularz oraz dodaje kategorie do bazy danych
// z danymi podanymi w formularzu

function DodajKategorie()
{
	global $link;

	echo '
    <div>
        <h1 class="naglowek"><b>Add category</b></h1>
		<form method="post" action="'.$_SERVER['REQUEST_URI'].'">
			<table>
				<tr><td><b>name:</b></td><td><input type="text" size="24" name="name" required /></td></tr>
				<tr><td><b>mother:</b></td><td><input type="text" size="24" name="mother" value=0 required /></td></tr>
				<tr><td><b>submit:</b></td><td><input type="submit" name="add" value="Add" /></td></tr>
			</table>
		</form>
    </div>
    ';
	
	if(isset($_POST['add'])) 
	{
		$nazwa = $_POST['name'];
        $matka = $_POST['mother'];
		
        $query = "INSERT INTO categories (mother, name) VALUES ('$matka', '$nazwa')";
        $result = mysqli_query($link, $query);

        if($result) 
		{           
            echo "<script>window.location.href='kategorie.php';</script>";
            exit();
        } 
		else 
		{
            echo "<center>Błąd podczas dodawania kategorii: " . mysqli_error($link)."</center>";
        }
    }
}

// FormularzDoUsuwania() wyświetla formularz do usuwania kategorii

function FormularzDoUsuwania()
{
	echo '
    <div>
        <h1 class="naglowek"><b>Remove category<b/></h1>
            <form method="post" action="'.$_SERVER['REQUEST_URI'].'">
                <table>
                    <tr><td><b>id:</b></td><td><input type="text" size="24" name="id1" required /></td></tr>
                    <tr><td><b>submit:</b></td><td><input type="submit" name="remove" value="Remove" /></td></tr>
                </table>
            </form>
    </div>
    ';	
}

// UsunKategorie($id) usuwa kategorię podanego ID

function UsunKategorie($id)
{	
	global $link;

	$query = "SELECT id FROM categories WHERE mother = '$id'";
    $result = mysqli_query($link, $query);
	if($result)
	{
		while($row = mysqli_fetch_array($result))
		{
			UsunKategorie($row['id']);
		}
	}
	
	$query1 = "DELETE FROM categories WHERE id = '$id' LIMIT 1";
	$result1 = mysqli_query($link, $query1);
	if(!$result1)
	{
		echo 'Error!';
	}
}

// EdytujKategorie() wyświetla formularz edytowania kategorii
// następnie edytuje kategorię według danych podanych we wcześniej wspomnianym formularzu

function EdytujKategorie()
{
    global $link;
		
	echo '
	<div>
		<h1 class="naglowek"><b>Change category<b/></h1>
		<form method="post" action="'.$_SERVER['REQUEST_URI'].'">
			<table>
				<tr><td><b>id:</b></td><td><input type="text" size="24" name="id2" required /></td></tr>
				<tr><td><b>name:</b></td><td><input type="text" size="24" name="name" /></td></tr>
				<tr><td><b>mother:</b></td><td><input type="text" size="24" name="mother" /></td></tr>
				<tr><td><b>submit:</b></td><td><input type="submit" name="change" value="Change" /></td></tr>
			</table>
		</form>
	</div>
	';
		
	if(isset($_POST['change'])) 
	{	
		$id = $_POST['id2'];
		$nazwa = $_POST['name'];
		$matka = $_POST['mother'];
		
		$query = "SELECT * FROM categories WHERE id = '$id' LIMIT 1";
		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_array($result);
		if(is_null($row))
		{
			echo 'There is no category ID '.$id.'';
			exit();
		}
		
		$query = "UPDATE categories SET name = '$nazwa', mother = '$matka' WHERE id = '$id' LIMIT 1";
		$result = mysqli_query($link, $query);
		if($result) 
		{  
			echo "<script>window.location.href='kategorie.php';</script>";
			exit();
		} 
		else 
		{
			echo "Error: ".mysqli_error($link)."";
		}
	}   
}

// PokazKategorie($mother, $ile) wyświetla drzewko kategorii

function PokazKategorie($mother = 0, $ile = 0)
{
	global $link;
    $query = "SELECT * FROM categories WHERE mother = '$mother'";
    $result = mysqli_query($link, $query);
	if($result){
		$brak = 0;
		while($row = mysqli_fetch_array($result)) 
		{	
			$brak = 1;
			for($i=0; $i < $ile; $i++)
			{
					echo '<span; style="color: #FFFFFF;">.</span>';
			}
			echo '<b><span style="color:#FE3B1F; ">'.$row['id'].'</span> '.$row['name'].'</b><br>';
			PokazKategorie($row['id'], $ile + 1);
		}
		if($brak == 0 && $ile == 0)
		{
			echo "No categories...";
		}
	}
}

// Odpowiednio wykonywane funkcje wcześniej opisane

echo '<h1 class="naglowek">Categories</h1>';
echo '<p style="margin-left: 45%;">';
PokazKategorie();
echo '</p>';

DodajKategorie();

FormularzDoUsuwania();
if(isset($_POST['remove']))
	{
		$id = $_POST['id1'];
		UsunKategorie($id);
		echo "<script>window.location.href='kategorie.php';</script>";
		exit();
	}
	
EdytujKategorie();

?>