<?php include "templates/header.php"; ?>

<h2>Add a user</h2>
<!--
<form method="post">
Website, Google, Facebook, Yelp
	<label for="location">Location</label>
	<input type="text" name="location" id="location">	
	<label for="street">Street</label>
	<input type="text" name="street" id="street">
	<label for="street2">Street 2</label>
	<input type="text" name="street2" id="street2">
	<label for="city">City</label>
	<input type="text" name="city" id="city">
	<label for="state">State</label>
	<input type="text" name="state" id="state">
	<label for="zip">Zip</label>
    <input type="text" name="zip" id="zip">
	<label for="phone">Phone</label>
    <input type="text" name="phone" id="phone">
    <br/>
	<input type="submit" name="submit" value="Submit">
</form> -->

<form method="post">
	<label for="firstname">First Name</label>
	<input type="text" name="firstname" id="firstname">
	<label for="lastname">Last Name</label>
	<input type="text" name="lastname" id="lastname">
	<label for="email">Email Address</label>
	<input type="text" name="email" id="email">
	<label for="age">Age</label>
	<input type="text" name="age" id="age">
	<label for="location">Location</label>
	<input type="text" name="location" id="location">
	<br/>
	<input type="submit" name="submit" value="Submit">
	

</form>

<?php
if (isset($_POST['submit'])) {
	require "../config.php";

	try {
		$connection = new PDO($dsn, $username, $password, $options);
		// insert new user code will go here
		$connection = new PDO($dsn, $username, $password, $options);

$new_user = array(
	"firstname" => $_POST['firstname'],
	"lastname"  => $_POST['lastname'],
	"email"     => $_POST['email'],
	"age"       => $_POST['age'],
	"location"  => $_POST['location']
);

$sql = sprintf(
		"INSERT INTO %s (%s) values (%s)",
		"users",
		implode(", ", array_keys($new_user)),
		":" . implode(", :", array_keys($new_user))
);

$statement = $connection->prepare($sql);
$statement->execute($new_user);
	} catch(PDOException $error) {
		echo $sql . "<br>" . $error->getMessage();
	}
	
}
?>

<a href="index.php">Back to home</a>

<?php include "templates/footer.php"; ?>