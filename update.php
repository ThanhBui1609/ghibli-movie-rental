
<style>
	form	{
		position: fixed;
		top: 40%;
		
		
		background-color: white;
		left:35%;
	}
	
</style>


	<form action = "update.php" method = "post">
		<fieldset align ="center">
			Username
			<input type = "text" name="txtUsername"/>
			<p>
			Create Current Password
			<input type = "password" name = "txtPassword" />
			<p>
			Create New Password
			<input type = "password" name = "txtNewPassword" />
			<p>
			Confirm Password
			<input type = "password" name = "txtConfirm" />
			
			<p>
			<input type = "submit" name = "update" value="Update Data"/>
		
		
		</fieldset>
	
	</form>



<?php
    include("trangchu.php");
    require("mysqli_connect.php");
    if(isset($_POST['update'])){
        $username = $_POST["txtUsername"];
        $password = $_POST["txtPassword"];
		$newPassword = $_POST["txtNewPassword"];
		$confirm = $_POST["txtConfirm"];
		if($newPassword == $confirm){

				//login
				$query = "SELECT * FROM accounts WHERE (username = '$username' AND password = SHA('$password'))";
				$results = mysqli_query($dbc, $query);
				$num = mysqli_num_rows($results);
				
				if($num != 0){
					
				$query = "UPDATE accounts SET password = SHA('$newPassword') WHERE username = '$username' AND password = SHA('$password')";
                $results = mysqli_query($dbc, $query);
                header('Location:trangchu.php');
				}
				
				else{
					echo "Your password and re-entered password is not the same";
				}
		}
		

    }
?>
	
	