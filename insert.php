<?php
session_start();

// include database connection file
require_once'dbconfig.php';
if(isset($_POST['insert']))
{
// Posted Values  
$EmployeeName=$_POST['EmployeeName'];
$CSP=$_POST['CSP'];
$CertificationLevel=$_POST['CertificationLevel'];
$CertificationName=$_POST['CertificationName'];
$CertificationId=$_POST['CertificationId'];
$CertificationDate=$_POST['CertificationDate'];
$ExpiryDateofCertification=$_POST['ExpiryDateofCertification'];
$CertificationValidity=$_POST['CertificationValidity'];
//it will upload the file in the folder
$file_name = $_FILES['pdf_file']['name'];
$email = $_SESSION['email'];
$file_tmp = $_FILES['pdf_file']['tmp_name'];
 //it will save the file in the folder
move_uploaded_file($file_tmp,"./pdf/".$file_name);

$insert = "insert into tblusers(EmployeeName,CSP,CertificationLevel,CertificationName,CertificationId,CertificationDate,ExpiryDateofCertification,CertificationValidity,filename,email)
 VALUES('$EmployeeName','$CSP','$CertificationLevel','$CertificationName','$CertificationId','$CertificationDate','$ExpiryDateofCertification','$CertificationValidity','$file_name','$email');
";

// Call the store procedure for insertion
$sql = mysqli_query($con,$insert);
if($sql)
{
// Message for successfull insertion
echo "<script>alert('Record inserted successfully');</script>";
echo "<script>window.location.href='home.php'</script>"; 
}
else 
{
// Message for unsuccessfull insertion
echo "<script>alert('Something went wrong. Please try again');</script>";
echo "<script>window.location.href='home.php'</script>"; 
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Certificate Details </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    <style>
        .row{
            margin: 40px;
        }
        </style>
</head>
<body>

<div class="container">

<div class="row">
<div class="col-md-12">
<h3>Insert Record | Certificate Details</h3> 
<a href="home.php"><button class="btn btn-primary" style="margin-left:400px;margin-top:-60px;"> HOME</button></a>
<hr />


</div>
</div>

<form name="insertrecord" method="post" autocomplete="off" enctype="multipart/form-data">
<div class="row">
<div class="col-md-4"><b>Employee Name</b>
<input type="text" name="EmployeeName" class="form-control" maxlength="24" required>
</div>
<div class="col-md-4"><b>CSP</b>
<select name="CSP" id="CSP" name="CSP" class="form-control" required>
                            <option value="AWS">AWS</option>
                            <option value="Azure">Azure</option>
                            <option value="GCP">GCP</option>
                          </select>
</div>
</div>

<div class="row">
<div class="col-md-4"><b>Certification Level</b>
<input type="text" name="CertificationLevel" class="form-control" maxlength="24" required>
</div>
<div class="col-md-4"><b>Certification Name</b>
<input type="text" name="CertificationName" class="form-control" maxlength="24" required>
</div>
</div>  

<div class="row">
<div class="col-md-4"><b>Certification Id</b>
<input class="form-control" type="text" name="CertificationId" maxlength="10" required>
</div>
<div class="col-md-4"><b>Certification Date</b>
<input type="date" name="CertificationDate" class="form-control" maxlength="10" required>
</div>
</div>  

<div class="row">
<div class="col-md-4"><b>Expiry Date of Certification</b>
<input class="form-control" type="date" name="ExpiryDateofCertification" required>
</div>
<div class="col-md-4"><b>Certification Validity</b>
<input type="number" name="CertificationValidity" class="form-control" maxlength="2" required>
</div>
</div>  

<div class="row">
<div class="col-md-4"><b>Upload Certificate</b>
<input class="form-control" type="file" name="pdf_file" accept=".pdf" required>
    </div>
    <br>
    <div class="col-md-4">
<input type="submit" name="insert" class="form-control" value="Submit" style="background-color:Blue;color:white;">
</div>

    </div>
</form>
    <div class="row">
        
<div class="col-md-4">
<a href="home.php"><input type="button" class="form-control" value="CANCEL" style="background-color:red;color:white;"></a>
</div>
    </div>

</div>
</div>


</body>
</html>