<?php
    require("./connection/database.php");

    


    $query_retrieve = "SELECT * FROM register";

    $sql_retrieve = mysqli_query($connection,$query_retrieve) OR trigger_error('Query FAILED SQL:$query_create ERROR:'.mysqli_error($connection),E_USER_ERROR );


?>