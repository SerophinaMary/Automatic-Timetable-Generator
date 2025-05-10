<?php 
include('../config.php');
extract($_POST);
if(isset($save))
{
$que=mysqli_query($con,"select * from subject where subject_name='$subname'");	
$row=mysqli_num_rows($que);
	if($row)
	{
	$err="<font color='red'>This Subject already exists</font>";
	}
	else
	{

		mysqli_query($con,"insert into subject values(null,'$subname','$s','$courseid', '$t', '$lpw', '$type')");	

		$err="<font color='blue'>Congrates Your Data Saved!!!</font>";
	}
	
}

?>

<script>

function showOpts(str){
	showSemester(str);
	showTeacher(str);
}

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
	xmlhttp.open("GET","semester_ajax.php?id="+str,true);
	xmlhttp.send();
}

function showTeacher(str)
{
	if (str=="")
{
	document.getElementById("txtHint").innerHTML="";
	return;
}

if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
	xmlhttp2=new XMLHttpRequest();
}
else
{// code for IE6, IE5
	xmlhttp2=new ActiveXObject("Microsoft.XMLHTTP");
}

xmlhttp2.onreadystatechange=function()
{
if (xmlhttp2.readyState==4 && xmlhttp2.status==200)
{
document.getElementById("teacher").innerHTML=xmlhttp2.responseText;
}
}
//alert(str);
xmlhttp2.open("GET","teacher_ajax.php?id="+str,true);
xmlhttp2.send();
}

</script>


<div class="row">
<div class="col-md-8">
<h2>Add Subject</h2>
<form method="POST" enctype="multipart/form-data">
  <table border="0" cellspacing="5" cellpadding="5" class="table">
  <tr>
  <td colspan="2"><?php echo @$err; ?></td>
  </tr>
  <tr>
    <th width="237" scope="row">Select Department</th>
    <td width="213">
	<select name="courseid" id="courseid" onchange="showOpts(this.value)" class="form-control">
    <option disabled selected >Select Department</option>
	<?php
	$sub=mysqli_query($con,"select * from department");
	while($s=mysqli_fetch_array($sub))
	{
		$s_id=$s[0];
		echo "<option value='$s_id'>".$s[1]."</option>";
	}
	
	?>
    </select>
	</td>
  </tr>
	
 <tr>
    <th width="237" scope="row">Select Semester</th>
    <td width="213">
	<select name="s" id="semester" class="form-control"/>
    <option disabled selected >Select Semester</option>
    
    <?php
	$sub=mysqli_query($con,"select * from semester where department_id='".$res['department_id']."'");
	while($s=mysqli_fetch_array($sub))
	{
		$s_id=$s[0];
		echo "<option value='$s_id'>".$s[1]."</option>";
	}
	
	?>
	
	</select>
	
	
	</td>
  </tr>

  <tr>
    <th width="237" scope="row">Select Teacher</th>
    <td width="213">
	<select name="t" id="teacher" class="form-control"/>
    <option disabled selected >Select Teacher</option>
    
    <?php
	$sub=mysqli_query($con,"select * from teacher where department_id='".$res['department_id']."'");
	while($s=mysqli_fetch_array($sub))
	{
		$s_id=$s[0];
		echo "<option value='$s_id'>".$s[1]."</option>";
	}
	
	?>
	
	</select>
	
	
	</td>
  </tr>

  <tr>
    <th width="237" scope="row">Subject Name </th>
    <td width="213"><input type="text" name="subname" class="form-control"/></td>
  </tr>
  <tr>
    <th width="237" scope="row">Lecture/Week </th>
    <td width="213"><input type="number" name="lpw" class="form-control"/></td>
  </tr>
  <tr>
    <th width="237" scope="row">Type </th>
    <td width="213"><input class="form-check-input" type="radio" name="type" value="Theory" checked>
  		<label class="form-check-label" for="Theory">Theory</label>
		<input class="form-check-input" type="radio" name="type" value="Lab">
  		<label class="form-check-label" for="Lab">Lab</label>	  
	</td>
  </tr>
  <tr>
    <th colspan="1" scope="row"></th>
	<td>
	<input type="submit" value="Add subject" name="save" class="btn btn-success" />
	
	<input type="reset" value="Reset" class="btn btn-success"/>
	</td>
  </tr>
  
  </table>
  </form>
  </div>
  </div>