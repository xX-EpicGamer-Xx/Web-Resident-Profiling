<?php
ob_start(); // Start output buffering
session_start();

// Redirect authenticated users to the homepage
if (isset($_SESSION["email"])) {
    header("location: ./index.php");
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

                        header("location: ./index.php");
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
            font-family: 'Inter', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(-45deg, #08110E, #3F6656 );
        }

        .main-tab {
            width: 80%; /* Adjusted for responsiveness */
            max-width: 700px; /* Max width for larger screens */
            padding: 40px;
            background: #3F6656;
            border-radius: 50px;
            border: 1px solid #57977C;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 5px;
            position: relative;
            min-height: 700px; /* Increased min-height to accommodate more form fields */
            color: #ffffff;
            overflow: hidden; /* Ensure gradients don't overflow rounded corners */
        }

        .lgu-login-text {
            color: #ffffff;
            font-size: 40px;
            font-weight: 850;
            text-align: center;
            user-select: none;
            z-index: 10;
            white-space: nowrap;
            margin-bottom: 80px;
            letter-spacing: 2px;
        }

        /* Form styling */
        .form-group {
            width: 80%;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-bottom: 25px;
            position: relative;
        }

        .form-group label {
            /* Visually hide labels but keep them for accessibility */
            font-size: 0.1px;
            color: transparent;
            height: 0;
            overflow: hidden;
            margin: 0;
            padding: 0;
            display: block;
        }

        .form-control.custom-input {
            background-color: transparent;
            border: none;
            border-bottom: 1px solid #57977C;
            padding: 8px 0;
            font-size: 18px;
            outline: none;
            color: #A5C2B4;
            width: 100%;
            box-sizing: border-box;
            z-index: 20;
            border-radius: 0;
            height: 20px;
        }

        .custom-input::placeholder {
            color: #A5C2B4;
            transition: opacity 0.2s ease;
        }

        .custom-input:focus::placeholder {
            opacity: 0;
        }

        /* Buttons container for register and cancel */
        .button-container {
            width: 80%; /* Match form group width */
            display: flex;
            justify-content: center; /* Center the buttons within the container */
            gap: 20px; /* Space between buttons */
            margin-top: 20px;
        }

        .register-button, .cancel-button {
            flex-grow: 1; /* Allow buttons to grow */
            max-width: 250px; /* Limit individual button width */
            padding: 15px;
            font-size: 1.2em;
            font-weight: 600;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            text-decoration: none;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 5;
        }

        .register-button {
            background-color: #ffffff;
            color: #012516;
        }

        .register-button:hover {
            background-color: rgb(15, 224, 123);
            color: #012516;
        }

        .cancel-button {
            background-color: transparent; /* or a slightly darker color */
            border: 1px solid #57977C; /* Outline style */
            color: #ffffff; /* White text for outline button */
        }

        .cancel-button:hover {
            background-color: #57977C; /* Fill with the border color on hover */
            color: #ffffff;
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

        /* Gradients - Adjusted to be positioned absolutely within main-tab */
        .gradient1, .gradient2, .gradient3, .gradient4, .gradient5, .gradient6, .gradient7, .gradient8, .gradient9, .gradient10 {
            width: 10%;
            height: 100%;
            position: absolute;
            top: 0;
            box-sizing: border-box;
            opacity: 0.7;
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

        .admin-login-text {
            color: #57977C;
            font-size: 15px;
            text-align: center;
            user-select: none;
            z-index: 10;
            white-space: nowrap;
            margin-top: 20px;
        }

        .admin-login-text a {
            color: #ffffff;
            text-decoration: none;
            pointer-events: auto;
        }

        .error-message {
            background: #ffdddd;
            color: #a00;
            padding: 10px 20px;
            border-radius: 10px;
            z-index: 99;
            text-align: center;
            width: auto;
            max-width: 80%;
            margin-bottom: 15px;
        }

        .text-danger {
            font-size: 0.8em;
            color: #dc3545;
            margin-top: 5px;
            display: block;
            width: 100%;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="main-tab">
        <div class="lgu-login-text">
            REGISTER ACCOUNT
        </div>

        <form method="post" class="w-100 d-flex flex-column align-items-center">
    <?php if (!empty($general_error)) { ?>
        <div class="error-message">
            <?= htmlspecialchars($general_error) ?>
        </div>
    <?php } ?>

    <div class="form-group">
        <label for="first_name">First Name*</label>
        <input type="text" id="first_name" name="first_name" class="form-control custom-input" value="<?= htmlspecialchars($first_name) ?>" placeholder="First Name" required>
        <span class="text-danger"><?= $first_name_error ?></span>
    </div>

    <div class="form-group">
        <label for="last_name">Last Name*</label>
        <input type="text" id="last_name" name="last_name" class="form-control custom-input" value="<?= htmlspecialchars($last_name) ?>" placeholder="Last Name" required>
        <span class="text-danger"><?= $last_name_error ?></span>
    </div>

    <div class="form-group">
        <label for="email">Email*</label>
        <input type="email" id="email" name="email" class="form-control custom-input" value="<?= htmlspecialchars($email) ?>" placeholder="Email" required>
        <span class="text-danger"><?= $email_error ?></span>
    </div>

    <div class="form-group">
        <label for="phone">Phone*</label>
        <input type="text" id="phone" name="phone" class="form-control custom-input" value="<?= htmlspecialchars($phone) ?>" placeholder="Phone" required>
        <span class="text-danger"><?= $phone_error ?></span>
    </div>

    <div class="form-group">
        <label for="address">Address*</label>
        <input type="text" id="address" name="address" class="form-control custom-input" value="<?= htmlspecialchars($address) ?>" placeholder="Address" required>
        <span class="text-danger"><?= $address_error ?></span>
    </div>

    <div class="form-group">
        <label for="password">Password*</label>
        <input type="password" id="password" name="password" class="form-control custom-input" placeholder="Password" required>
        <span class="text-danger"><?= $password_error ?></span>
    </div>

    <div class="form-group">
        <label for="confirm_password">Confirm Password*</label>
        <input type="password" id="confirm_password" name="confirm_password" class="form-control custom-input" placeholder="Confirm Password" required>
        <span class="text-danger"><?= $confirm_password_error ?></span>
    </div>

    <div class="button-container">
        <button type="submit" class="register-button">Register</button>
        <a href="index.php" class="cancel-button">Cancel</a>
    </div>
</form>

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
    </div>
</body>
</html>
<?php
ob_end_flush(); // End output buffering and send output
?>