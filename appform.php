<?php
error_reporting(E_ALL);
// Database connection
$servername = "localhost";
$username = "project";
$password = "11671Bahati";
$dbname = "phpcomments";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $appName = $_POST['appName'];
    $appFileName = $_FILES['appFile']['name'];
    $appFileTmpName = $_FILES['appFile']['tmp_name'];
    $appFileSize = $_FILES['appFile']['size'];
    $appFileType = $_FILES['appFile']['type'];

    // Move uploaded file to a permanent location
    $targetDir = "uploads/";
    $targetFilePath = $targetDir . basename($appFileName);

    // Check if target directory exists, if not create it
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    // Move uploaded file to target location
    if (!move_uploaded_file($appFileTmpName, $targetFilePath)) {
        echo "Error uploading file.";
        exit;
    }

    $sql = "INSERT INTO android_apps (app_name, file_name, file_path, file_size, file_type) VALUES ('$appName', '$appFileName', '$targetFilePath', '$appFileSize', '$appFileType')";

    if ($conn->query($sql) === TRUE) {
        echo "Application submitted successfully.";
        try {
            $command = "sudo caasap --apk={$targetFilePath}";
            exec($command, $output, $return_var);
            if ($return_var == 0) {
                header("location: /appform.html?success=appcanbereversed");
            } else {
                echo "error : failed to execute {$command}, code: {$return_var}, output: " . implode("\n", $output);
            }
        } catch (\Throwable $th) {
            echo ("error: {$th}");
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Form not submitted.";
}

$conn->close();
