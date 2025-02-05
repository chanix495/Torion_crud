<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Post added successfully!'); window.location.href='dashboard.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Post</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .container { max-width: 600px; margin-top: 50px; }
    </style>
</head>
<body class="container">
    <div class="card shadow p-4">
        <h2 class="text-center">Add Blog Post</h2>
        <form method="POST">
            <input type="text" name="title" class="form-control mt-2" placeholder="Title" required>
            <textarea name="content" class="form-control mt-2" placeholder="Content" rows="5" required></textarea>
            <button type="submit" class="btn btn-success w-100 mt-3">Publish</button>
        </form>
    </div>
</body>
</html>
