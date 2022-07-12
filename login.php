<?php 
    require("./connection/database.php");

    session_start();

    if(isset($_POST['login'])){
        $email = trim($_POST['email']) ;
        $password =trim($_POST['password']);
       


        if(empty($email) || empty($password)){
            echo "<script>alert('Please Enter email and password!')</script>";
        }
        else{

            $query_check = "SELECT * FROM register WHERE email = '$email'";

            $sql_check = mysqli_query($connection,$query_check) OR trigger_error('Query FAILED SQL:$query_create ERROR:'.mysqli_error($connection),E_USER_ERROR );

            $row = mysqli_fetch_array($sql_check);

            
            $currentEmail = $row['email'];
            $currentPassword = $row['password'];
            // var_dump($currentPassword);
            // echo "<br>";
            // var_dump($password);
            // die;
            
            if( mysqli_num_rows($sql_check)>0 && password_verify($password,$currentPassword)){
                $_SESSION['status'] = "valid";
                $_SESSION['email'] = $row['email'];
                $_SESSION['user_role'] = $row['user_role'];

                echo "<script>alert('Log in Succesfully!')</script>";
                echo "<script>window.location.href = '../index.php'</script>";
            }
            else{
                echo "<script>alert('Incorrect!')</script>";

            }
        }

    };


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    

    <form action="login.php" method="POST">
        <h2>Log in</h2>
        <input type="text" name="email" id="email" placeholder="Email">

        <input type="password" name="password" id="password" placeholder="Password">

        <input type="submit" value="Log-in" name="login">
    </form>

</body>
</html>