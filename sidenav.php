<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w33.css">


<body>

    <div class="w3-sidebar w3-bar-block w3-light-grey w3-card" style="width:18%; margin-top:4%;">
        <a href="home.php" class="w3-bar-item w3-button">home</a>
        <a href="additional.php" class="w3-bar-item w3-button">upload input</a>
        <a href="information.php" class="w3-bar-item w3-button">additional</a>
        <button class="w3-button w3-block w3-left-align" onclick="myAccFunc()">
            teachers <i class="fa fa-caret-down"></i>
        </button>
        <div id="demoAcc" class="w3-hide w3-white w3-card">
            <a href="teacher_register.php" class="w3-bar-item w3-button">teacher registration</a>
            <a href="leave.php" class="w3-bar-item w3-button">leave application</a>
            <a href="teachers.php" class="w3-bar-item w3-button">tally</a>
            <a href="acceptedleave.php" class="w3-bar-item w3-button">accepted leave</a>
        </div>

        <div class="w3-dropdown-click">
            <button class="w3-button" onclick="myDropFunc()">
                students <i class="fa fa-caret-down"></i>
            </button>
            <div id="demoDrop" class="w3-dropdown-content w3-bar-block w3-white w3-card">
                <a href="students.php" class="w3-bar-item w3-button">tally</a>
                <a href="studenttally.php" class="w3-bar-item w3-button">student new tally</a>
            </div>
        </div>
        <a href="events.php" class="w3-bar-item w3-button">events</a>
        <a href="fund.php" class="w3-bar-item w3-button">funds application</a>
        <a href="fundsapproved.php" class="w3-bar-item w3-button">funds approved</a>
        <a href="message.php" class="w3-bar-item w3-button">message</a>
        <a href="recievedmsg.php" class="w3-bar-item w3-button">message recieved</a>
        <a href="contact.php" class="w3-bar-item w3-button">contact</a>
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