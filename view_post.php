<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}

if (!isset($_GET['id'])) {
    echo "<script>alert('Invalid post!'); window.location.href='dashboard.php';</script>";
    exit();
}

$id = $_GET['id'];
$post = $conn->query("SELECT * FROM posts WHERE id = $id")->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $post['title']; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container">
    <div class="card shadow p-4 mt-5">
        <h2 class="text-center"><?php echo $post['title']; ?></h2>
        <p><?php echo nl2br($post['content']); ?></p>
        <a href="dashboard.php" class="btn btn-secondary">🔙 Back to Dashboard</a>
    </div>
</body>
</html>
