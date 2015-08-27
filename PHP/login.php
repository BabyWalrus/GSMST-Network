<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<?php
	include 'inc/connect.php';
	
	include 'inc/nested_query.php';
	
	if(isset($_POST['email']))
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		$sql = "SELECT * FROM `users` WHERE `email`='$email'";
		if($query_run = mysqli_query($con, $sql)) {
			while($query_row = mysqli_fetch_assoc($query_run)) {
				$pass = $query_row['password'];
				$id = $query_row['id'];
				
				if($pass == $password)
				{
					setcookie("logged_in", $id, time() + (60), "/");
					header('Location: http://gsmst.net/network/');
					die();
				}
			}
		}
	}
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="style.css">
		<link rel="shortcut icon" href="favicon.ico" />
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
    </head>
	<body>
		<div class="header">
			<div class="header_content">
				<div class="header_logo">
					GSMST Network
				</div>
				
				<?php
					include 'logged_in.php';
				?>
			</div>
		</div>

		<div class="center">
			<?php
				echo'<div class="title">
						Login:				
					</div>
					<form action="login.php" method="post">
						email: <input type="text" name="email"> <br/>
						password: <input type="password" name="password"> <br/>
						<input type="submit">
					</form>';
			?>
		</div>
		
		<div class="footer">
			<div class="footer_content">
				(c) Alonzo Hernandez 2014
			</div>
		</div>
	</body>
</html>