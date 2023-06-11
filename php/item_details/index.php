<?php 
if(isset($_GET["id"])){
    $id = $_GET["id"];
} else {
    header("Location: http://localhost");
}
require "../db/database_log.php";

function getSpecificItem($id) {
    
    $con = $GLOBALS["database_log"];

    $sql = "SELECT price, publishertfk_user, expire, created, place, name , text FROM Advertisment WHERE id=?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt-> execute();
    $stmt->bind_result($price, $publisher, $expire, $created, $place, $name, $text);
    $item = array();
    while($stmt->fetch()) {
        $item[] = array(
            "price" => $price,
            "publisher" => $publisher,
            "created" => $created,
            "place" => $place,
            "text" => $text,
            "name" => $name
        );
    }
    return $item;
}
$data = getSpecificItem($id);

?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inzerat_css.css">
    <title>kdestosehnal</title>
</head>
<body>
    <main>
        <?php
        foreach($data as $data) {
            echo $data["name"] . " ". $data["price"];
        } ?>
        <div class="box-left-for-photo">
            <img class="items"src="Image/iphone.jpg" alt="item">
            <img clas="heart" src="Image/HEART.png" >
        </div>
        <div class="box-bottom">
            <p class="item-more-hashtag">Detailní popis produktu
                #kategorieproduktu , #kategorieproduktu , #kategorieproduktu
            </p>
            
        </div>
        <div class="box-right">
            <p class="name-item">Jméno produktu</p>
        </div>
        <div class="price">
            <p class="price">19999,-</p>
        </div>
        <div class="box-right-center">
            <p class="contact">
                jméno prodávajícího
                Kontakt na prodávajícího
                Mail prodávajícího</p>
        </div>
        
        
    </main>
    <footer>

    </footer>
</body>

</html>