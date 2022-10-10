<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
</head>
<body style="background-color:lightblue">
<?php
require_once 'connection.php';

if(isset($_POST['submit']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];
     
    $email_serach= "select * from registration where email='$email' ";
    $query=mysqli_query($con,$email_serach);
    $email_count=mysqli_num_rows($query);
    if($email_count)
    {
        $email_pass= mysqli_fetch_assoc($query);
       $db_pass= $email_pass['password'];
       $_SESSION['email']= $email_pass['email'];
       $user=$email_pass['usertype'];
       $pass_decode = password_verify($password,$db_pass);

       if($pass_decode)
       {
        if($user == 'user')
        {
        echo "<script>window.location.href='../home.php'</script>";
        }
        else{
            echo "<script>window.location.href='../admin.php'</script>";              
        }
       }
       else{
        echo "
        <script>
        alert('wrong password');
        </script>";
       }

    }
    else{
        echo "
        <script>
        alert('Unauthorized Email');
        </script>";
    }

}

?>




<div class="container" style="padding-left:400px">
    <div class="row">
        <div class="col-md-12">
            <h2>
              
            </h2>
        </div>
    </div>
        <p><?php 
        if(isset($_SESSION['msg']))
        {
        echo $_SESSION['msg'];
        }
        else{
            echo $_SESSION['msg'] = "Your Are logged out. please loging again" ;
        }
        ?></p>
        <div class="col-md-5 well">
            <h4>Login</h4>

            <form  method="post">
                <div class="form-group">
                
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email Address"/>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password"/>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary" value="Login"/>
                </div>
                   <a href="signup.php" class="btn btn-primary">Signup</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>