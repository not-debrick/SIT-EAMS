<div class="container">
    <?php
        include (__DIR__ . '/CONSTANTS/header.php');
        include (__DIR__ . '/CONSTANTS/navigation.php');
        echo "<p class='display-4'> Students Attendance Search </p>";
        include 'searchExport.php';

        $query = "
            SELECT * FROM ". $tableMain . " INNER JOIN " . $tableStudentInfo . " ON " .$tableMain.".idNum = ". $tableStudentInfo .".id INNER JOIN " . $tableEventsList . " ON " .$tableMain.".eventsId = ". $tableEventsList .".id ORDER BY " .$tableMain.".id DESC ";
        
        /* include 'table_query.php'; */
    ?>
</div>

<div class="container">
    <?php
        echo "<p class='display-4'> Students Search </p>";
        include 'studentSearch.php';

        /* $query = "
            SELECT * FROM ". $tableMain . " INNER JOIN " . $tableStudentInfo . " ON " .$tableMain.".idNum = ". $tableStudentInfo .".id INNER JOIN " . $tableEventsList . " ON " .$tableMain.".eventsId = ". $tableEventsList .".id ORDER BY " .$tableMain.".id DESC "; */
        
        /* include 'table_query.php'; */
    ?>
</div>
<?php
    include (__DIR__ . '/CONSTANTS/footer.php');
?>