<?php 
include('../config.php');
$subjectid=$_REQUEST['subject_id'];
if(isset($_REQUEST['subject_id']))
{

mysqli_query($con,"delete from subject where subject_id='$subjectid'");


header('location:admindashboard.php?info=subject');
}
?>
