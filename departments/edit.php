<?php
require_once "../config/db.php";

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM departments WHERE department_id = $id");
$department = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['department_name'];
    $location = $_POST['location'];

    mysqli_query(
        $conn,
        "UPDATE departments
         SET department_name='$name', location='$location'
         WHERE department_id=$id"
    );

    header("Location: index.php");
    exit;
}

include "../includes/header.php";
?>
<div class="flex items-center flex-col justify-center">
    <h2 class="text-3xl font-bold mt-16 mb-12">Edit Department</h2>
    <form method="POST" class="bg-white p-6 rounded-2xl shadow py-10 max-w-md space-y-4">
        <input
            name="department_name"
            value="<?= $department['department_name'] ?>"
            class="w-full border p-2 mb-2"
            required
        >

        <input
            name="location"
            value="<?= $department['location'] ?>"
            class="w-full border p-2 mb-2"
            required
        >

        <div class="flex gap-4">
            <button class="bg-[#023047] text-white px-4 py-2 rounded mt-2">
                Update
            </button>
            <a href="index.php" class="border px-4 py-2 rounded mt-2">
                Cancel
            </a>
        </div>
    </form>
</div>

<?php include "../includes/footer.php"; ?>
