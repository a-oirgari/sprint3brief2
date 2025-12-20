<?php
session_start();
require_once "config/db.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $result = mysqli_query(
        $conn,
        "SELECT * FROM users WHERE username = '$username'"
    );

    if ($user = mysqli_fetch_assoc($result)) {
        if ($password === $user['password']) {
            session_regenerate_id(true);
            
            
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Invalid password";
        }
    } else {
        $error = "User not found";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

<form method="POST" class="bg-white p-8 rounded-xl shadow w-96 space-y-4">
    <h2 class="text-2xl font-bold text-center">Login</h2>

    <?php if ($error): ?>
        <p class="text-red-500 text-sm"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <input name="username" placeholder="Username" class="w-full border p-2" required>
    <input type="password" name="password" placeholder="Password" class="w-full border p-2" required>

    <button class="w-full bg-[#023047] text-white py-2 rounded">
        Login
    </button>
</form>

</body>
</html>