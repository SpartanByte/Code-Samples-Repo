<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Console;
use App\Models\Domain;
use App\Models\Scan;
use App\Services\SSL\CertCheckerService;
use App\Services\SSL\RunScanService;
use DB;
use Carbon\Carbon;

class ScanAllDomains extends Command
{

    /**
     * Command Name
     * @var string
     */
            protected $signature = 'domain:all';
    /**
     * Command Description
     * @var string
     */
    protected $description = 'scan all domains for valid SSL certificate';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {

        // Getting domain URLs from Database 
        //$domainURLS = DB::table('domains')->select('domain')->get();
        $domains = Domain::all();
        $allScans = [];

       

        foreach($domains as $domain){

            // getting cert info for each domain as domain domain
            $curl = curl_init('https://'.$domain->domain);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_NOBODY, true);
            curl_setopt($curl, CURLOPT_CERTINFO, true);
            curl_setopt($curl, CURLOPT_VERBOSE, 1);
            curl_exec($curl);

            // requesting ssl certificate info
            $certInfo = curl_getinfo($curl, CURLINFO_CERTINFO);

                    // Checking for errors, this has been tested with an http address
                    // if(!isset($certInfo[0]['Issuer'])){
                    //    $this->info("<fg=red;options=underscore>This domain does not have a valid SSL certificate. </>");
                    // }

            // Regular expressions
            $certificate = $certInfo[0];
            $certIssuer = $certificate['Issuer'];
            preg_match('/O = (.*?), [a-z]+ =/i', $certIssuer, $issuerMatches); // Get the certificate issuer
            $certIssuer = $issuerMatches[1];
            // return $certInfo;
            $certDateIssued = $certInfo[0]['Start date'];
            $certExpiration = $certInfo[0]['Expire date'];
            
            // // date/time
            // $now = Carbon::now();
            // $expiring = new Carbon($certExpiration);
            // $daysRemaining = $now->diffInDays($expiring);

            //         // Is the certificate valid?
            //         if($daysRemaining > 0){
            //             $status = "Valid";
            //         } else{
            //             $status = "Expired";
            //         } 

            // // Formatting 
            $certDateIssued = date("Y-m-d", strtotime($certDateIssued));
            $certExpiration = date("Y-m-d", strtotime($certExpiration));

            date_default_timezone_set("America/Chicago");
            $reportDate = date("m/d/Y g:ia");
            
            // // building certInfoArray with values
            // $certInfoArray = array(
            //     "domainName" => $domain->domain,
            //     "certPort" => $certPort,
            //     "clientName" =>  $clientName,
            //     "certIssuer" => $certIssuer,
            //     "certDateIssued" => $certDateIssued,
            //     "certExpiration" => $certExpiration,
            //     "status" => $status,
            //     "daysRemaining" => $daysRemaining,
            //     "reportDate" => $reportDate,
            // );

            $scan = new Scan;

            $scan->raw = json_encode($certInfo[0]);
            $scan->issuer = $certIssuer;
            $scan->start = $certDateIssued;
            $scan->expire = $certExpiration;
            $scan->domain_id = $domain->id;
            $scan->save();
}

        }

}