<link rel="stylesheet" href="../css/style_admin.css">

<?php

// załączamy zawartość pliku cfg.php

include('../cfg.php');

// funkcja DodajProdukt() wyświetla formularz do dodawania produktu,
// następnie dodaje produkt według danych podanych we wcześniej wspomnianym formularzu

function DodajProdukt()
{
	global $link;

	echo '
    <div>
        <h1 class="naglowek"><b>Add product</b></h1>
            <form method="post" enctype="multipart/form-data" action="'.$_SERVER['REQUEST_URI'].'">
                <table>
                    <tr><td><b>title:</b></td><td><input type="text" name="title" required /></td></tr>
					<tr><td><b>description:</b></td><td><textarea rows=12 cols=50 name="description"></textarea></td></tr>
					<tr><td><b>available until:</b></td><td><input type="date" name="expired_on" required /></td></tr>
					<tr><td><b>price:</b></td><td><input type="text" name="price" required /></td></tr>
					<tr><td><b>VAT:</b></td><td><input type="text" name="vat" required /></td></tr>
					<tr><td><b>amount:</b></td><td><input type="text" name="amount" required /></td></tr>
					<tr><td><b>category:</b></td><td><input type="text" name="category" required /></td></tr>
					<tr><td><b>physical size:</b></td><td><input type="text" name="size" required /></td></tr>
					<tr><td><b>image:</b></td><td><input type="file" name="image" accept="image/*" required /></td></tr>
                    <tr><td></td><td><input type="submit" name="add" value="Add" /></td></tr>
                </table>
            </form>
    </div>
    ';
	
	if(isset($_POST['add'])) 
	{
		$title = $_POST['title'];
        $description = $_POST['description'];
		$created_on = date('Y-m-d');
		$modified_on = date('Y-m-d');
		$expired_on = $_POST['expired_on'];
		$price = $_POST['price'];
		$vat = $_POST['vat'];
		$amount = $_POST['amount'];
		if ($amount > 0 && $expired_on >= date('Y-m-d')) 
		{
        $status = 1;
		} else {
        $status = 0;
		}
		$category = $_POST['category'];
		$size = $_POST['size'];
		$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
	
        $query = "INSERT INTO products (title, description, created_on, modified_on, expired_on, price,
					vat, amount, status, category, size, image) 
					VALUES ('$title', '$description',  '$created_on', '$modified_on', '$expired_on', '$price',
					'$vat', '$amount', '$status', '$category', '$size', '$image')";
        $result = mysqli_query($link, $query);

        if($result) 
		{           
            echo "<script>window.location.href='produkty.php';</script>";
            exit();
        } 
		else 
		{
            echo "<center>Error during product creation: " . mysqli_error($link)."</center>";
        }
    }
}

// funkcja UsunProdukt() usuwa produkt o danym id

function UsunProdukt()
{
    global $link;
	
    if(isset($_GET['id'])) 
	{
        $id = $_GET['id'];
        $query = "DELETE FROM products WHERE id = '$id' LIMIT 1";
        $result = mysqli_query($link, $query);

        if($result) 
		{         
            echo "<script>window.location.href='produkty.php';</script>";
            exit();
        }
		else 
		{
            echo "<center>Error while removing: " . mysqli_error($link)."</center>";
        }
    }
}

// funkcja EdytujProdukt() wyświetla formularz do edytowania produktu,
// następnie edytuje produkt według danych podanych we wcześniej wspomnianym formularzu

function EdytujProdukt()
{
    global $link;
	
	if(isset($_GET['id'])) 
	{
		$id = $_GET['id'];
	}
	$query = "SELECT * FROM products WHERE id='$id' LIMIT 1";
	$result = mysqli_query($link ,$query);
	$row = mysqli_fetch_array($result);
	echo '
    <div>
        <h1 class="naglowek"><b>Edit product</b></h1>
		<form method="post" enctype="multipart/form-data" action="'.$_SERVER['REQUEST_URI'].'">
			<table>
				<tr><td><b>title:</b></td><td><input type="text" name="title" value="'.$row['title'].'" required /></td></tr>
				<tr><td><b>description:</b></td><td><textarea rows=12 cols=50 name="description">'.$row['description'].'</textarea></td></tr>
				<tr><td><b>available until:</b></td><td><input type="date" name="expired_on" value="'.$row['expired_on'].'" required /></td></tr>
				<tr><td><b>price:</b></td><td><input type="text" name="price" value="'.$row['price'].'" required /></td></tr>
				<tr><td><b>VAT:</b></td><td><input type="text" name="vat" value="'.$row['vat'].'" required /></td></tr>
				<tr><td><b>amount:</b></td><td><input type="text" name="amount" value="'.$row['amount'].'" required /></td></tr>
				<tr><td><b>category:</b></td><td><input type="text" name="category" value="'.$row['category'].'" required /></td></tr>
				<tr><td><b>physical size:</b></td><td><input type="text" name="size" value="'.$row['size'].'" required /></td></tr>
				<tr><td><b>image:</b></td><td><input type="file" name="image" accept="image/*" required /></td></tr>
				<tr><td></td><td><input type="submit" name="change" value="Change" /></td></tr>
			</table>
		</form>
    </div>
    ';
	
    if(isset($_POST['change']) && isset($_GET['id'])) 
	{
        $id = $_GET['id'];
		$title = $_POST['title'];
        $description = $_POST['description'];
		$modified_on = date('Y-m-d');
		$expired_on = $_POST['expired_on'];
		$price = $_POST['price'];
		$vat = $_POST['vat'];
		$amount = $_POST['amount'];
		if ($amount > 0 && $expired_on >= date('Y-m-d')) 
		{
        $status = 1;
		} else {
        $status = 0;
		}
		$category = $_POST['category'];
		$size = $_POST['size'];
		$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
	
        if(!empty($id)) 
		{	
            $query = "UPDATE products SET title = '$title', description = '$description', modified_on = '$modified_on', expired_on = '$expired_on',
						price = '$price', vat = '$vat', amount = '$amount', status = '$status', category = '$category',
						size = '$size', image = '$image' WHERE id = '$id' LIMIT 1";
            $result = mysqli_query($link, $query);

            if($result) 
			{  
                echo "<script>window.location.href='produkty.php';</script>";
                exit();
            } 
			else 
			{
                echo "<center>Error while editing: ".mysqli_error($link)."</center>";
            }
        }
    }
}

// funkcja PokazObraz() wyświetla obraz produktu o danym id

function PokazObraz()
{
	global $link;
	
    if(isset($_GET['id'])) 
	{
		$id = $_GET['id'];
	}
	
	$query = "SELECT * FROM products WHERE id='$id' LIMIT 1";
    $result = mysqli_query($link, $query);
	
	if($result)
	{
		while($row = mysqli_fetch_array($result)) 
		{
			echo '<center>'.$row['title'].'</b></p><img src="data:image/jpeg;base64,'.base64_encode($row['image']).'"/></center>';
		}
	}
	else 
	{
           echo "<center>Error viewing the image: " . mysqli_error($link)."</center>";
    }
}

// funkcja PokazProdukty() pokazuje tabelę z produktami oraz umożliwia wywołanie
// funkcji EdytujProdukt() i UsunProdukt() oraz PokazObraz()

function PokazProdukty()
{
	global $link;

    $query = "SELECT * FROM products ORDER BY id ASC";
    $result = mysqli_query($link, $query);
	
	if($result)
	{
		
		echo '<h1 class="naglowek">Products</h1><table>
			<tr><th class="tn">id</th><th class="tn">title</th><th class="tn">description</th><th class="tn">created on</th><th class="tn">modified on</th>
			<th class="tn">expired on</th><th class="tn">price</th><th class="tn">VAT</th><th class="tn">amount</th>
			<th class="tn">availability</th><th class="tn">category</th><th class="tn">physical size</th></tr>';
			
		while($row = mysqli_fetch_array($result)) 
		{
			echo '
					<tr>
						<td class="tdid"><b>'.$row['id']. '<b></td>
						<td class="tdane"><b>'.$row['title'].'<b></td>
						<td class="tdane">'.$row['description']. '</td>
						<td class="tdane">'.$row['created_on'].'</td>
						<td class="tdane">'.$row['modified_on'].'</td>
						<td class="tdane">'.$row['expired_on'].'</td>
						<td class="tdane">'.$row['price'].'</td>
						<td class="tdane">'.$row['vat'].'</td>
						<td class="tdane">'.$row['amount'].'</td>
						<td class="tdane">'.$row['status'].'</td>
						<td class="tdane">'.$row['category'].'</td>
						<td class="tdane">'.$row['size'].'</td>
						<td class="tdane"><a href="produkty.php?fun=obraz&id='.$row['id'].'"><b>image</b></a></td>	
						<td class="tdedytuj"><a href="produkty.php?fun=edytuj&id='.$row['id'].'"><b>edit</b></a></td>
						<td class="tdane"><a href="produkty.php?fun=usun&id='.$row['id'].'"><b>remove</b></a></td>
					</tr>
				';
		}
		echo '</table></center><br>';
	}
	else
	{
		echo "<center>Nothing here...</center>";
	}
	
	if(isset($_GET['fun']) && $_GET['fun'] == 'obraz')
	{
		PokazObraz();
	}
	if(isset($_GET['fun']) && $_GET['fun'] == 'usun')
	{
		UsunProdukt();
	}
	if(isset($_GET['fun']) && $_GET['fun'] == 'edytuj')
	{
		EdytujProdukt();
	}
}

// wywołujemy funkcję PokazProdukty() i DodajProdukt()

PokazProdukty();
DodajProdukt();
echo '<center><a href="./admin.php">go back</a></center>'
?>