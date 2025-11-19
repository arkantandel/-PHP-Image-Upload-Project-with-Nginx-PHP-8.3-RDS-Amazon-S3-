<?php
require 'vendor/autoload.php';

use Aws\S3\S3Client;

// AWS S3 settings
$bucket = "YOUR_S3_BUCKET_NAME";
$region = "YOUR_BUCKET_REGION"; // e.g., ap-south-1

// RDS MySQL settings
$db_host = "YOUR_RDS_ENDPOINT";
$db_name = "upload_db";
$db_user = "YOUR_DB_USERNAME";
$db_pass = "YOUR_DB_PASSWORD";

// Database Connection
$pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

if (!isset($_FILES['image'])) {
    die("No file selected");
}

$file = $_FILES['image'];
$tmp = $file['tmp_name'];
$name = $file['name'];
$mime = mime_content_type($tmp);
$size = $file['size'];

// Unique file name
$unique = uniqid() . "-" . basename($name);

// Upload to S3
$s3 = new S3Client([
    'version' => 'latest',
    'region'  => $region,
]);

$upload = $s3->putObject([
    'Bucket' => $bucket,
    'Key'    => $unique,
    'SourceFile' => $tmp,
    'ACL'    => 'public-read'
]);

$s3_url = $upload['ObjectURL'];

// Insert record into DB
$insert = $pdo->prepare(
    "INSERT INTO images (file_name, s3_url, mime_type, file_size) VALUES (?, ?, ?, ?)"
);
$insert->execute([$name, $s3_url, $mime, $size]);

echo "Upload Successful!<br>";
echo "Image URL: <a href='$s3_url' target='_blank'>$s3_url</a>";
?>
