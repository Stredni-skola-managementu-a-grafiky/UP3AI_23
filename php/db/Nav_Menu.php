<?php
function getmenu(){
    // Database connection
    require "database_log.php";

    // Create connection
    $database_log = new mysqli($servername, $username, $password, $db_name);

    // Check connection
    if ($database_log->connect_error) {
        die("Connection failed: " . $database_log->connect_error);
    }

    $getUserSql = "SELECT id, text, url text FROM nav_Menu";
    $getUserStmt = $database_log->prepare($getUserSql);
    $getUserStmt->execute();
    $getUserStmt->bind_result($id, $text, $url);

    $menu_array = array();

    while ($getUserStmt->fetch()) {
        $menu_array[] = array(
        "id" => $id, 
        "text" => $text, 
        "url" => $url
    );
    }

    // Close statement
    $getUserStmt->close();

    // Close database connection
    $database_log->close();

    return $menu_array;
}  


?>