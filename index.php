<?php
    include (__DIR__ . '/CONSTANTS/header.php');
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
            <?php
                    $tableMain = "tbl_attendance"; // change name for a different table (only used for testing)

                    $query = "
                    SELECT * FROM ". $tableMain . " INNER JOIN tbl_studinfo ON " .$tableMain.".idNum = tbl_studinfo.id INNER JOIN tbl_events_list ON " .$tableMain.".eventId = tbl_events_list.id ORDER BY " .$tableMain.".id DESC LIMIT 5
                    ";
                    include 'table_query.php';
               ?>
        </div>
    </div>
    <div class="container justify-content-end d-flex">
        <button class="btn btn-primary col-3 m-3" onclick="window.location.href='admin.php'">Admin</button>
    </div>
<?php 
    include (__DIR__ . '/CONSTANTS/footer.php');
?>
