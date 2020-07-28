
<?php
	include("trangchu.php");
	require("mysqli_connect.php");
 
	
	
	$query="SELECT * FROM movies ";

	$result = mysqli_query($dbc, $query) ;
	echo "<table border = '1' width = '400' height = '60' align = 'center'>";

	while($row = mysqli_fetch_array($result))
		{ //fetch the array of the records

		$image = $row["image"];
		echo "<tr>";
		echo "<th>ID</th>" . "<td>" . $row["ID"];
		echo "</tr>";
		echo "<tr>";
		echo "<th>Movie Name</th>" ."<td>" . $row['movieName'];
		echo "</tr>";
		echo "<th>Description</th>" ."<td>" . $row['description'];
		echo "</tr>";
		echo "<tr>";
		 echo "<th>Image</th>" ."<td>" . "<img src = 'images/$image' width = '30' height = '30' align = 'top'/>";
		 
		echo "</tr>";

	}
	echo "</table>";

?>

