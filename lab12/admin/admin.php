<!DOCTYPE html>

<?php
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
?>

<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="Content-Language" content="pl" />
		<meta name="Author" content="Sebastian Minkowski" />
		<title>Admin Page</title>
		<link rel="stylesheet" href="../css/style_admin.css"/>
	</head>
	
	<body>
		<?php

		session_start();
		include('../cfg.php');
		function FormularzLogowania()
		{
			$wynik = '
			<div class="logowanie">
				<h1 class="naglowek">admin CMS</h1>
				<form method="post" name="LoginForm" enctype="multipart/form-data" action="' . $_SERVER['REQUEST_URI'] . '">
					<table class="">
						<tr><td>login:</td><td><input type="text" name="login" class="" /></td></tr>
						<tr><td>pass:</td><td><input type="password" name="pass" class="" /></td></tr>
						<tr><td></td><td><input type="submit" name="x1_submit" class="" value="Zaloguj się" /></td></tr>
						<tr><td></td><td><a href="../index.php">go back</a></td></tr>
					</table>
				</form>
			</div>
			';

			return $wynik;
		}

		function ListaPodstron()
		{
			global $link;
			if (!isset($_SESSION['status']) || $_SESSION['status'] == 1) {
				$query = "SELECT * FROM page_list ORDER BY id ASC";
				$result = mysqli_query($link, $query);
				echo '<h1 class="naglowek">Subpages</h1><center><table>';
				if($result){
					while ($row = mysqli_fetch_array($result)) {
						echo '<tr><td class="tdid"><b>'.$row['id'] . '</b></td><td class="tdane"><b>'.$row['page_title'].'</b></td><td class="tdedytuj"><a href="admin.php?fun=edit&id='.$row['id'].'"><b>edit</b></a></td><td class="tdane"><a href="admin.php?fun=remove&id='.$row['id'].'"><b>remove</b></a></td></tr>';
					}
					echo '</table></center><br>';
				}
				else{
					echo "No subpages...";
				}
			}
			if(isset($_GET['fun']) && $_GET['fun'] == 'remove'){
				UsunPodstrone();
			}
			if(isset($_GET['fun']) && $_GET['fun'] == 'edit'){

				EdytujPodstrone();
			}
			DodajNowaPodstrone();
		}
		
		function EdytujPodstrone()
		{
			global $link;
			if (isset($_GET['id'])) 
			{
				$id = $_GET['id'];
			}
			$query = "SELECT * FROM page_list WHERE id='$id' LIMIT 1";
			$result = mysqli_query($link ,$query);
			$row = mysqli_fetch_array($result);
			echo '
			<div>
				<h1 class="naglowek"><b>Edit subpage<b/></h1>
				<form method="post" name="EditForm" enctype="multipart/form-data" action="' . $_SERVER['REQUEST_URI'] . '">
					<table>
						<tr><td>title:<br></td><td><input type="text" name="page_title" size="98" value='.$row['page_title'].' /></td></tr>
						<tr><td>content:<br></td><td><textarea rows=20 cols=96 name="page_content"/>'.$row['page_content'].'</textarea></td></tr>
						<tr><td>status:<br></td><td><input type="checkbox" name="status" checked /></td></tr>
						<tr><td></td><td><input type="submit" name="x2_submit" class="save" value="submit" /></td></tr>
					</table>
				</form>
			</div>
			';
			if (isset($_POST['x2_submit'])&& isset($_GET['id'])) 
			{
				$id = $_GET['id'];
				$title = $_POST['page_title'];
				$content = $_POST['page_content'];
				$status = isset($_POST['status']) ? 1 : 0;

				if (!empty($id)) 
				{
					$query = "UPDATE page_list SET page_title = '$title', page_content = '$content', status = $status WHERE id = $id LIMIT 1";

					$result = mysqli_query($link, $query);

					if ($result) {  
						echo "<script>window.location.href='admin.php';</script>";
						exit();
					} else {
						echo "<center>Error while editing: " . mysqli_error($link)."</center>";
					}
				}
			}
		}


		function DodajNowaPodstrone()
		{
			global $link;
			echo '
			<div class="">
				<h1 class="naglowek"><b>Add subpage<b/></h1>
				<form method="post" name="AddForm" enctype="multipart/form-data" action="' . $_SERVER['REQUEST_URI'] . '">
					<table>
						<tr><td>title:</td><td><input type="text" name="page_title_add" size="98"/></td></tr>
						<tr><td>content:</td><td><textarea rows=20 cols=96 name="page_content_add" /></textarea></td></tr>
						<tr><td>status:</td><td><input type="checkbox" name="status_add" checked /></td></tr>
						<tr><td>&nbsp;</td><td><input type="submit" name="x3_submit" class="dodaj" value="Add" /></td></tr>
					</table>
				</form>
			</div>
			';
			if (isset($_POST['x3_submit'])) 
			{
				$tytul = $_POST['page_title_add'];
				$tresc = $_POST['page_content_add'];
				$status = isset($_POST['status_add']) ? 1 : 0;

				$query = "INSERT INTO page_list (page_title, page_content, status) VALUES ('$tytul', '$tresc', $status)";
				$result = mysqli_query($link, $query);

				if ($result) {           
					echo "<script>window.location.href='admin.php';</script>";
					exit();
				} else {
					echo "<center>Error while adding subpage: " . mysqli_error($link)."</center>";
				}
			}
		}


		function UsunPodstrone()
		{
			global $link;
			if (isset($_GET['id'])) 
			{
				$id = $_GET['id'];

				$query = "DELETE FROM page_list WHERE id = $id LIMIT 1";
				$result = mysqli_query($link, $query);

				if ($result) 
				{         
					echo "<script>window.location.href='admin.php';</script>";
					exit();
				} else {
					echo "<center>Error while removing subpage: " . mysqli_error($link)."</center>";
				}
			}
		}

		if (isset($_SESSION['status_logowania']) && $_SESSION['status_logowania'] == 1)
		{
			echo '<p style="padding-top: 16px; padding-bottom: 32px; text-align: center">Welcome back!</p>';
			ListaPodstron();
			echo '<h2 class="naglowek"><a href="kategorie.php">Manage Categories</a><br></h2>';
			echo '<h2 class="naglowek"><a href="produkty.php">Manage Products</a><br></h2>';
			echo '<h2 class="naglowek"><a href="logout.php">Logout</a></h2>';
		}
		else
		{
			echo FormularzLogowania();
		}

		if(isset($_POST['login']) && isset($_POST['pass']))
		{
			if($_POST['login'] == $login && $_POST['pass'] == $pass)
			{
				$_SESSION['status_logowania'] = 1;
				header("Location: admin.php");
			}
			else
			{
				echo '<p style="padding-top: 5%; text-align: center">Wrong login or password!<br><br>Try again...</p>';
			}
		}

		?>
	</body>
</html>