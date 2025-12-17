<?php
require_once "../config/db.php";
include "../includes/header.php";

$result = mysqli_query($conn, "SELECT * FROM patients");
?>

<div class="flex min-h-screen">

    <aside class="w-64 bg-cyan-600 text-white p-6">
        <h1 class="text-xl font-bold mb-8">Unity Care Clinic</h1>

        <nav class="space-y-4">
            <a href="../dashboard.php" class="block hover:text-gray-200"><i class="fa-solid fa-house"></i> Dashboard</a>
            <a href="index.php" class="block font-semibold hover:text-gray-200"><i class="fa-solid fa-user-injured"></i> Patients</a>
            <a href="../doctors/index.php" class="block hover:text-gray-200"><i class="fa-solid fa-user-doctor"></i> Doctors</a>
            <a href="../departments/index.php" class="block hover:text-gray-200"><i class="fa-sharp fa-solid fa-building"></i> Departments</a>
        </nav>
    </aside>

    
    <main class="flex-1 bg-gray-100 p-6">

        <h2 class="text-2xl font-bold mb-4">Patients</h2>

        <a href="create.php" class="bg-[#023047] text-white px-4 py-2 rounded mb-4 inline-block">
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
                            <td class="p-3 flex justify-evenly">
                                <a href="edit.php?id=<?= $patient['patient_id'] ?>">
                                    <svg class="w-6 h-6 text-[#ae2012] dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                    </svg>

                                </a>
                                <a href="delete.php?id=<?= $patient['patient_id'] ?>" 
                                   onclick="return confirm('Delete this patient?')">
                                    <svg class="w-6 h-6 text-[#ca6702] dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                    </svg>

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
