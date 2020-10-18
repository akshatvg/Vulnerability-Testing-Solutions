<!DOCTYPE html>
<html>

<head>
	<title>SQL Injection</title>
	<link rel="shortcut icon" href="../Resources/hmbct.png" />
	<link rel="stylesheet" href="../Resources/button.css">
</head>

<body style="background: #2F3FB0; color: white;">

	<div style="background-color:#ffffff;color: #037BFE;border-radius: 30px;box-shadow: 0 0 1px 1px gray;padding: 10px;">
		<button type="button" name="homeButton" onclick="location.href='../homepage.html';" class="button" style="margin-top: 30px;margin-bottom: 30px;">Home Page</button>
		<button type="button" name="mainButton" onclick="location.href='sqlmainpage.html';" class="button" style="margin-top: 30px;margin-bottom: 30px;">Main Page</button>
	</div>


	<div align="center">
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
			<p>Give me book's number and I give you book's name in my library.</p>
			Book's number : <input type="text" name="number">
			<button type="submit" name="submit" value="Submit" class="button" style="margin-top: 30px;margin-bottom: 30px;">Submit</button>
		</form>
	</div>

	<?php
	$servername = 'localhost';
	$username = "akshatvg";
	$password = "qwerty";
	$db = "1ccb8097d0e9ce9f154608be60224c7c";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $db);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	//echo "Connected successfully";
	if (isset($_POST["submit"])) {
		$number = $_POST['number'];
		$query = "SELECT bookname,authorname FROM books WHERE number = $number"; //Int
		$result = mysqli_query($conn, $query);

		if (!$result) { //Check result
			$message  = 'Invalid query: ' . mysql_error() . "\n";
			$message .= 'Whole query: ' . $query;
			die($message);
		}

		while ($row = mysqli_fetch_assoc($result)) {
			echo "<hr>";
			echo $row['bookname'] . " ----> " . $row['authorname'];
		}

		if (mysqli_num_rows($result) <= 0)
			echo "0 result";
	}

	?>

</body>

</html>