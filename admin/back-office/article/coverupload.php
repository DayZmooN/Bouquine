<form action="#" method="POST" enctype="multipart/form-data">
    <label for="file">Cover</label>
    <input type="file" name="file" accept="image/*" />
    <button type="submit">Enregistrer</button>
    <?php
    session_start();

            if(isset($_FILES['file'])){
                require_once '../auth.php';
                if (isset($_FILES['cover'])) {
                $id = $_GET['id'];
                $tmp_name = $_FILES['cover']['tmp_name'];
                $name = $_FILES['cover']['name'];
                $image = $name;

        $manga = $db->prepare("UPDATE `book` SET `image`= :image WHERE `id_book`= :id");
        $manga->bindParam(':id', $id, PDO::PARAM_INT);
        $manga->bindParam(':image', $image, PDO::PARAM_STR);
        $manga->execute();
        move_uploaded_file($tmpName, '../image' . $name);

        header('Location: ./readarticle-back.php');
    }
    ?>
</form>