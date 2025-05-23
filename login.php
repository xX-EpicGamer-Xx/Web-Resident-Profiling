<?php
ob_start(); 
session_start(); 

if (isset($_SESSION["email"])) {
    header("location: ./dashboard.php"); 
    exit;
}

$email = "";
$error = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $error = "Email and Password are required.";
    } else {
        
        include_once "tools/db.php"; 
        $dbConnection = getDatabaseConnection();

        if ($dbConnection) {
            $statement = $dbConnection->prepare(
                "SELECT id, first_name, last_name, phone, password, created_at FROM users WHERE email = ?"
            );
            $statement->bind_param('s', $email);
            $statement->execute();
            $statement->bind_result($id, $first_name, $last_name, $phone, $stored_password, $created_at);

            if ($statement->fetch()) {
                if (password_verify($password, $stored_password)) {
                    $_SESSION["id"] = $id;
                    $_SESSION["first_name"] = $first_name;
                    $_SESSION["last_name"] = $last_name;
                    $_SESSION["email"] = $email;
                    $_SESSION["phone"] = $phone;
                    $_SESSION["created_at"] = $created_at;

                    header("location: /dashboard.php"); 
                    exit;
                }
            }
            $statement->close();
            
            $error = "Email or Password invalid";
        } else {
            $error = "Database connection failed. Please try again later.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lgu-login.css">
    <title>Admin LogIn</title>
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
            width: 50%; /* width is 80% of the page */
            padding-top: 40%; /* 2:1 aspect ratio (800/1600 = 0.5, 50%, here slightly adjusted for better looks) */
            background: #3F6656;
            position: relative;
            border-radius: 50px;
            stroke: #57977C 1px;
            border: 1px solid #57977C;
            box-sizing: border-box;
        }

        .lgu-login-text {
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

        .username, .password {
            background-color: transparent;
            border: none;
            border-bottom: 3px solid #57977C;
            padding: 8px;
            font-size: 20px;
            outline: none;
            color: #57977C;
            width: 80%; 
        
        }

        .logIn-button {
            position: absolute;
            top: 70%; /* center vertically */
            left: 50%; /* center horizontally */
            transform: translate(-50%); /* perfectly center */
            width: 25%; /* 200px in percentage */
            height: 10%; /* 70px in percentage */
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
            object-fit: contain;
            z-index: 12;
            margin: 15px;
        }

        .lgu-login-text {
            position: absolute;
            top: 20%;
            left: 50%; 
            transform: translateX(-50%);
            color: #ffffff;
            font-size: 50px; 
            font-weight: 850;
            text-align: center;
            pointer-events: none;
            user-select: none;
            z-index: 10;
            white-space: nowrap;
        }
        
        .gradient1, .gradient2, .gradient3, .gradient4, .gradient5, .gradient6, .gradient7, .gradient8, .gradient9, .gradient10 {
            width: 10%;
            height: 100%;
            position: absolute;
            top: 0%;
            box-sizing: border-box;
        }
        .username, .password {
            position: absolute;
            background-color: transparent;
            left: 50%;
            transform: translateX(-50%);
            border: none;
            border-bottom: 3px solid #57977C;
            padding: 8px;
            font-size: 20px;
            outline: none;
            color: #57977C; 
            width: 50%;
            z-index: 20;
        }
        .username { 
            top: 35%; 
        }
        .password {
            top: 50%; 
        }

        .username::placeholder, .password::placeholder {
            color: #57977C;
            transition: opacity 0.2s ease;
        }

        .username:focus::placeholder, .password:focus::placeholder {
            opacity: 0;
        }

        .reset-password-text {
            position: absolute;
            top: 60%;
            left: 53%;
            transform: translateX(-67%);
            color: #57977C;
            font-size: 15px;
            font-family: 'Inter', sans-serif; /* <-- use Inter */
            text-align: center;
            pointer-events: none;
            user-select: none;
            z-index: 20;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis; 
            cursor: pointer;
        }
        .reset-password-text a { 
            pointer-events: auto; 
        }


        .login-page, .reset-password-page {
            color: #ffffff;
            pointer-events: auto; 
        }

        .gradient1 { left: 0%; border-radius: 50px 0px 0px 50px; background: linear-gradient(180deg, #57977C 0%, #012516 10%); }
        .gradient2 { left: 10%; background: linear-gradient(180deg, #57977C 0%, #012516 20%); }
        .gradient3 { left: 20%; background: linear-gradient(180deg, #57977C 0%, #012516 30%); }
        .gradient4 { left: 30%; background: linear-gradient(180deg, #57977C 0%, #012516 40%); }
        .gradient5 { left: 40%; background: linear-gradient(180deg, #57977C 0%, #012516 50%); }
        .gradient6 { left: 50%; background: linear-gradient(180deg, #57977C 0%, #012516 60%); }
        .gradient7 { left: 60%; background: linear-gradient(180deg, #57977C 0%, #012516 70%); }
        .gradient8 { left: 70%; background: linear-gradient(180deg, #57977C 0%, #012516 80%); }
        .gradient9 { left: 80%; background: linear-gradient(180deg, #57977C 0%, #012516 90%); }
        .gradient10 { left: 90%; border-radius: 0px 50px 50px 0px; background: linear-gradient(180deg, #57977C 0%, #012516 100%); }

        .error-message { 
            position:absolute;
            bottom:5%; 
            left:50%;
            transform:translateX(-50%);
            background:#ffdddd;
            color:#a00;
            padding:10px 20px;
            border-radius:10px;
            z-index:99;
            text-align: center;
            width: auto; 
            max-width: 80%;
            color: #ffffff;
            background-color: #57977C;
            font-family: 'Inter', sans-serif; /* <-- use Inter */
        }
    </style>
</head>
<body>
    <div class="main-tab">
    <form method="post" action="">
        <div class="lgu-login-text">LGU LOGIN</div>
        <div><input type="text" name="email" class="username" placeholder="Email" value="<?= htmlspecialchars($email) ?>" required></div>
        <div><input type="password" name="password" class="password" placeholder="Password" required></div>
        <div>
            <a href="dashboard.php">
                <button class="logIn-button" type="submit">LogIn</button></div>
            </a>
            <div>
                <img src="images/toclong.png" alt="toclong logo" class="toclong-logo"> 
            </div>

            <div class="gradient1"></div>
            <div class="gradient2"></div>
            <div class="gradient3"></div>
            <div class="gradient4"></div>
            <div class="gradient5"></div>
            <div class="gradient6"></div>
            <div class="gradient7"></div>
            <div class="gradient8"></div>
            <div class="gradient9"></div>
            <div class="gradient10"></div>

            <?php if (!empty($error)) { ?>
                <div class="error-message"> 
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php } ?>
        </form>
    </div>
</body>
</html>
<?php

ob_end_flush(); 
?>