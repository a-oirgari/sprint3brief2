<?php
require_once "config/db.php";
include "includes/header.php";


$patients = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM patients")
)['total'];

$doctors = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM doctors")
)['total'];

$departments = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM departments")
)['total'];
?>


<div class="flex min-h-screen">

    <aside class="w-64 bg-cyan-600 text-white p-6">
        <h1 class="text-xl font-bold mb-8">Unity Care Clinic</h1>

        <nav class="space-y-4">
            <a href="dashboard.php" class="block font-semibold hover:text-gray-200"><i class="fa-solid fa-house"></i> Dashboard</a>
            <a href="patients/index.php" class="block hover:text-gray-200"><i class="fa-solid fa-user-injured"></i> Patients</a>
            <a href="doctors/index.php" class="block hover:text-gray-200"><i class="fa-solid fa-user-doctor"></i> Doctors</a>
            <a href="departments/index.php" class="block hover:text-gray-200"><i class="fa-sharp fa-solid fa-building"></i> Departments</a>
        </nav>
    </aside>

    <main class="flex-1 bg-gray-1
    
    00 p-6">

        <h2 class="text-2xl font-bold mb-6">Dashboard</h2>

        <div class="grid grid-cols-3 gap-4 mb-6">
            <div class="bg-[#60a5fa] p-4 rounded shadow text-center">
                <p class="text-gray-800">Number Of Patients <i class="fa-solid fa-user-injured"></i></p>
                <p class="text-3xl font-bold"><?= $patients ?></p>
            </div>

            <div class="bg-[#34d399] p-4 rounded shadow text-center">
                <p class="text-gray-800">Number Of Doctors <i class="fa-solid fa-user-doctor"></i></p>
                <p class="text-3xl font-bold"><?= $doctors ?></p>
            </div>

            <div class="bg-[#fbbf24] p-4 rounded shadow text-center">
                <p class="text-gray-800">Number Of Departments <i class="fa-sharp fa-solid fa-building"></i></p>
                <p class="text-3xl font-bold"><?= $departments ?></p>
            </div>
        </div>

        <div class="bg-white p-4 rounded shadow h-auto">
            <canvas id="statsChart"></canvas>
        </div>

    </main>
</div>

<script>
const ctx = document.getElementById('statsChart');

new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Patients', 'Doctors', 'Departments'],
        datasets: [{
            data: [<?= $patients ?>, <?= $doctors ?>, <?= $departments ?>],
            backgroundColor: ['#60a5fa', '#34d399', '#fbbf24']
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false
    }
});
</script>

<?php include "includes/footer.php"; ?>
