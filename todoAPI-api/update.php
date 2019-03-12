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

    // $content = trim(file_get_contents("php://input"));
    // $data = json_decode($content);
    // $caption = $data->caption;
    // $is_completed = $data->is_completed;
    // $id = $data->id;

    parse_str(file_get_contents("php://input"), $content);

    $caption = $content['caption'];
    $is_completed = $content['is_completed'];
    $id = $content['id'];

    if($caption != '' && $is_completed != '') {
        
        $sql = "UPDATE tasks SET caption='$caption', is_completed='$is_completed' WHERE id='$id';";
        $result = $con->query($sql);
            
        echo json_encode($caption);
    } else {
        echo json_encode("False ".$caption." ".$is_completed);
    }

     
?>