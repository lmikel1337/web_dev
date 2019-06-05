<!DOCTYPE html>
<html>
<?php
	session_start();
?>

	<head>
		<title>Delete data</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css">
	</head>

	<body>
		<div class="navbar">
			<a href="../index.html">home</a>

			<div class="dropdown">
				<button class="dropbtn">form
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-content">
					<a href="../menu/get.html">Get</a>
				    <a href="../menu/post.html">Post</a>
			        <a href="../menu/file_upload.html">file upload</a>
				</div>
			</div>

			<div class="dropdown">
				<button class="dropbtn">cookies
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-content">
					<a href="../menu/enabled_disabled.html">enabled/disabled</a>
				    <a href="../menu/create_retrieve.html">create/retrieve</a>
			        <a href="../menu/modify_delete.html">modify/delete</a>
				</div>
			</div>

			<div class="dropdown">
				<button class="dropbtn">sessions
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-content">
					<a href="../menu/start.html">start</a>
				    <a href="../menu/get_modify.html">get/modify</a>
			        <a href="../menu/destroy.html">destroy</a>
				</div>
			</div>

			<div class="dropdown">
				<button class="dropbtn">date/time
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-content">
					<a href="../menu/today_is.html">today is</a>
				    <a href="../menu/timezone.html">timezone</a>
			        <a href="../menu/timestamp.html">timestamp</a>
				</div>
			</div>

			<div class="dropdown">
				<button class="dropbtn">database
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-content">
					<a href="../menu/connect.html">Connect</a>
					<a href="../menu/create_db.html">Create DataBase</a>
					<a href="../menu/create_table.html">Create table</a>
					<a href="../menu/create_data.html">Create data</a>
					<a href="../menu/read_data.html">Read data</a>
					<a href="../menu/update_data.html">Update data</a>
					<a href="../menu/delete_data.html">Delete data</a>
				</div>
				
			</div>

			<a href="../menu/phpinfo.html">Phpinfo</a>
		</div>

		<p style="color: white">
			<?php
				if(!isset($_SESSION["servername"]) && !isset($_SESSION["username"])
					&& !isset($_SESSION["password"]) && !isset($_SESSION["dbName"])){
					echo "Session is not set";
				}else {
				$servername = $_SESSION["servername"];
				$username = $_SESSION["username"]; 
				$password = $_SESSION["password"];  
				$databaseName = $_SESSION["dbName"];
				// Create connection
				$conn = mysqli_connect($servername, $username, $password, $databaseName);
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
				$id = $_POST["id"];
				// sql to delete a record
				$sql = "DELETE FROM MyGuests WHERE id='$id'";
				if ($conn->query($sql) === TRUE) {
					echo "Record deleted successfully";
				} else {
					echo "Error deleting record: " . $conn->error;
				}
				$conn->close();
				}
      		?>
		</p>

	</body>

</html>