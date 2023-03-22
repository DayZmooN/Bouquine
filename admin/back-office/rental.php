<?php
require_once './auth.php';

// Process user input
if (isset($_POST['rent'])) {
    $id_book = $_POST['id_book'];
    $id_user = $_SESSION['id_user'];
    
    // Check if book is available for loan
    $stmt = $db->prepare("SELECT `id_book`, `ISBN`, `image`, `title`, `author`, `editor`, `collection`, `publication_date`, `genre`, `id_category`, `summary`, `status` FROM `book` WHERE `id_book` = :id_book");
    $stmt->bindParam('id_book',$id_book,PDO::PARAM_INT);
    $stmt->execute();
    if ($stmt->rowCount() == 0) {
        echo "Error: Book is not available for loan.";
    } else {
        // Create loan record
        $loan_date = date('Y-m-d H:i:s');
        $return_date = date('Y-m-d H:i:s', strtotime('+3 hours'));
        $stmt = $db->prepare("INSERT INTO loan (id_book, id_user, loan_date, return_date) VALUES (:id_book, :id_user, NOW(), $return_date)");
        $stmt->bindParam('id_book',$id_book,PDO::PARAM_INT);
        $stmt->bindParam('id_user',$id_user,PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            echo "Book rented successfully!";
        } else {
            echo "Error: Unable to create loan record.";
        }
    }
} elseif (isset($_POST['return'])) {
    $id_loan = $_POST['id_loan'];
    
    // Update loan record when book is returned
    $return_date = date('Y-m-d H:i:s');
    $stmt = $db->prepare("UPDATE loan SET return_date= $return_date WHERE id_loan= :id_loan");
    $stmt->bindParam('id_loan',$id_loan,PDO::PARAM_INT);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo "Book returned successfully!";
    } else {
        echo "Error: Unable to update loan record.";
    }
}




