<?php
// Database Credentials
$host = "localhost";
$dbName = "sit_student_ams";
$username = "root";
$password = "";
$dsn = "mysql:host=$host;dbname=$dbName;";

if(isset($_POST['eventId'])) {
    $selectedEventId = $_POST['eventId'];
}
try {
    $con = new PDO(
        "mysql:host={$host};dbname={$dbName}",
        $username,
        $password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    
    $query = "SELECT * FROM tbl_events_list;";

    $stmt = $con->prepare($query);
    $stmt->execute();
    
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Populate options
    foreach ($rows as $row) {
        $selected = ($selectedEventId == $row['id']) ? 'selected' : ''; // Check if it's the selected option
        echo '<option value=' . htmlspecialchars($row['id']) . '>' .
             htmlspecialchars($row['eventName']) . '</option>';
    }

} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>