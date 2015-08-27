<?php
	include 'inc/connect.php';
	
	$logged_in = isset($_COOKIE['logged_in']);
	
	echo '<div class="right_header_content">';
	if(!($logged_in))
	{
		echo '<a href="/network/login.php">login</a> or <a href="/network/signup.php">signup</a>';
	} else {
		$query = "SELECT * FROM `users` WHERE id=".$_COOKIE['logged_in']." LIMIT 1";
		
		$first_name = "";
		
		if($query_run = mysqli_query($con, $query)) 
		{
			while($query_row = mysqli_fetch_assoc($query_run))
			{
				
				$first_name = $query_row['first'];
			}
		}
		echo "Welcome, ".$first_name."!";
		
		//delete cookie and unlog in if the user isn't real
		
		//echo 'logged in';
		//echo 'user image';
		//echo 'inbox';
		//echo 'search';
		//echo 'settings';
	}
	echo '</div>';
?>