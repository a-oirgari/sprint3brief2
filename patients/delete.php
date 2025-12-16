<?php
require_once "../config/db.php";

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM patients WHERE patient_id = $id");

header("Location: index.php");
exit;





