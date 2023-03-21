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

// Script to update loan records that have not been picked up within 3 hours
while (true) {
  $stmt = $db->query("SELECT * FROM loan WHERE return_date IS NULL AND TIMESTAMPDIFF(SECOND, loan_date, NOW()) > 10800");
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  foreach ($rows as $row) {
      $stmt = $db->prepare("SELECT * FROM book WHERE id_book= :id_book");
      $stmt->bindParam('id_book',$id_book,PDO::PARAM_INT);
      $stmt->execute([$row['id_book']]);
      $book = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($book['status'] == 1) {
          // Book has not been picked up, return it to reserved status
          $stmt = $db->prepare("UPDATE book SET status=0 WHERE id_book=?");
          $stmt->execute([$row['id_book']]);
          if ($stmt->rowCount() > 0) {
              echo "Book has not been picked up, returned to reserved status.";
          } else {
              echo "Error: Unable to update book status.";
          }
      }
      
      $return_date = date('Y-m-d H:i:s');
      $stmt = $db->prepare("UPDATE loan SET return_date=? WHERE id_loan=?");
      $stmt->execute([$return_date, $row['id_loan']]);
      if ($stmt->rowCount() > 0) {
          // Check if the book was picked up within 3 hours
          $pickup_date = date('Y-m-d H:i:s', strtotime($row['loan_date'] . ' + 3 hours'));
          if (strtotime($return_date) <= strtotime($pickup_date)) {
              // Book was picked up within 3 hours, update status to reserved
              $stmt = $db->prepare("UPDATE book SET status=1 WHERE id_book=?");
              $stmt->execute([$row['id_book']]);
              if ($stmt->rowCount() > 0) {
                  echo "Book picked up within 3 hours, updated to reserved status.";
              } else {
                  echo "Error: Unable to update book status.";
              }
          } else {
              echo "Reservation expired and book returned to library.";
          }
      } else {
          echo "Error: Unable to update loan record.";
      }
  }
  
  sleep(10800); // wait for 3 hours before checking again
}


