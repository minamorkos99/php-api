<?php
    header('Access-Control-Allow-origin: *');
    header('Content-Type: application/json');
    header('Access-control-Allow-Methods: POST');
    header('Access-control-Allow-Header: Access-control-Allow-Header,Access-control-Allow-Methods,Content-Type,Authorization,X-Requested-With');


    include_once 'D:/New folder/htdocs/php_api/config/Database.php';
    include_once 'D:/New folder/htdocs/php_api/models/Medical.php';

    $database = new Database();
    $db=$database->connect();

    $user=new Medical($db);    

    
    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    
    //`Hospital_ID`, `Model_ID`, `Doctor_ID`, `M_ID`, `Bloodtype`, `last_update`, `user_id`
    $user->Hospital_ID = $data->Hospital_ID;
    $user->Model_ID = $data->Model_ID;
    $user->Doctor_ID = $data->Doctor_ID;
    $user->M_ID = $data->M_ID;
    $user->Bloodtype = $data->Bloodtype;

    $user->last_update = $data->last_update;
    
    $user->user_id = $data->user_id;
   


    if ($user->creat()) {
        echo json_encode(array('message' => 'Post Created'));
    }else {
        echo json_encode(array('message' => 'Post Not Created'));

    }










?>