<?php
include './header-admin.php';
require_once './auth.php';
$reqCat = $db->prepare('SELECT `id_category`, `libel_category`, `libel_slug` FROM `category`');
$reqCat->execute();
$resultCat = $reqCat->fetchAll(PDO::FETCH_ASSOC);
?>
<h1 class="multiTitre">liste catégories</h1>

<div class="categorieList">
    <div class="unite">
    <h3>categorie </h3>

    <a class="btnGreen" href="#" style="color:green">modifier</a> 
    <a class="btnRed" href="#" style="color:red">supprimer</a>

    </div>

    <div class="unite">
    <h3>categorie </h3>

    <a class="btnGreen" href="#" style="color:green">modifier</a> 
    <a class="btnRed" href="#" style="color:red">supprimer</a>

    </div>

    <div class="unite">
    <h3>categorie </h3>

    <a class="btnGreen" href="#" style="color:green">modifier</a> 
    <a class="btnRed" href="#" style="color:red">supprimer</a>

    </div>

    <div class="unite">
    <h3>categorie </h3>

    <a class="btnGreen" href="#" style="color:green">modifier</a> 
    <a class="btnRed" href="#" style="color:red">supprimer</a>

    </div>

    <div class="unite">
    <h3>categorie </h3>

    <a class="btnGreen" href="#" style="color:green">modifier</a> 
    <a class="btnRed" href="#" style="color:red">supprimer</a>

    </div>

    <div class="unite">
    <h3>categorie </h3>

    <a class="btnGreen" href="#" style="color:green">modifier</a> 
    <a class="btnRed" href="#" style="color:red">supprimer</a>

    </div>

    

    

</div>
















<?php include './includeClose.php'  ?>