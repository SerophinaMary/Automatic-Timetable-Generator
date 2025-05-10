<?php 
include('../config.php');
$stu_id=$_REQUEST['stu_id'];
$q=mysqli_query($con,"select * from student where stu_id='$stu_id'");
$res=mysqli_fetch_array($q);


//print_r($res);


extract($_POST);
if(isset($update))
{	
$oldimg=$_GET['img'];
unlink("../student/image/$email/$oldimg");
    $image=$_FILES['pic']['name'];	
	mysqli_query($con,"update student set name='$name',eid='$eid',password='$p',mob='$mobile',address='$address',department_id='$course',sem_id='$semester',
dob='$dob',pic='$image',gender='$gen',status='$status' where  stu_id='".$_SESSION['stu_id']."'");

 mkdir("../student/image/$eid");
     move_uploaded_file($_FILES['pic']['tmp_name'],"../student/image/$eid/".$_FILES['pic']['name']);
	
	$err= "Records updated";
	
	
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
xmlhttp.open("GET","updatestudent_ajax.php?id="+str,true);
xmlhttp.send();
}
</script>



<div class="row">
<div class="col-sm-8" >
<h2>Update Student</h2>
<form method="POST" enctype="multipart/form-data">
  <table border="0" class="table">
  <tr>
  <td colspan="2"><?php echo @$err; ?></td>
  </tr>
  
  <tr>
    <th width="237" scope="row">Department Name </th>
    <td width="213">
	
	<select name="course" onChange="showSemester(this.value)" class="form-control">
	<?php 
	$cou=mysqli_query($con,"select * from department");
	while($c=mysqli_fetch_array($cou))
	{
	$c_id=$c[0];
	?>
	<option value='<?php echo $c_id; ?>' <?php if($c_id==$res['department_id']){echo "selected";} ?>>
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
	
	<select name="semester" id="semester" class="form-control">
	<?php	
	$sem=mysqli_query($con,"select * from semester where department_id='".$res['department_id']."'");
	while($s=mysqli_fetch_array($sem))
	{
	$s_id=$s[0];
	?>
	<option value='<?php echo $s_id; ?>' <?php if($s_id==$res['sem_id']){echo "selected";} ?>>
	<?php echo $s[1]; ?>
	</option>
	<?php
	}
	?>
	
	
    </select>
	</td>
	
	</tr>

  
   <tr>
    <th width="237" scope="row">Student Name </th>
    <td width="213"><input type="text" name="name" class="form-control" placeholder="enter your name" value="<?php echo $res['name'];?>"/></td>
  </tr>
  
  <th scope="row">Enter Your Email </th>
    <td><input type="email" name="eid" class="form-control" placeholder="enter your email" value="<?php echo $res['eid'];?>" /></td>
  </tr>
  
  <th scope="row">Enter Your Password </th>
    <td><input type="password" name="p" class="form-control" placeholder="enter your Password" value="<?php echo $res['password'];?>" /></td>
  </tr>
  
  <tr>
    <th scope="row">Enter Your Mobile </th>
    <td><input type="number" name="mobile" class="form-control" placeholder="enter your mobile" value="<?php echo $res['mob'];?>"/></td>
  </tr>
  
  <tr>
    <th scope="row">Enter Your Address</th>
    <td><input type="text" name="address" class="form-control" placeholder="enter your address" value="<?php echo $res['address'];?>" /></td>
  </tr>
  
   <tr>
    <th scope="row">Enter Your D.O.B</th>
    <td><input type="date" name="dob" class="form-control" placeholder="enter your D.O.B" value="<?php echo $res['dob']; ?>"/></td>
  </tr>
  
   <tr>
    <th scope="row">Upload Your Pic</th>
    <td><input type="file" name="pic" class="form-control" placeholder="Upload your Pic" value="<?php echo $res['pic']; ?>"/></td>
  </tr>
  
   <tr>
    <th scope="row">Enter Your Gender</th>
    <td>male</font>
     <input type="radio" value="m" id="gen" name="gen" <?php if($res['gender']=="m"){echo "checked";} ?>/>
     female</font>
    <input type="radio"value="f" id="gen" name="gen" <?php if($res['gender']=="f"){echo "checked";} ?>/></td>
  </tr>
  
  <tr>
    <th scope="row">Status</th>
    <td><input type="text" name="status" class="form-control" placeholder="enter your Status" value="<?php echo $res['status'];?>"/></td>
  </tr>
  
  
    <th colspan="2" scope="row" align="center">
<input type="submit" value="Update Records" name="update" class="btn btn-success"/>
	</th>
  </tr>
</table>
</form>
               
                
</div>
</div>
