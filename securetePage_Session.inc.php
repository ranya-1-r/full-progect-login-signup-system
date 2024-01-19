<?php

ini_set('session.use_only_cookies',1);
ini_set('session.use_strict_mod',1);

session_set_cookie_params([
    'lifetime'=>1800,
    'domain'=>'localhost',
    'path'=>'/',
    'secure'=>true,
    'httponly'=>true
]);

session_start();

if(isset($_SESSION["user_id"])){
  if(!$_SESSION["last_regeneration"]){
    regenerate_sission_id_loggedin(); 
    $_SESSION["last_regeneration"]=time();
    }else{
      $interval=60*30;
    if(time()-$_SESSION["last_regeneration"]>=$interval){
      regenerate_sission_id_loggedin(); 
         $_SESSION["last_regeneration"]=time();
    }
 }
}else{
  if(!$_SESSION["last_regeneration"]){
    session_regenerate_id(); 
    $_SESSION["last_regeneration"]=time();
    }else{
      $interval=60*30;
    if(time()-$_SESSION["last_regeneration"]>=$interval){
          session_regenerate_id(); 
         $_SESSION["last_regeneration"]=time();
    }
 }

}
function regenerate_sission_id_loggedin()
{
    session_regenerate_id(true); 
    $userId=$_SESSION["user_id"];
    $newSessionId=session_create_id();
    $sessionId= $newSessionId . "_" .$userId;
    session_id($sessionId);
    $_SESSION["last_regeneration"]=time();
}
function regenerate_id()
{
    session_regenerate_id(true); 
    $_SESSION["last_regeneration"]=time();
}