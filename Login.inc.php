<?php
if($_SERVER["REQUEST_METHOD"==="POST"]){
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];

    try{
        require_once 'conectionToDataBase.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';

        //error handlers si l utilisateure n est pas remplie l un des chemps 
        $errors=[];
        if(is_input_empty($username, $pwd)){
            $errors["empty_input"]="Fill in all fields!";
        }

        $result=get_user($pdo,$username);
        if(is_username_wrong($result)){
            $errors["login_incorrect"]="incorrect login info!!!";
        }
        if(!is_username_wrong($result) && is_password_wrong($pwd,$result["pwd"])){
            $errors["login_incorrect"]="incorrect logine info!!!";
        }


       require_once 'securetePage_Session.inc.php';

       if($errors){
            $_SESSION["errors_login"]=$errors;

            header("location: page.php");
         die();
       }

        $newSessionId=session_create_id();
        $sessionId= $newSessionId . "_" .$result["id"];
        session_id($sessionId);

        $_SESSION["user_id"]=$result["id"];
        $_SESSION["user_username"]=htmlspecialchars($result["username"]);

        $_SESSION["last_regeneration"]=time();

        header("location: page.php?login=siccess"); 
        $pdo=null;
        $statement=null;   
        die();
    }catch(PDOException $e){
        die("query failed: ". $e->getMessage());
    
        }
}else{
    header("location: page.php");{
       die(); 
    }
}