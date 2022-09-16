<?php
    header('Access-Control-Allow-origin: *');
    header('Content-Type: application/json');
    header('Access-control-Allow-Methods: POST');
    header('Access-control-Allow-Header: Access-control-Allow-Header,Access-control-Allow-Methods,Content-Type,Authorization,X-Requested-With');


    include_once 'D:/New folder/htdocs/php_api/config/Database.php';
    include_once 'D:/New folder/htdocs/php_api/models/Rela.php';

    $database = new Database();
    $db=$database->connect();

    $user=new Relative($db);    

    
    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    
    
    $user->rname = $data->rname;
    $user->gender = $data->gender;
    $user->addr = $data->addr;
    $user->R_Id = $data->R_Id;
    $user->bloodtype = $data->bloodtype;

    $user->age = $data->age;
    $user->phone = $data->phone;
    $user->user_Id = $data->user_Id;
   


    if ($user->creat()) {
        echo json_encode(array('message' => 'Post Created'));
    }else {
        echo json_encode(array('message' => 'Post Not Created'));

    }










?>