<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            background-image: url('images/dashboard(clicked).png');
            z-index: 1;
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
            background-image: url('images/user-account.png');
            background-color: transparent;
        }

        .shade {
            position: absolute;
            top: 17.5%; /* slight offset from the top */
            left: 2.7%;
            width: 7.3%;
            height: 12%;
            box-sizing: border-box;
            background: rgba(0, 0, 0, 0.5);
            z-index: 0;
        }

        .greetings-text1 {
            position: absolute;
            top: 25%;
            left: 15%;
            color: #ffffff;
            font-size: 90px;
            font-weight: 850; /* very bold */
            font-family: 'Inter', sans-serif; /* <-- use Inter */
            text-align: center;
            pointer-events: none;
            user-select: none;
            z-index: 10;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .greetings-text2 {
            position: absolute;
            top: 37%;
            left: 15%;
            color: #ffffff;
            font-size: 30px;
            font-weight: 500; /* very bold */
            font-family: 'Inter', sans-serif; /* <-- use Inter */
            text-align: center;
            pointer-events: none;
            user-select: none;
            z-index: 10;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .boy {
            position: absolute;
            top: 44.7%;
            left: 15%;
            width: 512px;
            height: 512px;
            object-fit: contain; /* or cover if you prefer full fill */
            z-index: 12; /* above everything else */
            margin: 15px; /* optional margin */
        }

        .map-of-toclong{
            position: absolute;
            top: 27%;
            left: 53%;
            width: 40%;
            height: 60%;
            border: 1px solid #57977C;
            box-sizing: border-box;
            border-radius: 50px;
            background: transparent;
            z-index: 12; /* above everything else */
        }

        .map-frame {
            width: 100%;
            height: 100%;
            border-radius: 50px;
        }

        .barangay-toclong-text {
            position: absolute;
            top: 22%;
            left: 55%;
            color: #ffffff;
            font-size: 30px;
            font-weight: 500; /* very bold */
            font-family: 'Inter', sans-serif; /* <-- use Inter */
            text-align: center;
            pointer-events: none;
            user-select: none;
            z-index: 10;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
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
        <div class="greetings-text1">GOOD DAY!</div>
        <div class="greetings-text2">Welcome to the Dashboard of Barangay Toclong</div>
        <img src="images/wellhelm.png" alt="boy" class="boy">
        <div class="barangay-toclong-text">Map of Barangay Toclong</div>
        <div class="map-of-toclong">
            <iframe
                class="map-frame"
                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15446.951022657518!2d120.914961!3d14.422876!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sph!4v0000000000000"
  width="100%"
                allowfullscreen
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                ></iframe>
        </div>
        <div class="separator"></div>
    </div>
</body>
</html>