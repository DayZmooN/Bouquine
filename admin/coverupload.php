<form action="#" method="POST" enctype="multipart/form-data">
            <label for="file">Cover</label>
            <input type="file" name="file" accept="image/*" />
            <button type="submit">Enregistrer</button>
            <?php

            if(isset($_FILES['file'])){
                require_once '../connexion.php';
                $id = $_GET['id'];
                $tmpName = $_FILES['file']['tmp_name'];
                $name = $_FILES['file']['name'];
                move_uploaded_file($tmpName, '../image/' . $name);

                $req = $db->prepare("UPDATE `book` SET `image`= (?) WHERE `id_book`= $id");
                $req->execute([$name]);
            }
            ?>
</form>