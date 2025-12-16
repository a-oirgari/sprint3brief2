<?php
require_once "../config/db.php";
include "../includes/header.php";

$result = mysqli_query($conn, "SELECT * FROM patients");
?>

<div class="flex min-h-screen">

    <aside class="w-64 bg-blue-600 text-white p-6">
        <h1 class="text-xl font-bold mb-8">Unity Care Clinic</h1>

        <nav class="space-y-4">
            <a href="../dashboard.php" class="block hover:text-gray-200">Dashboard</a>
            <a href="index.php" class="block font-semibold hover:text-gray-200">Patients</a>
            <a href="../doctors/index.php" class="block hover:text-gray-200">Doctors</a>
            <a href="../departments/index.php" class="block hover:text-gray-200">Departments</a>
        </nav>
    </aside>

    <main class="flex-1 bg-gray-100 p-6">

        <h2 class="text-2xl font-bold mb-4">Patients</h2>

        <a href="create.php" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
            Add Patient
        </a>

        <div class="bg-white rounded shadow overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="p-3">Name</th>
                        <th class="p-3">Email</th>
                        <th class="p-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($patient = mysqli_fetch_assoc($result)) : ?>
                        <tr class="border-t">
                            <td class="p-3">
                                <?= htmlspecialchars($patient['first_name'] . " " . $patient['last_name']) ?>
                            </td>
                            <td class="p-3"><?= htmlspecialchars($patient['email']) ?></td>
                            <td class="p-3 text-center">
                                <a href="edit.php?id=<?= $patient['patient_id'] ?>" class="text-blue-600 mr-3">Edit</a>
                                <a href="delete.php?id=<?= $patient['patient_id'] ?>" class="text-red-600"
                                   onclick="return confirm('Delete this patient?')">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

    </main>
</div>

<?php include "../includes/footer.php"; ?>
