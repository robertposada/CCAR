<?php
	
	session_start();
	include("connection.php");
	echo $_SESSION['id'];
	
	if ($_POST["submit"]) {
		$result = '<div class="alert alert-success">Form submitted</div>';
		if (!$_POST['school-name'] OR !$_POST['school-address'] OR !$_POST['school-city'] OR !$_POST['school-state'] OR !$_POST['school-zip'] OR !$_POST['start'] ) {
			
			$error="<br />Please enter all current school information";
		
		}
		
		if (!$_POST['reasons']) {
			
			$error.="<br />Please enter how you heard of the scholarship";
		
		}
		
		if (!$_POST['high-school-name'] OR !$_POST['high-school-address'] OR !$_POST['high-school-city'] OR !$_POST['high-school-state'] OR !$_POST['high-school-zip'] OR !$_POST['graduation'] ) {
			
			$error.="<br />Please enter all high school information";
		
		}
		
		if ($error) {
			
			$result='<div class="alert alert-danger"></strong>There were error(s) in your application</strong>'.$error.'</div>';
		
		}
		else {
			if (mysqli_connect_error()) {
				die("Could not connect to database");
			};
			//do something to database
			$query = "INSERT INTO `Testing` (`id`, `school-name`, `school-address`, `school-city`, `school-state`, `school-zip`, `start`, `end`, `school2-name`, `school2-address`, `school2-city`, `school2-state`, `school2-zip`, `reasons`, `high-school-name`, `high-school-address`, `high-school-city`, `high-school-state`, `high-school-zip`, `graduation`) VALUES('". $_SESSION['id'] ."', '". $_POST['school-name'] ."', '". $_POST['school-address'] ."', '". $_POST['school-city'] ."', '". $_POST['school-state'] ."', '". $_POST['school-zip'] ."', '". $_POST['start'] ."', '". $_POST['end'] ."', '". $_POST['school2-name'] ."', '". $_POST['school2-address'] ."', '". $_POST['school2-city'] ."', '". $_POST['school2-state'] ."', '". $_POST['school2-zip'] ."', '". $_POST['reasons'] ."', '". $_POST['high-school-name'] ."', '". $_POST['high-school-address'] ."', '". $_POST['high-school-city'] ."', '". $_POST['high-school-state'] ."', '". $_POST['high-school-zip'] ."', '". $_POST['graduation'] ."')";
			
			mysqli_query($link, $query);
			
		}
	
	}

?>

<!DOCTYPE html>
<html>
<head>
    <title>CCAR application 2</title>
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
    		padding: 25px 0 15px 0;
    	}

    	h3 {
    		font-family: candara;
    		font-weight: bold;
    		font-size: 1.5em;
    	}

    	h5 {
    		font-family: candara;
    		font-size: 1em;
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

				        <h3>Currently Enrolled College</h3>
				        <br>
				        <label for="school-name">School:</label>
						<input type="text" name="school-name" class="form-control" placeholder="School" value="<?php echo $_POST['school-name']; ?>" />
						<label for="school-address">Address:</label>
						<input type="text" name="school-address" class="form-control" placeholder="Address" value="<?php echo $_POST['school-address']; ?>" />

						<label for="school-city">City:</label>
						<input type="text" name="school-city" class="form-control" placeholder="City" value="<?php echo $_POST['school-city']; ?>" />

						<label for="school-state">State: <span>*</span></label><br/>
				        <select name="school-state" class="form-control" value="<?php echo $_POST['school-state']; ?>" >
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

				        <label for="school-zip">Zip Code:</label>
				        <input type="text" name="school-zip" class="form-control" placeholder="Zip Code" value="<?php echo $_POST['school-zip']; ?>" />
				        <br>
				        <label for="start">Date started:</label>
						<input type="date" name="start" class="form-control" value="<?php echo $_POST['start']; ?>" />
						<label for="end">Date ended:</label>
						<input type="date" name="end" class="form-control" value="<?php echo $_POST['end']; ?>" />
				        <br>
				        <h3>College Next Fall</h3>
				        <h5>(Leave blank if address is same as above)</h5>
				        <br>
				        <label for="school2-name">School:</label>
						<input type="text" name="school2-name" class="form-control" placeholder="School" value="<?php echo $_POST['school2-name']; ?>" />
						<label for="school2-address">Address:</label>
						<input type="text" name="school2-address" class="form-control" placeholder="Address" value="<?php echo $_POST['school2-address']; ?>" />

						<label for="school2-city">City:</label>
						<input type="text" name="school2-city" class="form-control" placeholder="City" value="<?php echo $_POST['school2-city']; ?>" />

						<label for="school2-state">State: <span>*</span></label><br/>
				        <select name="school2-state" class="form-control" value="<?php echo $_POST['school2-state']; ?>" >
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

				        <label for="school2-zip">Zip Code:</label>
				        <input type="text" name="school2-zip" class="form-control" placeholder="Zip Code" value="<?php echo $_POST['school2-zip']; ?>" />
				        <br>
						<label for="reasons">How did you learn about the CCAR Scholarship Program?</label>

						<textarea class="form-control" name="reasons" ><?php echo $_POST['reasons']; ?></textarea>
						<br>

						<h3>High school</h3>
						<br>
						<label for="high-school-name">School:</label>
						<input type="text" name="high-school-name" class="form-control" placeholder="School" value="<?php echo $_POST['high-school-name']; ?>" />
						<label for="high-school-address">Address:</label>
						<input type="text" name="high-school-address" class="form-control" placeholder="Address" value="<?php echo $_POST['high-school-address']; ?>"/>

						<label for="high-school-city">City:</label>
						<input type="text" name="high-school-city" class="form-control" placeholder="City" value="<?php echo $_POST['high-school-city']; ?>" />

						<label for="high-school-state">State: <span>*</span></label><br/>
				        <select name="high-school-state" class="form-control" value="<?php echo $_POST['high-school-state']; ?>" >
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

				        <label for="high-school-zip">Zip Code:</label>
				        <input type="text" name="high-school-zip" class="form-control" placeholder="Zip Code" value="<?php echo $_POST['high-school-zip']; ?>" />
						<label for="graduation">Graduation Date:</label>
						<input type="date" name="graduation" class="form-control" value="<?php echo $_POST['graduation']; ?>" />

						<br><br>

						<!-- <a href="application3.html" class="btn btn-primary-outline" role="button" type="submit">Next</a> -->
						<button name="submit" value="submit" type="submit" class="btn btn-primary">Submit</button>

					</div>
				</form>
			</div>
		</div>
	</div>	

</body>
</html>