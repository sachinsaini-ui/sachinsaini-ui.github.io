<?php
$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$response = array();

// Check if file was uploaded without errors
if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
    $response['status'] = 'success';
    $response['fileName'] = $fileName;
} else {
    $response['status'] = 'error';
}

// Return response as JSON
echo json_encode($response);
?>
