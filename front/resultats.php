<?php
require_once './connect.php';
require_once './header-front.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);


// On récupère les données encodées en JSON depuis la requête POST
$datas = json_decode(file_get_contents('php://input'), true);
// On vérifie si le filtre genre est défini
$genre_filter = isset($datas["genre"]) ? $datas["genre"] : "";

$query = $db->prepare('SELECT DISTINCT  `book`.`id_book`, `book`.`ISBN`, `book`.`image`, `book`.`title`, `book`.`author`, `book`.`editor`, `book`.`collection`, `book`.`publication_date`, `book`.`genre`, `book`.`id_category`, `book`.`summary`, `book`.`status`, `genre`.`libel_genre` FROM `book` INNER JOIN `genre_book` ON `genre_book`.`id_book` = `book`.`id_book` INNER JOIN `genre` ON `genre`.`id_genre` = `genre_book`.`id_genre` WHERE `genre` LIKE :genre  ');
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
        position: fixed;
        top: 0;
        left: 50%;
        transform: translate(-50%, -0%);
        top: 120px;
        position: absolute;
        justify-content: center;
        display: grid;
        grid-gap: 20px;
        grid-template-columns: repeat(auto-fill, 150px);
        grid-auto-rows: auto;
        padding: 20px;
        height: 200px;
        overflow: scroll;

        /* display: flex; */
        max-width: 900px;
        border-radius: 8px;
        border: none;
        width: 90%;
        text-align: center;
        align-items: center;
        /* box-shadow: 0 26px 58px 0 rgba(0, 0, 0, .22), 0 5px 14px 0 rgba(0, 0, 0, .18); */
    }

    .fleche {
        position: absolute;
        text-align: center;
    }

    ::-webkit-scrollbar-corner {
        opacity: 0;
    }

    ::-webkit-scrollbar {
        opacity: 0;
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
        height: 50px;
        color: #f1f1f1;
        border-radius: 5px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        animation: bom 2s ease-in-out infinite;

    }

    @keyframes bom {
        0% {
            transform: scale(1);
            transform: translateY(0px);
            border: 1px solid white;

        }

        50% {
            transform: scale(1.1);
            border: 1px solid red;
            transform: translateY(5px);

        }

        100% {
            transform: translateY(-4px);
            border: 1px solid blue;

            transform: scale(0.97);

        }

    }

    body {
        background-color: #000000f5;
    }

    #filter:hover {
        background-color: white;
        color: orange;
        font: 900;
        font-size: 0.95rem;
        transform: scale(1.1);
    }


    .books-catalog {
        /* display: grid; */
        grid-gap: 20px;
        justify-content: center;
        /* grid-template-columns: repeat(auto-fill, 400px); */
        grid-auto-rows: 30px;
        margin: 50px;
        margin: 70px auto;
        background-color: #090a20;
        width: 100%;
        max-width: 250px;
        height: auto;
        /* display: inline-block; */
        padding: 5px;
        border-radius: 8px;
        box-shadow: 0 2px 2px rgba(0, 0, 0, 0.60), 0 4px 6px rgba(0, 0, 0, 0.14);
    }

    .item4 {
        width: 100%;
        height: 100%;
        box-shadow: 0 26px 58px 0 rgba(0, 0, 0, .02), 0 5px 14px 0 rgba(0, 0, 0, .08);
        border-radius: 8px;

    }

    .books-catalog:hover {
        background-color: #f1f1f1;
        width: 100%;
        height: 100%;
        align-items: center;
    }

    p.titles {
        margin: 16px;
        font: 800;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        color: #a99aa9;
    }

    p.authors {
        font: 400;
        color: #a99aa9;
    }

    img:hover {
        object-fit: fill;
        transform: scale(1.1);
        width: 100%;
        height: 100%;
        border: 1px solid #f1f1f1;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px -1px rgba(0, 0, 0, 0.1);
    }


    @media screen and (min-width:950px) {
        body {
            background-color: #000000f5;
            width: 100%;
            height: auto;
        }

        .container-filter {
            grid-template-columns: repeat(auto-fill, 150px);
            max-height: 100px;
            overflow: scroll;
            display: flex;
            width: 95%;
            /* background-color: darkcyan; */
            align-items: center;

        }

        ::-webkit-scrollbar-corner {
            opacity: 0;
        }

        ::-webkit-scrollbar {
            opacity: 0;
        }

        #filter {
            height: 100%;
            max-height: 70px;
            font-size: 0.87rem;
            color: yellow;
            width: 100%;
            max-width: 300px;
            transition: bom .5s ease-in-out;
            transition-duration: 1s;
            animation: bom 2s ease-in-out infinite;


        }

        @keyframes bom {
            0% {
                transform: scale(1);
                transform: translateX(0px);
                border: 1px solid white;

            }

            50% {
                transform: scale(1.1);
                border: 1px solid red;
                transform: translateX(10px);

            }

            100% {
                transform: translateX(-10px);
                border: 1px solid blue;

                transform: scale(0.97);

            }

        }

        #filter:hover {
            animation: bom;
            /* transform-origin: center;
            transform: rotate(-370deg); */
        }

        .container-books {
            width: fit-content;
            height: fit-content;
        }

        .books-catalog {
            margin-top: 50px;
            width: 100%;
            height: 100%;
            background-color: #f1f1f1a0;

            justify-items: center;
        }

        .item4 {
            width: 100%;

            height: 100%;
            box-shadow: 0 26px 58px 0 rgba(0, 0, 0, .02), 0 5px 14px 0 rgba(0, 0, 0, .08);
            background-color: black;
            border-radius: 8px;
            padding: 2px;

        }

        a {
            width: 100%;


        }

        img {
            width: 100%;
            height: 100%;
            margin: 10px auto;
            box-shadow: 0 2px 2px black;


        }

        img:active {
            transform: scale(0.9);
            box-shadow: 0 4px 4px black;
        }

    }

    /* 
    @media screen and (max-width:500px) {
        .container-filter {
            grid-template-columns: repeat(auto-fill, 100px);
            padding: 5px;
            max-height: 70px;
            overflow: scroll;
            display: flex;
            width: 95%;

            background-color: blue;
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

    } */
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
        <div>
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