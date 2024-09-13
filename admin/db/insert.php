<?php
require 'conn.php';
session_start();
$_SESSION['addproduct'] = false;

if (isset($_POST['addProduct'])) {
    $category = $_POST['category'];
    $name = $_POST['name'];
    $uses = $_POST['uses'];
    $ingre = $_POST['ingre'];

    $weight = $_POST['w1'];
    $prices = $_POST['p1'];

    for ($i = 2; $i < 3; $i++) {
        if (isset($_POST['w' . $i . ''])) {

            $weight .= "," . $_POST['w' . $i . ''];
            $prices .= "," . $_POST['p' . $i . ''];
        }
    }



    $target_dir = "uploads/";
    $nofile = false;
    if (isset($_FILES['image'])) {

        $target_file = $target_dir . basename($_FILES["image"]["name"]); // Get filename
        if (isset($_FILES["image"]["type"]) && preg_match('/^image\/.*/i', $_FILES["image"]["type"])) {

            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
            } else {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
                    $nofile = false;
                } else {
                    echo "Sorry, there was an error uploading your file.";
                    $nofile = true;
                }
            }
        } else {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $nofile = true;
        }
    } else {
        echo "An error occurred while uploading the image.";
        $nofile = true;
    }


    if ($_SESSION['edit'] != 0) {
        $id = $_SESSION['edit'];

        if ($nofile == false) {

            $update = $conn->prepare("update products SET category = :cate, name = :name, uses = :uses, ingre = :ingre, weight = :weight, prices = :prices, image = :image WHERE id = $id");
            $file = './db/' . $target_file;
            $update->execute(array(
                ':cate' => $category,
                ':name' => $name,
                ':uses' => $uses,
                ':ingre' => $ingre,
                ':weight' => $weight,
                ':prices' => $prices,
                ':image' => $file
            ));
        } else {
            $update = $conn->prepare("update products SET category = :cate, name = :name, uses = :uses, ingre = :ingre, weight = :weight, prices = :prices WHERE id = $id");
            // $file = './db/' . $target_file;
            $update->execute(array(
                ':cate' => $category,
                ':name' => $name,
                ':uses' => $uses,
                ':ingre' => $ingre,
                ':weight' => $weight,
                ':prices' => $prices
                // ':image' => $file
            ));
        }

        $_SESSION['edit'] = 0;
        $_SESSION['updateproduct'] = true;
    } else {
        $insert = $conn->prepare("insert into products(category,name,uses,ingre,weight,prices,image) values (:cate,:name,:uses,:ingre,:weight,:prices,:image)");

        $file = './db/' . $target_file;
        $insert->execute(array(
            ':cate' => $category,
            ':name' => $name,
            ':uses' => $uses,
            ':ingre' => $ingre,
            ':weight' => $weight,
            ':prices' => $prices,
            ':image' => $file
        ));
        $_SESSION['addproduct'] = true;
    }

    header("location:../newProduct.php");
}

if (isset($_GET['id']) && isset($_GET['type'])) {
    $id = $_GET['id'];

    if ($_GET['type'] == 'p') {
        $popular = $conn->query('UPDATE products SET popular = 0 WHERE id = ' . $id . '');
    } else {
        $popular = $conn->query('UPDATE products SET popular = 1 WHERE id = ' . $id . '');
    }

    header("location:../product.php");
}
