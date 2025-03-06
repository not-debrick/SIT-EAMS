<?php
    include (__DIR__ . '/CONSTANTS/header.php');

?>
    <div class="container justify-content-end">
        <button class="btn btn-primary" onclick="window.location.href='index.php'">Home</button>
    </div>
<?php
    $tableMain = "tbl_attendance"; // change name for a different table (only used for testing)
    $tableMain = "tbl_attendance"; // change name for a different table (only used for testing)

    $query = "
        SELECT * FROM ". $tableMain . " INNER JOIN tbl_studinfo ON " .$tableMain.".idNum = tbl_studinfo.id INNER JOIN tbl_events_list ON " .$tableMain.".eventId = tbl_events_list.id ORDER BY " .$tableMain.".id DESC ";
    
    include 'table_query.php';
?>

<?php
    include (__DIR__ . '/CONSTANTS/footer.php');
?>