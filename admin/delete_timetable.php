<?php 
include('../config.php');
$tid=$_REQUEST['timeschedule_id'];
if(isset($_REQUEST['timeschedule_id']))
{

mysqli_query($con,"delete from timeschedule where timeschedule_id='$tid'");


header('location:admindashboard.php?info=timetable');
}
?>