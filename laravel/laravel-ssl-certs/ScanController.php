<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Services\SSL\CertCheckerService;
use App\Console\Commands\ScanAllDomains;
use App\Models\Domain;
use App\User;
use Auth;
use Artisan;
use Illuminate\Console\Command;

class ScanController extends Controller
{
    /**
     *  This controller dispatches the ScanSingleDomain command (php artisan domain:scan)
     */
    public function startSingleScan($domain)
    {
    	$this->dispatch(
    		// new SingleScan(Domain::domain(), .....)
    	);
    }

    public function testCommand(){
    	$domainArray = Artisan::call('domain:scan');
    	// return $callCommand;
    }

    // getting certificate info from CertCheckerService
    public function scanAll(ScanAllDomains $allScans){

        // $domainsArray = $allDomainsArray->command('domain:all');
        $domainsArray = [];
        // calls old Kernal/Artisan command php artisan domain:scan
        $domainsArray = Artisan::call('domain:scan');

        return view("scan-test")->with(compact('domainsArray', 'reportDate'));
    }
}
