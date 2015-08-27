<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<?php
        include 'inc/connect.php';
		
		include 'inc/nested_query.php';
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Signup</title>
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
				if(true)
				{
					echo'<div class="title">
							Signup:				
						</div>
						<form action="signup.php" method="post">
							first name: <input type="text" name="first_name"> <br/>
							last name: <input type="text" name="last_name"> <br/>
							password: <input type="password" name="password"> <br/>
							confirm password: <input type="password" name="confirm_password"> <br/>
							<input type="submit">
						</form>';
						
					echo "A confirmation email will be sent to your gsmst.org email. If you are teacher and wish to sign up, contact us at email@email.email.";
				} else {
					echo 'check to see if the name is signed up';
						//check to see that all parts filled out, passwords match, antispam question
						//say to check email
						//add confirmed field to user table
				}
			?>
		</div>
		
		<div class="footer">
			<div class="footer_content">
				(c) Alonzo Hernandez 2014
			</div>
		</div>
	</body>
</html>