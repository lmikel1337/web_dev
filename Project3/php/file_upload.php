<!DOCTYPE html>
<html>

	<head>
		<title>File upload</title>
		<link rel="stylesheet" type="text/css" href="..//css/style.css">
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
        $target_dir = "/Users/svatoslavdarmograj/Documents/GitHub/web_dev/Project2/uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
                echo $_FILES["fileToUpload"]["error"];
            }
        }
      ?>
    </p>

    <img src="<?="../uploads/".basename($_FILES["fileToUpload"]["name"])?>"/>

	</body>

</html>