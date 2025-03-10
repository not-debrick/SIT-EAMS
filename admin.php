<div class="container">
    <?php
        include (__DIR__ . '/CONSTANTS/header.php');
        include (__DIR__ . '/CONSTANTS/navigation.php');
        include 'searchExport.php';

        $query = "
            SELECT * FROM ". $tableMain . " INNER JOIN " . $tableStudentInfo . " ON " .$tableMain.".idNum = ". $tableStudentInfo .".id INNER JOIN " . $tableEventsList . " ON " .$tableMain.".eventsId = ". $tableEventsList .".id ORDER BY " .$tableMain.".id DESC ";
        
        /* include 'table_query.php'; */
    ?>
</div>
<?php
    include (__DIR__ . '/CONSTANTS/footer.php');
?>