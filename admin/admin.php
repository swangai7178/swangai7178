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

     <header id="header">
         <div class="logo pull-left">
             <h2>SCHOOL LIST</h2>
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
                         <a href="schoollist.php?logout='1'" style="color:red;">logout</a>
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
         <div class="row" style=" margin-top:5%; margin-left:18%;">
             <div class="col-md-12">
                 <div class="panel panel-default">
                     <div class="panel-heading clearfix">
                         <strong>
                             <span class="glyphicon glyphicon-th"></span>
                             <span>admin</span>
                         </strong>
                         <a href="adminreg.php" class="btn btn-info pull-right"">Add New admin</a>
                     </div>
                     <table class=" table table-dark table-hover">
                             <tr>
                                 <th>Sr.No.</th>
                                 <th>first name</th>
                                 <th>last name</th>
                                 <th>username</th>
                                 <th>address</th>
                             </tr>

                             <?php

                                $records = mysqli_query($db, "SELECT * from admin"); // fetch data from database
                                while ($data = mysqli_fetch_array($records)) {
                                ?>
                                 <tr>
                                     <td><?php echo $data['id']; ?></td>
                                     <td><?php echo $data['fname']; ?></td>
                                     <td><?php echo $data['lname']; ?></td>
                                     <td><?php echo $data['username']; ?></td>
                                     <td><?php echo $data['address']; ?></td>
                                 <?php
                                }
                                    ?>
                                 </tr>
                                 </table>

                             <?php endif ?>
                     </div>
 </body>

 </html>