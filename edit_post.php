<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}

$id = $_GET['id'];
$post = $conn->query("SELECT * FROM posts WHERE id = $id")->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "UPDATE posts SET title='$title', content='$content' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Post updated successfully!'); window.location.href='dashboard.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Post</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container">
    <div class="card shadow p-4 mt-5">
        <h2 class="text-center">Edit Blog Post</h2>
        <form method="POST">
            <input type="text" name="title" class="form-control mt-2" value="<?php echo $post['title']; ?>" required>
            <textarea name="content" class="form-control mt-2" rows="5" required><?php echo $post['content']; ?></textarea>
            <button type="submit" class="btn btn-primary w-100 mt-3">Update Post</button>
        </form>
    </div>
</body>
</html>
