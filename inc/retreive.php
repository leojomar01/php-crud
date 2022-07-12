<?php
    require("./connection/database.php");


    if(isset($_GET['columnName'])){
        $columnName = $_GET['columnName'];
        $orderBy = "ASC";
        $query_retrieve = "SELECT 
        a.id AS id,
        a.first_name,
        a.last_name,
        a.email,
        b.name AS user_role,
        c.name AS gender 
        FROM register AS a 
        JOIN reference_code AS b ON a.user_role = b.id 
        JOIN reference_code AS c ON a.gender = c.id 
        ORDER BY $columnName $orderBy";
    }
    else{
        // $query_retrieve = "SELECT * FROM register INNER JOIN reference_code ON reference_code.id = register.gender";
        $query_retrieve = "SELECT 
        a.id AS id,
        a.first_name,
        a.last_name,
        a.email,
        b.name AS user_role,
        c.name AS gender 
        FROM register AS a 
        JOIN reference_code AS b ON a.user_role = b.id 
        JOIN reference_code AS c ON a.gender = c.id";

        // $query_retrieve2 = "SELECT * FROM register INNER JOIN reference_code ON reference_code.id = register.user_role";
    }

    $sql_retrieve = mysqli_query($connection,$query_retrieve) OR trigger_error('Query FAILED SQL:$query_create ERROR:'.mysqli_error($connection),E_USER_ERROR );
    // $sql_retrieve2 = mysqli_query($connection,$query_retrieve2) OR trigger_error('Query FAILED SQL:$query_create ERROR:'.mysqli_error($connection),E_USER_ERROR );


    $query_retrieve_UR = "SELECT * FROM reference_code WHERE group_name = 'ur' ORDER BY rank asc";
    $sql_retrieve_UR = mysqli_query($connection,$query_retrieve_UR) OR trigger_error('Query FAILED SQL:$query_create ERROR:'.mysqli_error($connection),E_USER_ERROR );

    $query_retrieve_G = "SELECT * FROM reference_code WHERE group_name = 'g' ORDER BY rank asc";
    $sql_retrieve_G = mysqli_query($connection,$query_retrieve_G) OR trigger_error('Query FAILED SQL:$query_create ERROR:'.mysqli_error($connection),E_USER_ERROR );


    
?>