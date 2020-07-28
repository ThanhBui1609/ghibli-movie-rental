
<?php
include("trangchu.php");
	require("mysqli_connect.php");

	$query= "SELECT * FROM movies";
	$result = mysqli_query($dbc, $query) ;

	
	echo "<table border = '1' width = '400' height = '60' align = 'center' background-color='white'>";
	echo "<tr><th>Id</th><th>Movie</th><th>Image</th><th>View Details</th><th>Delete Product</th></tr>";
	while($row = mysqli_fetch_array($result)) 
		{ 
		$image = $row["image"];
		echo "<tr>";
		echo "<td>" , $row["ID"];
		echo "<td>" , $row["movieName"];
		

		 echo "<td>" ,"<img src = 'images/$image' width = '30' height = '30' align = 'top'/>";
		 echo "<td><a href='productdetails.php?ID=",$row['ID'],"'>", 'View', "</a></td>";

		echo "<td><a href='delete.php?ID=", $row['ID'], "'onclick='return confirm (\"Are you sure! you want to delete the quote?\");'>Delete</a></td>";	
		echo "</tr>";
	}
	echo "</table>";
?>

