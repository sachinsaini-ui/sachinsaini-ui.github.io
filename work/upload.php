
<?php
header('Content-Type: application/json');

// Set the upload directory
$uploadDir = 'uploads/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $file = $_FILES['image'];
    $uploadFilePath = $uploadDir . basename($file['name']);

    if (move_uploaded_file($file['tmp_name'], $uploadFilePath)) {
        $url = 'https://rahultech.me/work/' . $uploadFilePath;  // Adjust this URL based on your domain and path
        echo json_encode(['success' => true, 'url' => $url]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to move uploaded file.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'No file uploaded.']);
}
?>
