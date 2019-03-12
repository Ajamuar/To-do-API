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

    if(empty($_GET["id"])) {
        $sql = "SELECT id, caption, is_completed FROM tasks";
        $result = $con->query($sql);
    
        $response=array();

        if($result->num_rows > 0) {
            $i = 0;
            $obj = new stdClass();
            while($row = $result->fetch_assoc()) {
                array_push($response, ["id" => $row['id'], "caption" => $row['caption'], "is_completed" => $row['is_completed']]);
            }

        }
        echo json_encode($response);
    } else {
        $id = $_GET["id"];
        // echo $id;
        $sql = "SELECT id, caption, is_completed FROM tasks where id='$id'";
        $result = $con->query($sql);
    
        $response=array();

        if($result->num_rows > 0) {
            $i = 0;
            $obj = new stdClass();
            while($row = $result->fetch_assoc()) {
                array_push($response, ["id" => $row['id'], "caption" => $row['caption'], "is_completed" => $row['is_completed']]);
            }

        }
        echo json_encode($response);
    }

?>