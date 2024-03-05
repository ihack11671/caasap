<?php
// function to check if any input fields are empty
function emptyInputSignup($c_name, $c_location, $crn_brn_no, $c_email, $password, $password2)
{
    if (empty($c_name) || empty($c_location) || empty($crn_brn_no) || empty($c_email) || empty($password) || empty($password2)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// function to check if parent already exists in the database
function corporateExists($conn, $crn_brn_no, $c_email)
{
    $sql = "SELECT * FROM corporates WHERE crn_brn_no = ? OR c_email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: /signup.php?error=corporateExists");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $crn_brn_no, $c_email);
    mysqli_stmt_execute($stmt);

    $checkResults = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($checkResults)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

// function to create a new user record in the database
function createCorporate($conn, $c_name, $c_location, $crn_brn_no, $c_email, $password)
{
    $sql = "INSERT INTO corporates (c_name, c_location, crn_brn_no, c_email, password) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: /index.php?error=stmtfailed");
        exit();
    }

    $hashedPass = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssss", $c_name, $c_location, $crn_brn_no, $c_email, $hashedPass);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    header("location: /index.php?success=corporateCreatedSuccessfully");
    exit();
}


// function to check if any input fields are empty
function emptyInputLogin($crn_brn_no, $password)
{
    if (empty($crn_brn_no) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}


// function to log in a parent
function loginCorporate($conn, $crn_brn_no, $password)
{
    $corporateExists = corporateExists($conn, $crn_brn_no, $crn_brn_no);

    if ($corporateExists === false) {
        header("location: /index.php?error=doesNotExist");
        exit();
    }

    $hashedPass = $corporateExists["password"];
    $checkPassword = password_verify($password, $hashedPass);

    if ($checkPassword === false) {
        header("location: /index.php?error=wronglogin");
        exit();
    } else if ($checkPassword === true) {
        session_start();
        $_SESSION['corporateId'] = $corporateExists["id"];
        $_SESSION['corporateCrnBrnNo'] = $corporateExists["crn_brn_no"];
        header("location: /index.php?success=loginSuccessful");
        exit();
    }
}
