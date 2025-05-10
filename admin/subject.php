<script>
	function deleteData(id)
	{
		if(confirm("You want to delete ?"))
		{
		window.location.href="deletesubject.php?subject_id="+id;
		}
	
	}
</script>

<?php 
include('../config.php');


echo "<table border='1' class='table'>";

echo "<tr class='danger'><th colspan='9'><a href='admindashboard.php?info=add_subject'>Add New</a></th></tr>";

echo "<Tr><th>Subject Id</th><th>Subject Name</th><th>Semester</th><th>Department</th><th>Teacher</th>
<th>Lecture/Week</th><th>Type</th><th>Update</th><th>Delete</th></tr>";

	$que=mysqli_query($con,"select *  from subject");
	while($res=mysqli_fetch_array($que))
	{
	echo "<Tr>";
	echo "<td>".$res['subject_id']."</td>" ;
	echo "<td>".$res['subject_name']."</td>" ;
	
	//display semester name
	$que1=mysqli_query($con,"select *  from semester where sem_id='".$res['sem_id']."'");
	$res1=mysqli_fetch_array($que1);

	echo "<td>".$res1['semester_name']."</td>" ;
	
	//display department name
	$que2=mysqli_query($con,"select *  from department where department_id='".$res['department_id']."'");
	$res2=mysqli_fetch_array($que2);
	
	echo "<td>".$res2['department_name']."</td>" ;

	//display teacher name
	$que3=mysqli_query($con,"select * from teacher where teacher_id='".$res['teacher_id']."'");
	$res3=mysqli_fetch_array($que3);

	echo "<td>".$res3['name']."</td>" ;

	echo "<td>".$res['lecture_per_week']."</td>" ;

	echo "<td>".$res['type']."</td>" ;

	echo "<td><a href='admindashboard.php?info=updatesubject&subject_id=$res[subject_id]'>Update</a></td>";
	?>
    
<td><a href='javascript:deleteData("<?php echo  $res[subject_id];?>")'>Delete</a></td>
	<?php 
	echo "</tr>";
	}
	
echo "</table>";	

?>
