<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<?php
        include 'inc/connect.php';
		
		include 'inc/nested_query.php';
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Network</title>
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
				$user_id = 1;
				
				if (isset($_GET['id'])) {
					$user_id = $_GET['id'];
				}
				
				//force homepage if not logged in
				
				$query = "SELECT * FROM `users` WHERE id=".$user_id." LIMIT 1";
				
				
				$first = "";
				$last = "";
				$user_image = "";
				$description = "";
				$date_joined = "";
				$grade = 0;
				$teacher = false;
				if($query_run = mysqli_query($con, $query)) {
					while($query_row = mysqli_fetch_assoc($query_run)) {
						$first = $query_row['first'];
						$last = $query_row['last'];
						$user_image = $query_row['user_image'];
						$description = $query_row['description'];
						$date_joined = $query_row['date_joined'];
						$grade = $query_row['grade'];
						$teacher = $query_row['teacher'];
					}
				}
				echo '<div class="content_row"><div class="user_image">';
				echo '<img src="'.$user_image.'" alt="generic" width="300px" height="300px"/>';
				echo '</div><div class="user_info_container"><div class="user_desc">';
				echo '<div class="title">'.$first.' '.$last.'</div>';
				
				if($teacher)
				{
					echo 'Teacher';
				} else {
					echo 'Grade: '.$grade;
				}
				echo '<br/>Joined '.$date_joined.'<br/>';
				echo $description;
				echo '</div><div class="user_friends">';
				
				$query = "SELECT person2_id FROM `friends` WHERE person1_id=".$user_id;
				
				$i = 0;
				
				echo 'Friends:<br/>';
				if($result = mysqli_query($con, $query)) {
					$num = mysqli_num_rows($result);
					$friend_id = func_mysqli_result($result, $i, "person2_id");
					
					if($num == 0)
						echo 'No friends';
					else {
						while($i < $num) {
							$friend_id = func_mysqli_result($result, $i, "person2_id");
							
							$query2 = "SELECT user_image FROM `users` WHERE id=".$friend_id;
							$result2 = mysqli_query($con, $query2);
							$num2 = mysqli_num_rows($result2);
							$i2 = 0;
							while($i2 < $num2) {
								$friend_image = func_mysqli_result($result2, $i2, "user_image");
								echo '<a href="/network/?id='.$friend_id.'"><img src="'.$friend_image.'" alt="generic" width="30px" height="30px"/></a>';
								
								$i2++;
							}
							
							$i++;
						}
					}
				}
				
				
				echo '</div></div></div>';
				
				//ADD: FRIENDS
				//ADD: SCHEDULE
				//ADD: POSTS
				//ADD: POST REPLIES
				
				mysqli_close();
			?>
		</div>
		
		<div class="footer">
			<div class="footer_content">
				(c) Alonzo Hernandez 2014
			</div>
		</div>
	</body>
</html>