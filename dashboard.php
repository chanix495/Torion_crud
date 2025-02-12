<?php
session_start();
include 'db.php';


if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}


$sql = "SELECT * FROM posts ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .container { margin-top: 50px; }
        .card { margin-bottom: 20px; }
    </style>
</head>
<body class="container">
    <h2 class="text-center mb-4">Welcome, <?php echo $_SESSION['user']['username']; ?>!</h2>
    
    <div class="d-flex justify-content-between mb-4">
        <a href="add_post.php" class="btn btn-success">➕ Add Post</a>
        <a href="logout.php" class="btn btn-danger">🚪 Logout</a>
    </div>

    <h3 class="mb-3">Blog Posts</h3>
    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="card shadow">
            <div class="card-body">
                <h4 class="card-title"><?php echo $row['title']; ?></h4>
                <p class="card-text"><?php echo substr($row['content'], 0, 100); ?>...</p>
                
               
                <a href="view_post.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Read More</a>
                <a href="edit_post.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="delete_post.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this post?');">Delete</a>
            </div>
        </div>
    <?php endwhile; ?>
</body>
</html>
