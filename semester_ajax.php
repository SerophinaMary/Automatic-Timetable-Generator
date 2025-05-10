<strong><option value="" selected="selected" disabled="disabled">Select Semester</option>
<?php 
include('config.php');
$q=mysqli_query($con,"select * from  semester where department_id='".$_GET['id']."'");
while($res=mysqli_fetch_assoc($q))
{
echo "<option value='".$res['sem_id']."'>".$res['semester_name']."</option>";
				
}
?>
