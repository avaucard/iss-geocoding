<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../styles/main.css" />
    <!--<script src="main.js"></script>-->
</head>

<body>
    <a href="../index.php"><button class="return" style="position:fixed;">Return</button></a>
    <h1>Sign Up</h1>
    <form action="../bin/addUser.php" method="POST">
    <div class="form-wrapper">
        <div class="form-row">
            <div class="form-item">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="form-item">
                <label for="email">E-Mail</label>
                <input type="email" id="email" name="email" placeholder="E-mail" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-item">
                <label for="firstname">Firstname</label>
                <input type="text" id="firstname" name="firstname" placeholder="Firstname" required>
            </div>
            <div class="form-item">
                <label for="surname">Surname</label>
                <input type="text" id="surname" name="surname" placeholder="Surname" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-item">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-item">
                <label for="confirm">Confirm Password</label>
                <input type="password" id="confirm" name="confirm" placeholder="Confirm" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-item">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" placeholder="Address" required>
            </div>
            <div class="form-item">
                <label for="zip_code">Zip Code</label>
                <input type="number" id="zip_code" name="zip_code" placeholder="Zip Code" required>
            </div>
        </div>
        <div class="form-item">
            <label for="country">Country</label>
            <input type="text" id="country" name="country" placeholder="Country" required>
        </div>
    </div>
        
        <input type="submit" value="Sign Up">        
    </form>

    <?php if(isset($_GET['error'])) { ?>
        <?php if($_GET['error'] == 1) : ?>
            <p>Error while creating account, please retry</p>
        <?php elseif($_GET['error'] == 2) : ?>
            <p>Session expired, please reconnect</p>
        <?php else : ?>
            
        <?php endif; ?>
    <?php } ?>
</body>

</html>