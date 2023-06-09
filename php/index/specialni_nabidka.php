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
            "timeRemaining" => $timeRemaining
        );
    }

    $getUserStmt->close();
    $database_log->close();

    return $Advertisment_array;
} 
    function createSpecialAdvertisment($advert) {
        echo "<div class='tentent'>
        <img src='../../images/index/mustang.png'> <!--obrázek produktu-->
        <h6>" . $advert["name"] . "</h6>
        <h6><!-- cena produktu --></h6>
        <h6 class=addtofavorite>♥</h6>
    </div>";
    }
    $special_array = getAdvertisment();
    
?>

<!--oddíl se speciálními produktty na hlavní stránce-->
<div class="tentent-box-special-offer"></div>
<!--speciální produkt na hlavní stránce-->
    <?php foreach (range(0,2) as $num){
        createSpecialAdvertisment($special_array[$num]);
    }?>
<!-- konec speciálního produktu na hlavní stránce-->
</div>
<!-- konec oddílu se speciálními produktty na hlavní stránce-->