<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
</head>
<body style="background-color:lightblue">

<?php

require_once 'connection.php';

if(isset($_POST['submit']))
{
    $EmployeeName = mysqli_real_escape_string($con,$_POST['Ename']);
    $EmployeeId = mysqli_real_escape_string($con,$_POST['EmployeeId']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $pass=password_hash($password, PASSWORD_BCRYPT);
    $emailquery= " select * from registration where email = '$email' ";
    $query = mysqli_query($con,$emailquery);
    $emailcount = mysqli_num_rows($query);
    
    if($emailcount > 0)
    {
        echo "
        <script>
        alert('email aleady exits');
        </script>";
    }
    else{
         $insertquery = " insert into registration(Name,EmployeId,email,password,usertype) values('$EmployeeName','$EmployeeId','$email','$pass','user') ";
         
         $iquery = mysqli_query($con,$insertquery);
         if($iquery)
          {
             $_SESSION['msg'] = "";
            echo "<script>window.location.href = 'login.php';</script>";
           }
        else
        {
            echo " <script>
            alert('error');
            </script>";
        }

        }

}

?>

<div class="container" style="padding-left:400px">
    <div class="row">
        <div class="col-md-12">
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 well">
            <h4>Register</h4>

            <form  method="post">
                <div class="form-group">
                    <label for="">Employee Name</label>
                    <input type="text" name="Ename" class="form-control" placeholder="Employee Name" required/>
                </div>
                <div class="form-group">
                    <label for="last_name">Employee Id</label>
                    <input type="text" id="last_name" name="EmployeeId" class="form-control" placeholder="Employee Id" required/>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" class="form-control" placeholder="Email Address" required/>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required/>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary" value="Register"/>
                </div>
                <a href="login.php" class="btn btn-primary" >Login</a>
            </form>
        </div>
        <div class="col-md-2"></div>
        
    </div>
</div>

</body>
</html>