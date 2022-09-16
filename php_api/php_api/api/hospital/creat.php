<?php
    header('Access-Control-Allow-origin: *');
    header('Content-Type: application/json');
    header('Access-control-Allow-Methods: POST');
    header('Access-control-Allow-Header: Access-control-Allow-Header,Access-control-Allow-Methods,Content-Type,Authorization,X-Requested-With');


    include_once 'D:/New folder/htdocs/php_api/config/Database.php';
    include_once 'D:/New folder/htdocs/php_api/models/Hospital.php';

    $database = new Database();
    $db=$database->connect();

    $user=new Hospital($db);    

    
    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    $user->Hos_name = $data->Hos_name;
    $user->hos_phone = $data->hos_phone;
    $user->hos_add = $data->hos_add;
    $user->Hos_ID = $data->Hos_ID;
   

    if ($user->creat()) {
        echo json_encode(array('message' => 'Post Created'));
    }else {
        echo json_encode(array('message' => 'Post Not Created'));

    }










?>