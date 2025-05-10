<?php 
include('../config.php');
$sem_id=$_REQUEST['sem_id'];

$q=mysqli_query("select * from semester where sem_id='$sem_id'");
$res=mysqli_fetch_assoc($q);
extract($_POST);
if(isset($update))
{	
 

	mysqli_query($con,"update semester set semester_name='$s',department_id='$dep_id' where sem_id='$sem_id' ");
	
	$err= "Records updated";
	
	}
	
?>
<div class="row">
<div class="col-md-5">
              
               <h2>Update Semester</h2>
<form method="POST" enctype="multipart/form-data">
  <table border="0" cellspacing="5" cellpadding="5" class="table">
  <tr>
  <td colspan="2"><?php echo @$err; ?></td>
  </tr>
  <tr>
   <th width="237" scope="row">Select Department</th>
    <td width="213">
	<select name="dep_id" id="courseid" onchange="showSemester(this.value)" class="form-control">
	<?php
	$sub=mysqli_query($con,"select * from department");
	while($s=mysqli_fetch_array($sub))
	{
		$s_id=$s[0];
		?>
		<option value='<?php echo $s_id; ?>' <?php if($s_id==$res['department_id']){echo "selected";} ?>><?php echo $s[1];?></option>
<?php 	}
	
	?>
    </select>
   
  </tr>

  
   <tr>
    <th width="237" scope="row">Semester Name </th>
    <td width="213"><input type="text" name="s" class="form-control" value="<?php echo $res['semester_name'];?>"/></td>
  </tr>
  
   
   <tr>
    <th colspan="2" scope="row" align="center">
<input type="submit" value="Update Records" name="update"/>
	</th>
  </tr>
</table>
</form>
</div>
</div>
               
                
                   