
<?php
session_start();
// include database connection file

require_once'dbconfig.php';

// Code for record deletion
if(isset($_REQUEST['del']))
{
//Get row id
$rid=intval($_GET['del']);
//Qyery for deletion
$sql =mysqli_query($con,"delete from tblusers where id=$rid");

echo "<script>alert('Record deleted');</script>";
// Code for redirection
echo "<script>window.location.href='admin.php'</script>"; 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Certificate Details || Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        
    </style>
     <script src="https://www.w3schools.com/lib/w3.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-12">
<h3>Insert New Certificate Details</h3><h3 style="float:right;">Welcome Admin</h3>
<br>
<h5>Search By Certificate Name</h5>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search here..">

<hr />
<a href="admininsert.php"><button class="btn btn-primary"> Insert New Record</button></a>
<a href="New folder/logout.php"><button class="btn btn-primary"> Logout</button></a>
<div class="table-responsive">                
<table id="mytable" class="table table-bordred table-striped">                 
<thead>
<th>#</th>
<th>Employee Name</th>
<th>CSP</th>
<th>Certification Level</th>
<th>Certification Name</th>
<th>Certification Id</th>
<th>Certification Date</th>
<th>Expiry Date of Certification</th>
<th>Certification Validity</th>
<th>certificate File</th>
<th>Edit</th>
<th>Delete</th>
</thead>
<tbody>
    
<?php 
 $select =" select * from tblusers ";
$sql =mysqli_query($con,$select);
$cnt=1;
$row=mysqli_num_rows($sql);
if($row>0){
while ($result=mysqli_fetch_array($sql)) {           
?>  
    <tr>
    <td><?php echo htmlentities($cnt);?></td>
    <td><?php echo htmlentities($result['EmployeeName']);?></td>
    <td><?php echo htmlentities($result['CSP']);?></td>
    <td><?php echo htmlentities($result['CertificationLevel']);?></td>
    <td><?php echo htmlentities($result['CertificationName']);?></td>
    <td><?php echo htmlentities($result['CertificationId']);?></td>
    <td><?php echo htmlentities($result['CertificationDate']);?></td>
    <td><?php echo htmlentities($result['ExpiryDateofCertification']);?></td>
    <td><?php echo htmlentities($result['CertificationValidity']);?></td>
    <td><?php echo htmlentities($result['filename']);?></td>

    <td><a href="adminupdate.php?id=<?php echo htmlentities($result['id']);?>"><button class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></a></td>

    <td><a href="admin.php?del=<?php echo htmlentities($result['id']);?>"><button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><span class="glyphicon glyphicon-trash"></span></button></a></td>
    </tr>
    
<?php 
// for serial number increment
$cnt++;
} } else { ?>
<tr>
    <td colspan="9" style="color:red; font-weight:bold;text-align:center;"> No Record found</td>
</tr>
<?php } ?>    
</tbody>      
</table>
</div>
</div>
</div>
</div>
</body>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("mytable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }

}
</script>

</html>
