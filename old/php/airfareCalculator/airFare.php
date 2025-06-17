<!DOCTYPE html>
<!--Author:	Brian Wardwell
	Date:	December 17th, 2014
	File:	airFare.php
	Purpose:Chapter 13 Exercise
-->
<!-- airFare.php ALGORITHM:

	INCLUDE incTravel.php
	GET destination from user 
		IF (destination == "Barcelona")
				RETURN "Web Airlines"
			ELSEIF (destination == "Cairo")
				RETURN "PHP Air"
			ELSEIF (destination == "Rome")
				return "Air Java"
			ELSEIF (destination == "Santiago")
				RETURN "SQL Air"
			ELSEIF (destination == "Tokyo")
				RETURN "Object-Oriented Airlines"
		ENDIF
		airline = getAirline(destination)
		IF (destination == "Barcelona")
				RETURN 875.00
			ELSEIF (destination == "Cairo")
				RETURN 950.00
			ELSEIF (destination == "Rome")
				RETURN  875.00
			ELSEIF (destination == "Santiago")
				RETURN 820.00
			ELSEIF (destination == "Tokyo")
				RETURN 1575.00 - 200.00
		ENDIF
		airFare = getAirfare(destination)
		DISPLAY airline, airFare
	
	END
-->
<html>
<head>
	<title>AIR FARE</title>
	<link rel="stylesheet" type="text/css" href="../scss/fall2014styles.css"><!--Link to main CSS styles -->
</head>
<body>

	<h1>AIR FARE CALCULATOR</h1>

	<?php
		
		// Accessing incTravel.php
		include ("incTravel.php");

		// Getting input from user 
		$destination = $_POST['destination'];
		
		// Getting airline
		$airline = getAirline($destination);
		// Getting air fare
		$airFare = getAirfare($destination);
		
		// Printing data
		print("<p>Destination: $destination<br>");
		print("The air fare is $".number_format($airFare, 2)." on $airline.</p>");


	?>
	<?php include '../includes/redirect.php'; ?> <!-- Redirect include -->
</body>
</html>
