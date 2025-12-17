<?php
require_once "../config/db.php";

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $first  = trim($_POST['first_name'] ?? '');
    $last   = trim($_POST['last_name'] ?? '');
    $email  = trim($_POST['email'] ?? '');
    $gender = $_POST['gender'] ?? '';
    $dob    = $_POST['date_of_birth'] ?? '';
    $phone  = trim($_POST['phone_number'] ?? '');

    
    if ($first === '') {
        $errors[] = "First name is required.";
        
    }
    if ($last === '') {
        $errors[] = "Last name is required.";
    }
    if ($email === '') {
        $errors[] = "Email is required.";
    }
    if ($gender === '') {
        $errors[] = "Gender is required.";
    }
    if ($dob === '') {
        $errors[] = "Date of birth is required.";
    }
    if ($phone === '') {
    $errors[] = "Phone number is required.";
    } elseif (!preg_match('/^(06|07)[0-9]{8}$/', $phone)) {
        $errors[] = "Phone number must contain 10 digits and start with 06 or 07.";
    }


   
    if (empty($errors)) {
        $stmt = mysqli_prepare(
            $conn,
            "INSERT INTO patients 
            (first_name, last_name, email, gender, date_of_birth, phone_number)
            VALUES (?, ?, ?, ?, ?, ?)"
        );

        mysqli_stmt_bind_param(
            $stmt,
            "ssssss",
            $first,
            $last,
            $email,
            $gender,
            $dob,
            $phone
        );

        mysqli_stmt_execute($stmt);
        header("Location: index.php");
        exit;
    }
}

include "../includes/header.php";
?>

<div class="flex items-center flex-col justify-center">
    <h2 class="text-3xl font-bold mt-10 mb-10">Add Patient</h2>

    
        
       <?php if (!empty($errors)) : ?>
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4 w-full max-w-md">
                <ul class="list-disc list-inside">
                    <?php foreach ($errors as $error) : ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
       <?php endif; ?> 

        <form method="POST" class="bg-white p-6 rounded-2xl shadow py-12 space-y-4 w-full max-w-md">

            <input name="first_name" placeholder="First name"
                value="<?= htmlspecialchars($_POST['first_name'] ?? '') ?>"
                class="w-full border p-2 rounded">

            <input name="last_name" placeholder="Last name"
                value="<?= htmlspecialchars($_POST['last_name'] ?? '') ?>"
                class="w-full border p-2 rounded">

            <input name="email" type="email" placeholder="Email"
                value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                class="w-full border p-2 rounded">

            <select name="gender" class="w-full border p-2 rounded">
                <option value="">Select gender</option>
                <option value="Male"   <?= (($_POST['gender'] ?? '') === 'Male') ? 'selected' : '' ?>>Male</option>
                <option value="Female" <?= (($_POST['gender'] ?? '') === 'Female') ? 'selected' : '' ?>>Female</option>
            </select>

            <input name="date_of_birth" type="date"
                value="<?= htmlspecialchars($_POST['date_of_birth'] ?? '') ?>"
                class="w-full border p-2 rounded">

            <input name="phone_number" placeholder="Phone number"
                value="<?= htmlspecialchars($_POST['phone_number'] ?? '') ?>"
                class="w-full border p-2 rounded">

            <button class="bg-[#023047] text-white px-4 py-2 rounded w-full">
                Save
            </button>
        </form>
    

    
</div>

<?php include "../includes/footer.php"; ?>
