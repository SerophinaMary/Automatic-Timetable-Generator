<?php 
if($_GET['generated']){

	include "timetablegen.php";

	echo "<table border='1' class='table'>";

	echo "<tr class='danger'>
	<th>Days/Lecture</th>
	<th>Lecture 1</th>
	<th>Lecture 2</th>
	<th>Lecture 3</th>
	<th>Lecture 4</th>
	<th>Lecture 5</th>
	<th>Lecture 6</th>";

}

?>