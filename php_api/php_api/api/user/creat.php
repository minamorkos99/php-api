<?php
    header('Access-Control-Allow-origin: *');
    header('Content-Type: application/json');
    header('Access-control-Allow-Methods: POST');
    header('Access-control-Allow-Header: Access-control-Allow-Header,Access-control-Allow-Methods,Content-Type,Authorization,X-Requested-With');


    include_once 'D:/New folder/htdocs/php_api/config/Database.php';
    include_once 'D:/New folder/htdocs/php_api/models/User.php';

    $database = new Database();
    $db=$database->connect();

    $user=new User($db);    

    
    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));


    
    $user->fname = $data->fname;
    $user->lname = $data->lname;
    $user->username = $data->username;
    $user->passsword = $data->passsword;
    $user->sstatus = $data->sstatus;
    $user->DOB = $data->DOB;
    $user->gender = $data->gender;
    $user->age = $data->age;
    $user->phone = $data->phone;
    $user->addresss = $data->addresss;
    $user->email = $data->email;
    $user->photo = $data->photo;
    $user->QR = $data->QR;
    $user->ID = $data->ID;


    if ($user->creat()) {
        echo json_encode(array('message' => 'Post Created'));
    }else {
        echo json_encode(array('message' => 'Post Not Created'));

    }










?>