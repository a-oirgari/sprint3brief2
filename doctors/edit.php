<?php
require_once "../config/db.php";

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

$doctor = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT * FROM doctors WHERE doctor_id = $id")
);

$departments = mysqli_query($conn, "SELECT * FROM departments");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $first = $_POST['first_name'];
    $last  = $_POST['last_name'];
    $spec  = $_POST['specialization'];
    $dep   = $_POST['department_id'];

    mysqli_query(
        $conn,
        "UPDATE doctors
         SET first_name='$first',
             last_name='$last',
             specialization='$spec',
             department_id='$dep'
         WHERE doctor_id=$id"
    );

    header("Location: index.php");
    exit;
}

include "../includes/header.php";
?>
<div class="flex items-center flex-col justify-center">
    <h2 class="text-3xl font-bold mt-16 mb-12">Edit Doctor</h2>
    <form method="POST" class="bg-white p-6 rounded-2xl shadow max-w-md py-10 space-y-4">

        <input name="first_name" value="<?= $doctor['first_name'] ?>" class="w-full border p-2 mb-2" required>
        <input name="last_name" value="<?= $doctor['last_name'] ?>" class="w-full border p-2 mb-2" required>
        <input name="specialization" value="<?= $doctor['specialization'] ?>" class="w-full border p-2 mb-2" required>

        <select name="department_id" class="w-full border p-2" required>
            <?php while ($d = mysqli_fetch_assoc($departments)) : ?>
                <option
                    value="<?= $d['department_id'] ?>"
                    <?= $d['department_id'] == $doctor['department_id'] ? "selected" : "" ?>
                >
                    <?= $d['department_name'] ?>
                </option>
            <?php endwhile; ?>
        </select>

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
