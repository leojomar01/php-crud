<?php 
    require("../connection/database.php");

if(isset($_POST['create'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $gender = $_POST['gender'];
    $user_role = $_POST['user_role'];


    $query_create = "INSERT INTO register (first_name,last_name, email, password, gender, user_role) 
    VALUES('$first_name','$last_name', '$email', '$password', '$gender', '$user_role')";

    $sql_create = mysqli_query($connection,$query_create) OR trigger_error('Query FAILED SQL:$query_create ERROR:'.mysqli_error($connection),E_USER_ERROR );
    echo "<script> alert('Sucessfully Created')</script>";

    echo "<script>window.location.href = '../index.php'</script>";


    // header('location: ../index.php');
}
else{
    echo "<script> alert('Error')</script>";
    echo "<script>window.location.href = '../index.php'</script>";

}
    
?>