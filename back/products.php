<?php
    include '../classes.php';
    $name =  $_POST['name']; 
    $description =  $_POST['description']; 
    $price = trim($_POST['price']); 


    $db = new DBase;
    $db->inserttDb(products, name, description, price, $name, $description, $price);

    
    header('Location: http://ended/for%20admin/addProducts.php');
    exit();
?>
