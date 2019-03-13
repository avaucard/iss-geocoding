<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="./styles/main.css" />
    <!--<script src="main.js"></script>-->
</head>

<body>
    <h1>Log In</h1>
    <form action="bin/checkLogin.php" method="POST">
        <input type="text" id="username" name="username" placeholder="Username" required>
        <input type="password" id="password" name="password" placeholder="Password" required>
        <input type="submit" value="Log In">        
    </form>
    <a href="./pages/signup.php">SIGN UP</a>

    
    <?php if(isset($_GET['error'])) { ?>
        <?php if($_GET['error'] == 1) : ?>
            <p class="error">Login or Password incorrect</p>
        <?php elseif($_GET['error'] == 2) : ?>
            <p class="error">Session expired, please reconnect</p>
        <?php else : ?>
            
        <?php endif; ?>
    <?php } ?>
    
    
</body>

</html>