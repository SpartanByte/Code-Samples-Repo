<!--	Author: Brian Wardwell
		Date:	November 26th, 2014
		File:	incSoftwareOrder.php
		Purpose: Functions for softwareOrder.php
-->
<?php
		// getSubtotal multiplies number of copies by 35.75 (cost of each)
		function getSubTotal ($numCopies)
		{
			$subTotal = $numCopies * 35.75;
			return $subTotal;
		}

		// getSalesTax multiplies subtotal by 0.07 (sales tax)
		function getSalesTax ($subTotal) {
			$salesTax = $subTotal * 0.07;
			return $salesTax;
		}

		/*
		getShippingAndHandling calculates shipping and handling:
			3.50 if number of copies is less than five
			0.75 multiplied by number of copies if five or more
		*/
		function getShippingHandling($numCopies) {
			if ($numCopies < 5) {
				$shippingAndHandling = 3.50;
				return $shippingAndHandling;
			} else {
				$shippingAndHandling = $numCopies * 0.75;
				return $shippingAndHandling;
			}
		}
		
		
?>