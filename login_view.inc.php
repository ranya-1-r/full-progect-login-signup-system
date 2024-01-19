<?php

declare(strict_types=1);

function output_username(){
    if(isset($_SESSION['user_id'])){
        echo "you are logged in as " .$_SESSION['user_username'] ;
    }else{
        echo "you are not logged in";
    }
}

function check_login_errors(){
    if (isset($_SESSION['errors_login'])){
        $errors=$_SESSION['errors_login'];

        echo"<br>";

        foreach($errors as $error){
            echo "<p style='color:red;'>". $error."</p>";
        }
    } 
    else if(isset($_GET['login'])&& $_GET['login']==="success"){
        echo "<br>";
        echo '<p style="color:green;">You have successfully logged in!</p>';

    }   
}