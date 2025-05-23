<?php
ob_start(); // Start output buffering
session_start();

// Redirect authenticated users to the homepage
if (isset($_SESSION["email"])) {
    header("location: ./user-account.php");
    exit;
}

$first_name = "";
$last_name = "";
$email = "";
$phone = "";
$address = "";
$password = "";
$confirm_password = "";

$first_name_error = "";
$last_name_error = "";
$email_error = "";
$phone_error = "";
$address_error = "";
$password_error = "";
$confirm_password_error = "";
$general_error = ""; // For general errors like database connection

$error_found = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate first_name
    if (empty($first_name)) {
        $first_name_error = "First name is required.";
        $error_found = true;
    }

    // Validate last_name
    if (empty($last_name)) {
        $last_name_error = "Last name is required.";
        $error_found = true;
    }

    // Validate email format and existence
    if (empty($email)) {
        $email_error = "Email is required.";
        $error_found = true;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = "Email format is not valid.";
        $error_found = true;
    } else {
        @include_once "tools/db.php";
        if (function_exists('getDatabaseConnection')) {
            $dbConnection = getDatabaseConnection();

            if ($dbConnection) {
                $statement = $dbConnection->prepare("SELECT id FROM users WHERE email = ?");
                if ($statement) {
                    $statement->bind_param("s", $email);
                    $statement->execute();
                    $statement->store_result();
                    if ($statement->num_rows > 0) {
                        $email_error = "Email is already used.";
                        $error_found = true;
                    }
                    $statement->close();
                } else {
                    $general_error = "Failed to prepare database statement for email check: " . $dbConnection->error;
                    $error_found = true;
                }
            } else {
                $general_error = "Database connection failed. Please ensure 'tools/db.php' is correctly configured.";
                $error_found = true;
            }
        } else {
            $general_error = "Database connection function 'getDatabaseConnection' not found. Please ensure 'tools/db.php' is included and correct.";
            $error_found = true;
        }
    }

    // Validate phone
    if (empty($phone)) {
        $phone_error = "Phone number is required.";
        $error_found = true;
    } elseif (!preg_match("/^(\+|00\d{1,3})?[- ]?\d{7,12}$/", $phone)) {
        $phone_error = "Phone format is not valid.";
        $error_found = true;
    }

    // Validate address
    if (empty($address)) {
        $address_error = "Address is required.";
        $error_found = true;
    }

    // Validate password
    if (empty($password)) {
        $password_error = "Password is required.";
        $error_found = true;
    } elseif (strlen($password) < 6) {
        $password_error = "Password must have at least 6 characters.";
        $error_found = true;
    }

    // Validate confirm_password
    if (empty($confirm_password)) {
        $confirm_password_error = "Confirm password is required.";
        $error_found = true;
    } elseif ($confirm_password != $password) {
        $confirm_password_error = "Password and Confirm Password do not match.";
        $error_found = true;
    }


    if (!$error_found) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $created_at = date('Y-m-d H:i:s');

        @include_once "tools/db.php";
        if (function_exists('getDatabaseConnection')) {
            $dbConnection = getDatabaseConnection();

            if ($dbConnection) {
                $statement = $dbConnection->prepare(
                    "INSERT INTO users (first_name, last_name, email, phone, address, password, created_at) VALUES (?, ?, ?, ?, ?, ?, ?)"
                );

                if ($statement) {
                    $statement->bind_param('sssssss', $first_name, $last_name, $email, $phone, $address, $hashed_password, $created_at);

                    if ($statement->execute()) {
                        $insert_id = $statement->insert_id;
                        $statement->close();

                        $_SESSION["id"] = $insert_id;
                        $_SESSION["first_name"] = $first_name;
                        $_SESSION["last_name"] = $last_name;
                        $_SESSION["email"] = $email;
                        $_SESSION["phone"] = $phone;
                        $_SESSION["address"] = $address;
                        $_SESSION["created_at"] = $created_at;

                        header("location: ./user-account.php");
                        exit;
                    } else {
                        $general_error = "Error registering user: " . $dbConnection->error;
                    }
                    // Close statement even if execute fails
                    $statement->close();
                } else {
                    $general_error = "Failed to prepare database statement for registration: " . $dbConnection->error;
                }
            } else {
                $general_error = "Database connection failed for registration. Please ensure 'tools/db.php' is correctly configured.";
            }
        } else {
            $general_error = "Database connection function 'getDatabaseConnection' not found for registration. Please ensure 'tools/db.php' is included and correct.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Account</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;400;700;850;900&display=swap" rel="stylesheet">
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
            background-image: url('images/analytics(clicked).png');
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

        .create-account-tab {
            position: absolute;
            top: 14.4%;
            left: 10%;
            width: 87.4%;
            height: 85%;
            background: transparent;
        }

        #create-account-btn {
            position: absolute;
            top: 90%;
            left: 0%;
            height: 10%;
            width: 100%;
            background-color: #57977C;
            color: white;
            font-weight: bold;
            border: none;
            border-radius:  0px 0px 27px 27px;
            font-size: 27px;
            cursor: pointer;
        }

        .create-button-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 50%;
            height: 70%;
            border: 1px solid #57977C;
            box-sizing: border-box;
            border-radius: 50px;
            background: transparent;
        }

        #address-text, #last-name-text, #first-name-text, #middle-name-text, #phone-text,  #username-text, #password-text, #email-address-text, #confirm-password-text  {
            position: absolute;
            background: transparent; 
            color: #ffffff;
            font-size: 20px;
            font-weight: 500; /* very bold */
            font-family: 'Inter', sans-serif; /* <-- use Inter */
            outline: none;
        }

        .register-login-text {
            margin: 20px;
            text-align: center;
            background: transparent; 
            color: #ffffff;
            font-size: 40px;
            font-weight: 700; /* very bold */
            font-family: 'Inter', sans-serif; /* <-- use Inter */
            outline: none;
        }

        #address, #last-name, #first-name, #middle-name, #phone,  #username, #password, #email-address, #confirm-password  {
            position: absolute;
            width: 40%;
            height: 8%;
            background: transparent; 
            border: 1px solid #57977C; 
            border-radius: 15px; 
            color: #ffffff;
            font-size: 20px;
            font-weight: 500; /* very bold */
            font-family: 'Inter', sans-serif; /* <-- use Inter */
            outline: none;
            padding: 5px 5px 5px 2%;
        }

        #address {
            position: absolute;
            width: 87%;
            height: 7%;
            background: transparent; 
            border: 1px solid #57977C; 
            border-radius: 15px; 
            color: #ffffff;
            font-size: 20px;
            font-weight: 500; /* very bold */
            font-family: 'Inter', sans-serif; /* <-- use Inter */
            outline: none;
            padding: 5px 5px 5px 2%;
        }

        #address::placeholder {
            color: #57977C;
            transition: opacity 0#2s ease;
            position: absolute;
            left: 3%;
        }

        #last-name::placeholder , #first-name::placeholder , #middle-name::placeholder, #phone::placeholder {
            color: #57977C;
            transition: opacity 0#2s ease;
            position: absolute;
            left: 5%;
        }

        #username::placeholder , #password::placeholder , #email-address::placeholder , #confirm-password::placeholder {
            color: #57977C;
            transition: opacity 0#2s ease;
            position: absolute;
            left: 5%;
        }

        .back-icon {
            position: absolute;
            top: 2%;
            left: 2%;
            width: 50px;
            height: 50px;
            object-fit: contain;
            z-index: 12;
            margin: 15px;
        }
    </style>
</head>
<body>
    <div class="main-tab">
        <button id="dashboard-tab"></button>
        <button id="analytics-tab"></button>
        <a href="index.php">
            <button id="database-tab"></button>
        </a>
        <button id="filing-tab"></button>
        <button id="user-account-tab"></button>
        <div class="shade"></div>
        <div class="separator"></div>
    </div>
    <div class="create-account-tab">
        <div class="create-button-container">
        <div class="register-login-text">
            REGISTER ACCOUNT
        </div>

        <form method="post" class="w-100 d-flex flex-column align-items-center">
    <?php if (!empty($general_error)) { ?>
        <div class="error-message">
            <?= htmlspecialchars($general_error) ?>
        </div>
    <?php } ?>

    <div class="form-group">
        <label for="first_name" id="first-name-text" style="top: 15%; left: 5%;">First Name</label>
        <input type="text" id="first-name" name="first_name" class="form-control custom-input" value="<?= htmlspecialchars($first_name) ?>" placeholder="First Name" required style="top: 20%; left: 5%;">
        <span class="text-danger"><?= $first_name_error ?></span>
    </div>

    <div class="form-group">
        <label for="last_name" id="last-name-text" style="top: 15%; left: 52%;">Last Name</label>
        <input type="text" id="last-name" name="last_name" class="form-control custom-input" value="<?= htmlspecialchars($last_name) ?>" placeholder="Last Name" required style="top: 20%; left: 52%;">
        <span class="text-danger"><?= $last_name_error ?></span>
    </div>

    <div class="form-group">
        <label for="email" id="email-address-text" style="top: 35%; left: 5%;">Email</label>
        <input type="email" id="email-address" name="email" class="form-control custom-input" value="<?= htmlspecialchars($email) ?>" placeholder="Email" required style="top:40%; left: 5%;">
        <span class="text-danger"><?= $email_error ?></span>
    </div>

    <div class="form-group">
        <label for="phone" id="phone-text" style="top: 35%; left: 52%;">Phone</label>
        <input type="text" id="phone" name="phone" class="form-control custom-input" value="<?= htmlspecialchars($phone) ?>" placeholder="Phone" required style="top: 40%; left: 52%;">
        <span class="text-danger"><?= $phone_error ?></span>
    </div>

    <div class="form-group">
        <label for="password" id="password-text" style="top: 55%; left: 5%;">Password</label>
        <input type="password" id="password" name="password" class="form-control custom-input" placeholder="Password" required style="top: 60%; left: 5%;">
        <span class="text-danger"><?= $password_error ?></span>
    </div>

    <div class="form-group">
        <label for="confirm_password" id="confirm-password-text" style="top: 55%; left: 52%;">Confirm Password</label>
        <input type="password" id="confirm-password" name="confirm_password" class="form-control custom-input" placeholder="Confirm Password" required style="top: 60%; left: 52%;">
        <span class="text-danger"><?= $confirm_password_error ?></span>
    </div>

    <div class="form-group">
        <label for="address" id="address-text" style="top: 73%; left: 5%;">Address</label>
        <input type="text" id="address" name="address" class="form-control custom-input" value="<?= htmlspecialchars($address) ?>" placeholder="Address" required style="top: 78%; left: 5%;">
        <span class="text-danger"><?= $address_error ?></span>
    </div>

    <div class="button-container">
        <button type="submit" id="create-account-btn" class="register-button">Register</button>
                <a href="index.php" class="cancel-button">
            <img src="images/back.png" alt="icon" class="back-icon">    
        </a>
    </div>
</form>

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
    </div>
</body>
</html>
<?php
ob_end_flush(); // End output buffering and send output
?>