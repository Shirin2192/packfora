<?php
include 'db_connect.php'; // connect to DB

$slug = $_GET['slug'] ?? '';

// Check in blog table first
$stmt = $conn->prepare("SELECT * FROM tbl_blogs WHERE slug = ? AND is_active = 1 AND is_delete = 1 LIMIT 1");
$stmt->bind_param("s", $slug);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // It's a blog
    $_GET['slug'] = $slug;
    include 'blog2.php';
    exit;
}

// Check in case study table
$stmt = $conn->prepare("SELECT * FROM tbl_case_study WHERE slug_url = ? AND is_active = 1 AND is_delete = 1 LIMIT 1");
$stmt->bind_param("s", $slug);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // It's a case study
    $_GET['slug'] = $slug;
    include 'case-study-inner.php';
    exit;
}

// Not found
http_response_code(404);
echo "404 - Page Not Found";
