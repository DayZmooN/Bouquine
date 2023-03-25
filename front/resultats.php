<?php
require_once './connect.php';
require_once './header-front.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);


// On récupère les données encodées en JSON depuis la requête POST
$datas = json_decode(file_get_contents('php://input'), true);
// On vérifie si le filtre genre est défini
$genre_filter = isset($datas["genre"]) ? $datas["genre"] : "";

$query = $db->prepare('SELECT DISTINCT  `book`.`id_book`, `book`.`ISBN`, `book`.`image`, `book`.`title`, `book`.`author`, `book`.`editor`, `book`.`collection`, `book`.`publication_date`, `book`.`genre`, `book`.`id_category`, `book`.`summary`, `book`.`status`, `genre`.`libel_genre` FROM `book` INNER JOIN `genre_book` ON `genre_book`.`id_book` = `book`.`id_book` INNER JOIN `genre` ON `genre`.`id_genre` = `genre_book`.`id_genre` WHERE `genre` LIKE :genre LIMIT 40 ');
$query->bindValue(':genre', "%$genre_filter%", PDO::PARAM_STR);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
// echo json_encode($result);
?>
<!-- mon css perso for fun -->
<style>
    .catal {
        max-width: 1200px;
        width: 100%;
        text-align: center;
        margin: 0 auto;
    }

    .container-filter {
        position: relative;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -0%);
        top: 120px;
        position: absolute;
        justify-content: center;
        display: grid;
        grid-gap: 20px;
        grid-template-columns: repeat(auto-fill, 100px);
        grid-auto-rows: 30px;
        padding: 20px;
        margin: 0 auto;
        height: auto;
        max-width: 1200px;
        border-radius: 8px;
        background-color: #f1f1f2;
        border: none;
        width: 90%;
        text-align: center;
        align-items: center;
        box-shadow: 0 26px 58px 0 rgba(0, 0, 0, .22), 0 5px 14px 0 rgba(0, 0, 0, .18);
    }

    #filter {
        box-shadow: 4px orange;
        font: 900;
        width: 100%;
        max-width: 100px;
        text-align: center;
        padding: 2px;
        background-color: blueviolet;
        box-sizing: content-box;
        box-shadow: 1px 1px 4px black;
        height: 30px;
        color: #f1f1f1;
        border-radius: 5px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;

    }

    #filter:hover {
        background-color: white;
        color: orange;
        font: 900;
        font-size: 1rem;
        transform: scale(1.1);
    }

    .books-catalog {
        display: grid;
        grid-gap: 20px;
        justify-content: center;
        grid-template-columns: repeat(auto-fill, 200px);
        grid-auto-rows: 30px;
        margin: 50px;
        margin: 150px auto;
    }

    @media screen and (max-width:1200px) {
        .container-filter {
            grid-template-columns: repeat(auto-fill, 100px);
            padding: 5px;
            max-height: 70px;
            overflow: scroll;
            display: flex;
            width: 95%;

            background-color: #f2f2f2;
        }

        ::-webkit-scrollbar-corner {
            opacity: 0;
        }

        ::-webkit-scrollbar {
            opacity: 0;
        }

        #filter {
            font-size: 0.87rem;
            color: yellow;
            width: 100%;
            max-width: 450px;
        }

        .books-catalog {
            margin-top: 50px;
        }
    }

    @media screen and (max-width:900px) {
        .container-filter {
            grid-template-columns: repeat(auto-fill, 100px);
            padding: 5px;
            max-height: 70px;
            overflow: scroll;
            display: flex;
            width: 95%;

            background-color: #f2f2f2;
        }

        #filter {
            width: 100px;
            font-size: 0.57rem;
            color: yellow;
        }

        .books-catalog {
            margin-top: 50px;
        }


        #filter:active {
            background-color: white;
            color: blue;
            font: 900;
            font-size: 1.3rem;
            transform: scale(1.1);
        }

    }
</style>
<!-- ajax created by dayzmoon -->
<section id="catalogue">
    <div class="catal">
        <div class="formul-s">

        </div>
        <div class="genre-filter container-filter">


            <?php foreach ($result as $datas) { ?>
                <button id="filter" class="genre-btn" data-genre="<?= $datas['libel_genre'] ?>"><?= $datas['libel_genre'] ?></button>

            <?php } ?>
        </div>
        <div class="books">
            <div class="container-books">
                <?php if (isset($result) && $result) {
                    foreach ($result as $book) { ?>
                        <div class="books-catalog">
                            <div class="item4">
                                <a href="./book.php?id=<?= $book['id_book'] ?>"><img src="../image/<?= $book['image'] ?>" alt="<?= $book['title'] ?>"></a>
                                <p class="titles"><?= $book['title'] ?></p>
                                <p class="authors"><?= $book['author'] ?></p>
                            </div>
                        </div>
                    <?php }
                } else { ?>
                    <p>Aucun livre n'a été trouvé.</p>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<script src="../js/ajax.js"></script>
</body>


</html>