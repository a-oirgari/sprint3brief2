<?php
require_once "../config/db.php";

/* Insertion */
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $first = $_POST['first_name'];
    $last  = $_POST['last_name'];
    $spec  = $_POST['specialization'];
    $dep   = $_POST['department_id'];

    mysqli_query(
        $conn,
        "INSERT INTO doctors (first_name, last_name, specialization, department_id)
         VALUES ('$first', '$last', '$spec', '$dep')"
    );

    header("Location: index.php");
    exit;
}

/* ✅ Departments UNIQUE by name */
$departments = mysqli_query(
    $conn,
    "SELECT MIN(department_id) AS department_id, department_name
     FROM departments
     GROUP BY department_name
     ORDER BY department_name"
);

include "../includes/header.php";
?>

<div class="flex items-center flex-col justify-center">
    <h2 class="text-3xl font-bold mt-16 mb-12">Add Doctor</h2>

    <form method="POST" class="bg-white p-6 rounded-2xl shadow max-w-md py-12 space-y-4">

        <input
            name="first_name"
            placeholder="First name"
            class="w-full border p-2"
            required
        >

        <input
            name="last_name"
            placeholder="Last name"
            class="w-full border p-2"
            required
        >

        <input
            name="specialization"
            placeholder="Specialization"
            class="w-full border p-2"
            required
        >

        <select name="department_id" class="w-full border p-2" required>
            <option value="">Select department</option>
            <?php while ($d = mysqli_fetch_assoc($departments)) : ?>
                <option value="<?= $d['department_id'] ?>">
                    <?= htmlspecialchars($d['department_name']) ?>
                </option>
            <?php endwhile; ?>
        </select>

        <button class="bg-[#023047] text-white px-4 py-2 rounded">
            Save
        </button>
    </form>
</div>

<?php include "../includes/footer.php"; ?>
