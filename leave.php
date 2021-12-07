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


    <style type="text/css">
        .dropbtn {
            background-color: #B5BEC4;
            color: black;
            padding: 5px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            width: 100px;
            margin-right: 0px;
        }

        .dropbtn:hover,
        .dropbtn:focus {
            background-color: #FFFFFF;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            overflow: auto;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown a:hover {
            background-color: #ddd;
        }

        .show {
            display: block;
        }
    </style>

    <header id="header" style="font:serif;">
        <div class="logo pull-left">
            <h2>leave</h2>
        </div>
        <div class="header-content">
            <div class="header-date pull-left">
                <strong><?php echo date("F j, Y, g:i a"); ?></strong>
            </div>

            <ul class="info-menu list-inline list-unstyled">
                <li class="profile">
                    <?php if (isset($_SESSION['username'])) : ?>

                </li>
                <ul class="info-menu list-inline pull-right" style="margin-right:4%;">
                    <li class="profile"><button onclick="myFunction()" class="dropbtn togle">profile</button>
                        <div id="myDropdown" class="dropdown-content">
                            <?php

                            $records = mysqli_query($db, "SELECT * FROM userregister WHERE username= '" . $_SESSION["username"] . "'"); // fetch data from database

                            while ($data = mysqli_fetch_array($records)) {
                            ?>
                                <a href="profile.php?id=<?php echo $data['id']; ?>">
                                <?php
                            } ?>
                                <i class="glyphicon glyphicon-user"></i>
                                Profile
                                </a>

                                <a href="leave.php?logout='1'" style="color:red;"><i class="glyphicon glyphicon-off"></i> logout</a>

                        </div>
                    </li>
                </ul>


                <li class="last">


                <?php endif ?>
                </li>
                </li>
            </ul>
        </div>
        </div>
    </header>

    <script>
        /* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>



    <?php if (isset($_SESSION['username'])) : ?>
        <?php include('sidenav.php'); ?>

        <div class="row" style="margin-left:18%; margin-top:5%;">
            <div class="col-md-5">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>
                            <span class="glyphicon glyphicon-th"></span>
                            <span>Add New teacher</span>
                        </strong>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="leave.php">
                            <?php include('errors.php') ?>
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" placeholder="school">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="tsnumber" placeholder="tsc number">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="county" placeholder="county">
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="name">
                                    <option disabled selected>-- Select teacher --</option>
                                    <?php
                                    include "server.php";  // Using database connection file here
                                    $records = mysqli_query($db, "SELECT name From teachers WHERE username= '" . $_SESSION["username"] . "'");  // Use select query here 

                                    while ($data = mysqli_fetch_array($records)) {
                                        echo "<option>" . $data['name'] . "</option>";  // displaying data in option menu
                                    }
                                    ?>
                                </select>

                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="reason" placeholder="reason for leave">
                            </div>
                            <div class="form-group">
                                START: <input type="date" class="form-control" name="start" placeholder="starting date">
                            </div>
                            <div class="form-group">
                                END:<input type="date" class="form-control" name="end" placeholder="end date">
                            </div>
                            <button type="submit" name="leave" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <strong>
                            <span class="glyphicon glyphicon-th"></span>
                            <span>applied leave</span>
                        </strong>
                    </div>
                    <table class=" table table-dark table-hover">
                        <tr>
                            <th>Sr.No.</th>
                            <td>school name</td>
                            <td>tsc number</td>
                            <td>county</td>
                            <td>teacher</td>
                            <td>reason</td>
                            <td>start</td>
                            <td>stop</td>
                        </tr>
                        <?php

                        $records = mysqli_query($db, "SELECT * FROM leaveapp WHERE username= '" . $_SESSION["username"] . "'"); // fetch data from database

                        while ($data = mysqli_fetch_array($records)) {
                        ?>
                            <tr>
                                <td><?php echo $data['id']; ?></td>
                                <td><?php echo $data['username']; ?></td>
                                <td><?php echo $data['tsnumber']; ?></td>
                                <td><?php echo $data['county']; ?></td>
                                <td><?php echo $data['name']; ?></td>
                                <td><?php echo $data['reason']; ?></td>
                                <td><?php echo $data['start']; ?></td>
                                <td><?php echo $data['end']; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                <?php endif
                ?>

</body>

</html>