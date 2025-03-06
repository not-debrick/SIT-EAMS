<?php
    include 'query.php';
    if(isset($_POST[$fetched_idNum])){
        echo "<div> ID Number: " . $fetched_idNum . "</div>";
        echo "<div> Name: " . $fetched_name . "</div>";
        echo "<div> Course: " . $fetched_course . "</div>";
        echo "<div> Year Level: " . $fetched_yearLevel . "</div>";
    }
?>  