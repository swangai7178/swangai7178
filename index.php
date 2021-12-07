<!DOCTYPE html>

<head>
    <title>walimu tech</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/sidenav.css" />
    <script>
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }
    </script>
</head>

<body>

    <header id="header">
        <div class="logo pull-left">
            <h2>homepage</h2>
        </div>
        <div class="header-content">
            <div class="header-date pull-right">
                <strong><?php echo date("F j, Y, g:i a"); ?></strong>
            </div>
            <div class="pull-right clearfix" style="margin-top:0; margin-right:0%;">
                <input type="button" style="border:0px;" value="subadmin" onClick="subadmin()">
            </div>
            <div class="pull-right clearfix" style="margin-top:0; margin-right:1%;">
                <input type="button" value="admin" style="border:0px;" onClick="admin()">
            </div>
            <div class="pull-right clearfix" style="margin-top:0; margin-right:1%;">
                <input type="button" value="user" style="border:0px;" onClick="user()">
            </div>


    </header>
    <SCRIPT>
        function user() {
                    window.open('login.php', '_self');
                  
        }
    </SCRIPT>
    <SCRIPT>
        function admin() {
          
                    window.open('admin/admin_login.php', '_self');
        }
    </SCRIPT>
    <SCRIPT>
        function subadmin() {
           
                    window.open('subadmin/admin_login.php', '_self');
        }
    </SCRIPT>

    <a href="subadmin/admin_login.php">subadmin login</a>
    <a href="#contact">Contact</a>
    </div>
    <div class="col-md-12">
        <div class="panel">
            <div class="jumbotron text-center">
                <h1>Welcome to walimu </h1>
                <p>we serve you.</p>

            </div>
        </div>
    </div>
    </div>

    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="libs/js/functions.js"></script>

    </html>

</body>

</html>