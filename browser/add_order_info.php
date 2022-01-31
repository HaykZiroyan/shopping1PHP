<?php
    include '../classes.php';
    $fname =  $_POST['fname'];
    $lname =  $_POST['lname'];
    $email =  $_POST['email'];

    $db = new DBase;
    $db->inserttDb(gago, first_name, last_name, email, $fname, $lname, $email);


    $pdo = $db->getDb();
    $user = $pdo->query("SELECT * FROM `gago` WHERE `email`='$email'");
    $user_id = $user->fetch(PDO::FETCH_ASSOC)['id'];

    $sum = 0;
    foreach($_COOKIE as $k => $v) {
        $str = (explode("_", $_COOKIE[$k]));
        $price = $pdo->query("SELECT * FROM `products` WHERE `id`='$str[0]'");
        $price1 = $price->fetch(PDO::FETCH_ASSOC)['price'];

        $sum = $sum + $str[1] * $price1;

    }
    $mydate=getdate(date("U"));
    $mydate[hours] = $mydate[hours] + 1;
    $date = "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year], $mydate[hours]:$mydate[minutes]:$mydate[seconds]";

    $db->inserttDb(gagik, user_id, sum, order_date, $user_id, $sum, $date);

    $order = $pdo->query("SELECT * FROM `gagik` ORDER BY id DESC LIMIT 1");
    $orders_id =  $order->fetch(PDO::FETCH_ASSOC);
    $order_id = $orders_id['id'];
    foreach($_COOKIE as $k => $v) {
        $str = (explode("_", $_COOKIE[$k]));
        $db->inserttDb(gagul, order_id, product_id, qty, $order_id, $str[0], $str[1]);
    }



    foreach($_COOKIE as $k => $v) {
        setcookie($k, $_COOKIE[$k], time() - 2);
    }


    header('Location: http://ended/browser/buy.php');

    exit();
?>