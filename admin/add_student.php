<?php 
include('../config.php');

extract($_POST);
if(isset($save))
{
$que=mysqli_query($con,"select * from student where eid='$eid' and mob='$mobile'");


	
$row=mysqli_num_rows($que);
	if($row)
	{
	$err="<font color='red'>This Student already exists</font>";
	}
	else
	{
	$image=$_FILES['pic']['name'];	
		
       mysqli_query($con,"insert into student values(null,'$stname','$eid','$p','$mobile','$address','$courseid','$s','$dob','$image','$gen','$status',now())");	

    mkdir("../student/image/$eid");
     move_uploaded_file($_FILES['pic']['tmp_name'],"../student/image/$eid/".$_FILES['pic']['name']);


	$err="<font color='blue'>Congrats Your Data Saved!!!</font>";
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

<h2>Add Student</h2>
<form method="POST" enctype="multipart/form-data">
<table border="0" class="table">
  <tr>
  <td colspan="2"><?php echo @$err; ?></td>
  </tr>
	<tr>
    <th width="237" scope="row">Select Department</th>
    <td width="213">
	<select name="courseid" class="form-control" onchange="showSemester(this.value)" id="courseid">
    <option disabled selected >Select Department</option>
	<?php 
	$dep=mysqli_query($con,"select * from department");
	while($dp=mysqli_fetch_array($dep))
	{
	$dp_id=$dp[0];
	echo "<option value='$dp_id'>".$dp[1]."</option>";
	}
	?>
	
    </select>
	</td>
  </tr>
   
    <tr>
    <th width="237" scope="row">Select Semester</th>
    <td width="213">
	<select name="s" id="semester" onchange="showsemester(this.value)" class="form-control"/>
    <option disabled selected >Select Semester</option>
    
    <?php
	$sub=mysqli_query($con,"select * from semester");
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
    <th width="237" scope="row">Student Name </th>
    <td width="213"><input type="text" name="stname" class="form-control" placeholder="enter your name"/></td>
  </tr>
  <tr>
    <th scope="row">Enter Your Email </th>
    <td><input type="email" name="eid" class="form-control" placeholder="enter your email"/></td>
  </tr>
  
  <tr>
    <th scope="row">Enter Your Password </th>
    <td><input type="password" name="p" class="form-control" placeholder="enter your Password"/></td>
  </tr>
  
  <tr>
    <th scope="row">Enter Your Mobile </th>
    <td><input type="number" name="mobile" class="form-control" placeholder="enter your mobile"/></td>
  </tr>
  
  <tr>
    <th scope="row">Enter Your Address</th>
    <td><input type="text" name="address" class="form-control" placeholder="enter your address"/></td>
  </tr>
  
   <tr>
    <th scope="row">Enter Your D.O.B</th>
    <td><input type="date" name="dob" class="form-control" placeholder="enter your D.O.B"/></td>
  </tr>
  
   <tr>
    <th scope="row">Upload Your Pic</th>
    <td><input type="file" name="pic" class="form-control" placeholder="Upload your Pic"/></td>
  </tr>
  
   <tr>
    <th scope="row">Enter Your Gender</th>
    <td>male<input type="radio"value="m" id="gen" name="gen"/>
		female<input type="radio"value="f" id="gen" name="gen"/></td>
  </tr>
	<tr>
    <th scope="row">Status</th>
	<td>
    <select name="status" class="form-control"/>
	<option value="" selected="selected" disabled="disabled">Select Status</option>
	<option>ON</option>
	<option>OFF</option>
	</select>
	</td>
  </tr>
  
 
  <tr>
    <th colspan="1" scope="row"></th>
	<td>
	<input type="submit" value="Add Student" name="save" class="btn btn-success" />
	
	<input type="reset" value="Reset" class="btn btn-success"/>
	
	</td>
  </tr>
</table>
</form>
</div>
</div>