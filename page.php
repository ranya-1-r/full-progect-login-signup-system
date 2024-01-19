 <?php
    require_once"securetePage_Session.inc.php";

    require_once"signup_view.inc.php";
    require_once"login_view.inc.php";
    
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ma_form.css">
    <title>Document</title>
</head>
<body class="a">
    <div class="c">
        <h3>
            <?php
                 output_username();
            ?>
        </h3>
    <h3 class="b">Login</h3>
    <form action="Login.inc.php" method="post">
        <input class="d" type="text" name="username" placeholder="Username">
        <input class="d" type="password" name="pwd" placeholder="password">
        <button class="button">Login</button>
    </form>
    <?php
        check_login_errors();
    
    ?>
    </div>
    <div class="c">
    <h3 class="b"> Signup</h3>
        <form action="Signup.inc.php" method="post">
        <?php
            signup_inputs();
        ?>
       <button class="button">Signup</button>
        </form>
        <?php
            check_signup_errors();
        ?>
    </div>
        <div class="c"> <h3 class="b">Logout</h3>
    <form action="Logout.inc.php" method="post">
        <button class="button">Logout</button>
    </form>
    </div>
        
      
    </div>
</body>
</html>