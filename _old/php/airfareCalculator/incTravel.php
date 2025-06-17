<?php
		// Added getAirline() function 
		function getAirline($destination)
		{
			if ($destination == "Barcelona")
				return "Web Airlines";
			elseif ($destination == "Cairo")
				return "PHP Air";
			elseif ($destination == "Rome")
				return "Air Java";
			elseif ($destination == "Santiago")
				return "SQL Air";
			elseif ($destination == "Tokyo")
				return "Object-Oriented Airlines";
		}

		function getHotelRate($destination)
		{
			if ($destination == "Barcelona")
				return 85.00;
			elseif ($destination == "Cairo")
				return 98.00;
			elseif ($destination == "Rome")
				return 110.00;
			elseif ($destination == "Santiago")
				return 85.00;
			elseif ($destination == "Tokyo")
				return 240.00;
		}

		function getAirfare($destination)
		{
			if ($destination == "Barcelona")
				return 875.00;
			elseif ($destination == "Cairo")
				return 950.00;
			elseif ($destination == "Rome")
				return  875.00;
			elseif ($destination == "Santiago")
				return 820.00;
			elseif ($destination == "Tokyo")
				return 1575.00 - 200.00;
		}

		function getTicketCost($numTravelers, $airFare)
		{
			return $numTravelers * $airFare;
		}

		function getHotelCost ($numTravelers, $numNights, $hotelRate)
		{
			return $numTravelers * $numNights * $hotelRate;
		}
		

?>
