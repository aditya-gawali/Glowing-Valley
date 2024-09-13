<?php
require 'conn.php';

if (isset($_GET['id'])) {
    $del_id = $_GET["id"];

    $search = $conn->query("SELECT * FROM products WHERE id = $del_id");

    $search->execute();
    $image = $search->fetch(PDO::FETCH_ASSOC);



    $filepath = $image['image'];  // Replace with the actual file path

    $substring1 = substr($filepath, 5);
    if (unlink($substring1)) {
        echo "File deleted successfully.";
    } else {
        echo "Error deleting file.";
    }


    $delete = $conn->prepare("delete from products where id = :id");
    $delete->execute(array(
        ':id' => $del_id
    ));

    if ($delete) {
        header("location:../product.php");
    }
}


