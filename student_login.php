<!DOCTYPE html>
<html>
<head>
	<title>Student Login</title>
	<style>
        body {
            background-color: rgb(13, 15, 81);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #FFFFFF;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        h3 {
            font-size: 2em;
            margin-bottom: 20px;
            text-align: center;
            color: #E0E1DD;
            text-shadow: 2px 2px 4px #000000;
        }

        form {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            text-align: center;
        }

        input[type="text"], input[type="password"] {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #415A77;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #1B263B;
            color: #FFFFFF;
            border: 1px solid #415A77;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 1em;
            cursor: pointer;
            margin-top: 10px;
            transition: background-color 0.3s, transform 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #415A77;
            transform: scale(1.05);
        }

        input[type="submit"]:active {
            background-color: #1B263B;
            transform: scale(1);
        }
		.error{
            display: block;
            color: red; 
            font-size: 1em;
            margin-top: 10px;
            text-align: center;
        }
	</style>
</head>
<body>
	<center><br><br>
		<h3>Student LogIn Page</h3><br>
		<form action="" method="post">
			Email ID: <input type="text" name="email" required><br><br>
			Password: <input type="password" name="password" required><br><br>
			<input type="submit" name="submit" value="LogIn">
		</form><br>
		<?php
			session_start();
			if(isset($_POST['submit']))
			{
				$connection = mysqli_connect("localhost","root","");
				$db = mysqli_select_db($connection,"sms");
				$query = "select * from students where email = '$_POST[email]'";
				$query_run = mysqli_query($connection,$query);
				while ($row = mysqli_fetch_assoc($query_run)) 
				{
					if($row['email'] == $_POST['email'])
					{
						if($row['password'] == $_POST['password'])
						{
							$_SESSION['name'] =  $row['name'];
							$_SESSION['email'] =  $row['email'];
							header("Location: student_dashboard.php");
						}
						else{
							?>
							<span class="error">Wrong Password !!</span>
							<?php
						}
					}
					else
					{
						?>
						<span class="error">Wrong UserName !!</span>
						<?php
					}
				}
			}
		?>
	</center>
</body>
</html>