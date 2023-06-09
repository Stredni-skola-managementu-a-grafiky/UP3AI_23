<?php
function getAdvertisment(){
    // Database connection
    require "database_log.php";

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
        $currentTime = time();
        $createdTime = strtotime($created);
        $expireTime = strtotime($expire);
        $timeDifference = $expireTime - $currentTime;
        $timeRemaining = calculateTimeRemaining($timeDifference);

        $Advertisment_array[] = array(
            "id" => $id,
            "price" => $price,
            "publishertfk_user" => $publishertfk_user,
            "expire" => $expire,
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

function calculateTimeRemaining($seconds) {
    $days = floor($seconds / (60 * 60 * 24));
    $hours = floor(($seconds % (60 * 60 * 24)) / (60 * 60));
    $minutes = floor(($seconds % (60 * 60)) / 60);

    if ($days > 0) {
        return $days . " days " . $hours . " hours";
    } elseif ($hours > 0) {
        return $hours . " hours" . $minutes . " minutes";
    } elseif ($minutes > 0) {
        return $minutes . " minutes";
    } else {
        return "Expired";
    }
}
?>