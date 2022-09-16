<?php
    header('Access-Control-Allow-origin: *');
    header('Content-Type: application/json');
    header('Access-control-Allow-Methods: POST');
    header('Access-control-Allow-Header: Access-control-Allow-Header,Access-control-Allow-Methods,Content-Type,Authorization,X-Requested-With');


    include_once 'D:/New folder/htdocs/php_api/config/Database.php';
    include_once 'D:/New folder/htdocs/php_api/models/Covid-19.php';

    $database = new Database();
    $db=$database->connect();

    $user=new Covid($db);    

    
    // Get raw posted data
    $data = json_decode(file_get_contents("php://input"));


    $user->M1_ID = $data->M1_ID;
    $user->faver = $data->faver;
    $user->tiredness = $data->tiredness;
    $user->Dry_Cough = $data->Dry_Cough;
    $user->Difficulty_in_Breathing = $data->Difficulty_in_Breathing;
    $user->Sore_Throat = $data->Sore_Throat;
    $user->None_Sympton = $data->None_Sympton;
    $user->Pains = $data->Pains;
    $user->Nasal_Congestion = $data->Nasal_Congestion;
    $user->Runny_Nose = $data->Runny_Nose;
    $user->Diarrhea = $data->Diarrhea;
    $user->None_Experiencing = $data->None_Experiencing;
    $user->Age_0_9 = $data->Age_0_9;
    $user->Age_10_19 = $data->Age_10_19;
    $user->Age_20_24 = $data->Age_20_24;
    $user->Age_25_59 = $data->Age_25_59;
    $user->Age_60 = $data->Age_60;
    $user->gender = $data->gender;
    $user->color = $data->color;




    if ($user->creat()) {
        echo json_encode(array('message' => 'Post Created'));
    }else {
        echo json_encode(array('message' => 'Post Not Created'));

    }










?>