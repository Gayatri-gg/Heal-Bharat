<?php
// Connect to the database
$host = 'localhost';
$dbname = 'doctor_appointments';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Execute the count query
    $stmt = $pdo->query("SELECT COUNT(*) FROM doctors");
    $tableCount = $stmt->fetchColumn();

    // Check if table is empty
    if ($tableCount > 0) {
        // Redirect to another page
        header("Location: dash_count.php");
        exit();
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>