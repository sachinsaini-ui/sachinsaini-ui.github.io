<?php
header('Content-Type: application/json');

$targetDir = "uploads/";
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0777, true);
}

$targetFile = $targetDir . basename($_FILES["image"]["name"]);
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
$check = getimagesize($_FILES["image"]["tmp_name"]);
if($check !== false) {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        $response = array(
            "success" => true,
            "url" => "http://rahultech.me/" . $targetFile
        );
    } else {
        $response = array(
            "success" => false,
            "message" => "Sorry, there was an error uploading your file."
        );
    }
} else {
    $response = array(
        "success" => false,
        "message" => "File is not an image."
    );
}

echo json_encode($response);
?>
