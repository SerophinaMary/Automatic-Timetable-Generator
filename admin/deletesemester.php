<?php 
include('../config.php');
$semesterid=$_REQUEST['sem_id'];
if(isset($_REQUEST['sem_id']))
{

mysqli_query($con,"delete from semester where sem_id='$semesterid'");


header('location:admindashboard.php?info=semester');
}
?>
