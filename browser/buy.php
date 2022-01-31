<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>online shop</title>
    <link rel="icon" href="/images/download.png">
    <link rel="stylesheet" href="styles/main.css">
</head>
<body>
    <div id = "card" class="card-container">
        <?php
            include '../classes.php';
            $db = new DBase;
        
            $result = $db->getTable(products);
            $array = array();
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                array_push($array, ["id"=>$row["id"], "price"=> $row["price"], "description"=> $row["description"], "name"=> $row["name"]]); 
            }
            $array1 = array();
            $result->execute();
            $row_count =$result->fetchColumn();
            for ($i = 0; $i < count($array)/5; $i++) {
                array_push($array1, array());
                for ($j = 0; $j < 5; $j++) {
                    $k = 5*$i + $j;
                    array_push($array1[$i], $array[$k]);
                    

                    if ($k+1 == count($array)) {
                            break;
                        }
                }
            }
            for ($i = 0; $i < count($array1); $i++) {
          
                    ?>
                
                    <div class="cont">

                    <?php
                    
                    $curr_cont_cards  =   $array1[$i];
                    foreach ($curr_cont_cards as $card){
                    ?>
                            <form class="card" action="newfunc.php" method="post">
                                <h3><?=$card["name"];?></h3>
                                <p><?=$card["description"];?></p>
                                <h2 class="price"><?=$card["price"];?></h2>
                                <input type="hidden" name="id" value="<?= $card[id] ?>">
                                <input type = "number" value='1' name="count">
                                <button class="set-busket" type="submit">add to busket</button>
                            </form>
                    <?php } ?>
                        </div> 
               <?php  
            }

            
    
        ?>
    </div>
    <a href="karzina.php" class="karzina scrollKar">
        <img src="/images/basket.png" alt="">
        <div id="New" class="num">
            <p>0</p>
        </div>
    </a>    
    
</body>
</html>