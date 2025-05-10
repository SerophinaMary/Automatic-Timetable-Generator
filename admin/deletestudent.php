<?php 
include('../config.php');
$stuid=$_REQUEST['stu_id'];
if(isset($_REQUEST['stu_id']))
{

mysqli_query($con,"delete from student where stu_id='$stuid'");


header('location:admindashboard.php?info=student');
}
?>
