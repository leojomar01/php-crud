<?php
    require("../connection/database.php");

    if(isset($_POST['delete'])){
        $id = $_POST['id'];

        $query_delete = "DELETE FROM register WHERE id = $id";
        
        $sql_delete = mysqli_query($connection,$query_delete) OR trigger_error('Query FAILED SQL:$query_create ERROR:'.mysqli_error($connection),E_USER_ERROR );

        echo "<script> alert('Record Deleted!')</script>";
        echo "<script>window.location.href = '../index.php'</script>";
    }
?>
