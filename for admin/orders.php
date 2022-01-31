<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/browser/styles/main.css">
</head>
<body>
    <table>
        <tr>
            <th>order id</th>
            <th>order date</th>
            <th>firstname</th>
            <th>lastname</th>
            <th>email</th>
            <th>product name</th>
            <th>description</th>
            <th>price</th>
            <th>Quantity</th>
            <th>total price</th>
        </tr>
        <?php
            include '../classes.php';
            $db = new DBase;
            $pdo = $db->getDb();
            $orders = $db->getTable(gagik);
            // $user = 'root';
            // $password = 'root';
            // $host = '127.0.0.1';
            // $dbname = 'new-tasks';
            // $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

            // $pdo = new PDO($dsn, $user, $password);
            // $orders = $pdo->query("SELECT * FROM `gagik`");

            while ($row = $orders->fetch(PDO::FETCH_ASSOC)) {
                $userId = $row[user_id];
                $users =  $pdo->query("SELECT * FROM `gago` WHERE `id` = $userId"); //users info
                $userInfo = $users->fetch(PDO::FETCH_ASSOC);
                $productIn =  $pdo->query("SELECT * FROM `gagul` WHERE `order_id` = $row[id]"); //products included in order
                $prod = $productIn->fetch(PDO::FETCH_ASSOC);
                $productId = $prod[product_id];
                $info =  $pdo->query("SELECT * FROM `products` WHERE `id` = $productId"); //product info
                $productInfo = $info->fetch(PDO::FETCH_ASSOC);
                
                ?>
                <tr>
                    <th><?php echo($row[id]) ?></th>
                    <th><?php echo($row[order_date]) ?></th>
                    <th><?php echo($userInfo[first_name]) ?></th>
                    <th><?php echo($userInfo[last_name]) ?></th>
                    <th><?php echo($userInfo[email]) ?></th>
                    <th><?php echo($productInfo[name]) ?></th>
                    <th><?php echo($productInfo[description]) ?></th>
                    <th><?php echo($productInfo[price]) ?></th>
                    <th><?php echo($prod[qty]) ?></th>
                    <th><?php echo($productInfo[price] * $prod[qty]) ?></th>
                </tr>

                <?php
                while ($row1 = $productIn->fetch(PDO::FETCH_ASSOC)) {
                    $userId1 = $row1[user_id];
                    $users1 =  $pdo->query("SELECT * FROM `gago` WHERE `id` = $userId1"); //users info
                    // $userInfo1 = mysqli_fetch_assoc($users1);
                    $productIn1 =  $pdo->query("SELECT * FROM `gagul` WHERE `order_id` = $row1[id]"); //products included in order
                    $prod1 = $productIn1->fetch(PDO::FETCH_ASSOC);
                    $productId1 = $row1[product_id];
                    $info1 =  $pdo->query("SELECT * FROM `products` WHERE `id` = $productId1"); //product info
                    $productInfo1 = $info1->fetch(PDO::FETCH_ASSOC);
                    ?>
                    

                    <tr>
                        <th><?php echo($userId1); ?> </th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th><?php echo($productInfo1[name]) ?></th>
                        <th><?php echo($productInfo1[description]) ?></th>
                        <th><?php echo($productInfo1[price]) ?></th>
                        <th><?php echo($row1[qty]) ?></th>
                        <th><?php echo($productInfo1[price] * $row1[qty]) ?></th>
                    </tr>
                    <?php
                }
            }

        ?>
    </table>
</body>
</html>



