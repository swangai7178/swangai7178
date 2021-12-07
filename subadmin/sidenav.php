<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w33.css">


<body>

    <div class="w3-sidebar w3-bar-block w3-light-grey w3-card" style="width:18%; margin-top:4%;">
        <a href="dashboard.php" class="w3-bar-item w3-button">home</a>
        <a href="county schools.php" class="w3-bar-item w3-button">school data</a>
        <button class="w3-button w3-block w3-left-align" onclick="myAccFunc()">
            teachers <i class="fa fa-caret-down"></i>
        </button>
        <div id="demoAcc" class="w3-hide w3-white w3-card">
            <a href="teacheradd.php" class="w3-bar-item w3-button">teacher registration</a>
            <a href="leave.php" class="w3-bar-item w3-button">leave application</a>
            <a href="teachers.php" class="w3-bar-item w3-button">teachers</a>
            <a href="acceptedleave.php" class="w3-bar-item w3-button">accepted leave</a>
        </div>

        <div class="w3-dropdown-click">
            <button class="w3-button" onclick="myDropFunc()">
                students <i class="fa fa-caret-down"></i>
            </button>
            <div id="demoDrop" class="w3-dropdown-content w3-bar-block w3-white w3-card">
                <a href="students.php" class="w3-bar-item w3-button">tally</a>
            </div>
        </div>
        <a href="events.php" class="w3-bar-item w3-button">events</a>
        <a href="message.php" class="w3-bar-item w3-button">message</a>
        <button class="w3-button w3-block w3-left-align" onclick="myunc()">
            contact<i class="fa fa-caret-down"></i>
        </button>
        <div id="cont" class="w3-hide w3-white w3-card">
            <a href="natcontact.php" class="w3-bar-item w3-button">national</a>
            <a href="subadmin.php" class="w3-bar-item w3-button">subadmin</a>
            <a href="headcontact.php" class="w3-bar-item w3-button">head of school</a>
        </div>
    </div>





    <script>
        function myAccFunc() {
            var x = document.getElementById("demoAcc");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
                x.previousElementSibling.className += " w3-green";
            } else {
                x.className = x.className.replace(" w3-show", "");
                x.previousElementSibling.className =
                    x.previousElementSibling.className.replace(" w3-green", "");
            }
        }

        function myunc() {
            var x = document.getElementById("cont");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
                x.previousElementSibling.className += " w3-green";
            } else {
                x.className = x.className.replace(" w3-show", "");
                x.previousElementSibling.className =
                    x.previousElementSibling.className.replace(" w3-green", "");
            }
        }

        function myDropFunc() {
            var x = document.getElementById("demoDrop");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
                x.previousElementSibling.className += " w3-green";
            } else {
                x.className = x.className.replace(" w3-show", "");
                x.previousElementSibling.className =
                    x.previousElementSibling.className.replace(" w3-green", "");
            }
        }
    </script>

</body>