<?php 
include('../config.php');
$courseid=$_REQUEST['course_id'];
if(isset($_REQUEST['course_id']))
{

mysqli_query($con,"delete from department where department_id='$courseid'");


header('location:admindashboard.php?info=course');
}
?>
