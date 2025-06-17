<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CodeSamples\PHP\HolidaysService;

class CodeSampleController extends Controller
{
    public function jqueryToggle()
    {
        return view('programs.js.jquery-toggling');
    }

    public function jsSlideshow()
    {
    	return view('programs.js.slideshow');
    }

    public function tuitionCalculator()
    {
        return view('programs.js.tuition-calculator');
    }

    public function phpTime()
    {
    	$CST = date_default_timezone_set("America/Chicago");
        $currentDate = date("n/j/Y");
    	$timestamp = date("h:i");
        return view('programs.php.timeanddates')->with(compact('currentDate', 'timestamp'));
    }

    public function setHolidays(HolidaysService $allHolidays)
    {
        $holidaysList = new HolidaysService();
        $holidaysArray = $holidaysList->getHolidays();
        $countdown = new HolidaysService();
        $allHolidays= $countdown->getCountdown($holidaysArray);
        return view('programs.php.timeanddates')->with(compact('allHolidays'));
    }

    public function setCountdown(HolidaysService $daysRemaining)
    {
        $countdownResponse = new HolidaysService();
        $daysRemaining = $countdownResponse->getCountdown();
        return view('programs/php/timeanddates')->with(compact('daysRemaining'));
    }

    // C# Samples
    public function guessAWord()
    {
        return view('/programs/csharp/guess-a-word');
    }
    public function primeNumbers()
    {
        return view ('/programs/csharp/prime-numbers');
    }
}
