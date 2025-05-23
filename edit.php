<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "residents";

$connection = new mysqli($servername ,$username, $password, $database); // create connection

$id = "";
$last_name = "";
$first_name = "";
$member_4ps = ""; // bool
$middle_name = "";
$suffix = "";
$sex = "";
$birth_date; // date (nullable)
$birth_place = "";
$age ; // int
$civil_status = ""; 
$nationality = "";
$religion = "";
$occupation = "";
$contact_number_general = ""; // keep as string to preserve leading 0s
$pwd = ""; // bool
$pwd_id_no ; // int
$single_parent = ""; // bool
$house_number ; // int
$subdivision ; // int
$street = ""; 
$registered_voter = ""; // bool
$voter_s_id_number ; // int
$tin_number ; // int
$national_id_number ; // int
$sss_number ; // int
$philhealth_no ; // int
$pagibig_no; // int
$vaccinated = ""; // bool

$errorMessage = "";
$successMessage = "";

if ( $_SERVER['REQUEST_METHOD'] == 'GET') {
    if ( !isset($_GET["id"])) {
        header("location: /accounts/index.php");
        exit;
    }

    $id = $_GET["id"];

    $sql = "SELECT * FROM residents WHERE id=$id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: /accounts/index.php");
        exit;
    }

    $last_name = $row['last_name'];
    $first_name = $row['first_name'];
    $member_4ps = $row['member_4ps'];
    $middle_name = $row['middle_name'];
    $suffix = $row['suffix'];
    $sex = $row['sex'];
    $birth_date = $row['birth_date'];
    $birth_place = $row['birth_place'];
    $age = $row['age'];
    $civil_status = $row['civil_status'];
    $nationality = $row['nationality'];
    $religion = $row['religion'];
    $occupation = $row['occupation'];
    $contact_number_general = $row['contact_number_general'];
    $pwd = $row['pwd'];
    $pwd_id_no = $row['pwd_id_no'];
    $single_parent = $row['single_parent'];
    $house_number = $row['house_number'];
    $subdivision = $row['subdivision'];
    $street = $row['street'];
    $registered_voter = $row['registered_voter'];
    $voter_s_id_number = $row['voter_s_id_number'];
    $tin_number = $row['tin_number'];
    $national_id_number = $row['national_id_number'];
    $sss_number = $row['sss_number'];
    $philhealth_no = $row['philhealth_no'];
    $pagibig_no = $row['pagibig_no'];
    $vaccinated = $row['vaccinated'];
}

else {
    $id = $_POST["id"];
    $last_name = $_POST["last_name"];
    $first_name = $_POST['first_name'];
    $member_4ps = $_POST['member_4ps'];
    $middle_name = $_POST['middle_name'];
    $suffix = $_POST['suffix'];
    $sex = $_POST['sex'];
    $birth_date = $_POST['birth_date'];
    $birth_place = $_POST['birth_place'];
    $age = $_POST['age'];
    $civil_status = $_POST['civil_status'];
    $nationality = $_POST['nationality'];
    $religion = $_POST['religion'];
    $occupation = $_POST['occupation'];
    $contact_number_general = $_POST['contact_number_general'];
    $pwd = $_POST['pwd'];
    $pwd_id_no = $_POST['pwd_id_no'];
    $single_parent = $_POST['single_parent'];
    $house_number = $_POST['house_number'];
    $subdivision = $_POST['subdivision'];
    $street = $_POST['street'];
    $registered_voter = $_POST['registered_voter'];
    $voter_s_id_number = $_POST['voter_s_id_number'];
    $tin_number = $_POST['tin_number'];
    $national_id_number = $_POST['national_id_number'];
    $sss_number = $_POST['sss_number'];
    $philhealth_no = $_POST['philhealth_no'];
    $pagibig_no = $_POST['pagibig_no'];
    $vaccinated = $_POST['vaccinated'];

    do {
        if (empty($last_name) || 
            empty($first_name) || 
            !isset($member_4ps) || // boolean, so check isset()
            empty($sex) || 
            empty($birth_date) || 
            empty($birth_place) || 
            !isset($age) || // int, so check isset()
            empty($civil_status) || 
            empty($nationality) || 
            empty($religion) || 
            empty($occupation) || 
            empty($contact_number_general) || 
            !isset($pwd) || // boolean
            !isset($single_parent) || // boolean
            !isset($house_number) || // int
            empty($subdivision) || // int
            empty($street) || 
            !isset($registered_voter) || // boolean
            !isset($vaccinated)) { // boolean {
            $errorMessage = "Requied fields must have something in them";
            break;
        }

        $sql = "UPDATE residents " . 
        "SET last_name = '$last_name',
            first_name = '$first_name',
            member_4ps = '$member_4ps',
            middle_name = '$middle_name',
            suffix = '$suffix',
            sex = '$sex',
            birth_date = '$birth_date',
            birth_place = '$birth_place',
            age = '$age',
            civil_status = '$civil_status',
            nationality = '$nationality',
            religion = '$religion',
            occupation = '$occupation',
            contact_number_general = '$contact_number_general',
            pwd = '$pwd',
            pwd_id_no = '$pwd_id_no',
            single_parent = '$single_parent',
            house_number = '$house_number',
            subdivision = '$subdivision',
            street = '$street',
            registered_voter = '$registered_voter',
            voter_s_id_number = '$voter_s_id_number',
            tin_number = '$tin_number',
            national_id_number = '$national_id_number',
            sss_number = '$sss_number',
            philhealth_no = '$philhealth_no',
            pagibig_no = '$pagibig_no',
            vaccinated = '$vaccinated' ".
        "WHERE id = $id";

        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid Query: " . $connection->error;
            break;
        }

        $successMessage = "Acco unt has been updated";
        header("location: /accounts/index.php");
        exit;

    }
    while (false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Resident Data</title>
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

        #main-tab {
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

        .picture {
            position: absolute;
            top: 18%; /* slight offset from the top */
            left: 12%;
            width: 18%;
            height: 30%;
            border: 1px solid #57977C;
            box-sizing: border-box;
            border-radius: 25px;
            background: transparent;
        }

        .picture-image {
            position: absolute;
            top: 10%; /* slight offset from the top */
            left: 15%;
            width: 70%;
            height: 70%;
            border: 1px solid #57977C;
            box-sizing: border-box;
            border-radius: 25px;
            background: transparent;
        }

        .profile-picture {
            position: absolute;
            top: 0%;
            left: 0%;
            width: 100%;
            height: 100%;
            border-radius: 25px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .picture-button {
            position: absolute;
            top: 85%; /* slight offset from the top */
            left: 0%;
            width: 100%;
            height: 15%;
            border-radius: 0px 0px 23px 23px;
            border: none;
            background: #57977C;
            color: #ffffff;
            font-size: 20px;
            font-weight: 500; /* very bold */
            font-family: 'Inter', sans-serif; /* <-- use Inter */
            cursor: pointer;
        }

        .add-resident {
            position: absolute;
            top: 84%; /* slight offset from the top */
            left: 8%;
            width: 40%;
            height: 12%;
            border-radius: 15px;
            border: none;
            background: #57977C;
            color: #ffffff;
            font-size: 20px;
            font-weight: 500; /* very bold */
            font-family: 'Inter', sans-serif; /* <-- use Inter */
            cursor: pointer;
        }

        .cancel {
            position: absolute;
            top: 84%; /* slight offset from the top */
            left: 53%;
            width: 40%;
            height: 12%;
            border-radius: 15px;
            border: none;
            background: #57977C;
            color: #ffffff;
            font-size: 20px;
            font-weight: 500; /* very bold */
            font-family: 'Inter', sans-serif; /* <-- use Inter */
            cursor: pointer;
        }

        .emergency-info {
            position: absolute;
            top: 42%; /* slight offset from the top */
            left: 12%;
            width: 18%;
            height: 36%;
            border: 1px solid #57977C;
            box-sizing: border-box;
            border-radius: 25px;
            background: transparent;
        }

        #emergency-information-text {
            margin: 5%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #ffffff;
            font-size: 25px;
            font-weight: 500; /* very bold */
            font-family: 'Inter', sans-serif; /* <-- use Inter */
            user-select: none;
        }

        #full-name-text {
            position: absolute;
            top: 18%;
            left: 8%;
            align-items: center;
            color: #ffffff;
            font-size: 20px;
            font-weight: 500; /* very bold */
            font-family: 'Inter', sans-serif; /* <-- use Inter */
            user-select: none;
        }

        .full-name {
            position: absolute;
            top: 25%; /* slight offset from the top */
            left: 8%;
            width: 75%;
            height: 15%;
            background: transparent; 
            border: 1px solid #57977C; 
            border-radius: 15px; 
            color: #ffffff;
            font-size: 20px;
            font-weight: 500; /* very bold */
            font-family: 'Inter', sans-serif; /* <-- use Inter */
            outline: none;
            padding: 5px 5px 5px 8%;
        }

        .full-name::placeholder {
            color: #57977C;
            transition: opacity 0.2s ease;
            position: absolute;
            left: 10%;
        }

        #relationship-text {
            position: absolute;
            top: 44%;
            left: 8%;
            align-items: center;
            color: #ffffff;
            font-size: 20px;
            font-weight: 500; /* very bold */
            font-family: 'Inter', sans-serif; /* <-- use Inter */
            user-select: none;
        }

        .relationship {
            position: absolute;
            top: 50%; /* slight offset from the top */
            left: 8%;
            width: 35%;
            height: 15%;
            background: transparent; 
            border: 1px solid #57977C; 
            border-radius: 15px; 
            color: #ffffff;
            font-size: 20px;
            font-weight: 500; /* very bold */
            font-family: 'Inter', sans-serif; /* <-- use Inter */
            outline: none;
            padding: 5px 5px 5px 4%;
        }

        .relationship::placeholder {
            color: #57977C;
            transition: opacity 0.2s ease;
            position: absolute;
            left: 10%;
        }

        #contact-number-text {
            position: absolute;
            top: 44%;
            left: 55%;
            align-items: center;
            color: #ffffff;
            font-size: 20px;
            font-weight: 500; /* very bold */
            font-family: 'Inter', sans-serif; /* <-- use Inter */
            user-select: none;
        }

        .contact-number {
            position: absolute;
            top: 50%; /* slight offset from the top */
            left: 55%;
            width: 33%;
            height: 15%;
            background: transparent; 
            border: 1px solid #57977C; 
            border-radius: 15px; 
            color: #ffffff;
            font-size: 20px;
            font-weight: 500; /* very bold */
            font-family: 'Inter', sans-serif; /* <-- use Inter */
            outline: none;
            padding: 5px 5px 5px 4%;
        }

        .contact-number::placeholder {
            color: #57977C;
            transition: opacity 0.2s ease;
            position: absolute;
            left: 10%;
        }

        #address-text {
            position: absolute;
            top: 69%;
            left: 8%;
            align-items: center;
            color: #ffffff;
            font-size: 20px;
            font-weight: 500; /* very bold */
            font-family: 'Inter', sans-serif; /* <-- use Inter */
            user-select: none;
        }

        .address {
            position: absolute;
            top: 75%; /* slight offset from the top */
            left: 8%;
            width: 75%;
            height: 15%;
            background: transparent; 
            border: 1px solid #57977C; 
            border-radius: 15px; 
            color: #ffffff;
            font-size: 20px;
            font-weight: 500; /* very bold */
            font-family: 'Inter', sans-serif; /* <-- use Inter */
            outline: none;
            padding: 5px 5px 5px 8%;
        }

        .address::placeholder {
            color: #57977C;
            transition: opacity 0.2s ease;
            position: absolute;
            left: 10%;
        }

        #resident-data-text {
            position: absolute;
            top: 18%;
            left: 32%;
            align-items: center;
            color: #ffffff;
            font-size: 25px;
            font-weight: 500; /* very bold */
            font-family: 'Inter', sans-serif; /* <-- use Inter */
            user-select: none;
        }

        #last-name,#first-name, #member-4ps, #middle-name,#suffix, #birth-date,#birth-place,#age,#civil-status,#nationality,#religion,#occupation,#contact-number-general,#pwd,#pwd-id-no,#single-parent,#house-number,#street,#registered-voter,#voter-s-id-number,#tin-number,#national-id-number,#sss-number,#philhealth-no,#pagibig-no,#vaccinated {
            position: absolute;
            width: 13%;
            height: 5%;
            background: transparent; 
            border: 1px solid #57977C; 
            border-radius: 15px; 
            color: #57977C;
            font-size: 20px;
            font-weight: 500; /* very bold */
            font-family: 'Inter', sans-serif; /* <-- use Inter */
            outline: none;
            padding: 5px 5px 5px 1%;
        }

        #sex {
            position: absolute;
            width: 14.5%;
            height: 6%;
            background: transparent; 
            border: 1px solid #57977C; 
            border-radius: 15px; 
            color: #57977C;
            font-size: 20px;
            font-weight: 500; /* very bold */
            font-family: 'Inter', sans-serif; /* <-- use Inter */
            outline: none;
            padding: 5px 5px 5px 1%;
        }

        #subdivision {
            position: absolute;
            width: 14.5%;
            height: 6%;
            background: transparent; 
            border: 1px solid #57977C; 
            border-radius: 15px; 
            color: #57977C;
            font-size: 20px;
            font-weight: 500; /* very bold */
            font-family: 'Inter', sans-serif; /* <-- use Inter */
            outline: none;
            padding: 5px 5px 5px 1%;
        }

        #last-name::placeholder ,#first-name::placeholder , #member-4ps::placeholder , #middle-name::placeholder ,#suffix::placeholder ,#sex::placeholder ,#birth-date::placeholder ,#birth-place::placeholder ,#age::placeholder ,#civil-status::placeholder ,#nationality::placeholder ,#religion::placeholder ,#occupation::placeholder ,#contact-number-general::placeholder ,#pwd::placeholder ,#pwd-id-no::placeholder ,#single-parent::placeholder ,#house-number::placeholder ,#subdivision::placeholder ,#street::placeholder ,#registered-voter::placeholder ,#voter-s-id-number::placeholder ,#tin-number::placeholder ,#national-id-number::placeholder ,#sss-number::placeholder ,#philhealth-no::placeholder ,#pagibig-no::placeholder ,#vaccinated::placeholder {
            color: #57977C;
            transition: opacity 0.2s ease;
            position: absolute;
            left: 7%;
        }
        #last-name-text, #first-name-text, #member-4ps-text, #middle-name-text,#suffix-text, #sex-text, #birth-date-text,#birth-place-text,#age-text,#civil-status-text,#nationality-text,#religion-text,#occupation-text,#contact-number-general-text,#pwd-text,#pwd-id-no-text,#single-parent-text,#house-number-text,#subdivision-text,#street-text,#registered-voter-text,#voter-s-id-number-text,#tin-number-text,#national-id-number-text,#sss-number-text,#philhealth-no-text,#pagibig-no-text,#vaccinated-text {
            position: absolute;
            color: #ffffff;
            font-size: 20px;
            font-weight: 400; /* very bold */
            font-family: 'Inter', sans-serif; /* <-- use Inter */
            user-select: none;
        }

        #submit-button {
            position: absolute;
            top: 82%; /* slight offset from the top */
            left: 12%;
            width: 8%;
            height: 5%;
            border-radius: 15px;
            border: none;
            background:#57977C;
            color: #ffffff;
            font-size: 20px;
            font-weight: 500; /* very bold */
            font-family: 'Inter', sans-serif; /* <-- use Inter */
            cursor: pointer;
        }

        #cancel-button {
            position: absolute;
            top: 82%; /* slight offset from the top */
            left: 22%;
            width: 8%;
            height: 5%;
            border-radius: 15px;
            border: none;
            background: #57977C;
            color: #ffffff;
            font-size: 20px;
            font-weight: 500; /* very bold */
            font-family: 'Inter', sans-serif; /* <-- use Inter */
            display: flex; 
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }
        #last-name {
            color: #57977C;
            top: 22%;
            left: 32%;
        }

        #first-name {
            color: #57977C;
            top: 22%;
            left: 48%;
        }

        #member-4ps {
            color: #57977C;
            top: 72%;
            left: 32%;
            width: 14.5%;
            height: 6%;
        }

        #middle-name {
            color: #57977C;
            top: 22%;
            left: 64%;
        }

        #suffix {
            color: #57977C;
            top: 22%;
            left: 80%;
        }

        #sex {
            color: #57977C;
            top: 32%;
            left: 32%;
            width: 14.5%;
            height: 6%;
        }

        #birth-date {
            color: #57977C;
            top: 32%;
            left: 48%;
        }

        #birth-place {
            color: #57977C;
            top: 32%;
            left: 64%;
        }

        #age {
            color: #57977C;
            top: 32%;
            left: 80%;
        }

        #civil-status {
            color: #57977C;
            top: 42%;
            left: 32%;
        }

        #nationality {
            color: #57977C;
            top: 42%;
            left: 48%;
        }

        #religion {
            color: #57977C;
            top: 42%;
            left: 64%;
        }

        #occupation {
            color: #57977C;
            top: 42%;
            left: 80%;
        }

        #contact-number-general {
            color: #57977C;
            top: 52%;
            left: 32%;
        }

        #pwd {
            color: #57977C;
            top: 52%;
            left: 48%;
            width: 14.5%;
            height: 6%;
        }

        #pwd-id-no {
            color: #57977C;
            top: 52%;
            left: 64%;
        }

        #single-parent {
            color: #57977C;
            top: 52%;
            left: 80%;
            width: 14.5%;
            height: 6%;
        }

        #house-number {
            color: #57977C;
            top: 62%;
            left: 32%;
        }

        #subdivision {
            color: #57977C;
            top: 62%;
            left: 48%;
        }

        #street {
            color: #57977C;
            top: 62%;
            left: 64%;
        }

        #registered-voter {
            color: #57977C;
            top: 62%;
            left: 80%;
            width: 14.5%;
            height: 6%;
        }

        #voter-s-id-number {
            color: #57977C;
            top: 72%;
            left: 48%;
        }

        #tin-number {
            color: #57977C;
            top: 72%;
            left: 64%;
        }

        #national-id-number {
            color: #57977C;
            top: 72%;
            left: 80%;
        }

        #sss-number {
            color: #57977C;
            top: 82%;
            left: 32%;
        }

        #philhealth-no {
            color: #57977C;
            top: 82%;
            left: 48%;
        }

        #pagibig-no {
            color: #57977C;
            top: 82%;
            left: 64%;
        }

        #vaccinated {
            color: #57977C;
            top: 82%;
            left: 80%;
            width: 14.5%;
            height: 6%;
        }

        #last-name-text {
        top: 19%;
        left: 32%;
        }

        #first-name-text {
        top: 19%;
        left: 48%;
        }

        #member-4ps-text {
        top: 69%;
        left: 32%;
        }

        #middle-name-text {
        top: 19%;
        left: 64%;
        }

        #suffix-text {
        top: 19%;
        left: 80%;
        }

        #sex-text {
        top: 29%;
        left: 32%;
        }

        #birth-date-text {
        top: 29%;
        left: 48%;
        }

        #birth-place-text {
        top: 29%;
        left: 64%;
        }

        #age-text {
        top: 29%;
        left: 80%;
        }

        #civil-status-text {
        top: 39%;
        left: 32%;
        }

        #nationality-text {
        top: 39%;
        left: 48%;
        }

        #religion-text {
        top: 39%;
        left: 64%;
        }

        #occupation-text {
        top: 39%;
        left: 80%;
        }

        #contact-number-general-text {
        top: 49%;
        left: 32%;
        }

        #pwd-text {
        top: 49%;
        left: 48%;
        }

        #pwd-id-no-text {
        top: 49%;
        left: 64%;
        }

        #single-parent-text {
        top: 49%;
        left: 80%;
        }

        #house-number-text {
        top: 59%;
        left: 32%;
        }

        #subdivision-text {
        top: 59%;
        left: 48%;
        }

        #street-text {
        top: 59%;
        left: 64%;
        }

        #registered-voter-text {
        top: 59%;
        left: 80%;
        }

        #voter-s-id-number-text {
        top: 69%;
        left: 48%;
        }

        #tin-number-text {
        top: 69%;
        left: 64%;
        }

        #national-id-number-text {
        top: 69%;
        left: 80%;
        }

        #sss-number-text {
        top: 79%;
        left: 32%;
        }

        #philhealth-no-text {
        top: 79%;
        left: 48%;
        }

        #pagibig-no-text {
        top: 79%;
        left: 64%;
        }

        #vaccinated-text {
        top: 79%;
        left: 80%;
        }

        .edit-user {
            position: absolute;
            top: 25%;
            left: 12%;
            width: 150px;
            height: 150px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .edit-user-text {
            position: absolute;
            top: 25%;
            left: 20%;
            color: #ffffff;
            font-size: 40px;
            font-weight: 500; /* very bold */
            font-family: 'Inter', sans-serif; /* <-- use Inter */
            display: flex; 
            align-items: center;
            justify-content: center;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5" id="main-tab">
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
            <div class="separator"></div>
        </div>
        <?php
            if (!empty($errorMessage)) {
                echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$errorMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' arial-label='Close'></button>
                </div>
                ";
            }
        ?>
        
        <div>
            <img src="images/edit-user.png" alt="" class="edit-user">
            <label for="edit" class="edit-user-text">Input<br>User<br>Information</label>
        </div>
        <form method="post">
            <div class="emergency-info">
                <label for="emergency-information" id="emergency-information-text">Emergency Infomation</label>
                <label class="col-sm-3 col-form-label" id="full-name-text" for="full_name" required>Full Name</label>
                <input type="text" placeholder="Full Name" class="full-name" required>
                <label class="col-sm-3 col-form-label" id="relationship-text" for="relationship" required>Relationship</label>
                <input type="text" placeholder="Relationship" class="relationship" required>
                <label class="col-sm-3 col-form-label" id="contact-number-text" for="contact_number">Conctact No.</label>
                <input type="text" placeholder="Contact No." class="contact-number" required>
                <label class="col-sm-3 col-form-label" id="address-text" for="address">Address</label>
                <input type="text" placeholder="Address" class="address" required>
            </div>
            <label class="col-sm-3 col-form-label" id="last-name-text">Last Name</label>
            <input type="text" class="form-control" id="last-name" name="last_name" placeholder="Enter last name" value="<?php echo $last_name; ?>" required>

            <label class="col-sm-3 col-form-label" id="first-name-text" for="first_name">First Name</label>
            <input type="text" class="form-control" name="first_name" id="first-name" placeholder="Enter first name" value="<?php echo $first_name; ?>" required>

            <label class="col-sm-3 col-form-label" id="member-4ps-text" for="member_4ps">4Ps Member</label>
            <select class="form-control" name="member_4ps" id="member-4ps" required>
                <option value="Yes" <?php if ($member_4ps) echo "selected"; ?>>Yes</option> 
                <option value="No" <?php if (!$member_4ps) echo "selected"; ?>>No</option>
                
            </select>

            <label class="col-sm-3 col-form-label" id="middle-name-text" for="middle_name" required>Middle Name</label>
            <input type="text" class="form-control" name="middle_name" id="middle-name" placeholder="Enter middle name" value="<?php echo $middle_name; ?>" required>

            <label class="col-sm-3 col-form-label" id="suffix-text" for="suffix">Suffix</label>
            <input type="text" class="form-control" name="suffix" id="suffix" placeholder="Enter suffix (e.g., Jr., Sr.)" value="<?php echo $suffix; ?>" required>

            <label class="col-sm-3 col-form-label" id="sex-text" for="sex">Sex</label>
            <select class="form-control" name="sex" id="sex" required>
                <option value="Male" <?php if ($sex == 'Male') echo "selected"; ?>>Male</option>
                <option value="Female" <?php if ($sex == 'Female') echo "selected"; ?>>Female</option>
                
            </select>

            <label class="col-sm-3 col-form-label" id="birth-date-text" for="birth_date">Birth Date</label>
            <input type="date" class="form-control" name="birth_date" id="birth-date" value="<?php echo $birth_date; ?>" required>

            <label class="col-sm-3 col-form-label" id="birth-place-text" for="birth_place">Birth Place</label>
            <input type="text" class="form-control" name="birth_place" id="birth-place" placeholder="Enter birth place" value="<?php echo $birth_place; ?>" required>

            <label class="col-sm-3 col-form-label" id="age-text" for="age">Age</label>
            <input type="number" class="form-control" name="age" id="age" placeholder="Enter age" value="<?php echo $age; ?>" required>

            <label class="col-sm-3 col-form-label" id="civil-status-text" for="civil_status">Civil Status</label>
            <input type="text" class="form-control" name="civil_status" id="civil-status" placeholder="Enter civil status" value="<?php echo $civil_status; ?>" required>

            <label class="col-sm-3 col-form-label" id="nationality-text" for="nationality">Nationality</label>
            <input type="text" class="form-control" name="nationality" id="nationality" placeholder="Enter nationality" value="<?php echo $nationality; ?>" required>

            <label class="col-sm-3 col-form-label" id="religion-text" for="religion">Religion</label>
            <input type="text" class="form-control" name="religion" id="religion" placeholder="Enter religion" value="<?php echo $religion; ?>" required>

            <label class="col-sm-3 col-form-label" id="occupation-text" for="occupation">Occupation</label>
            <input type="text" class="form-control" name="occupation" id="occupation" placeholder="Enter occupation" value="<?php echo $occupation; ?>" required>

            <label class="col-sm-3 col-form-label" id="contact-number-general-text" for="contact_number_general">Contact Number</label>
            <input type="number" class="form-control" name="contact_number_general" id="contact-number-general" placeholder="Enter contact number" value="<?php echo $contact_number_general; ?>" required>

            <label class="col-sm-3 col-form-label" id="pwd-text" for="pwd">PWD</label>
            <select class="form-control" name="pwd" id="pwd" required>
                <option value="Yes" <?php if ($pwd) echo "selected"; ?>>Yes</option>
                <option value="No" <?php if (!$pwd) echo "selected"; ?>>No</option>
                
            </select>

            <label class="col-sm-3 col-form-label" id="pwd-id-no-text" for="pwd_id_no">PWD ID Number</label>
            <input type="number" class="form-control" name="pwd_id_no" id="pwd-id-no" placeholder="Enter PWD ID number" value="<?php echo $pwd_id_no; ?>">

            <label class="col-sm-3 col-form-label" id="single-parent-text" for="single_parent">Single Parent</label>
            <select class="form-control" name="single_parent" id="single-parent" required>
                <option value="Yes" <?php if ($single_parent) echo "selected"; ?>>Yes</option>
                <option value="No" <?php if (!$single_parent) echo "selected"; ?>>No</option>
                
            </select>

            <label class="col-sm-3 col-form-label" id="house-number-text" for="house_number">House Number</label>
            <input type="number" class="form-control" name="house_number" id="house-number" placeholder="Enter house number" value="<?php echo $house_number; ?>" required>

            <label class="col-sm-3 col-form-label" id="subdivision-text" for="subdivision">Subdivision</label>
            <select class="form-control" name="subdivision" id="subdivision" required>
                
                <option value="Toclong Proper" <?php if ($subdivision == 'Toclong Proper') echo "selected"; ?>>Toclong Proper</option>
                <option value="Acacia" <?php if ($subdivision == "Acacia") echo "selected"; ?>>Acacia</option>
                <optgroup label="Boston Heights">
                    <option value="Boston Heights - Phase 1" <?php if ($subdivision == "Boston Heights - Phase 1") echo "selected"; ?>>Phase 1</option>
                    <option value="Boston Heights - Phase 2" <?php if ($subdivision == "Boston Heights - Phase 2") echo "selected"; ?>>Phase 2</option>
                    <option value="Boston Heights - Phase 3" <?php if ($subdivision == "Boston Heights - Phase 3") echo "selected"; ?>>Phase 3</option>
                    <option value="Boston Heights - Phase 4" <?php if ($subdivision == "Boston Heights - Phase 4") echo "selected"; ?>>Phase 4</option>
                </optgroup>

                <optgroup label="Estrella Homes 4">
                    <option value="Estrella Homes 4 - Phase 1" <?php if ($subdivision == "Estrella Homes 4 - Phase 1") echo "selected"; ?>>Phase 1</option>
                    <option value="Estrella Homes 4 - Phase 2" <?php if ($subdivision == "Estrella Homes 4 - Phase 2") echo "selected"; ?>>Phase 2</option>
                </optgroup>

                <option value="Joshua Village" <?php if ($subdivision == "Joshua Village") echo "selected"; ?>>Joshua Village</option>
                <option value="Kalayaan Homes" <?php if ($subdivision == "Kalayaan Homes") echo "selected"; ?>>Kalayaan Homes</option>
                <option value="Lakersfield" <?php if ($subdivision == "Lakersfield") echo "selected"; ?>>Lakersfield</option>
                <option value="Malvar Subdivision" <?php if ($subdivision == "Malvar Subdivision") echo "selected"; ?>>Malvar Subdivision</option>
                <option value="Philhomes Ville" <?php if ($subdivision == "Philhomes Ville") echo "selected"; ?>>Philhomes Ville</option>
                <option value="Pinagkaisa Village" <?php if ($subdivision == "Pinagkaisa Village") echo "selected"; ?>>Pinagkaisa Village</option>
                <option value="Pinagkaloob" <?php if ($subdivision == "Pinagkaloob") echo "selected"; ?>>Pinagkaloob</option>
                <option value="Rockwell" <?php if ($subdivision == "Rockwell") echo "selected"; ?>>Rockwell</option>
                <option disabled hidden selected>Select Subdivision</option>    
            </select>
            <label class="col-sm-3 col-form-label" id="street-text" for="street">Street</label>
            <input type="text" class="form-control" name="street" id="street" placeholder="Enter street" value="<?php echo $street; ?>" required>

            <label class="col-sm-3 col-form-label" id="registered-voter-text" for="registered_voter">Registered Voter</label>
            <select class="form-control" name="registered_voter" id="registered-voter" required>
                <option value="Yes" <?php if ($registered_voter) echo "selected"; ?>>Yes</option>
                <option value="No" <?php if (!$registered_voter) echo "selected"; ?>>No</option>
                
            </select>

            <label class="col-sm-3 col-form-label" id="voter-s-id-number-text" for="voter_s_id_number">Voter's ID Number</label>
            <input type="number" class="form-control" name="voter_s_id_number" id="voter-s-id-number" placeholder="Enter voter's ID number" value="<?php echo $voter_s_id_number; ?>">

            <label class="col-sm-3 col-form-label" id="tin-number-text" for="tin_number">TIN Number</label>
            <input type="number" class="form-control" name="tin_number" id="tin-number" placeholder="Enter TIN number" value="<?php echo $tin_number; ?>">

            <label class="col-sm-3 col-form-label" id="national-id-number-text" for="national_id_number">National ID Number</label>
            <input type="number" class="form-control" name="national_id_number" id="national-id-number" placeholder="Enter national ID number" value="<?php echo $national_id_number; ?>">

            <label class="col-sm-3 col-form-label" id="sss-number-text" for="sss_number">SSS Number</label>
            <input type="number" class="form-control" name="sss_number" id="sss-number" placeholder="Enter SSS number" value="<?php echo $sss_number; ?>">

            <label class="col-sm-3 col-form-label" id="philhealth-no-text" for="philhealth_no">PhilHealth Number</label>
            <input type="number" class="form-control" name="philhealth_no" id="philhealth-no" placeholder="Enter PhilHealth number" value="<?php echo $philhealth_no; ?>">

            <label class="col-sm-3 col-form-label" for="pagibig_no" id="pagibig-no-text">Pag-IBIG Number</label>
            <input type="number" class="form-control" name="pagibig_no" id="pagibig-no" placeholder="Enter Pag-IBIG number" value="<?php echo $pagibig_no; ?>">

            <label class="col-sm-3 col-form-label" for="vaccinated" id="vaccinated-text">Vaccinated</label>
            <select class="form-control" name="vaccinated" id="vaccinated" required>
                <option value="Yes" <?php if ($vaccinated) echo "selected"; ?>>Yes</option>
                <option value="No" <?php if (!$vaccinated) echo "selected"; ?>>No</option>
                
            </select>

            <?php 
            if (!empty($successMessage)) {
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-3 d-grid'>
                        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' arial-label='Close'></button>
                        </div>
                    </div>
                </div>    
                ";
            }

            ?>
            <button type="submit" class="btn btn-primary" id="submit-button">Submit</button>
            <a class="btn btn-outline-primary" href="/accounts/index.php" role="button" id="cancel-button"> Cancel </a>  
        </form>
    </div>
</body>
</html>