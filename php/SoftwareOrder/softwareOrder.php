<!DOCTYPE html>
<!--Author:	Brian Wardwell
	Date:	November 26th, 2014
	File:	softwareOrder.php
	Purpose:Chapter 13 Exercise

-->
<!-- softwareOrder ALGORITHM:

	INCLUDE incSoftwareOrder.php
	GET os from user
	GET numCopies from user

	IF numCopies < 1
		DISPLAY "ERROR: YOu must order at least 1 copy!
	ELSE
		subtotal = getSubTotal(numCopies)
		salesTax = getSalesTax(subTotal)
		shippingAndHandling = getShippingAndHandling(numCopies)
		totalCost = subTotal + salesTax + shippingAndHandling
		DISPLAY "Your Order:", os, numCopies, subTotal, salesTax, shippingAndHandling, totalCost
	END
-->
<!-- incSoftwareOrder.php ALGORITHMS:

	getSubtotal FUNCTION:
		RECEIVE numCopies from softwareOrder.php
			numCopies * 35.75
			RETURN numCopies
		END
	
	getSalesTax FUNCTION:
		RECEIVE subTotal from softwareOrder.php
			subTotal * 0.07
			RETURN subtotal
		END
	
	getShippingAndHandling FUNCTION:
		RECEIVE numCopies from softwareOrder.php
			IF (numCopies < 5)
				shippingAndHandling = 3.50
				RETURN shippingAndHandling
			ELSE
				shippingAndHandling = numCopies * 0.75
				RETURN shippingAndHandling
			END
-->
<html>
<head>
	<title>SaveTheWorld Software</title>
	<link rel ="stylesheet" type="text/css" href="sample.css" >
</head>
<body>

	<h1>SaveTheWorld Software: Order Form</h1>

	<?php
	
		include ("incSoftwareOrder.php");
		
		// Getting input from user
		$os = $_POST['os'];
		$numCopies = $_POST['numCopies'];

		if ($numCopies < 1) // Error message if number of copies is less than one
			print("ERROR: You must order at least 1 copy!");
		else
		{
			$subTotal = getSubTotal($numCopies); // Returning calculations from incSoftwareOrder.php
			$salesTax = getSalesTax($subTotal);
			$shippingAndHandling = getShippingHandling($numCopies);
	
			
		/*
		**	If I were to format the numbers to two decimal places, would this be correct?
		
			$subTotal = number_format($subTotal,2);
			$salesTax = number_format($salesTax,2);
			$shippingAndHandling = number_format($salesTax,2);
		*/
			// Calculating total cost
			$totalCost = $subTotal + $salesTax + $shippingAndHandling;
			
			// Printing for user.
			print("<hr /><p><strong>YOUR ORDER:</strong> </p><hr />");
			print("<p>Operating System: $os<br />");
			print("Number of copies: $numCopies<br />");
			print("Sub-total: $$subTotal<br />");
			print("Sales tax: $$salesTax<br />");
			print("Shipping and handling: $$shippingAndHandling</p>");
			print("<hr /><p><strong>TOTAL: $$totalCost</strong></p><hr />");
		}
	?>

</body>
</html>
