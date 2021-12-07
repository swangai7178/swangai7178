<?php include('server.php'); ?>
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
            <a href="home.php">
                <h2>homepage</h2>
            </a>
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
                        <a href="teachers.php?logout='1'" style="color:red;">logout</a>
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
        <p>welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
        <div class="sidenav">


            <a href="students.php">students population</a>
            <a href="teacher_register.php">register</a>
            <a href="teachers.php">teachers population</a>
            <a href="leave.php">Teachers leave</a>
            <a href="contact.php">Search</a>
            <a href="students.php">students population</a>
            <a href="message.php">message</a>
            <a href="profile.php">profile</a>
            <a href="home.php">home</a>

        </div>
        <div class="row" style="margin-left:15%;">
            <div class="col-md-5">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>
                            <span class="glyphicon glyphicon-th" style="margin-top:10%;margin-left:15%;"></span>
                            <span>Add teacher tally</span>
                        </strong>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="newteacher_tally.php">
                            <?php include('errors.php') ?>
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" placeholder="school name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="male" placeholder="male teachers total">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="female" placeholder="female teachers total">
                            </div>
                            <button type="submit" name="ttotal" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>

        <?php endif ?>

</body>

</html>