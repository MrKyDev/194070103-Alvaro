<?php

    include "db.php";

    $sql = "SELECT * FROM inventory";
    $result = $conn->query($sql);
?>