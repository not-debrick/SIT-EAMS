<!DOCTYPE html>
<html>

<head>
    <title>Student Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="m-3 col d-flex justify-content-center">
        <p class="display-2 text-center text-wrap col-8"> Events Student Attendance Monitoring System </p>
    </div>
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
                  include 'table_query.php';
               ?>
        </div>
    </div>
    <div class="container justify-content-end">
        <button class="btn btn-primary" onclick="window.location.href='admin.php'">Navigate</button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>