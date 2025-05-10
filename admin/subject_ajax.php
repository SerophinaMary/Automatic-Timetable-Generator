<option value="" selected="selected" disabled="disabled">Select subject</option>
<?php 
include('../config.php');
$q=mysqli_query($con,"select * from  subject where sem_id='".$_GET['id']."'");
//echo $_GET['id'];
while($res=mysqli_fetch_assoc($q))
{
echo "<option value='".$res['sem_id']."'>".$res['subject_name']."</option>";
				
}
?>