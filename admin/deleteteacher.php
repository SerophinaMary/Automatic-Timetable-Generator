<?php 
include('../config.php');
$teacherid=$_REQUEST['teacher_id'];
if(isset($_REQUEST['teacher_id']))
{

mysqli_query($con,"delete from teacher where teacher_id='$teacherid'");


header('location:admindashboard.php?info=teacher');
}
?>
