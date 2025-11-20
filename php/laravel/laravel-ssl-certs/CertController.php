<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SSL\CertCheckerService;
use Carbon\Carbon;

// you want to pull in the CertCheckerService

class CertController extends Controller
{

    // getting certificate info from CertCheckerService
    public function setCertInfo(CertCheckerService $certInfoArray){

	    $domainsList = new CertCheckerService;
	    $certInfoArray = $domainsList->getCertInfo();

	    // passing certInfoArray (generated from CertCheckerService) to view
	    return view("ssl-test")->with(compact('certInfoArray'));

		/**
		 * Older code for examples
		 */
		// Formatting Issued Date to Y-m-d
    	// $issueDate = $certInfoArray[2];
    	// $issueDate = date("Y-m-d", strtotime($issueDate));
	   	// Formatting Expiration Date to Y-m-d
	   	// $expirationDate = $certInfoArray[3];
    	// $expirationDate = date("Y-m-d", strtotime($expirationDate));
		// Trimming Issuer string to the Organization ("O") only for testing
    	// $issuer = $certInfoArray[1];
		// $issuer = substr($issuer, 12, 12); 

	    // $domainName = "https://example.com";
	    // $clientName = "The Example Company";
	    // array_push($certInfoArray, $domainName);
	    // array_push($certInfoArray, $clientName);

	    // $now = Carbon::now();
	    // $expiring = new Carbon($expirationDate);
	    // $daysRemaining = $now->diffInDays($expiring);

	    // if($daysRemaining > 0){
	    // 	$status = "Valid";
	    // } else {
	    // 	$status = "Expired";
	    // }
		// return view('ssl-test')->with(compact( 'certInfoArray', 'expirationDate', 'issueDate', 'issuer', 'daysRemaining', 'now', 'expiring', 'status'));
    }
}
