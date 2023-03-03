<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
</head>

<body>
    <form method="POST">
        <label for="ISBN">ISBN</label>
        <input type="text" name="ISBN" id="ISBN">
        <br>
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
        <br>
        <label for="author">Author</label>
        <input type="text" name="author" id="author">
        <br>
        <label for="editor">editor</label>
        <input type="text" name="editor" id="editor">
        <br>
        <label for="collection">collection</label>
        <input type="text" name="collection" id="collection">
        <br>
        <label for="publication_date">Date de publication :<br>0000-00-00</label>
        <input type="text" name="publication_date" id="publication_date">
        <br>
        <label for="genre">genre</label>
        <input type="text" name="genre" id="genre">
        <br>
        <label for="id_category">Categorie</label>
        <input type="number" name="id_category" id="id_category">
        <br>
        <label for="summary">summary</label>
        <input type="text" name="summary" id="summary">
        <br>
        <button>Enregistrer</button>
    </form>
</body>
<?php
require_once '../connexion.php';
 
	if(ISSET($_POST['insert'])){
		try{
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO `user` (`firstname`, `lastname`, `username`, `password`) VALUES ('$firstname', '$lastname', '$username', '$password')";
			$db->exec($sql);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
 
		echo "<script>alert('Successfully inserted data!')</script>";
		echo "<script>window.location='index.php'</script>";
	}
?>
</html>