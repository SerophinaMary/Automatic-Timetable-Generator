<?php 
include('../config.php');
$teacher_id=$_REQUEST['teacher_id'];
$q=mysqli_query($con,"select * from teacher where teacher_id='$teacher_id'");
$res=mysqli_fetch_assoc($q);
extract($_POST);
if(isset($update))
{	

	mysqli_query($con,"update teacher set name='$n',eid='$e',password='$p',mob='$m',address='$a',department_id='$dep_id' where teacher_id='$teacher_id' ");
	
	$err= "Records updated";
	
	}
	
?>
              <div class="row">
<div class="col-md-5"> 
           
               <h2>Update Teacher</h2>
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
  
  </tr>
    <!-- <tr>
    <th width="237" scope="row">Semester Name </th>
    <td width="213">
	
	<select name="semester" id="semester" class="form-control">
	<?php	
	// $sem=mysqli_query($con,"select * from semester where department_id='".$res['department_id']."'");
	// while($s=mysqli_fetch_array($sem))
	// {
	// $s_id=$s[0];
	?>
	<option value='<?php 
  // echo $s_id; ?>' <?php if($s_id==$res['sem_id']){echo "selected";} ?>>
	<?php 
  // echo $s[1];
   ?>
	</option>
	<?php
	// }
	?>
	
	
    </select>
	</td>
	
	</tr> -->

  
   <tr>
    <th width="237" scope="row">Teacher Name </th>
    <td width="213"><input type="text" name="n" class="form-control" value="<?php echo $res['name'];?>"/></td>
  </tr>
  
   <tr>
    <th width="237" scope="row">Email </th>
    <td width="213"><input type="text" name="e" class="form-control" value="<?php echo $res['eid'];?>"/></td>
  </tr>
  
   <tr>
    <th width="237" scope="row">Password </th>
    <td width="213"><input type="text" name="p" class="form-control" value="<?php echo $res['password'];?>"/></td>
  </tr>
  
   <tr>
    <th width="237" scope="row">Mobile</th>
    <td width="213"><input type="text" name="m" class="form-control" value="<?php echo $res['mob'];?>"/></td>
  </tr>
  
   <tr>
    <th width="237" scope="row">Address</th>
    <td width="213"><input type="text" name="a" class="form-control" value="<?php echo $res['address'];?>"/></td>
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
               
                