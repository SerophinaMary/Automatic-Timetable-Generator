<?php 
include('../config.php');
$timeschedule_id=$_REQUEST['timeschedule_id'];
$q=mysqli_query($con,"select * from timeschedule where timeschedule_id='$timeschedule_id'");
$res=mysqli_fetch_array($q);


extract($_POST);
if(isset($update))
{
   	mysqli_query($con,"update timeschedule set department_name='$course',semester_name='$s',subject_name='$subname',time='$time',date='$date',teacher_id='$teacher' where timeschedule_id='$timeschedule_id' ");
	
	echo "Records updated";
	
	}

?>

<script>
function showSemester(str)
{
if (str=="")
{
document.getElementById("txtHint").innerHTML="";
return;
}

if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}



xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("semester").innerHTML=xmlhttp.responseText;
}
}
//alert(str);
xmlhttp.open("GET","updatetimetable_ajax.php?id="+str,true);
xmlhttp.send();
}
</script>

<script>
function showSubject(str)
{
if (str=="")
{
document.getElementById("txtHint").innerHTML="";
return;
}

if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}



xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("subject").innerHTML=xmlhttp.responseText;
}
}
//alert(str);
xmlhttp.open("GET","subject_ajax.php?id="+str,true);
xmlhttp.send();
}
</script>



<div class="row">
<div class="col-sm-8">
<h2>Update Time Table</h2>
<form method="POST" enctype="multipart/form-data">
  <table border="0" class="table">
  <tr>
  <td colspan="2"><?php echo @$err; ?></td>
  </tr>
   <tr>
    <th width="237" scope="row">Department Name </th>
    <td width="213">
	
	<select name="course" id="courseid" onChange="showSemester(this.value)" class="form-control">
	<?php
	$cou=mysqli_query($con,"select * from department");
	while($c=mysqli_fetch_array($cou))
	{
	$c_id=$c[0];
	?>
	<option value='<?php echo $c_id; ?>' <?php if($c_id==$res['department_name']){echo "selected";} ?>>
	<?php echo $c[1]; ?>
	</option>
	<?php
	}
	?>
	
    </select>
	</td>
	
	</tr>
   <tr>
    <th width="237" scope="row">Semester Name </th>
    <td width="213">
	
	<select name="s" id="semester" onChange="showSubject(this.value)" class="form-control">
	<?php	
	$sem=mysqli_query($con,"select * from semester where department_id='".$res['department_name']."'");
	while($s=mysqli_fetch_array($sem))
	{
	$s_id=$s[0];
	?>
	<option value='<?php echo $s_id; ?>' <?php if($s_id==$res['semester_name']){echo "selected";} ?>>
	<?php echo $s[1]; ?>
	</option>
	<?php
	}
	?>
	
	
    </select>
	</td>
	
	</tr>
	
   <tr>
    <th width="237" scope="row">Subject Name </th>
    <td width="213">
    <select name="subname" id="subject" class="form-control">
	<?php	
	$sem=mysqli_query($con,"select * from subject where sem_id='".$res['semester_name']."'");
	while($s=mysqli_fetch_array($sem))
	{
	$s_id=$s[0];
	?>
	<option value='<?php echo $s_id; ?>' <?php if($s_id==$res['subject_name']){echo "selected";} ?>>
	<?php echo $s[1]; ?>
	</option>
	<?php
	}
	?>
	
	
    </select>
    
  </tr>
  
  <tr>
    <th width="237" scope="row">Teacher </th>
    <td width="213">
	<select name="teacher" id="teacherid" onchange="showTeacher(this.value)" class="form-control">
	<?php
	$t=mysqli_query($con,"select * from teacher");
	while($s=mysqli_fetch_array($t))
	{
		$t_id=$s[0];
		echo "<option value='$t_id'>".$s[1]."</option>";
	}
	
	?>
	
	</td>
  </tr>
  <tr>
    <th width="237" scope="row">Enter  Time </th>
    <td width="213"><input type="time" name="time" class="form-control" value="<?php echo $res['time']; ?>"/></td>
  </tr>
  <tr>
  <tr>
    <th width="237" scope="row">Date </th>
    <td width="213"><input type="date" name="date" class="form-control" value="<?php echo $res['date']; ?>"/></td>
  </tr>
  
  
    <th colspan="2" scope="row" align="center">
<input type="submit" value="Update Records" name="update" class="btn btn-success"/>
	</th>
  </tr>
</table>
</form>
               
                
</div>
</div>
</body>

</html>