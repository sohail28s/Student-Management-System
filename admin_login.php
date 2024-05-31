<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<style>
		
        /* General body style */
        body {
            background-color: rgb(13, 15, 81); /* Dark blue background */ /* Path to your background image */
            background-size: cover; /* Cover the entire area */
            background-position: center; /* Center the image */
            background-repeat: no-repeat; /* Do not repeat the image */
            color: white; /* White text for contrast */
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        /* Title style */
        h3 {
            font-size: 2em;
            margin-bottom: 20px;
            text-align: center;
            color: #E0E1DD; /* Light grey to contrast the dark background */
            text-shadow: 2px 2px 4px #000000; /* Subtle shadow for depth */
        }

        /* Form style */
        form {
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black background */
            padding: 20px;
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Shadow for depth */
            text-align: center;
        }

        /* Input field style */
        input[type="text"], input[type="password"] {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #415A77; /* Border to give it structure */
            border-radius: 5px; /* Slightly rounded corners */
            box-sizing: border-box; /* Include padding and border in element's total width and height */
        }

        /* Submit button style */
        input[type="submit"] {
            background-color: #1B263B; /* Darker blue button background */
            color: #FFFFFF; /* White text */
            border: 1px solid #415A77; /* Border to give it structure */
            border-radius: 5px; /* Slightly rounded corners */
            padding: 10px 20px; /* Padding for better click area */
            font-size: 1em; /* Font size */
            cursor: pointer; /* Pointer cursor on hover */
            margin-top: 10px; /* Margin on top of the button */
            transition: background-color 0.3s, transform 0.3s; /* Smooth transitions */
        }

        input[type="submit"]:hover {
            background-color: #415A77; /* Slightly lighter on hover */
            transform: scale(1.05); /* Slightly enlarge on hover */
        }

        input[type="submit"]:active {
            background-color: #1B263B; /* Reset to original on active */
            transform: scale(1); /* Reset scale on active */
        }
	</style>
</head>
<body>
	<center><br><br>
		<h3>Admin LogIn Page</h3><br>
		<form action="" method="post">
			Email ID: <input type="text" name="email" required><br><br>
			Password: <input type="password" name="password" required><br><br>
			<input type="submit" name="submit" value="LogIn">
		</form><br>
		
		<?php
			session_start();
			if(isset($_POST['submit'])){
				$connection = mysqli_connect("localhost","root","");
				$db = mysqli_select_db($connection,"sms");
				$query = "select * from login where email = '$_POST[email]'";
				$query_run = mysqli_query($connection,$query);
				while ($row = mysqli_fetch_assoc($query_run)) {
					if($row['email'] == $_POST['email']){
						if($row['password'] == $_POST['password']){
							$_SESSION['name'] =  $row['name'];
							$_SESSION['email'] =  $row['email'];
							header("Location: admin_dashboard.php");
						}
						else{
							?>
							<span>Wrong Password !!</span>
							<?php
						}
					}
				}
				
			}
		?>
	</center>
</body>
</html>