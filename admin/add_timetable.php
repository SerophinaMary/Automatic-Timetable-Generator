<?php 
include('../config.php');
include("timetablegen.php");
extract($_POST);


if(isset($generate) || isset($regenerate))
{

  $_GET['generated'] = "true";
	
}
else{
  $_GET['generated'] = "";
}

?>

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


<div class="row">
<div class="col-sm-12">
<h2>Generate Time Table</h2>
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
	<select name="s" id="semester" onchange="showSubject(this.value)" class="form-control"/>
    <option disabled selected >Select Semester</option>
    
 	</select>
	</td>
  </tr>

  <tr>
    <th colspan="1" scope="row"></th>
	<td>
	<input type="submit" value="Generate Time Table" name="generate" class="btn btn-success" />
	</td>
  </tr>
  <?php
     if($_GET['generated']){
  ?>
  <tr>
	<td>
	<!-- <input type="submit" value="Regenerate" name="regenerate" class="btn btn-primary" /> -->
	</td>
	<td class="text-right">
	<!-- <input type="submit" value="Save" name="save" class="btn btn-primary text-right" /> -->
	</td>
  </tr>
  <?php
     }
  ?>

  </table>
  </form>
  </div>
  </div>
<div>
<?php 

  if($_GET['generated']){

    $weekDays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
    $lunch = "LUNCH";

    $query = "select * from department where department_id = $courseid";
    $que=mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($que);
    $branch = $row['department_name'];

    $query = "select * from semester where sem_id = $s";
    $que=mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($que);
    $semester = $row['semester_name'];

    if($branch && $semester){
      echo "<div style='font-size: 32'><b>".$branch." ".$semester." Semester</b></div><br>";
    }

    $weekTimeTable = generate_time_table($con, $courseid, $s);

    if($weekTimeTable){

      echo "<table border='1' class='table'>";
  
      echo "<tr class='danger text-center'>
      <th class='text-center'>Days/Lecture</th>
      <th class='text-center'>Lecture 1<br>09:00-10:00</th>
      <th class='text-center'>Lecture 2<br>10:00-11:00</th>
      <th class='text-center'>Lecture 3<br>11:00-12:00</th>
      <th class='text-center'>Lecture 4<br>12:00-01:00</th>
      <th class='text-center'>Break</th>
      <th class='text-center'>Lecture 5<br>02:30-03:30</th>
      <th class='text-center'>Lecture 6<br>03:30-04:30</th>";
  
      for($i = 0; $i < 5; $i++){
        echo "<tr>";
        echo "<th center class='danger text-center'>".$weekDays[$i]."</th>";
        for($j = 0; $j < 6; $j++){
            if($weekTimeTable[$i][$j]['type'] === 'Lab'){
              echo "<th class=' text-center' colspan=2>".$weekTimeTable[$i][$j]['subject_name']."</th>";
              $j++;
            }
            else{
              echo "<th class=' text-center'>".$weekTimeTable[$i][$j]['subject_name']."</th>";
            }
            if($j === 3){
              echo "<th class=' text-center'><b style='text-sze=24'>".$lunch[$i]."</b></th>";
            }
        }
        echo "</tr>";
      }
  
      }
      else{
        echo "<div style='text-size=28'><b>Not enough data for selected Course and semester.</b></div>";
      }
      
    }

?>

</div>