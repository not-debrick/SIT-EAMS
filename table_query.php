<?php
// Database Credentials
$host = "localhost";
$dbName = "sit_student_ams";
$username = "root";
$password = "";
try {
    $con = new PDO(
        "mysql:host={$host};dbname={$dbName}",
        $username,
        $password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    
    
    $stmt = $con->prepare($query);
    $stmt->execute();
    
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if ($rows) {
        echo "<table class='table table-striped'>";
        echo "<thead><tr><th>ID Number</th><th>Name</th><th>Course</th><th>Year Level</th><th>Event</th></tr></thead>";
        echo "<tbody>";
        foreach ($rows as $row) {
            echo "<tr class = 'text-uppercase'>";
            echo "<td class = 'text-uppercase'>" . htmlspecialchars($row['idNum']) . "</td>";
            echo "<td class = 'text-uppercase'>" . htmlspecialchars($row['lastName']) . ", " . htmlspecialchars($row['firstName']) ."</td>";
            echo "<td class = 'text-uppercase'>" . htmlspecialchars($row['course']) . "</td>";
            echo "<td class = 'text-uppercase'>" . htmlspecialchars($row['yearLevel']) . "</td>";
            echo "<td class = 'text-uppercase'>" . htmlspecialchars($row['eventName']) . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>