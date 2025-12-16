<?php
require_once "../config/db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $first = $_POST['first_name'];
    $last = $_POST['last_name'];
    $email = $_POST['email'];

    mysqli_query($conn, "INSERT INTO patients (first_name, last_name, email) VALUES ('$first','$last','$email')");
    header("Location: index.php");
}
include "../includes/header.php";
?>
<div class="flex items-center flex-col justify-center">
    <h2 class="text-3xl font-bold mt-16 mb-12">Add Patient</h2>

    <form method="POST" class="bg-white p-6 rounded-2xl shadow py-12 space-y-4">
        <input name="first_name" placeholder="First name" class="w-full border p-2">
        <input name="last_name" placeholder="Last name" class="w-full border p-2">
        <input name="email" placeholder="Email" class="w-full border p-2">
        <button class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
    </form>
</div>


<?php include "../includes/footer.php"; ?>
