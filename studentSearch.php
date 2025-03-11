<div class="container p-3">
    <form method="post" class="d-flex">
            <div class="input-group m-2">
                <span class="input-group-text" id="basic-addon1">Course</span>
                <input type="text" class="form-control" placeholder="BSIT" name="course">
            </div>
            <div class="input-group m-2">
                <span class="input-group-text" id="basic-addon1">Last Name</span>
                <input type="text" class="form-control" placeholder="DELA CRUZ" name="lastName">
            </div>
            <button type="submit" class="btn btn-primary m-2" name="studentSearch">Search</button>
    </form>
</div>

<?php 
    include (__DIR__ . '/CONSTANTS/dbConnection.php');

    try {
        $con = new PDO($dsn, $username, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Recommended
    } catch (PDOException $e) {
        echo "<script> alert('Connection failed:') </script>" . $e->getMessage();
        exit; // Stop execution if connection fails
    }

    if (isset($_POST['studentSearch'])) {
        $course = $_POST['course'];
        $lastName = $_POST['lastName'];
        $query = "SELECT * FROM sit_student_info;";
        if ($course != null) {
            if ($lastName != null) {
                // Both filters have values
                $query = "SELECT * FROM sit_student_info WHERE course ='" .$course."' AND lastName LIKE '%" .$lastName. "%' ORDER BY lastName ASC";

                            include_once 'student_tableQuery.php';
            } else {
                // Only Course
                $query = "SELECT * FROM sit_student_info WHERE course ='" .$course."' ORDER BY lastName ASC";

                            include_once 'student_tableQuery.php';
            }
        } else if ($lastName != null) {
            // Only Last Name
            $query = "SELECT * FROM sit_student_info WHERE lastName LIKE '%" .$lastName. "%' ORDER BY lastName ASC";

                            include_once 'student_tableQuery.php';
        } else {
            echo "<script> alert('Please enter search criteria') </script>";
        }
    }
?>