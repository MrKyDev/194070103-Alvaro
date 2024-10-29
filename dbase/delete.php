delete.php

<?php
    include "db.php"; 

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "DELETE FROM inventory WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "Item successfully deleted.";
            echo "<script>
                    setTimeout(function() {
                        window.location.href = 'index.php';
                    }, 2000);
                  </script>";
        } else {
            echo "Error deleting record: " . $sql . " <br>" . $conn->error;
        }
    }
?>