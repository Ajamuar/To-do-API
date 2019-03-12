<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    // header('Access-Control-Request-Headers: *');
    // header('Access-Control-Response-Headers: *');
    // header("Access-Control-Allow-Credentials", "true");
    header("Access-Control-Allow-Methods", "DELETE, OPTIONS");
    header("Access-Control-Allow-Headers", "Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers");

    // headers.add("Access-Control-Allow-Methods", "GET, POST, OPTIONS, PUT, DELETE");
    //header.add("Origin", '127.0.0.1');

    
    $localhost = '127.0.0.1';
    $user = 'root';
    $password = 'goldtree9';
    $db = 'todo';
    
    $con = new mysqli($localhost, $user, $password, $db);

    if($conn->connect_error) {
        die("Connection failed: " . $connect_error);
    }

    
    

    if(empty($_GET["id"])) {
        $sql = "DELETE FROM tasks WHERE 1";
        $result = $con->query($sql);
    
        echo json_encode($result);
    } else {
        $id = $_GET["id"];
        $sql = "DELETE FROM tasks WHERE id='$id'";
        $result = $con->query($sql);
    
        echo json_encode($result);
    }

?>