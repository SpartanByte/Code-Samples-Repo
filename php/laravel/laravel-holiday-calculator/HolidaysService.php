<?php
namespace App\Services\CodeSamples\PHP;

use Illuminate\Http\Request;
use Carbon\Carbon;

class HolidaysService
{

	// This provides the array of holidays to fill the first two columns of PHP Holidays (php/timeanddates)
	public $holidaysArray = [
        ["New Years Day", "January 01"],
        ["Valentine's Day", "February 14"],
        ["Memorial Day", "May 29"],
        ["Independence Day", "July 04"],
        ["Labor Day", "September 04"],
        ["Halloween", "October 31"],
        ["Veterans Day", "November 11"],
        ["Christmas", "December 25"],
        ["New Years Eve", "December 31"],
	];

	public function getHolidays()
    {
		return $this->holidaysArray; // available for CodeSampleController
	}

	public function getCountdown($holidaysArray)
    {
        $central = date_default_timezone_set("America/Chicago");
        $eachHoliday = [];
        $allHolidays = [];

		foreach($holidaysArray as list($name, $day)){
			$daysUntil = strtotime($day);
			$daysUntil = ceil(($daysUntil-time())/60/60/24);

			if($daysUntil < 0){
    			$daysUntil = $daysUntil + 365;
			}

			$eachHoliday = [
				'name'  => $name,
				'day' => $day,
				'daysUntil' => $daysUntil
			];
			array_push($allHolidays, $eachHoliday);
		}
		return $allHolidays;	// returns an array of countdown results
	}
}