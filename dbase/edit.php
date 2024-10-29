edit.php

<?php
    include "db.php"; 

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM inventory WHERE id=$id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $item_name = $row['item_name'];
            $supplier = $row['supplier'];
            $quantity = $row['quantity'];
            $price = $row['price'];
        } else {
            echo "No item found with that ID";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $item_name = $_POST['item_name'];
        $supplier = $_POST['supplier'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $id = $_POST['id'];

        if (!empty($item_name) && !empty($supplier) && !empty($price)) {
            $sql = "UPDATE inventory SET item_name='$item_name', supplier='$supplier', quantity='$quantity', price='$price' WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                echo "Item successfully updated.";
            } else {
                echo "Error editing record: " . $sql . " <br>" . $conn->error;
            }
        } else {
            echo "Please fill in all fields.";
        }
    }
?>
