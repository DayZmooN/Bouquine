<?php

//Récupère tout de la base de données
function getAll(){
    $con = connection();
    $req = "SELECT * from `admin`,`book`,`category`,`genre`,`genre_book`,`loan`,`user`;";
    $rows = $con->query($req);
    return $rows;
}

?>