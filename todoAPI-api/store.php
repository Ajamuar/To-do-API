<?php
    header('Access-Control-Allow-Origin: *');
    
    $localhost = '127.0.0.1';
    $user = 'root';
    $password = 'goldtree9';
    $db = 'todo';
    
    $con = new mysqli($localhost, $user, $password, $db);

    if($conn->connect_error) {
        die("Connection failed: " . $connect_error);
    }
    
    header('Content-Type: application/json');

    $caption = $_POST['caption'];
    if(!empty($caption)) {
        $sql = "INSERT INTO tasks (caption, is_completed) VALUES ('$caption', '0');";
        $result = $con->query($sql);
            
        echo json_encode($result);
    }

?>