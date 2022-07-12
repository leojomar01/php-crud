<?php require('./inc/retreive.php') ;
    require('./session.php');


    class Employee{
        var $title;
        var $salary;
        
        
        function setTitle($title){
            $this->title = $title;
        }

        function getTitle(){
            echo $this->title;
        }

        function setSalary($salary){
            $this->salary = $salary;
        }

        function getSalary(){
            echo $this->salary;
        }
    }

    $frontend = new Employee();
    $frontend->setTitle("Junior Dev");
    $frontend->setSalary(30000);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>

    
    a{
        text-decoration: none;
        color: black;
    }

    </style>
</head>
<body>

<div class="container">
<h1>Welcome <?php echo $_SESSION['user_role']." ". $_SESSION['email'] ?></h1>

<form action="/logout.php" method="post">
    <input type="submit" value="Logout" name="logout">
</form> 
</div>   

<?php
    if($_SESSION['user_role']=='7'){
?>
    <div class="container">
    <h3>Create User</h3>
    <form action="./inc/create.php" method="post">
        <input class="form-label" type="text" name="first_name" placeholder="Enter First Name" required>
        <input class="form-label" type="text" name="last_name" placeholder="Enter Last Name" required>
        <input class="form-label" type="email" name="email" placeholder="Enter email" required>
        <input class="form-label" type="password" name="password" placeholder="Enter Password" required>
        <select name="gender" id="gender">
            <option value="">Select Gender</option>
            <?php
            while ($row = mysqli_fetch_array($sql_retrieve_G)){
            ?>
                <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
            <?php 
            }
            ?>
        </select>
        <!--<select name="user_role" id="user_role">
            <option value="">User Role</option>
            <option value="7">Admin</option>
            <option value="8">User</option>
            <option value="9">Viewer</option>
        </select>
        -->
        <select name="user_role" id="user_role">
            <option value="">User Role</option>
            <?php
            while ($row = mysqli_fetch_array($sql_retrieve_UR)){
            ?>
                <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
            <?php 
            }
            ?>
        </select>


        <input type="submit" name="create" value="Create">
    </form>
    </div>
<?php
    }
?>
   



    <div class="container">

    <table class="table">
        <tr>
            <th>ID <a href="?"><i class="fa fa-fw fa-sort"></i></a></th>
            <th>First Name <a href="?columnName=first_name"><i class="fa fa-fw fa-sort"></i></a></th>
            <th>Last Name <a href="?columnName=last_name"><i class="fa fa-fw fa-sort"></i></a></th>
            <th>Email <a href="?columnName=email"><i class="fa fa-fw fa-sort"></i></a></th>
            <th>Gender <a href="?columnName=gender"><i class="fa fa-fw fa-sort"></i></a></th>
            <th>User Role <a href="?columnName=user_role"><i class="fa fa-fw fa-sort"></i></a></th>
            <th>Job<a href="?columnName=user_role"><i class="fa fa-fw fa-sort"></i></a></th>
            <th>Salary<a href="?columnName=user_role"><i class="fa fa-fw fa-sort"></i></a></th>
            <th>Action</th>
           
        </tr>
        <?php 
            while($row = mysqli_fetch_array($sql_retrieve)){
                // var_dump($row);
                // die;
        ?>
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['first_name']?></td>
                    <td><?php echo $row['last_name']?></td>
                    <td><?php echo $row['email']?></td>
                    <td><?php echo $row['gender']?></td>
                    <td><?php echo $row['user_role']?></td>
                    <td><?php echo $frontend->getTitle() ?></td>
                    <td><?php echo $frontend->getSalary() ?></td>
                    <td>
                        <form action="./inc/update.php" method="post">
                            <input type="hidden" name="id" id="id" value="<?php echo $row['id'] ?>">
                            <input type="submit" class="btn btn-primary" value="Update" name="update">
                            <?php if($_SESSION['user_role']=='7'){ ?>
                                <input type="submit" class="btn btn-dark" value="Delete" name="delete" onclick="return confirm('Are you sure you want to delete this record?')">
                            <?php } ?>
                        </form>
                    </td>
                    
                </tr>
        <?php 
            }
        ?>
    </table>
   
    </div>
</body>
</html>