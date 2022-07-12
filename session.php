<?php 
    session_start();



    if($_SESSION['status']=='invalid'|| empty($_SESSION['status'])){
        require('./logout.php');
        // $_SESSION['invalid'];
        // unset($_SESSION['email']);
        // echo "<script>window.location.href = './login.php'</script>";
    }

?>