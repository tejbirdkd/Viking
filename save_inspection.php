<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json'); // Force JSON output

include('connect.php');

$user_id = $_SESSION['user_id'];
$formId =  $_SESSION['formid']; 


// Check if user already has a tower_inspection record
$checkQuery = "SELECT id FROM tower_inspection WHERE user_id = '$user_id' AND id = '$formId' LIMIT 1";
// echo  $checkQuery; die;
$result = $conn->query($checkQuery);

if ($result && $result->num_rows > 0) {
    // Record exists, get its ID and update from_type
    $row = $result->fetch_assoc();
    $inspection_id = $row['id'];

    $updateQuery = "UPDATE tower_inspection SET form_type = 'public' WHERE id = '$inspection_id'";
    $conn->query($updateQuery); // Optional: Check result if needed

    $encoded_id = base64_encode($inspection_id);

    echo json_encode([
        "status" => "success",
        "message" => "Existing record updated successfully!",
        "redirect" => "print/print.php?id=" . $encoded_id
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "No tower_inspection record found for this user!"
    ]);
}
exit; // Prevent extra output
?>
