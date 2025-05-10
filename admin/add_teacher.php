<?php 
include('../config.php');
extract($_POST);
if(isset($save))
{
$que=mysqli_query($con,"select * from teacher where eid='$e'");		
$row=mysqli_num_rows($que);
	if($row)
	{
	$err="<font color='red'>This teacher already exists</font>";
	}
	else
	{
mysqli_query($con,"insert into teacher values(null,'$n','$e','$p', $m,'$a','$courseid')");	

	$err="<font color='blue'>Congrates Your Data Saved!!!</font>";
	}
	
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
xmlhttp.open("GET","semester_ajax.php?id="+str,true);
xmlhttp.send();
}
</script>

<script>
function showcourse(str)
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
document.getElementById("department").innerHTML=xmlhttp.responseText;
}
}
//alert(str);
xmlhttp.open("GET","course_ajax.php?id="+str,true);
xmlhttp.send();
}
</script>


<div class="row">
<div class="col-md-12">
<h2>Add Teacher</h2>
<form method="POST" enctype="multipart/form-data">
<table border="0" class="table">
  <tr>
  <td colspan="2"><?php echo @$err; ?></td>
  </tr>
   
   <tr>
    <th width="237" scope="row">Select Department</th>
    <td width="213">
	<select name="courseid" id="courseid" onchange="showSemester(this.value)" class="form-control">
    <option disabled selected >Select Department</option>
	<?php
	$t=mysqli_query($con,"select * from department");
	while($s=mysqli_fetch_array($t))
	{
		$t_id=$s[0];
		echo "<option value='$t_id'>".$s[1]."</option>";
	}
	
	?>
	</td>
  </tr>
   
  <!-- <tr>
    <th width="237" scope="row">Select Semester</th>
    <td width="213">
	<select name="s" id="semester" onchange="showsemester(this.value)" class="form-control"/>
    <option disabled selected >Select Semester</option>
    
    <?php
	// $sub=mysqli_query($con,"select * from semester");
	// while($s=mysqli_fetch_array($sub))
	// {
	// 	$s_id=$s[0];
	// 	echo "<option value='$s_id'>".$s[1]."</option>";
	// }
	
	?>
	
	</select>
	
	</td>
  </tr> -->

    
  <tr>
    <th width="237" scope="row">Teacher Name </th>
    <td width="213"><input type="text" name="n" class="form-control" placeholder="enter your name"/></td>
  </tr>
  <tr>
    <th scope="row">Enter Your Email </th>
    <td><input type="email" name="e" class="form-control" placeholder="enter your email"/></td>
  </tr>
  
  <tr>
    <th scope="row">Enter Your Password </th>
    <td><input type="password" name="p" class="form-control" placeholder="enter your email"/></td>
  </tr>
  
  <tr>
    <th scope="row">Enter Your Mobile </th>
    <td><input type="number" name="m" class="form-control" placeholder="enter your mobile"/></td>
  </tr>
  
  <tr>
    <th scope="row">Enter Your Address</th>
    <td><input type="text" name="a" class="form-control" placeholder="enter your address"/></td>
  </tr>
  
  
  <!-- <tr>
    <th scope="row">Status</th>
	<td>
    <select name="status" class="form-control"/>
	<option value="" selected="selected" disabled="disabled">Select Status</option>
	<option>ON</option>
	<option>OFF</option>
	</select>
	</td>
  </tr>   -->
 
  <tr>
    <th colspan="1" scope="row"></th>
	<td>
	<input type="submit" value="Add Teacher" name="save" class="btn btn-success" />
	
	<input type="reset" value="Reset" class="btn btn-success"/>
	
</td>
  </tr>
</table>
</form>
</div>
</div>