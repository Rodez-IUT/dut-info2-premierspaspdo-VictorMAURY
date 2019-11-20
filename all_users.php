<DOCTYPE HTML>
<head>
	<title>all_users.php</title>

</head>

<body>


<?php

	$host = 'localhost';
	$db   = 'my_activities';
	$user = 'root';
	$pass = 'root';
	$charset = 'utf8mb4';
	$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
	$options = [
		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES   => false,
	];
	
	try {
		$pdo = new PDO($dsn, $user, $pass, $options);

	} catch (PDOException $e) {
		throw new PDOException($e->getMessage(), (int)$e->getCode());
	}
	
	$stmt = $pdo->query("SELECT users.id, username, email, status.name FROM users JOIN status ON users.status_id = status.id WHERE username LIKE 'e%' AND status.id = '2' ORDER BY username ");
	
	echo "<table>";
		echo "<tr>";
			echo "<td>";
				echo "ID";
			echo "</td>";
			echo "<td>";
				echo "username";
			echo "</td>";
			echo "<td>";
				echo "email";
			echo "</td>";
			echo "<td>";
				echo "status";
			echo "</td>";
		echo "</tr>";
		
	while ($row = $stmt->fetch())
	{
		echo "<tr>";
			echo "<td>";
				echo $row['id'] . " ";
			echo "</td>";
			echo "<td>";
				echo $row['username'] . " ";
			echo "</td>";
			echo "<td>";
				echo $row['email'] . "<br>";
			echo "</td>";
			echo "<td>";
				echo $row['name'];
			echo "</td>";
		echo "</tr>";
	}
	echo "</table>";

?>

</body>

</html>
	