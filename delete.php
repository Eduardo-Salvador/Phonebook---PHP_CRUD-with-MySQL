<?php
    session_start();
    include 'mysql.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = (int) $_POST['id']; 

        $sql = "DELETE FROM contacts WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
            exit;
        } else {
            echo "Error deleting contact: " . $conn->error;
        }
    }

    $conn->close();
?>
S