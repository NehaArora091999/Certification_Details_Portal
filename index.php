
<?php
session_start();
if(!isset($_SESSION['email']))
{
  header('location:New folder/login.php');
}

?>