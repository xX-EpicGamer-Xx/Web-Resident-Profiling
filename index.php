<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accounts</title>
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
            top: 50%; 
            left: 10%;
            transform: translateY(-45%);
            width: 1px;
            height: 70%;
            background-color: #57977C;
        }

        .separator-end {
            position: absolute;
            top: 50%; 
            left: 93%;
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
            z-index: 1;
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
            background-image: url('images/table (clicked).png');
            background-color: transparent;
            z-index: 1;
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
            background-image: url('images/user-account.png');
            background-color: transparent;
        }

        .shade {
            position: absolute;
            top: 47.5%; /* slight offset from the top */
            left: 2.7%;
            width: 7.3%;
            height: 12%;
            box-sizing: border-box;
            background: rgba(0, 0, 0, 0.5);
            z-index: 0;
        }

        .database-tab {
            position: absolute;
            top: 50%; 
            left: 10%;
            transform: translateY(-45%);
            width: 83%;
            height: 70%;
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
        
        .list-of-residents-tab {
            position: absolute;
            top: 15%;
            left: 10%;
            align-items: center;
            color: #ffffff;
            font-size: 25px;
            font-weight: 500; /* very bold */
            font-family: 'Inter', sans-serif; /* <-- use Inter */
            user-select: none;
        }

        .add-resident-button {
            position: absolute;
            top: 15.5%; /* slight offset from the top */
            left: 20%;
            width: 25px;
            object-fit: cover;
            height: 25px;
            background-color: transparent;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            border: none;
            cursor: pointer;
            background-image: url('images/add.png');
        }

        .edit-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
        }

        .edit-button img {
            width: 50px;
            height: 50px;
        }

        .delete-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
        }

        .delete-button img {
            width: 50px;
            height: 50px;
        }
    </style>
</head>
<body>
    <div class="main-tab">
        <div class="tab">
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
        </div>
        <div class="separator"></div>
        <div class="separator-end"></div>
        <label class="list-of-residents-tab">List of Residents</label>
        <a class="add-resident-button" href="/accounts/create.php" role="button"></a>
        <div class="database-tab">
        <table class="table">
            <thead>
                <tr>
                    <th>Edit</th> <th>Delete</th> <th>ID</th> <th>Last Name</th> <th>First Name</th> <th>Middle Name</th> <th>Suffix</th> <th>Sex</th> <th>Birth Date</th> <th>Birth Place</th> <th>Age</th> <th>Civil Status</th> <th>Nationality</th> <th>Religion</th> <th>Occupation</th> <th>Contact No.</th> <th>PWD</th> <th>PWD ID No.</th> <th>Single Parent</th> <th>House No.</th> <th>Subdivision</th> <th>Street</th> <th>Registered Voter</th> <th>4Ps Member</th> <th>Voter's ID</th> <th>TIN No.</th> <th>National ID No.</th> <th>SSS No.</th> <th>PhilHealth No.</th> <th>Pag-IBIG No.</th> <th>Vaccinated</th>
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

                $sql = "SELECT * FROM residents";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid Query: ". $connection->error);
                }

                while ($row = $result->fetch_assoc()) {
                    echo"
                    <tr>
                        <td>
                            <a class='edit-button' href='/accounts/edit.php?id=$row[id]' role='button'>
                                <img src='images/edit-user.png' alt='Icon'>
                            </a>
                        </td>
                        <td>
                            <a class='delete-button' href='/accounts/delete.php?id=$row[id]' role='button'>
                            <img src='images/delete-user.png' alt='Icon'>
                            </a>
                        </td>
                        <td>$row[id]</td> 
                        <td>$row[last_name]</td> 
                        <td>$row[first_name]</td> 
                        <td>$row[middle_name]</td> 
                        <td>$row[suffix]</td> 
                        <td>$row[sex]</td> 
                        <td>$row[birth_date]</td> 
                        <td>$row[birth_place]</td> 
                        <td>$row[age]</td> 
                        <td>$row[civil_status]</td> 
                        <td>$row[nationality]</td> 
                        <td>$row[religion]</td> 
                        <td>$row[occupation]</td> 
                        <td>$row[contact_number_general]</td> 
                        <td>$row[pwd]</td> 
                        <td>$row[pwd_id_no]</td> 
                        <td>$row[single_parent]</td> 
                        <td>$row[house_number]</td> 
                        <td>$row[subdivision]</td> 
                        <td>$row[street]</td> 
                        <td>$row[registered_voter]</td> 
                        <td>$row[voter_s_id_number]</td> 
                        <td>$row[member_4ps]</td> 
                        <td>$row[tin_number]</td> 
                        <td>$row[national_id_number]</td> 
                        <td>$row[sss_number]</td> 
                        <td>$row[philhealth_no]</td> 
                        <td>$row[pagibig_no]</td> 
                        <td>$row[vaccinated]</td>
                        
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