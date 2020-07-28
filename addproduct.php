<?php
	if(isset($_POST['submit']))
	{		
		include("trangchu.php");
		require("mysqli_connect.php");
		
	
		$movietName = $_POST["txtmovieName"];
		
		
		$target_dir = "images/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$errors = "";
		$name = $_FILES["fileToUpload"]["name"];
	
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		
		
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check ==false) {
				
				$errors = "Sory, this is not an image file";
			}
	
	
		if (file_exists($target_file)) {
			$errors = $errors . "<br/>Sorry, file already exists.";
			
		}
		
		if ($_FILES["fileToUpload"]["size"] > 50000000) {
			$errors = $errors . "<br/>Sorry, your file is too large.";
			
		}
		
		if($imageFileType != "jpg" && $imageFileType != "JPG" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			$errors = $errors . "<br/>Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			
		}//add
		if ($errors != "") {
			echo $errors;
	
		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			
				
				
			
			$imageName = basename( $_FILES["fileToUpload"]["name"]);
			$query = "INSERT INTO movies( movieName, image) VALUE ( '$movieName','$image')";
			$result = mysqli_query($dbc, $query);
				
			} else {
				echo "<br/>Sorry, there was an error uploading your file.";
			}
		}
	}
?>

		<h1>Upload Images</h1>
		<form action = "addproduct.php" method = "post" enctype = "multipart/form-data">
			
			Product Name
			<input type = "text" name = "txtmovieName" />
			<p>
			Select an image to upload
			<p>
			<input type = "file" name = "fileToUpload" id = "fileToUpload">
			</p>
			<p>
			<input type = "submit" value = "Insert New" name = "submit">
			</p>


		</form>
