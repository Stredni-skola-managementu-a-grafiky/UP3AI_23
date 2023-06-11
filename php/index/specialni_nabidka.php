<?php
function getAdvertisment(){
    // Database connection
    require "php/db/database_log.php";
    // Create connection
    $database_log = new mysqli($servername, $username, $password, $db_name);

    // Check connection
    if ($database_log->connect_error) {
        die("Connection failed: " . $database_log->connect_error);
    }

    $getUserSql = "SELECT id, price, publishertfk_user, expire, created, place, name, text FROM Advertisment";
    $getUserStmt = $database_log->prepare($getUserSql);
    $getUserStmt->execute();
    $getUserStmt->bind_result($id, $price, $publishertfk_user, $expire, $created, $place, $name, $text);

    $Advertisment_array = array();

    while ($getUserStmt->fetch()) {

        $Advertisment_array[] = array(
            "id" => $id,
            "price" => $price,
            "publishertfk_user" => $publishertfk_user,
            "created" => $created,
            "place" => $place,
            "text" => $text,
            "name" => $name,
        );
    }

    $getUserStmt->close();
    $database_log->close();

    return $Advertisment_array;
} 
    function createSpecialAdvertisment($advert) {
        echo 
        //přídat href odkaz na item stránku s get požadavkem
        "<a href='/php/item_details/?id=" . $advert["id"]. "' class='item'>
            <img src='../../images/index/mustang.png' class='item-img'>
            <div class='item-description'>
                <div class='item-name'>" . $advert["name"] . "</div>
                <div class='item-price'>" . $advert["price"]. " </div>
                <p class='item-like'>♥</p>
            </div>
        </a>";
    }
    $special_array = getAdvertisment();
?>
<?php foreach (range(0,2) as $num){
    createSpecialAdvertisment($special_array[$num]);
} ?>




