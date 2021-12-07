<?php include('adminserver.php'); ?>
<!DOCTYPE html>

<head>
    <title>login</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="header">
        <h2>Login</h2>
    </div>

    <form method="post" action="admin_login.php">
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
            <button type="submit" name="sublogin">login</button>
        </div>
    </form>
</body>

</html>