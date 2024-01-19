<?php

declare(strict_types=1);

function signup_inputs(){
    if(isset($_SESSION["signup_data"]["username"]) && !isset($_SESSION["errors_signup"]["username_taken"])){
        echo ' <input class="d" type="text" name="username" placeholder="Username" value="' .$_SESSION["signup_data"]["username"] . '">';
    }else{
        echo '<input class="d" type="text" name="username" placeholder="Username">';
        
    }
    echo '<input class="d" type="password" name="pwd" placeholder="password">';

    if(isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["errors_signup"]["email_used"]) && !isset($_SESSION["errors_signup"]["invalid_mail"])){
    echo '<input class="d" type="text" name="email" placeholder="E-Mail"  value="' .$_SESSION["signup_data"]["email"] . '">';
    }else{
    echo '<input class="d" type="text" name="email" placeholder="E-Mail">';

}
}

function check_signup_errors(){
    if(isset($_SESSION["errors_signup"])){
        $errors=$_SESSION["errors_signup"];

        echo "<br> ";
        foreach($errors as $error){
            echo "<p class='R'> ". $error ."</p><br>";
        }
        unset($_SESSION["errors_signup"]);
    } else if(isset($_GET["signup"]) && $_GET["signup"]==="success"){
        echo "<br>";
        echo '<p style=color:blue;>signup success!</p>';
    }
}