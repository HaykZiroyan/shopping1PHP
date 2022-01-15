<?php
    include '../classes.php';
    $name =  $_POST['name']; 
    $description =  $_POST['description']; 
    $price = trim($_POST['price']); 
    // print_r($name . '<br>' . $description . '<br>' . $price);

    // $mysql = new mysqli('127.0.0.1', 'root', 'root', 'new-tasks');


    // $user = 'root';
    // $password = 'root';
    // $host = '127.0.0.1';
    // $dbname = 'new-tasks';
    // $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

    // $pdo = new PDO($dsn, $user, $password);

    $db = new DBase;
    $db->inserttDb(products, name, description, price, $name, $description, $price);
    // $pdo->query("INSERT INTO `products` (`name`, `description`, `price`) VALUES('$name', '$description', '$price')");
            
    // $pdo->close();
    
    header('Location: http://ended/for%20admin/addProducts.php');
    exit();
?>
<!-- object ev zangvac
reference types
for and while
js types
let const var 
lexikal scopes -->