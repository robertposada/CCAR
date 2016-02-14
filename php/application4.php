<?php
	
	session_start();
	include("connection.php");
	echo $_SESSION['id'];
	
	if ($_POST["submit"]) {
		$result = '<div class="alert alert-success">Form submitted</div>';
		if (!$_POST['ref-name'] OR !$_POST['faculty-title'] OR !$_POST['ref-phone'] OR !$_POST['ref-email'] ) {
			
			$error="<br />Please enter all reference information";
		
		}
		
		if ($error) {
			
			$result='<div class="alert alert-danger"></strong>There were error(s) in your application</strong>'.$error.'</div>';
		
		}
		else {
			if (mysqli_connect_error()) {
				die("Could not connect to database");
			};
			//do something to database
			$query = "INSERT INTO `references` (`id`, `ref-name`, `faculty-title`, `ref-phone`, `ref-email`) VALUES('". $_SESSION['id'] ."', '". $_POST['ref-name'] ."', '". $_POST['faculty-title'] ."', '". $_POST['ref-phone'] ."', '". $_POST['ref-email'] ."')";
			
			mysqli_query($link, $query);
			
		}
	
	}

?>

<!doctype html>
<html>
<head>
    <title>CCAR application</title>
    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <style type="text/css">

    	#emailForm {
    		border: 1px solid gray;
    		border-radius: 10px;
    		margin-top: 20px;
    		margin-bottom: 20px;
    	}

    	h2 {
    		text-align: center;
    		font-family: candara;
    		font-weight: bold;
    	}

    	h3 {

    	}

    	#line {
    		height: 20px;
    		border-top: 1px dotted gray;
    	}
    </style>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2" id="emailForm">
				<h2>CCAR Scholarship Application</h2>
				<div id="line"></div>
				
				<?php echo $result; ?>
				
				<form method="post">
					<div class="form-group">
					
						<h3>Reference</h3>
						<h5>(Reference to be a <b><i>faculty member</i></b> of your college)</h5>
						<label for="ref-name">Name:</label>
						<input type="text" name="ref-name" class="form-control" placeholder="Name" value="<?php echo $_POST['ref-name']; ?>" />

						<label for="faculty-title">Faculty Title:</label>
						<input type="text" name="faculty-title" class="form-control" placeholder="Faculty title" value="<?php echo $_POST['faculty-title']; ?>" />

						<label for="ref-phone">Phone:</label>
						<input type="text" name="ref-phone" class="form-control" placeholder="Phone" value="<?php echo $_POST['ref-phone']; ?>" />

						<label for="ref-email">Email:</label>
						<input type="email" name="ref-email" class="form-control" placeholder="email@example.com" value="<?php echo $_POST['ref-email']; ?>" />

						<br><br>

						<!--<a href="application5.html" class="btn btn-primary" role="button" type="submit">Next</a>-->
						
						<button name="submit" value="submit" type="submit" class="btn btn-primary">Submit</button>

					</div>
				</form>
			</div>
		</div>
	</div>	

</body>
</html>