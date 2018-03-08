<?php
	
	$servername = "sql.njit.edu";
	$username = "eo65";
	$password = "SECRETPAAA";
    
	try 
	{
    	$conn = new PDO("mysql:host=$servername;dbname=eo65", $username, $password);
    	echo "<p>Connected successfully</p> <br>";
    }
	catch(PDOException $e)
    {
    	echo "Connection failed: " . $e->getMessage();
    }

    $limit = 6;
    $count = 0;
 	$query = "SELECT email,fname, lname, phone, birthday, gender, password FROM accounts WHERE id < :limit";
 	$stmt = $conn->prepare($query);
 	$stmt->bindValue(':limit', $limit);
 	$stmt->execute();
 	$accounts = $stmt->fetchAll();
 	$stmt->closeCursor();

 	foreach ($accounts as $account) {
 		$count++;	
 	}
 	echo "Number of records: $count records <br><br>";
?>

<!DOCTYPE html>
<html>
<body>

<h1>Results</h1>

<?php foreach ($accounts as $account) : ?>
<table>
	<tr>
		<td><?php echo $account['email']; ?></td>
		<td><?php echo $account['fname']; ?></td>
		<td><?php echo $account['lname']; ?></td>
		<td><?php echo $account['phone']; ?></td>
		<td><?php echo $account['birthday']; ?></td>
		<td><?php echo $account['gender']; ?></td>
		<td><?php echo $account['password']; ?></td>
	</tr>
</table>
<?php endforeach; ?>

</body>
</html>
