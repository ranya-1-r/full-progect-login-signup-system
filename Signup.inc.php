<?php

if($_SERVER["REQUEST_METHOD"==="POST"]){
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];
    $email = $_POST['email'];

   try{
        require_once 'conectionToDataBase.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php'; 
        //error handlers si l utilisateure n est pas remplie l un des chemps 
        $errors=[];
        if(is_input_empty($username, $pwd, $email)){
            $errors["empty_input"]="Fill in all fields!";
        }
       if(is_email_inavlid( $email)){
        $errors["invalid_mail"]= "Invalid email used!";
       }
       if(is_username_taken( $pdo, $username)){
        $errors["user_already_exists"]="This username is already execte.";
       }
       if(is_email_registered( $pdo,  $email)){
        $errors["email_already_used"]="This email address is already registered.";
       }

       require_once 'securetePage_Session.inc.php';

       if($errors){
            $_SESSION["errors_signup"]=$errors;

            $signupData=[
                "username" => $username,
                "email" => $email
            ];
            $_SESSION["signup_data"]=$signupData;

            header("location: page.php");
         die();

       }

       creat_user( $pdo, $pwd, $username ,  $email);
       header("location: page.php?signup=success");
        die();

        $pdo=null;
        $stmt=null;

   }catch(PDOException $e){
    die("query failed: ". $e->getMessage());

   }
}else{
    header("location: page.php");{
       die(); 
    }
}