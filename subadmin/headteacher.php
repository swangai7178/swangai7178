<?php include('adminserver.php'); ?>
<!DOCTYPE html>

<head>
    <title>walimu tech</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/sidenav.css" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>
    <?php include('header.php'); ?>
    <?php if (isset($_SESSION['username'])) : ?>
        <p>welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
        <?php include('sidenav.php'); ?>
        <div class="container">
            <table class="table table-dark table-hover" style="margin-top:5%; margin-left:10%;">

                <tr>
                    <th>Sr.No.</th>
                    <th>head teacher name</th>
                    <th>email</th>
                    <th>phone</th>
                </tr>

                <?php

                $records = mysqli_query($db, "SELECT * from userregister WHERE county= '" . $_SESSION["username"] . "'"); // fetch data from database

                while ($data = mysqli_fetch_array($records)) {
                ?>
                    <tr>
                        <td><?php echo $data['id']; ?></td>
                        <td><?php echo $data['lname']; ?></td>
                        <td><?php echo $data['email']; ?></td>
                        <td><?php echo $data['phone']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>



        <?php endif ?>
        </div>
</body>

</html>