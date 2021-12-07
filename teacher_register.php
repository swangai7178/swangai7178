<?php include('server.php'); ?>
<!DOCTYPE html>

<head>
    <title>walimu tech</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/sidenav.css" />
    <link rel="stylesheet" href="css/sam.css" />
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
            <h2>teachers</h2>
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

                                <a href="teacher_register.php?logout='1'" style="color:red;"><i class="glyphicon glyphicon-off"></i> logout</a>

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

        <div class="row style=" margin-top:5%; margin-left:18%;">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <strong>
                            <span class="glyphicon glyphicon-th" style="margin-top:6%;margin-left:20%;"></span>
                            <span>teachers</span>
                        </strong>
                        <button class="btn btn-info pull-right"" onclick=" openForm()" style="margin-top:5%;">add new teacher</button>

                        <div class="form-popup" id="myForm">
                            <form action="teacher_register.php" class="form-container" method="post">
                                <?php include('errors.php') ?>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="teacher">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="tsnumber" placeholder="tsc number">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="resident" placeholder="resident">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="subject" placeholder="subject teaching">
                                </div>

                                <button type="submit" name="add" class="btn btn-primary">Add</button>
                            </form>
                        </div>

                        <script>
                            function openForm() {
                                document.getElementById("myForm").style.display = "block";
                            }

                            function closeForm() {
                                document.getElementById("myForm").style.display = "none";
                            }
                        </script>
                    </div>
                    <div class="panel-body">

                        <table class="table table-dark table-hover" style=" margin-left:20%;width:80%;">
                            <tr>
                                <td>Sr.No.</td>
                                <td>school name</td>
                                <td>teachers name</td>
                                <td>tsc number</td>
                                <td>resident</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>

                            <?php

                            $records = mysqli_query($db, "SELECT * FROM teachers WHERE username= '" . $_SESSION["username"] . "'"); // fetch data from database

                            while ($data = mysqli_fetch_array($records)) {
                            ?>
                                <tr>
                                    <td><?php echo $data['id']; ?></td>
                                    <td><?php echo $data['username']; ?></td>
                                    <td><?php echo $data['name']; ?></td>
                                    <td><?php echo $data['tsnumber']; ?></td>
                                    <td><?php echo $data['resident']; ?></td>
                                    <td><a href="editteacherdetails.php?id=<?php echo $data['id']; ?>">Edit</a></td>
                                    <td><a href="delete.php?id=<?php echo $data['id']; ?>">Delete</a></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>

        <?php endif ?>

</body>

</html>