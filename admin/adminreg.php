<?php include('adminserver.php'); ?>
<!DOCTYPE html>

<head>
    <title>walimu tech</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/sidenav.css" />


</head>

<body>

    <header id="header">
        <div class="logo pull-left">
            <h2>Register</h2>
        </div>
        <div class="header-content">
            <div class="header-date pull-left">
                <strong><?php echo date("F j, Y, g:i a"); ?></strong>
            </div>
            <div class="pull-right clearfix">
                <ul class="info-menu list-inline list-unstyled">
                    <li class="profile">
                        <?php if (isset($_SESSION['username'])) : ?>
                            <p>welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
                    </li>
                    <li class="last">
                        <a href="dashboard.php?logout='1'" style="color:red;">logout</a>
                    <?php endif ?>
                    </li>

                    <ul class="dropdown-menu">
                        <li>
                            <a href="profile.php?id=<?php echo (int)$user['id']; ?>">
                                <i class="glyphicon glyphicon-user"></i>
                                Profile
                            </a>
                        </li>
                    </ul>
                    </li>
                </ul>
            </div>
        </div>
    </header>




    <?php if (isset($_SESSION['username'])) : ?>
        <?php include('sidenav.php'); ?>
        <div class="row" style="margin-left:18%; margin-top:5%;">
            <div class="col-md-5">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>
                            <span class="glyphicon glyphicon-th"></span>
                            <span>register admin</span>
                        </strong>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="adminreg.php">
                            <?php include('errors.php') ?>
                            <div class="form-group">
                                <input type="text" name="fname" placeholder="first name" value="<?php echo $fname; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="lname" placeholder="last name" value="<?php echo $lname; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="username" placeholder="username" value="<?php echo $username; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="address" placeholder="address" value="<?php echo $address; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" placeholder="email" value="<?php echo $email; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone" placeholder="contact" value="<?php echo $phone; ?>">
                            </div>
                            <div class=" form-group">
                                <input type="text" placeholder="password" name="password">
                            </div>

                            <div class="input-group">
                                <button type="submit" name="register">Register</button>
                            </div>
                        </form>


                    <?php endif ?>



</body>

</html>