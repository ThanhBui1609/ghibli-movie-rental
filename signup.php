<style>
	form	{
		position: fixed;
		top: 50%;
		width: 20%;
		background-color: white;
		left:35%;
	}
	
</style>


<form action = "signup.php" method = "post">
		<fieldset  align="center">
			Username
			<input type = "text" name="txtUsername"/>
			<p>
			Password
			<input type = "password" name = "txtPassword" />
			<p>
			Email
			<input type = "email" name = "txtEmail" />
			<p>
			Country
			<input type = "text" name = "txtCountry" />
			<p>
			<input type = "submit" name = "signup" value="signup"/>
		
		
		</fieldset>
	
	</form>
<?php
	include("trangchu.php");
	require("mysqli_connect.php");
	if(isset($_POST["signup"])){
		$username = $_POST["txtUsername"];
		$password = $_POST["txtPassword"];
		$country= $_POST["txtCountry"];
		$email= $_POST["txtEmail"];
		$errors = "";
		
		if(empty($username)){
			
			$errors = "You forgot to enter username, please enter it";
			
		}
		
		if(empty($password)){
			
			$errors = $errors . "<br/>You forgot to enter password, please enter it";
			
		}
		if(empty($country)){
			
			$errors = "You forgot to enter country, please enter it";
			
		}
		if(empty($email)){
			
			$errors = "You forgot to enter email, please enter it";
			
		}
		
		if(empty($errors)){
			$query = "SELECT * FROM accounts WHERE (userName = '$username'  password = SHA('$password') email='$email'  country='$country') ";
			$result = mysqli_query($dbc, $query);
			$num = mysqli_num_rows($result);
			
			if($num==0){
				
				$query = "INSERT INTO accounts(userName, password, country, email) VALUE ('$username', SHA('$password', '$country', '$email'))";
				$result = mysqli_query($dbc, $query);
				header("Location:trangchu.php");
			}
			else{
				echo "Your account is in the system";
			}
		}
		else{
			echo "$errors";
		}
		
	}
	
?>
	
	

	