<form action="#" method="POST" enctype="multipart/form-data">
            <label for="file">Cover</label>
            <input type="file" name="file">
            <button type="submit">Enregistrer</button>
            <?php
            if(isset($_FILES['file'])){
                $tmpName = $_FILES['file']['tmp_name'];
                $name = $_FILES['file']['name'];
                move_uploaded_file($tmpName, '../image/' . $name);
            }
            ?>
</form>