<header id="header">
    <div class="logo pull-left">
        <h2>walimu tech</h2>
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