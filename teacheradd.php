<?php include('server.php'); ?>
<!DOCTYPE html>

<head>
    <title>walimu tech</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    <link rel="stylesheet" href="css/main.css" />
</head>

<body>

    <header id="header">
        <div class="logo pull-left">
            <h2>teachers</h2>
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
                        <a href="teacheradd.php?logout='1'" style="color:red;">logout</a>
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

        <div class="row" style="margin-left:18%;">
            <div class="col-md-5">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>
                            <span class="glyphicon glyphicon-th" style="margin-top:10%;margin-left:15%;"></span>
                            <span>Add New teacher</span>
                        </strong>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="teacheradd.php">
                            <?php include('errors.php') ?>
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" placeholder="school">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="teacher">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="tsnumber" placeholder="tsc number">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="resident" placeholder="resident">
                            </div>
                            <button type="submit" name="add" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>

        <?php endif ?>

</body>

</html>