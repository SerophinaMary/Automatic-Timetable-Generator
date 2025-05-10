<?php
include('../config.php');
$q=mysqli_query($con,"select * from teacher where teacher_id='".$_SESSION['teacher_id']."'");
$res=mysqli_fetch_assoc($q);
$opass=$res['password'];
extract($_POST);
if(isset($update))
{
	 if($np=="" || $op=="" || $cp=="")
	{
	$err="<font color='red'>fill all the fields first</font>";
	}
	else
	{
		if($op==$opass)
		{
			if($np==$cp)
			{
			mysqli_query($con,"UPDATE teacher SET password='$np' where teacher_id='".$_SESSION['teacher_id']."'");
			$err="<font color='blue'>Password Updated</font>";
			}
			else
			{
			$err="<font color='red'>New password not equal to confirm password</font>";
			}
		}
		else
		{
		$err="<font color='red'>Old Pass not matched</font>";
		}			
	}
}
	?>
 
              <div class="row" style="height:700px">
<div class="col-md-5"> 
           
               <h2>Update Password</h2>
<form method="POST" enctype="multipart/form-data">
  <table border="0" cellspacing="5" cellpadding="5" class="table">
  
 
  
  <tr>
  <th><h3><?php echo $err; ?></h3></th>
  </tr>
  <tr>
    <th width="237" scope="row">Old Password </th>
    <td width="213"><input type="text" name="op" class="form-control" value="<?php echo $res['password'];?>"/></td>
  </tr>
  
  <tr>
    <th width="237" scope="row">New Password </th>
    <td width="213"><input type="password" name="np" class="form-control" value="<?php echo $np; ?>"/></td>
  </tr>
  
  <tr>
    <th width="237" scope="row">Confirm Password </th>
    <td width="213"><input type="password" name="cp" class="form-control" value="<?php echo $cp; ?>"/></td>
  </tr>
  
  <tr>
    <th colspan="2" scope="row" align="center">
<input type="submit" value="Update Records" class="btn btn-default" name="update"/>
	</th>
  </tr>
   
</table>
</form>
</div>
</div>
               
                