<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filing</title>
    <!-- Link your CSS file -->
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
            border-top: 100px solid #57977C;
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

        #dashboard-tab,
        #analytics-tab,
        #database-tab,
        #filing-tab,
        #user-account-tab {
            position: absolute;
            width: 75px;
            height: 75px;
            object-fit: cover;
            background-color: transparent;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            border: none;
            cursor: pointer;
        }

        #dashboard-tab {
            top: 20%;
            left: 4.5%;
            background-image: url('images/dashboard.png');
        }

        #analytics-tab {
            top: 35%;
            left: 4.5%;
            background-image: url('images/analytics.png');
        }

        #database-tab {
            top: 50%;
            left: 4.5%;
            background-image: url('images/table.png');
        }

        #filing-tab {
            top: 65%;
            left: 4.5%;
            background-image: url('images/filing(clicked).png');
            z-index: 1;
        }

        #user-account-tab {
            top: 85%;
            left: 4.5%;
            background-image: url('images/user-account.png');
        }

        .shade {
            position: absolute;
            top: 62.5%;
            left: 2.7%;
            width: 7.3%;
            height: 12%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 0;
        }

        .back-up,
        .excel {
            position: absolute;
            left: 15%;
            width: 60%;
            height: 30%;
            border: 1px solid #57977C;
            border-radius: 50px;
            background: transparent;
            z-index: 1;
        }

        .back-up {
            top: 20%;
        }

        .excel {
            top: 58%;
        }

        #back-up,
        #excel {
            position: absolute;
            top: 25%;
            left: 5%;
            color: #ffffff;
            font-size: 60px;
            font-weight: 800;
            font-family: 'Inter', sans-serif;
            text-align: center;
            pointer-events: none;
            user-select: none;
            z-index: 10;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        #back-up-text,
        #excel-text {
            position: absolute;
            top: 55%;
            left: 5%;
            color: #ffffff;
            font-size: 20px;
            font-weight: 500;
            font-family: 'Inter', sans-serif;
            user-select: none;
            z-index: 10;
        }

        .back-up-button,
        .excel-button {
            position: absolute;
            top: 0%;
            left: 80%;
            width: 20%;
            height: 100%;
            background-color: #57977C;
            color: #ffffff;
            font-family: 'Inter', sans-serif;
            font-size: 50px;
            font-weight: 800;
            border: none;
            border-radius: 0px 50px 50px 0px;
            cursor: pointer;
            z-index: 11;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .sql-icon,
        .excel-icon {
            position: absolute;
            top: 0%;
            left: 105%;
            width: 300px;
            height: 300px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .sql-icon {
            background-image: url('images/sql.png');
        }

        .excel-icon {
            background-image: url('images/excel.png');
        }

    </style>
</head>
<body>
    <div class="main-tab">
        <div class="tab">
            <!-- Navigation Tabs -->
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

            <!-- Back-Up Section -->
<div class="back-up">
    <label for="back-up" id="back-up">CREATE A BACK-UP FILE</label>
    <label for="back-up" id="back-up-text">
        This button will create a folder for a backup of the SQL database file <br>
        that will be saved to your computer
    </label>

    <!-- Form to trigger backup -->
    <form action="backup.php" method="post">
        <button type="submit" class="back-up-button">CLICK HERE</button>
    </form>

    <img src="images/sql.png" alt="sql" class="sql-icon">
</div>


           <!-- Excel Section -->
<div class="excel">
    <label id="excel">CREATE AN EXCEL FILE</label>
    <label id="excel-text">This button will create a presentable excel file with proper formats</label>

    <!-- Form to trigger Excel creation -->
    <form action="create_excel.php" method="post">
        <button type="submit" class="excel-button">CLICK HERE</button>
    </form>
    <img src="images/excel.png" alt="excel" class="excel-icon" />
</div>
        <div class="separator"></div>
    </div>
</body>
</html>
