<?php
    include 'db.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $item_name = $_POST['item_name'];
        $supplier = $_POST['supplier'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];

        if (!empty($item_name) && !empty($supplier) && !empty($price)) {
            $sql = "INSERT INTO inventory (item_name, supplier, quantity, price) VALUES ('$item_name', '$supplier', '$quantity', '$price')";

            if ($conn->query($sql) === TRUE) {
                echo "New item added successfully!";
            } else {
                echo "Error: " . $sql . " <br>" . $conn->error;
            }
        } else {
            echo "Please fill in all fields";
        }
    }
?>