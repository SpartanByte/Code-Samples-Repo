<?php 

/**
 * CertCheckerService handles cURL and information gathering for the domains in the list
 * 	-- SSL Certificate issue date, expiration date, issuer, etc.
 */

namespace App\Services\SSL;

use Illuminate\Support\Facades;
use Carbon\Carbon;
use App\Models\Domain; // Only include if checking database domains from CertCheckerService

class CertCheckerService{

	public function getCertInfo($url){

		$curl = curl_init($url->domain);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_NOBODY, true);
		curl_setopt($curl, CURLOPT_CERTINFO, true);
		curl_setopt($curl, CURLOPT_VERBOSE, 1);
		curl_exec($curl);

		// requesting ssl certificate info
		$certInfo = curl_getinfo($curl, CURLINFO_CERTINFO);

		// separating information
		$certSerial = $certInfo[0]['Serial Number'];
		$certIssuer = $certInfo[0]['Issuer'];
		$certDateIssued = $certInfo[0]['Start date'];
		$certExpiration = $certInfo[0]['Expire date'];

		
		$clientName = "Insight Technologies";

		// date/time
		$now = Carbon::now();
		$expiring = new Carbon($certExpiration);
		$daysRemaining = $now->diffInDays($expiring);

		// Is the certificate valid?
		if($daysRemaining > 0){
			$status = "Valid";
		} else{
		    	$status = "Expired";
		} 

		// Formatting 
		$certDateIssued = date("Y-m-d", strtotime($certDateIssued));
		$certExpiration = date("Y-m-d", strtotime($certExpiration));
		$certIssuer = $certInfo[0]['Issuer'];
		$certIssuer = substr($certIssuer, 12, 12);

		$certInfoArray = array(
			"domainName" => $url->domain,
			"clientName" =>  $clientName,
			"certSerial" => $certSerial,
			"certIssuer" => $certIssuer,
			"certDateIssued" => $certDateIssued,
			"certExpiration" => $certExpiration,
			"status" => $status,
			"daysRemaining" => $daysRemaining,
		);
		return $certInfoArray;
	}

	public function getCerts(){

		$domainURLS = Domain::all();
		$urlArray = [];

		foreach($domainURLS as $url){
			$urlArray[] = $this->getCertInfo($url);
		}
		return $urlArray;
	}

	// public function getCurl(){

	// 	$curlArray[] = getCertInfo($url);
	// 	return $curlArray;
	// }
}
