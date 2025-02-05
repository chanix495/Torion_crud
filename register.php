<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registration successful!'); window.location.href='login.php';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .container { max-width: 400px; margin-top: 50px; }
    </style>
</head>
<body>

<div class="container">
    <div class="card shadow p-4">
        <h2 class="text-center">Register</h2>
        <form method="POST">
            <input type="text" name="username" class="form-control mt-2" placeholder="Username" required>
            <input type="email" name="email" class="form-control mt-2" placeholder="Email" required>
            <input type="password" name="password" class="form-control mt-2" placeholder="Password" required>
            <button type="submit" class="btn btn-primary w-100 mt-3">Register</button>
            <p class="text-center mt-3">Already have an account? <a href="login.php">Login here</a></p>
        </form>
    </div>
</div>

</body>
</html>
