<?php 
    session_start();
    require("./connection/database.php");

   



    // if($_SESSION['status']=='invalid'|| empty($_SESSION['status'])){
        $_SESSION['status'] = 'invalid';
        unset($_SESSION['email']);
        unset($_SESSION['user_role']);
        echo "<script>window.location.href = './login.php'</script>";
        mysqli_close($connection);
    // }

?>