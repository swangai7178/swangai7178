 <?php include('server.php'); ?>
 <!DOCTYPE html>

 <head>
     <title>walimu tech</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
     <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
     <link rel="stylesheet" href="css/main.css" />
     <link rel="stylesheet" href="css/sidenav.css" />
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 </head>

 <body>

     <header id="header">
         <div class="logo pull-left">
             <h2>accepted</h2>
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
                         <a href="students.php?logout='1'" style="color:red;">logout</a>
                     <?php endif ?>
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
             <div class="col-md-12">
                 <div class="panel panel-default">
                     <div class="panel-heading clearfix">
                         <strong>
                             <span class="glyphicon glyphicon-th"></span>
                             <span>accepted funds</span>
                         </strong>
                     </div>
                     <table class=" table table-dark table-hover">
                         <tr>
                             <th>Sr.No.</th>
                             <td>school name</td>
                             <td>title</td>
                             <td>organised by</td>
                             <td>amount</td>
                             <td>pic</td>
                         </tr>
                         <?php

                            $records = mysqli_query($db, "SELECT * FROM fundsaccepted WHERE username= '" . $_SESSION["username"] . "'"); // fetch data from database

                            while ($data = mysqli_fetch_array($records)) {
                            ?>
                             <tr>
                                 <td><?php echo $data['id']; ?></td>
                                 <td><?php echo $data['username']; ?></td>
                                 <td><?php echo $data['title']; ?></td>
                                 <td><?php echo $data['organised_by']; ?></td>
                                 <td><?php echo $data['amount']; ?></td>
                                 <td class="text-center">
                                     <img src="images/<?php echo $data['pic']; ?>" class="img-thumbnail" />
                                 </td>
                             </tr>
                         <?php
                            }
                            ?>
                     </table>
                 <?php endif ?>
 </body>

 </html>