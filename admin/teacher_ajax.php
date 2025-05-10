<option value="" selected="selected" disabled="disabled">Select Teacher</option>
<?php 
include('../config.php');
$q=mysqli_query($con,"select * from  teacher where department_id='".$_GET['id']."'");
while($res=mysqli_fetch_assoc($q))
{
echo "<option value='".$res['teacher_id']."'>".$res['name']."</option>";
				
}
?>