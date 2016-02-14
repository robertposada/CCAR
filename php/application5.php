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
				
				<form method="post">
					<div class="form-group">
					
						<h3>Essay</h3>

						<label for="essay">What are your reasons for pursuing a career in real estate, finance, or business? (Approx. 300 words)</label>
						<textarea class="form-control" name="essay"></textarea>

						<br><br>

						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>	

</body>
</html>