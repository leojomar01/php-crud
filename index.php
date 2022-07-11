<?php require('./inc/retreive.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,th,td{
            border: 1px solid black;
        }
    </style>

</head>
<body>
    

    <h3>Create User</h3>
    <form action="./inc/create.php" method="post">
        <input type="text" name="first_name" placeholder="Enter First Name" required>
        <input type="text" name="last_name" placeholder="Enter Last Name" required>
        <input type="email" name="email" placeholder="Enter email" required>
        <input type="password" name="password" placeholder="Enter Password" required>
        <select name="gender" id="gender">
            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>

        <select name="user_role" id="user_role">
            <option value="">User Role</option>
            <option value="Admin">Admin</option>
            <option value="User">User</option>
        </select>

        <input type="submit" name="create" value="Create">
    </form>



    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>User Role</th>
            <th>Action</th>
        </tr>

        <?php 
            while($row = mysqli_fetch_array($sql_retrieve)){
        ?>
                <tr>
                    <td><?php echo $row['first_name']?></td>
                    <td><?php echo $row['last_name']?></td>
                    <td><?php echo $row['email']?></td>
                    <td><?php echo $row['gender']?></td>
                    <td><?php echo $row['user_role']?></td>
                    <td>
                        <form action="./inc/update.php" method="post">
                            <input type="hidden" name="id" id="id" value="<?php echo $row['id'] ?>">
                            <input type="submit" value="Update" name="update">
                        </form>
                        <form action="./inc/delete.php" method="post">
                            <input type="hidden" name="id" id="id" value="<?php echo $row['id'] ?>">
                            <input type="submit" value="Delete" name="delete">
                        </form>
                    </td>
                </tr>
            
        <?php 
            }
        ?>
    </table>
</body>
</html>