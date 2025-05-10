<script>
	function deleteData(id)
	{
		if(confirm("You want to delete ?"))
		{
		window.location.href="deletecourse.php?course_id="+id;
		}
	
	}
</script>

<?php 
include('../config.php');

//<!--data display-->


echo "<table border='1' class='table table-striped'>";

echo "<tr class='danger'><th colspan='4'><a href='admindashboard.php?info=add_course'>Add New</a></th></tr>";

echo "<Tr><th>Id</th><th>Department</th><th>Update</th><th>Delete</th></tr>";

	$que=mysqli_query($con,"select *  from department");
	while($res=mysqli_fetch_array($que))
	{
	echo "<Tr>";
	echo "<td>".$res['department_id']."</td>" ;
	echo "<td>".$res['department_name']."</td>" ;
	echo "<td><a href='admindashboard.php?info=updatecourse&department_id=$res[department_id]'>Update</a></td>";
	?>
    
<td><a href='javascript:deleteData("<?php echo  $res[department_id];?>")'>Delete</a></td>
	<?php 
	echo "</tr>";
	}
	
echo "</table>";	

?>
