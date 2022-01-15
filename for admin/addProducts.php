<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="icon" href="/images/download.jpg">
    <link rel="stylesheet" href="/browser/styles/main.css">
</head>
<body>
    <form class="products" action="/back/products.php" method="post">
        <div class="type">
            <p>name</p>
            <p>description</p>
            <p>price </p>
        </div>
        <div class="inputs">
            <input type="text" placeholder="name" name="name">
            <input type="text" placeholder="description" name="description">
            <input type="text" placeholder="price" name="price">
        </div>
        <button type="submit">Save</button>
    </form>
    
</body>
</html>