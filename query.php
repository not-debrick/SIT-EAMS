<?php
/* // Database Credentials
$host = "localhost";
$dbName = "sit_eams";
$username = "root";
$password = "";
$dsn = "mysql:host=$host;dbname=$dbName;"; */
    include (__DIR__ . '/CONSTANTS/dbConnection.php');

// Database Connection
try {
    $con = new PDO($dsn, $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Recommended
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit; // Stop execution if connection fails
}

// Check if the register button was clicked
if (isset($_POST['register'])) {
   $studentId = $_POST['studentID'];
   $eventId = $_POST['eventId'];
    // Select Query
    $query = "SELECT * FROM sit_student_info WHERE idNum=$studentId";
    if ($studentId != "") {
        if ($eventId != 0) {
            try {
                // Prepare Query
                $stmt = $con->prepare($query);
        
                // Execute Query
                $stmt->execute();
        
                // Store Retrieved Row
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
              
                // Show data to user
                if ($row) {
                 // Initializing data to another variable
                 $fetched_id = $row['id'];
                 $fetched_idNum = $row['idNum'];
                 $fetched_lastName = $row['lastName'];
                 $fetched_firstName = $row['firstName'];
                 $fetched_course = $row['course'];
                 $fetched_yearLevel = $row['yearLevel'];
        
                 $timezone = new DateTimeZone('Asia/Manila');
                 $datetime = new DateTime('now', $timezone);
                 $timeStamp = $datetime->format('Y-m-d H:i:s');
        
                 // Display student info (to do: parameterized)
                 echo "<div> ID Number: " . $fetched_idNum . "</div>";
                 echo "<div> Name: " . $fetched_lastName . ", " . $fetched_firstName . "</div>";
                 echo "<div> Course: " . $fetched_course . "</div>";
                 echo "<div> Year Level: " . $fetched_yearLevel . "</div>";
                 //Insert to new table
                 $insert_query = "INSERT INTO sit_attendance (idNum, timeIn, eventsId) VALUES (?, ?, ?)";
                 $insert_stmt = $con->prepare($insert_query);
                 $insert_stmt->execute([$fetched_id, $timeStamp, $eventId]);
                } else {
                    echo "<div> No student data found.</div>";
                }
            } catch (PDOException $e) {
                echo "Query failed: " . $e->getMessage();
            }
        } else {
            echo "<div> Please select an event. </div>";
        }        
    } else {
        echo "<div> Student ID number is empty. </div>";
    }
    
}
?>