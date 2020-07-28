<style>
	form	{
		position: fixed;
		top: 40%;
		width: 30%;
		
		background-color: white;
		left:35%;
	}
	
</style>
	<form action = "signin.php" method = "post"  >
		<fieldset align = "center">
			Username
			<input type = "text" name="txtUsername"/>
			<p>
			Password
			<input type = "password" name = "txtPassword" />
			
			<p>
			<input type = "submit" name = "sign" value="Sign In"/>
		
		
</fieldset>
	
</form>	
<?php

    include("trangchu.php");
    require("mysqli_connect.php");
    if(isset($_POST['signin'])){
		$username = $_POST["txtUsername"];
		$password = $_POST["txtPassword"];
		
		$errors = "";
		
        if(empty($username)){
			
			$errors = "You forgot to enter username, please enter it";
			
		}
		
		if(empty($password)){
			
			$errors = $errors . "<br/>You forgot to enter password, please enter it";
			
		}
		if(empty($errors)){
			$query = "SELECT userName , password FROM accounts WHERE (userName = '$username'  password = SHA('$password')) ";
        $result = mysqli_query($dbc, $query);
        $num = mysqli_num_rows($result);
			
			if($num==0){
				echo "Username or Password is wrong, try again";
				header("Location:trangchu.php");

			}
			else{
				$row = mysqli_fetch_array($result);
		
				$_SESSION['user_name']=$row['userName'];
				$name =$row['userName'];
				setcookie("accounts",  $name,  time()+60*60*2); 
		
			header('Location:index.php');}
			
		}
       
  

    }
?>


	