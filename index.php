<!DOCTYPE html>
<html>
<head>

	<title>Login Page</title>
	<style>
        body {
			background-image: url(images/login.jpg);
            background-repeat: no-repeat;
            background-size: cover; /* Dark blue background */
            color: #FFFFFF; /* White text for contrast */
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

        /* Form and input button style */
        form {
            text-align: center;
        }

        input[type="submit"] {
            background-color: #1B263B; /* Darker blue button background */
            color: #FFFFFF; /* White text */
            border: 1px solid #415A77; /* Border to give it structure */
            border-radius: 5px; /* Slightly rounded corners */
            padding: 10px 20px; /* Padding for better click area */
            font-size: 1em; /* Font size */
            cursor: pointer; /* Pointer cursor on hover */
            margin: 10px; /* Margin between buttons */
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
	<h3>Student Management System</h3><br>
	<form action="" method="POST">
		<input type="submit" name="admin_login" value="Admin Login" required>
		<input type="submit" name="student_login" value="Student Login" required>
	</form>
	<?php
	//login.php
	
		if(isset($_POST['admin_login'])){
			header("Location: admin_login.php");
		}
		if(isset($_POST['student_login'])){
			header("Location: student_login.php");
		}
	?>
	</center>
</body>
</html>