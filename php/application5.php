<?php

	session_start();
	include("connection.php");
	echo $_SESSION['id'];

	if ($_POST["submit"]) {
		$result = '<div class="alert alert-success">Form submitted</div>';
		if (!$_POST['essay']) {
			$error = "<br />Please complete the required essay";
		}
		if ($error) {
			$result = '<div class="alert alert-danger"></strong>There were error(s) in your application</strong>'.$error.'</div>';
		}
		else {
			if (mysqli_connect_error()) {
				die("Could not connect to database");
			};
			//do something to database
			$query = "INSERT INTO `essay` (`essay`) VALUES(''". $_POST['essay'] ."')";
			
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
					
						<h3>Essay</h3>

						<label for="essay">What are your reasons for pursuing a career in real estate, finance, or business? (Approx. 300 words)</label>
						<textarea class="form-control" name="essay"><?php echo $_POST['essay']; ?></textarea>

						<br><br>

						<button name="submit" value="submit" type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>	

</body>
</html>