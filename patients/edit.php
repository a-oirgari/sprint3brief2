<?php
require_once "../config/db.php";

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM patients WHERE patient_id = $id");
$patient = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $first = $_POST['first_name'];
    $last  = $_POST['last_name'];
    $email = $_POST['email'];

    mysqli_query(
        $conn,
        "UPDATE patients 
         SET first_name='$first', last_name='$last', email='$email'
         WHERE patient_id=$id"
    );

    header("Location: index.php");
    exit;
}

include "../includes/header.php";
?>

<h2 class="text-xl font-bold mb-4">Edit Patient</h2>

<form method="POST" class="bg-white p-6 rounded shadow space-y-4 max-w-md">
    <input
        name="first_name"
        value="<?= $patient['first_name'] ?>"
        class="w-full border p-2"
        required
    >

    <input
        name="last_name"
        value="<?= $patient['last_name'] ?>"
        class="w-full border p-2"
        required
    >

    <input
        name="email"
        value="<?= $patient['email'] ?>"
        class="w-full border p-2"
        required
    >

    <div class="flex gap-4">
        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Update
        </button>
        <a href="index.php" class="px-4 py-2 border rounded">
            Cancel
        </a>
    </div>
</form>

<?php include "../includes/footer.php"; ?>
