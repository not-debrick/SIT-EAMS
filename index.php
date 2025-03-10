<?php
    include (__DIR__ . '/CONSTANTS/header.php');
    include (__DIR__ . '/CONSTANTS/navigation.php');
?>
    <div class="container d-flex flex-row">
        <div class="d-flex col-4 p-3">
            <div class="d-flex flex-column col">
                <form method="post" class="col p-0 pt-4">
                  <!-- Input/Search -->
                    <div class="input-group mb-3">
                        <input type="text" name="studentID" class="form-control" placeholder="Student ID Number" />
                        <button class="btn btn-outline-secondary" type="submit" name="register">Register</button>
                    </div>
                    <!-- Dropdown -->
                        <select class="form-select form-select-md mb-3" aria-label="Large select example" name="eventId">
                           <option value=0>Select Event</option>
                           <?php include 'events_query.php'; ?>
                        </select>
                </form>
                <div class="col">
                    <?php 
                        include 'query.php';
                     ?>
                </div>
            </div>
        </div>
        <div class="col p-3">
            <p class="display-6">Registered Students</p>
            <div id="emailHelp" class="form-text">Five (5) most recent entries.</div>
            <?php
                    $tableMain = "sit_attendance"; // change name for a different table (only used for testing)

                    $query = "
                        SELECT * FROM sit_attendance inner join sit_student_info on sit_attendance.idNum = sit_student_info.id inner join sit_event_list on sit_attendance.eventsId = sit_event_list.id order by sit_attendance.id desc limit 5
                    ";
                    include 'table_query.php';
               ?>
        </div>
    </div>
<?php 
    include (__DIR__ . '/CONSTANTS/footer.php');
?>
