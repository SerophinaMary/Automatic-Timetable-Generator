<script>
	function deleteData(id)
	{
		if(confirm("You want to delete ?"))
		{
		window.location.href="deletestudent.php?stu_id="+id;
		}
	
	}
</script>

<?php 
include('../config.php');

echo "<table border='1' class='danger'>";

echo "<tr class='danger' bgcolor='#FFCCCC'><th colspan='14'><a href='admindashboard.php?info=add_student'>Add New</a></th></tr>";

echo "<Tr><th>Student Id</th><th>Student Name</th><th>Email</th><th>Password</th>
<th>Mobile</th><th>Address</th><th>Department</th><th>Semester</th><th>D.O.B</th>
<th>Pic</th><th>Gender</th><th>Status</th>
<th>Update</th><th>Delete</th></tr>";

	$que=mysqli_query($con,"select *  from student");
	while($res=mysqli_fetch_array($que))
	{
	echo "<Tr>";
	echo "<td>".$res['stu_id']."</td>" ;
	echo "<td>".$res['name']."</td>" ;
	echo "<td>".$res['eid']."</td>" ;
	echo "<td>".$res['password']."</td>" ;
	echo "<td>".$res['mob']."</td>" ;
	echo "<td>".$res['address']."</td>" ;
	
	//display department name
	$que2=mysqli_query($con,"select *  from department where department_id='".$res['department_id']."'");
	$res2=mysqli_fetch_array($que2);
	
	echo "<td>".$res2['department_name']."</td>" ;
	
	
	//display semester name
	$que1=mysqli_query($con,"select *  from semester where sem_id='".$res['sem_id']."'");
	$res1=mysqli_fetch_array($que1);
	echo "<td>".$res1['semester_name']."</td>" ;
	
	echo "<td>".$res['dob']."</td>" ;
	echo "<td>".$res['pic']."</td>" ;
	echo "<td>".$res['gender']."</td>" ;
	echo "<td>".$res['status']."</td>" ;
	echo "<td><a href='admindashboard.php?info=updatestudent&stu_id=$res[stu_id]'>Update</a></td>";
	?>
    
<td><a href='javascript:deleteData("<?php echo  $res[stu_id];?>")'>Delete</a></td>
	<?php 
	echo "</tr>";
	}
	
echo "</table>";	

?>
