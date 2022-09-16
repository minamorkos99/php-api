<?php
    header('Access-Control-Allow-origin: *');
    header('Content-Type: application/json');
    header('Access-control-Allow-Methods: POST');
    header('Access-control-Allow-Header: Access-control-Allow-Header,Access-control-Allow-Methods,Content-Type,Authorization,X-Requested-With');


    include_once 'D:/New folder/htdocs/php_api/config/Database.php';
    include_once 'D:/New folder/htdocs/php_api/models/Doctor.php';

    $database = new Database();
    $db=$database->connect();

    $user=new Doctor($db);    

    
    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));
      

    
    $user->Doctor_ID = $data->Doctor_ID;
    $user->name = $data->name;
    $user->specialist = $data->specialist;
    $user->phone = $data->phone;
   


    if ($user->creat()) {
        echo json_encode(array('message' => 'Post Created'));
    }else {
        echo json_encode(array('message' => 'Post Not Created'));

    }










?>