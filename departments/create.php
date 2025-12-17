<?php
require_once "../config/db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['department_name'];
    $location = $_POST['location'];

    mysqli_query(
        $conn,
        "INSERT INTO departments (department_name, location)
         VALUES ('$name', '$location')"
    );

    header("Location: index.php");
    exit;
}

include "../includes/header.php";
?>

<div class="flex items-center flex-col justify-center">
    <h2 class="text-3xl font-bold mt-16 mb-12">Add Department</h2>
    <form method="POST" class="bg-white p-6 rounded-2xl shadow max-w-md py-12 space-y-4">
        <input
            name="department_name"
            placeholder="Department name"
            class="w-full border p-2"
            required
        >

        <input
            name="location"
            placeholder="Location"
            class="w-full border p-2"
            required
        >

        <button class="bg-[#023047] text-white px-4 py-2 rounded">
            Save
        </button>
    </form>
</div>

<?php include "../includes/footer.php"; ?>
