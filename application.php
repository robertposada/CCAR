<?php

	$link = mysqli_connect("localhost", "cl19-ccar", "tGd9YWB/D", "cl19-ccar");
	if (mysqli_connect_error()) {
		die("Could not connect to database");
	};

	if ($_POST["submit"]) {
		$result = '<div class="alert alert-success">Form submitted</div>';
		if (!$_POST['first-name']) {
			
			$error="<br />Please enter your first name";
		
		}
		if (!$_POST['last-name']) {
			
			$error.="<br />Please enter your last name";
		
		}
		if (!$_POST['email']) {
			
			$error.="<br />Please enter your email address";
		
		}
		
		if (!$_POST['birthdate']) {
			
			$error.="<br />Please enter your birthdate";
		
		}
		
		if ($_POST['email']!="" AND !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) { 
    		$error.="<br />Please enter a valid email address"; 
		}
		
		if (!$_POST['home-address'] OR !$_POST['home-city'] OR !$_POST['home-state'] OR !$_POST['home-zip']) {
			
			$error.="<br />Please enter your complete home address";
		
		} 
		
		if ($error) {
			
			$result='<div class="alert alert-danger"></strong>There were error(s) in your application</strong>'.$error.'</div>';
		
		}
		else {
			//do something to database
			$query = "INSERT INTO `applicants` (`first-name`, `middle-initial`, `last-name`, `gender`, `birthdate`, `citizen`, `home-phone`, `cellphone`, `email`, `address`, `city`, `state`, `zip`) VALUES('". $_POST['first-name'] ."', '". $_POST['middle-initial'] ."', '". $_POST['last-name'] ."', '". $_POST['gender'] ."', '". $_POST['birthdate'] ."', '". $_POST['citizen'] ."', '". $_POST['home-phone'] ."', '". $_POST['cellphone'] ."', '". $_POST['email'] ."', '". $_POST['home-address'] ."', '". $_POST['home-city'] ."', '". $_POST['home-state'] ."', '". $_POST['home-zip'] ."')";
			
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
    	
    	a {
    		text-decoration:none;
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
						<label for="first-name">First Name:</label>
						<input type="text" name="first-name" class="form-control" placeholder="First Name" value="<?php echo $_POST['first-name']; ?>" />

						<label for="middle-initial">Middle Initial:</label>
						<input type="text" name="middle-initial" class="form-control" placeholder="Middle Initial" value="<?php echo $_POST['middle-initial']; ?>" />

						<label for="last-name">Last Name:</label>
						<input type="text" name="last-name" class="form-control" placeholder="Last Name" value="<?php echo $_POST['last-name']; ?>" />

						<label for="gender">Gender:</label>
						<div class="radio">
							<label class="radio-inline">
								<input type="radio" name="genders" id="male" value="male" />Male
							</label>
							<label class="radio-inline">
								<input type="radio" name="genders" id="female" value="male" />Female
							</label>
							<label class="radio-inline">
								<input type="radio" name="genders" id="decline-to-state" value="male" />Decline to answer
							</label>
						</div>

				        <label for="birthday">Birthdate:</label>
				            <input type="date" class="form-control" name="birthdate" value="<?php echo $_POST['birthdate']; ?>" />

				        <label for="citizen">U.S. Citizen:</label>
						<div class="radio">
							<label class="radio-inline">
								<input type="radio" name="citizens" id="Yes" value="male" />Yes
							</label>
							<label class="radio-inline">
								<input type="radio" name="citizens" id="No" value="male" />No
							</label>
						</div>

						<label for="home-phone">Home Phone:</label>
						
						<input type="tel" name="home-phone" class="form-control" placeholder="Home Phone" value="<?php echo $_POST['home-phone']; ?>" />

						<label for="cell-phone">Cell Phone:</label>
						<input type="tel" name="cellphone" class="form-control" placeholder="Cell Phone" value="<?php echo $_POST['cellphone']; ?>" />

						<label for="email">Email Address:</label>
						<input type="email" name="email" class="form-control" placeholder="e.g. email@example.com" value="<?php echo $_POST['email']; ?>" />

						<h3>Home Address</h3>
						<label for="home-address">Address:</label>
						<input type="text" name="home-address" class="form-control" placeholder="Address" value="<?php echo $_POST['home-address']; ?>" />

						<label for="home-city">City:</label>
						<input type="text" name="home-city" class="form-control" placeholder="City" value="<?php echo $_POST['home-city']; ?>" />

						<label for="home-state">State: <span>*</span></label><br/>
				        <select name="home-state" class="form-control" value="<?php echo $_POST['home-state']; ?>">
				            <option value="AL">AL</option>
				            <option value="AK">AK</option>
				            <option value="AZ">AZ</option>
				            <option value="AR">AR</option>
				            <option value="CA">CA</option>
				            <option value="CO">CO</option>
				            <option value="CT">CT</option>
				            <option value="DE">DE</option>
				            <option value="DC">DC</option>
				            <option value="FL">FL</option>
				            <option value="GA">GA</option>
				            <option value="HI">HI</option>
				            <option value="ID">ID</option>
				            <option value="IL">IL</option>
				            <option value="IN">IN</option>
				            <option value="IA">IA</option>
				            <option value="KS">KS</option>
				            <option value="KY">KY</option>
				            <option value="LA">LA</option>
				            <option value="ME">ME</option>
				            <option value="MD">MD</option>
				            <option value="MA">MA</option>
				            <option value="MI">MI</option>
				            <option value="MN">MN</option>
				            <option value="MS">MS</option>
				            <option value="MO">MO</option>
				            <option value="MT">MT</option>
				            <option value="NE">NE</option>
				            <option value="NV">NV</option>
				            <option value="NH">NH</option>
				            <option value="NJ">NJ</option>
				            <option value="NM">NM</option>
				            <option value="NY">NY</option>
				            <option value="NC">NC</option>
				            <option value="ND">ND</option>
				            <option value="OH">OH</option>
				            <option value="OK">OK</option>
				            <option value="OR">OR</option>
				            <option value="PA">PA</option>
				            <option value="RI">RI</option>
				            <option value="SC">SC</option>
				            <option value="SD">SD</option>
				            <option value="TN">TN</option>
				            <option value="TX">TX</option>
				            <option value="UT">UT</option>
				            <option value="VT">VT</option>
				            <option value="VA">VA</option>
				            <option value="WA">WA</option>
				            <option value="WV">WV</option>
				            <option value="WI">WI</option>
				            <option value="WY">WY</option>
				        </select>

				        <label for="home-zip">Zip Code:</label>
				        <input type="text" name="home-zip" class="form-control" placeholder="Zip Code" value="<?php echo $_POST['home-zip']; ?>" />

						<br><br>
						
						<!--<a href="application2.html" class="btn btn-primary" role="button" type="submit" name="submit">Next</a>-->

						<button name="submit" value="submit" type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>	
</body>
</html>