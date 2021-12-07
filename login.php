<?php include('server.php'); ?>
<!DOCTYPE html>

<head>
    <title>login</title>
    <link rel="stylesheet" href="css/style.css">
     </head>

<body>
    <div class="header">
        <h2>Login</h2>
    </div>

    <form method="post" action="login.php">
        <?php include('errors.php') ?>
        <div class="input-group">
            <label>username</label>
            <input type="text" name="username">
        </div>
        <div class="input-group">
            <label>password</label>
            <input type="password" name="password">
        </div>
        <div class="input-group">
            <button type="submit" name="login">login</button>
        </div>
        <p>Not a member<a href="register.php">Sign up</a></p>
    </form>
</body>

</html>