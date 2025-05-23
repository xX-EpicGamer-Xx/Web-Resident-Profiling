<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            width: 80%; /* width is 80% of the page */
            padding-top: 40%; /* 2:1 aspect ratio (800/1600 = 0.5, 50%, here slightly adjusted for better looks) */
            background: #3F6656;
            position: relative;
            border-radius: 50px;
            stroke: #57977C 1px;
            border: 1px solid #57977C;
            box-sizing: border-box;
        }

        .gradient-tab1{
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            width: 50%;
            border-radius: 50px 0px 0px 50px;
            background: rgba(255, 255, 255, 0.1);
            box-sizing: border-box;
        }

        .gradient-tab2{
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            width: 50%;
            border-radius: 0px 50px 50px 0px;
            background: rgba(0, 0, 0, 0.2);
            box-sizing: border-box;
        }

        .gradient1l, .gradient2l, .gradient3l, .gradient4l, .gradient5l, .gradient6l, .gradient7l, .gradient8l, .gradient9l, .gradient10l {
            width: 10%; /* 80px / 400px ≈ 20% (left half is 50% of full width) */
            height: 100%; /* 800px relative to the full 1000px height => 8% approx */
            margin: 0px 0; /* vertical spacing between rectangles */
            position: absolute;
            top: 0%;
            box-sizing: border-box;
        }

        .gradient1r, .gradient2r, .gradient3r, .gradient4r, .gradient5r, .gradient6r, .gradient7r, .gradient8r, .gradient9r, .gradient10r {
            width: 10%; /* 80px / 400px ≈ 20% (left half is 50% of full width) */
            height: 100%; /* 800px relative to the full 1000px height => 8% approx */
            margin: 0px 0; /* vertical spacing between rectangles */
            position: absolute;
            top: 0%;
            box-sizing: border-box;
        }

        .resident-profiling-text {
            position: absolute;
            top: 20%;
            left: 51%;
            transform: translateX(-50%);
            color: #ffffff;
            font-size: 50px;
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

        .explain-text {
            position: absolute;
            top: 33%;
            left: 51%;
            transform: translateX(-50%);
            color: #ffffff;
            font-size: 20px;
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

        .logIn-button {
            position: absolute;
            top: 40%; /* center vertically */
            left: 50%; /* center horizontally */
            transform: translate(-50%); /* perfectly center */
            width: 12.5%; /* 200px in percentage */
            height: 8.75%; /* 70px in percentage */
            background-color: #ffffff;
            color: #012516;
            font-family: 'Inter', sans-serif;
            font-size: 1.5vw; /* responsive font size */
            font-weight: 600;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            z-index: 11; /* higher than text if needed */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .toclong-logo {
            position: absolute;
            top: 0;
            left: 0;
            width: 100px;
            height: 100px;
            object-fit: contain; /* or cover if you prefer full fill */
            z-index: 12; /* above everything else */
            margin: 15px; /* optional margin */
        }

        .dashboard {
            position: absolute;
            top: 55%;
            left: 5%;
            width: 300px;
            height: 300px;
            object-fit: cover; /* or contain if you prefer */
            z-index: 10; /* behind everything else */
        }
        .analytics {
            position: absolute;
            top: 55%;
            left: 55%;
            width: 300px;
            height: 300px;
            object-fit: cover; /* or contain if you prefer */
            z-index: 10; /* behind everything else */
        }
        .database {
            position: absolute;
            top: 55%;
            left: 5%;
            width: 300px;
            height: 300px;
            object-fit: cover; /* or contain if you prefer */
            z-index: 10; /* behind everything else */
        }
        .filing {
            position: absolute;
            top: 55%;
            left: 55%;
            width: 300px;
            height: 300px;
            object-fit: cover; /* or contain if you prefer */
            z-index: 10; /* behind everything else */
        }

    </style>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet">
    <title>Welcome</title>
</head>
<body>
    <div class="main-tab">
        <div class="resident-profiling-text">
            RESIDENT PROFILING
        </div>
        <div class="explain-text">
            Web Based Resident Profiling for Barangay Toclong, Cavite
        </div>
        <div>
            <a href="login.php">
                <button class="logIn-button">LogIn</button>
            </a>
        </div> 
        <div>
            <img src="images/toclong.png" alt="toclong logo" class="toclong-logo">
        </div>
        <div class="gradient-tab1">
            <img src="images/interactive-dashboard.png" alt="" class="dashboard">
            <img src="images/analytics-tab.png" alt="" class="analytics">
            <div class="gradient1r" style="background: linear-gradient(180deg, #57977C 0%, #012516 10%); left: 0%; border-radius: 50px 0px 0px 50px;"></div>
            <div class="gradient2r" style="background: linear-gradient(180deg, #57977C 0%, #012516 20%); left: 10%;"></div>
            <div class="gradient3r" style="background: linear-gradient(180deg, #57977C 0%, #012516 30%); left: 20%;"></div>
            <div class="gradient4r" style="background: linear-gradient(180deg, #57977C 0%, #012516 40%); left: 30%;"></div>
            <div class="gradient5r" style="background: linear-gradient(180deg, #57977C 0%, #012516 50%); left: 40%;"></div>
            <div class="gradient6r" style="background: linear-gradient(180deg, #57977C 0%, #012516 60%); left: 50%;"></div>
            <div class="gradient7r" style="background: linear-gradient(180deg, #57977C 0%, #012516 70%); left: 60%;"></div>
            <div class="gradient8r" style="background: linear-gradient(180deg, #57977C 0%, #012516 80%); left: 70%;"></div>
            <div class="gradient9r" style="background: linear-gradient(180deg, #57977C 0%, #012516 90%); left: 80%;"></div>
            <div class="gradient10r" style="background: linear-gradient(180deg, #57977C 0%, #012516 100%); left: 90%; "></div>
        </div>
        <div class="gradient-tab2">
            <img src="images/databse-table.png" alt="" class="database">
            <img src="images/filing-system.png" alt="" class="filing">
            <div class="gradient1l" style="background: linear-gradient(180deg, #012516 90%, #57977C 100%); left: 0%;"></div>
            <div class="gradient2l" style="background: linear-gradient(180deg, #012516 80%, #57977C 100%); left: 10%;"></div>
            <div class="gradient3l" style="background: linear-gradient(180deg, #012516 70%, #57977C 100%); left: 20%;"></div>
            <div class="gradient4l" style="background: linear-gradient(180deg, #012516 60%, #57977C 100%); left: 30%;"></div>
            <div class="gradient5l" style="background: linear-gradient(180deg, #012516 50%, #57977C 100%); left: 40%;"></div>
            <div class="gradient6l" style="background: linear-gradient(180deg, #012516 40%, #57977C 100%); left: 50%;"></div>
            <div class="gradient7l" style="background: linear-gradient(180deg, #012516 30%, #57977C 100%); left: 60%;"></div>
            <div class="gradient8l" style="background: linear-gradient(180deg, #012516 20%, #57977C 100%); left: 70%;"></div>
            <div class="gradient9l" style="background: linear-gradient(180deg, #012516 10%, #57977C 100%); left: 80%;"></div>
            <div class="gradient10l" style="background: linear-gradient(180deg, #012516 0%, #57977C 100%); left: 90%; border-radius: 0px 50px 50px 0px;"></div>
        </div>
    </div>
</body>
</html>