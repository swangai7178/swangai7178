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
              <h2>homepage</h2>
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
              <div class="col-md-5">
                  <div class="panel panel-default">
                      <div class="panel-heading">
                          <strong>
                              <span class="glyphicon glyphicon-th"></span>
                              <span>Add student tally</span>
                          </strong>
                      </div>
                      <div class="panel-body">
                          <form method="post" enctype="multipart/form-data">
                              <table border="0" align="center" width="400" height="300px" class="shaddoww">
                                  <tr>
                                      <td colspan="2" align="center" class="toptd">Add Camp </td>
                                  </tr>
                                  <tr>
                                      <td colspan="2">&nbsp;</td>
                                  </tr>
                                  <tr>
                                      <td class="lefttd">project title</td>
                                      <td><input type="text" name="t3"></td>
                                  </tr>
                                  <tr>
                                      <td class="lefttd">Organized By</td>
                                      <td><input type="text" name="t2"></td>
                                  </tr>
                                  <tr>
                                      <td class="lefttd">amount </td>
                                      <td><input type="number" name="s1"></td>
                                  </tr>
                                  <tr>
                                      <td class="lefttd">Uplode Pic</td>
                                      <td><input type="file" name="t1" required="required" /></td>
                                  </tr>
                                  <tr>
                                      <td class="lefttd">Detail</td>
                                      <td><textarea name="t4"></textarea></td>
                                  </tr>
                                  <tr>
                                      <td>&nbsp;</td>
                                      <td><input type="submit" value="SAVE" name="sbmt"></td>
                                  </tr>
                              </table>
                          </form>
                      </div>



                  </div>
                  </center>

                  <?php
                    if (isset($_POST["sbmt"])) {
                        $username = $_SESSION['username'];
                        $target_dir = "images/";
                        $target_file = $target_dir . basename($_FILES["t1"]["name"]);
                        $uploadOk = 1;
                        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                        // Check if image file is a actual image or fake image

                        $check = getimagesize($_FILES["t1"]["tmp_name"]);
                        if ($check !== false) {
                            //  echo "File is an image - " . $check["mime"] . ".";
                            $uploadOk = 1;
                        } else {
                            echo "File is not an image.";
                            $uploadOk = 0;
                        }

                        // Check if file already exists
                        if (file_exists($target_file)) {
                            echo "Sorry, file already exists.";
                            $uploadOk = 0;
                        }
                        //aloow certain file formats
                        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                            echo "sorry, only jpg, jpeg, Png & gif files are allowed.";
                            $uploadok = 0;
                        } else {
                            if (move_uploaded_file($_FILES["t1"]["tmp_name"], $target_file)) {
                                $s = "insert into funds(username,title,organised_by,amount,pic,detail) values('$username','" . $_POST["t3"] . "','" . $_POST["t2"] . "','" . $_POST["s1"] . "','" . basename($_FILES["t1"]["name"]) . "','" . $_POST["t4"] . "')";
                                mysqli_query($db, $s);
                                mysqli_close($db);
                                echo "<script>alert('Record Save');</script>";
                            } else {
                                echo "sorry there was an error uploading your file.";
                            }
                        }
                    }
                    ?>
              </div>

              <div class="col-md-12">
                  <div class="panel panel-default">
                      <div class="panel-heading clearfix">
                          <strong>
                              <span class="glyphicon glyphicon-th"></span>
                              <span>applied funds</span>
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

                            $records = mysqli_query($db, "SELECT * FROM funds WHERE username= '" . $_SESSION["username"] . "'"); // fetch data from database

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