<script>
	function deleteData(id)
	{
		if(confirm("You want to delete ?"))
		{
		window.location.href="deletesemester.php?sem_id="+id;
		}
	
	}
</script>

<?php 
include('../config.php');



//<!--data display-->


echo "<table border='1' class='table'>";

echo "<tr class='danger'><th colspan='5'><a href='admindashboard.php?info=add_semester'>Add New</a></th></tr>";

echo "<Tr><th>Sem Id</th><th>Semester</th><th>Department</th><th>Update</th><th>Delete</th></tr>";

	$que=mysqli_query($con,"select *  from semester");
	while($res=mysqli_fetch_array($que))
	{
	echo "<Tr>";
	echo "<td>".$res['sem_id']."</td>" ;
	echo "<td>".$res['semester_name']."</td>" ;
	
	//display department name
	$que1=mysqli_query($con,"select *  from department where department_id='".$res['department_id']."'");
	$res1=mysqli_fetch_array($que1);
	
	echo "<td>".$res1['department_name']."</td>" ;
	echo "<td><a href='admindashboard.php?info=updatesemester&sem_id=$res[sem_id]'>Update</a></td>";
	?>
    
<td><a href='javascript:deleteData("<?php echo  $res[sem_id];?>")'>Delete</a></td>
	<?php 
	echo "</tr>";
	}
	
echo "</table>";	

?>
