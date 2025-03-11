<?php
    include (__DIR__ . '/CONSTANTS/header.php');
    include (__DIR__ . '/CONSTANTS/navigation.php');
?>

    <div class="container">
        <form class="p-4" method="POST">
            <!-- ID NUMBER -->
            <div class="mb-3">
                <label for="lbl_StudentId" class="form-label">ID Number</label>
                <input type="text" class="form-control" id="inp_StudentId" name="idNum" placeholder="2025XXXX">
            </div>
            <!-- LAST NAME -->
            <div class="mb-3">
                <label for="lbl_LastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="inp_StudentId" name="lastName">
            </div>
            <!-- FIRST NAME -->
            <div class="mb-3">
                <label for="lbl_FirstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="inp_StudentId" name="firstName">
            </div>
            <!-- COURSE -->
            <div class="mb-3">
                <label for="lbl_Course" class="form-label">Course/Program</label>
                <input type="text" class="form-control" id="inp_StudentId" name="course">
            </div>
            <!-- YEAR LEVEL -->
            <div class="mb-3">
                <label for="lbl_YearLevel" class="form-label">Year Level</label>
                <input type="text" class="form-control" id="inp_StudentId" name="yearLevel">
            </div>
            <button type="submit" class="btn btn-primary" name="insertStudent">Submit</button>
        </form>
    </div>

    <?php
        include (__DIR__ . '/CONSTANTS/dbConnection.php');
        
        try {
            $con = new PDO($dsn, $username, $password);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Recommended
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            exit; // Stop execution if connection fails
        }
        // Variables
        if(isset($_POST['insertStudent'])) {
            $studentID = $_POST['idNum'];
            $studentLastName = $_POST['lastName'];
            $studentFirstName = $_POST['firstName'];
            $studentYearLevel = $_POST['yearLevel'];
            $studentCourse = $_POST['course'];

            if ($studentID != null && $studentLastName != null && $studentFirstName != null && $studentCourse != null && $studentYearLevel != null) {
                $query = "INSERT INTO sit_student_info (idNum, lastName, firstName, course, yearLevel) VALUES (?, ?, ?, ?, ?)";

                $stmt = $con->prepare($query);
                $stmt->execute([$studentID, $studentLastName, $studentFirstName, $studentCourse, $studentYearLevel]);

                echo "<script> alert('Added successfully.') </script>";
            
            } else {
                echo "<script> alert('not null') </script>";
            }
        }
    ?>
<?php 
    include (__DIR__ . '/CONSTANTS/footer.php');
?>