<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Account</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(-45deg, #08110E, #3F6656 );
        }

        .main-tab {
            width: 94.79%;
            height: 90.74%;
            border-left: 1px solid #57977C;
            border-right: 1px solid #57977C;
            border-bottom: 1px solid #57977C;
            border-top: 100px solid #57977C; /* Top border as percentage of height */
            box-sizing: border-box;
            border-radius: 50px;
            background: transparent;
        }

        .separator {
            position: absolute;
            left: 10px; /* space from the left edge inside the rectangle */
            top: 50%; 
            left: 10%;
            transform: translateY(-45%);
            width: 1px;
            height: 70%;
            background-color: #57977C;
        }

        #dashboard-tab {
            position: absolute;
            top: 20%; /* slight offset from the top */
            left: 4.5%;
            width: 75px;
            object-fit: cover;
            height: 75px;
            background-color: transparent;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            border: none;
            cursor: pointer;
            background-image: url('images/dashboard.png');
        }

        #dashboard-container {
            position: absolute;
            top: 1%;
            left: 1%;
            background-color: rgba(0, 0, 0, 0.5); /* 50% black background */
            height: 120px;
            width: 120px;
            border-radius: 8px;
            padding: 5px;
        }

        #analytics-tab {
            position: absolute;
            top: 35%; /* slight offset from the top */
            left: 4.5%;
            width: 75px;
            object-fit: cover;
            height: 75px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            border: none;
            cursor: pointer;
            background-image: url('images/analytics.png');
            background-color: transparent;
        }

        #database-tab {
            position: absolute;
            top: 50%; /* slight offset from the top */
            left: 4.5%;
            width: 75px;
            object-fit: cover;
            height: 75px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            border: none;
            cursor: pointer;
            background-image: url('images/table.png');
            background-color: transparent;
        }

        #filing-tab {
            position: absolute;
            top: 65%; /* slight offset from the top */
            left: 4.5%;
            width: 75px;
            object-fit: cover;
            height: 75px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            border: none;
            cursor: pointer;
            background-image: url('images/filing.png');
            background-color: transparent;
        }

        #user-account-tab {
            position: absolute;
            top: 85%; /* slight offset from the top */
            left: 4.5%;
            object-fit: cover;
            width: 75px;
            height: 75px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            border: none;
            cursor: pointer;
            background-image: url('images/user-account(clicked).png');
            background-color: transparent;
            z-index: 1;
        }

        .shade {
            position: absolute;
            top: 83.2%; /* slight offset from the top */
            left: 2.7%;
            width: 7.3%;
            height: 12%;
            border-radius: 0px 0px 0px 50px;
            box-sizing: border-box;
            background: rgba(0, 0, 0, 0.5);
            z-index: 0;
        }

        .lgu-official-profile {
            position: absolute;
            top: 25%;
            left: 15%;
            width: 45%;
            height: 20%;
            border: 1px solid #57977C;
            box-sizing: border-box;
            border-radius: 50px;
            background: transparent;
        }

        .admin-login {
            position: absolute;
            top: 75%;
            left: 15%;
            width: 20%;
            height: 15%;
            border: 1px solid #57977C;
            box-sizing: border-box;
            border-radius: 50px;
            background: transparent;
        }

        .create-account {
            position: absolute;
            top: 0%;
            left: 38%;
            width: 20%;
            height: 15%;
            border: 1px solid #57977C;
            box-sizing: border-box;
            border-radius: 50px;
            background: transparent;
        }

        .toclong-organizational-chart {
            position: absolute;
            top: 25%;
            left: 63%;
            width: 30%;
            height: 65%;
            border: 1px solid #57977C;
            box-sizing: border-box;
            border-radius: 50px;
            background: transparent;
        }

        .create-account-button {
            position: absolute;
            top: 0%; /* center vertically */
            left: 65%; /* center horizontally */
            width: 20%; /* 200px in percentage */
            height: 100%; /* 70px in percentage */
            background-color: #57977C;
            color: #ffffff;
            font-family: 'Inter', sans-serif;
            font-size: 30px; /* responsive font size */
            font-weight: 800;
            border: none;
            border-radius: 0px 48px 48px 0px; /* rounded corners */
            cursor: pointer;
            z-index: 11; /* higher than text if needed */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        #admin-login-text, #create-account-text {
            position: absolute;
            top: 25%;
            left: 15%;
            color: #ffffff;
            font-size: 35px;
            font-weight: 600; /* very bold */
            font-family: 'Inter', sans-serif; /* <-- use Inter */
            user-select: none;
            z-index: 10;
        }

        .line-separator {
            position: absolute;
            left: 50%; /* space from the left edge inside the rectangle */
            top: 10%; 
            width: 1px;
            height: 60%;
            background-color: #57977C;
        }

        .user {
            position: absolute;
            left: 5%; /* space from the left edge inside the rectangle */
            top: 7%; 
            width: 175px;
            height: 175px;
            border: 1px solid #57977C;
            border-radius: 50%;
        }

        #lgu-official-text {
            position: absolute;
            top: 20%;
            left: 35%;
            color: #ffffff;
            font-size: 35px;
            font-weight: 600; /* very bold */
            font-family: 'Inter', sans-serif; /* <-- use Inter */
            user-select: none;
            z-index: 10;
        }

        #personal-information-text {
            position: absolute;
            top: 10%;
            left: 55%;
            color: #ffffff;
            font-size: 35px;
            font-weight: 500; /* very bold */
            font-family: 'Inter', sans-serif; /* <-- use Inter */
            user-select: none;
            z-index: 10;
        }

        #description-text {
            position: absolute;
            top: 20%;
            left: 55%;
            color: #57977C;
            font-size: 20px;
            font-weight: 500; /* very bold */
            font-family: 'Inter', sans-serif; /* <-- use Inter */
            user-select: none;
            z-index: 10;
        }

        #full-name-text, #date-of-birth-text, #sex-text, #marital-status-text, #contact-text, #email-text, #address-text {
            position: absolute;
            left: 75%;
            color: #ffffff;
            font-size: 20px;
            font-weight: 500; /* very bold */
            font-family: 'Inter', sans-serif; /* <-- use Inter */
            user-select: none;
            z-index: 10;
        }

        #description-text {
            position: absolute;
            text-align: center;
            top: 55%;
            left: 30%;
            color: #ffffff;
            font-size: 20px;
            font-weight: 400; /* very bold */
            font-family: 'Inter', sans-serif; /* <-- use Inter */
            user-select: none;
            z-index: 10;
        }

        #information-text {
            position: absolute;
            top: 20%;
            left: 55%;
            color: #57977C;
            font-size: 20px;
            font-weight: 500; /* very bold */
            font-family: 'Inter', sans-serif; /* <-- use Inter */
            user-select: none;
            z-index: 10;
        }

        .modify-accounts {
            position: absolute;
            top: 80%;
            left: 3%;
            width: 29%;
            height: 10%;
            border: 1px solid #57977C;
            box-sizing: border-box;
            border-radius: 25px;
            background: #57977C;
            cursor: pointer;
            /* text */
            color: #ffffff;
            font-size: 20px;
            font-weight: 600; /* very bold */
            font-family: 'Inter', sans-serif; /* <-- use Inter */
        }

        .create-account {
            position: absolute;
            top: 0%;
            left: 75%;
            width: 25%;
            height: 100%;
            border: 1px solid #57977C;
            box-sizing: border-box;
            border-radius: 0px 47px 47px 0px;
            background: #57977C;
            padding: 20px;
            cursor: pointer;
            text-align: left;
            /* text */
            color: #ffffff;
            font-size: 35px;
            font-weight: 600; /* very bold */
            font-family: 'Inter', sans-serif; /* <-- use Inter */
        }

        .admin-login {
            position: absolute;
            top: 80%;
            left: 68%;
            width: 29%;
            height: 10%;
            border: 1px solid #57977C;
            box-sizing: border-box;
            border-radius: 25px;
            background: #57977C;
            cursor: pointer;
            /* text */
            color: #ffffff;
            font-size: 20px;
            font-weight: 600; /* very bold */
            font-family: 'Inter', sans-serif; /* <-- use Inter */
        }
        .organizational-chart {
            position: absolute;
            top: 5%;
            left: 5%;
            width: 100%;
            height: 95%;
            border-radius: 50px;
            -moz-user-select: none;
            -webkit-user-select: none;
            user-select: none;
        }

        .database-tab {
            position: absolute;
            border: 1px solid #57977C;
            top: 50%; 
            left: 15%;
            width: 45%;
            height: 40%;
            background: transparent;
            overflow-x: auto; /* for horizontal scroll only */
            overflow-y: auto; /* for vertical scroll only */
        }

        .table {
            white-space: nowrap;
            border-collapse: collapse; /* so borders share lines */
            color: white;
            background: transparent; /* no background */
            width: 80%; /* optional, if you want full width */
            font-size: 20px;
            font-weight: 500; /* very bold */
            font-family: 'Inter', sans-serif; /* <-- use Inter */
        }

        .table, 
        .table th, 
        .table td {
            border: 1px solid #57977C;
        }

        .table th {
            padding: 8px 12px;
            text-align: center;
        }

        .table td {
            padding: 8px 12px;
            height: 55px; /* fixed height */
            text-align: left; /* adjust as needed */
        }

        .table thead th {
        /* optional: you can style headers differently */
            font-weight: bold;
        }
        .table-container {
        overflow-x: auto;
        }

        #profile-text {
            position: absolute;
            top: 19%;
            left: 33%;
            color: #ffffff;
            font-size: 35px;
            font-weight: 600; /* very bold */
            font-family: 'Inter', sans-serif; /* <-- use Inter */
            user-select: none;
            z-index: 10;
        }
        #chart-text {
            position: absolute;
            top: 15.5%;
            left: 66%;
            text-align: center;
            color: #ffffff;
            font-size: 35px;
            font-weight: 600; /* very bold */
            font-family: 'Inter', sans-serif; /* <-- use Inter */
            user-select: none;
            z-index: 10;
        }
    </style>
</head>
<body>
    <div class="main-tab">
        <label for="profile" id="profile-text">PROFILE</label>
        <label for="chart" id="chart-text">BARANGAY TOCLONG<br>ORGANIZATIONAL CHART</label>
            <a href="dashboard.php">
                <button id="dashboard-tab"></button>
            </a>
            <a href="analytics.php">
                <button id="analytics-tab"></button>
            </a>
            <a href="index.php">
                <button id="database-tab"></button>
            </a>
            <a href="filing.php">
                <button id="filing-tab"></button>
            </a>
            <a href="user-account.php">
                <button id="user-account-tab"></button>
            </a>            
            <div class="shade"></div>
            <div class="lgu-official-profile">
                <div class="profile"></div>
                <img src="images/user.png" alt="" class="user">
                <label for="lgu-official" id="lgu-official-text">LGU OFFICIAL</label>
                <label for="description" id="description-text">You can create a new user<br> or check the information of the users</label>
                <a href="register(unreal).php">
                    <button class="create-account">CREATE<br>A NEW<br>ACCOUNT</button>
                </a>
            </div>
            <div class="toclong-organizational-chart">
                <img src="images/organizational.png" alt="structure" class="organizational-chart" draggable="false" >
            </div>
        </div>
        <div class="separator"></div>
         <div class="database-tab">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th> <th>First Name</th> <th>Last Name</th> <th>Email Address</th> <th>Phone Number</th> <th>Address</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "residents";
                
                $connection = new mysqli($servername ,$username, $password, $database); // create connection

                if ($connection->connect_error) {
                    die("Connection Failed: ". $connection->connect_error);
                }

                $sql = "SELECT * FROM users";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid Query: ". $connection->error);
                }

                while ($row = $result->fetch_assoc()) {
                    echo"
                    <tr>
                        <td>$row[id]</td> 
                        <td>$row[first_name]</td> 
                        <td>$row[last_name]</td> 
                        <td>$row[email]</td> 
                        <td>$row[phone]</td> 
                        <td>$row[address]</td> 
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
        </div>
    </div>
</body>
</html>