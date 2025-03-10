<div class="container p-3">
    <form method="post" class="d-flex">
            <div class="input-group m-2">
                <span class="input-group-text" id="basic-addon1">Course</span>
                <input type="text" class="form-control" placeholder="BSIT" name="course">
            </div>
            <select class="form-select form-select-md m-2" name="eventId">
                <option value=0>Select Event</option>
                <?php include 'events_query.php'; ?>
            </select>
            <button type="submit" class="btn btn-primary m-2" name="search">Search</button>
            <button type="submit" class="btn btn-secondary m-2" name="export">Export</button>
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

    if (isset($_POST['search'])) {
        $course = $_POST['course'];
        $event = $_POST['eventId'];
        $query = "SELECT sit_student_info.idNum, sit_student_info.lastName, sit_student_info.firstName, sit_student_info.course, sit_student_info.yearLevel, sit_event_list.eventsDesc, sit_attendance.timeIn 
                    FROM sit_attendance 
                    INNER JOIN sit_student_info ON sit_attendance.idNum = sit_student_info.id 
                    INNER JOIN sit_event_list ON sit_attendance.eventsId = sit_event_list.id 
                    ORDER BY sit_attendance.timeIn DESC;";
        if ($course != null) {
            if ($event > 0) {
                // Both filters have values
                $query = "SELECT sit_student_info.idNum, sit_student_info.lastName, sit_student_info.firstName, sit_student_info.course, sit_student_info.yearLevel, sit_event_list.eventsDesc, sit_attendance.timeIn
                            FROM sit_attendance 
                            INNER JOIN sit_student_info ON sit_attendance.idNum = sit_student_info.id 
                            INNER JOIN sit_event_list ON sit_attendance.eventsId = sit_event_list.id 
                            WHERE sit_student_info.course = '". $course ."' AND sit_attendance.eventsId = ". $event ."
                            ORDER BY sit_attendance.timeIn DESC;";

                            include_once 'table_query.php';
            } else {
                // Only Course
                $query = "SELECT sit_student_info.idNum, sit_student_info.lastName, sit_student_info.firstName, sit_student_info.course, sit_student_info.yearLevel, sit_event_list.eventsDesc, sit_attendance.timeIn
                            FROM sit_attendance 
                            INNER JOIN sit_student_info ON sit_attendance.idNum = sit_student_info.id 
                            INNER JOIN sit_event_list ON sit_attendance.eventsId = sit_event_list.id 
                            WHERE sit_student_info.course = '". $course ."'
                            ORDER BY sit_attendance.timeIn DESC;";

                            include_once 'table_query.php';
            }
        } else if ($event > 0) {
            $query = "SELECT sit_student_info.idNum, sit_student_info.lastName, sit_student_info.firstName, sit_student_info.course, sit_student_info.yearLevel, sit_event_list.eventsDesc, sit_attendance.timeIn
                            FROM sit_attendance 
                            INNER JOIN sit_student_info ON sit_attendance.idNum = sit_student_info.id 
                            INNER JOIN sit_event_list ON sit_attendance.eventsId = sit_event_list.id 
                            WHERE sit_attendance.eventsId = ". $event ."
                            ORDER BY sit_attendance.timeIn DESC;";

                            include_once 'table_query.php';
        } else {
            include_once 'table_query.php';
        }
    }
?>