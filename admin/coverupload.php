<?php
session_start();
require_once './auth.php';
$id = $_GET['id'];

if (isset($_FILES['cover'])) {
    $tmpName = $_FILES['cover']['tmp_name'];
    $name = $_FILES['cover']['name'];
    move_uploaded_file($tmpName, '../image/' . $name);
    $req = $db->prepare("UPDATE `book` SET `image`= :image WHERE `id_book`= :id");
    $req->bindParam('id', $id, PDO::PARAM_INT);
    $req->bindParam('image', $image, PDO::PARAM_INT);
    $req->execute([$name]);

    header('Location: ./article.php');
}
?>

<form action="#" method="POST" enctype="multipart/form-data">
    <label for="cover">Cover</label>
    <input type="file" name="cover" accept="image/*" />
    <button type="submit">Ajouter</button>