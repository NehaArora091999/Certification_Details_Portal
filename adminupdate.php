<?php
session_start();

// include database connection file
require_once'dbconfig.php';
if(isset($_POST['update']))
{
// Get the row id
$rid=intval($_GET['id']);
// Posted Values  
$EmployeeName=$_POST['EmployeeName'];
$CSP=$_POST['CSP'];
$CertificationLevel=$_POST['CertificationLevel'];
$CertificationName=$_POST['CertificationName'];
$CertificationId=$_POST['CertificationId'];
$CertificationDate=$_POST['CertificationDate'];
$ExpiryDateofCertification=$_POST['ExpiryDateofCertification'];
$CertificationValidity=$_POST['CertificationValidity'];
$file_name = $_FILES['pdf_file']['name'];
$file_tmp = $_FILES['pdf_file']['tmp_name'];
 
move_uploaded_file($file_tmp,"./pdf/".$file_name);

// Store  Procedure for Updation
$update = "update tblusers set EmployeeName='$EmployeeName',CSP='$CSP',CertificationLevel='$CertificationLevel',CertificationName='$CertificationName',CertificationId='$CertificationId',CertificationDate='$CertificationDate',ExpiryDateofCertification='$ExpiryDateofCertification',CertificationValidity='$CertificationValidity',filename='$file_name' where id=$rid ";
 $sql=mysqli_query($con,$update);
// Mesage after updation
if($sql)
{
echo "<script>alert('Record Updated successfully');</script>";
echo "<script>window.location.href='admin.php'</script>"; 
}
else
{
    echo "<script>alert('Error');</script>"; 
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Certificate Details || Admin </title>
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
<h3>Update Record | Certificate Details</h3>
<a href="admin.php"><button class="btn btn-primary" style="margin-left:400px;margin-top:-60px;"> HOME</button></a>
<hr />

</div>
</div>

<?php 
$rid=intval($_GET['id']);
// Get the userid and fetch it (take the value(database) from url)
$read = "select * from tblusers where id=$rid ";
$sql =mysqli_query($con,$read);
while ($result=mysqli_fetch_array($sql)) {                 
?>
<form name="insertrecord" method="post"  enctype="multipart/form-data">

<div class="row">
<div class="col-md-4"><b>Employee Name</b>
<input type="text" name="EmployeeName" value="<?php echo htmlentities($result['EmployeeName']);?>" class="form-control" required>
</div>
<div class="col-md-4"><b>CSP</b>
<select id="CSP" name="CSP" class="form-control" value="<?php echo htmlentities($result['CSP']);?>" required>
                            <option value="AWS">AWS</option>
                            <option value="Azure">Azure</option>
                            <option value="GCP">GCP</option>
                          </select>
</div>
</div>

<div class="row">
<div class="col-md-4"><b>Certification Level</b>
<input type="text" name="CertificationLevel" value="<?php echo htmlentities($result['CertificationLevel']);?>" class="form-control" required>
</div>
<div class="col-md-4"><b>Certification Name</b>
<input type="text" name="CertificationName" value="<?php echo htmlentities($result['CertificationName']);?>" class="form-control" maxlength="10" required>
</div>
</div>  



<div class="row">
<div class="col-md-4"><b>Certification Id</b>
<input type="text" class="form-control" name="CertificationId" value="<?php echo htmlentities($result['CertificationId']);?>" required>
</div>
<div class="col-md-4"><b>Certification Date</b>
<input type="date" name="CertificationDate" class="form-control" maxlength="10" value="<?php echo htmlentities($result['CertificationDate']);?>"  required>
</div>
</div>  

<div class="row">
<div class="col-md-4"><b>Expiry Date of Certification</b>
<input class="form-control" type="date" name="ExpiryDateofCertification" value="<?php echo htmlentities($result['ExpiryDateofCertification']);?>" required>
</div>
<div class="col-md-4"><b>Certification Validity</b>
<input type="number" name="CertificationValidity" class="form-control" maxlength="2" value="<?php echo htmlentities($result['CertificationValidity']);?>"  required>
</div>
</div>  

<div class="row">
<div class="col-md-4"><b>Upload Certificate</b>
<input class="form-control" type="file" name="pdf_file" accept=".pdf" value="<?php echo htmlentities($result['filename']);?>"  required>
    </div>
<?php } ?>
<br>
<div class="col-md-4">
<input type="submit" class="form-control" name="update" value="Update" style="background-color:Blue;color:white;">
</div>
</div> 
     </form>
<div class="row">

      
<div class="col-md-4">
<a href="admin.php"><input type="button" class="form-control" value="CANCEL" style="background-color:red;color:white;"></a>
</div>
	</div>
</div>

</body>
</htm