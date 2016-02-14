<?php
	
	session_start();
	include("connection.php");
	echo $_SESSION['id'];
	
	if ($_POST["submit"]) {
		$result = '<div class="alert alert-success">Form submitted</div>';
		if (!$_POST['plans'] ) {
			
			$error="<br />Please enter your plans after graduation";
		
		}
		
		if ($error) {
			
			$result='<div class="alert alert-danger"></strong>There were error(s) in your application</strong>'.$error.'</div>';
		
		}
		else {
			if (mysqli_connect_error()) {
				die("Could not connect to database");
			};
			//do something to database
			$query = "INSERT INTO `extra-curricular` (`id`, `awards`, `business-courses-grades`, `current-business-courses`, `honor-societies`, `sports-clubs`, `plans-after-graduation`, `employer`, `supervisor`, `job-title`, `job-duties`,  `job-date-start`, `job-date-end`, `reason-for-leaving`) VALUES('". $_SESSION['id'] ."', '". $_POST['honors'] ."', '". $_POST['past-courses'] ."', '". $_POST['current-courses'] ."', '". $_POST['societies'] ."', '". $_POST['sports'] ."', '". $_POST['plans'] ."', '". $_POST['employer'] ."', '". $_POST['supervisor'] ."', '". $_POST['job-title'] ."', '". $_POST['duties'] ."', '". $_POST['job-start'] ."', '". $_POST['job-end'] ."', '". $_POST['reason-for-leaving'] ."')";
			
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
					<h3>Extra-Curricular Activities</h3>
						<label for="honors">Honors, awards, and/or special achievements:</label>
						<textarea class="form-control" name="honors" ><?php echo $_POST['honors']; ?></textarea>

						<label for="past-courses">Real estate, finance, and/or business courses you have completed with grades:</label>
						<textarea class="form-control" name="past-courses"><?php echo $_POST['past-courses']; ?></textarea>

						<label for="current-courses">Real estate, finance, and/business courses in which you are currently enrolled:</label>
						<textarea class="form-control" name="current-courses"><?php echo $_POST['current-courses']; ?></textarea>

						<label for="societies">Honorary and/or professional societies:</label>
						<textarea class="form-control" name="societies" ><?php echo $_POST['societies']; ?></textarea>

						<label for="sports">Sports and club memberships:</label>
						<textarea class="form-control" name="sports" ><?php echo $_POST['sports']; ?></textarea>

						<label for="plans">What are your immediate plans after graduation?</label>
						<textarea class="form-control" name="plans" ><?php echo $_POST['plans']; ?></textarea>

						<h3>Most recent or current employment</h3>
						<label for="employer">Employer:</label>
						<input type="text" name="employer" class="form-control" placeholder="Employer" value="<?php echo $_POST['employer']; ?>" />

						<label for="supervisor">Supervisor:</label>
						<input type="text" name="supervisor" class="form-control" placeholder="Supervisor" value="<?php echo $_POST['supervisor']; ?>" />

						<label for="job-title">Job Title:</label>
						<input type="text" name="job-title" class="form-control" placeholder="Job Title" value="<?php echo $_POST['job-title']; ?>" />

						<label for="duties">Specific Duties:</label>
						<textarea class="form-control" name="duties" ><?php echo $_POST['duties']; ?></textarea>

						<div class="radio">
							<label class="radio-inline">
								<input type="radio" name="work-time-start" id="male" value="male" />Full time
							</label>
							<label class="radio-inline">
								<input type="radio" name="work-time-end" id="female" value="male" />Part time
							</label>
						</div>

						<label for="job-start">Date started:</label>
						<input type="date" name="job-start" class="form-control" value="<?php echo $_POST['honors']; ?>"/>
						<label for="job-end">Date ended:</label>
						<input type="date" name="job-end" class="form-control" value="<?php echo $_POST['honors']; ?>"/>

						<label for="reason-for-leaving">Reason for leaving:</label>
						<textarea class="form-control" name="reason-for-leaving" value="<?php echo $_POST['honors']; ?>"><?php echo $_POST['reason-for-leaving']; ?></textarea>						

						<br><br>
						
						
						<!--<a href="application4.html" class="btn btn-primary" role="button" type="submit">Next</a>-->
						<button name="submit" value="submit" type="submit" class="btn btn-primary">Submit</button>

					</div>
				</form>
			</div>
		</div>
	</div>	

</body>
</html>