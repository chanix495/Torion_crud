<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}

$id = $_GET['id'];

$sql = "DELETE FROM posts WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Post deleted successfully!'); window.location.href='dashboard.php';</script>";
} else {
    echo "<script>alert('Error deleting post!');</script>";
}
?>
