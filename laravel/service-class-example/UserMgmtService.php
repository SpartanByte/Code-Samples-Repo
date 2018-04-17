<?php
namespace App\Services\Users;

use Illuminate\Support\Facades;
use App\Models\Gallery; // Gallery Owner
use App\Models\Profile; // Profile for User
use App\User;
use Carbon\Carbon;
use Mail;

class UserMgmtService{

	public function addUser($request){

        $user = User::create([
            'name' => ucwords($request->name),
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $added = User::where('email', $request->email)->first();

        $userInfo = [
            'name' => ucwords($request->name),
            'email' => $request->email,
            'id' => $added->id
        ];

        $data = $userInfo;
        Mail::send('emails.new-user', ['data' => $data], function($message) use($data){
            $userEmail = $data['email'];
            $message->from('someone@email.com', 'Company Name'); // filled in with administator email account and viewable name
            $message->to($userEmail);
            $message->subject("An Account Was Created For You");
        });

        return $userInfo;

	}

	public function addUserProfile($request){
        // Getting user
        $userEmail = $request->email;

        $getUser = User::where('email', $userEmail)->first();
        $userId = $getUser->id;

        // default values
        $galleryExists = true;
        $profileExists = false;
        $userExists = true;

        $profileCheck = Profile::where('profile_id', $userId)->get(); // finding user ID
        $galleriesTable = Gallery::where('gallery', $request->gallery)->first();

        // making sure the domain being added will match a domain in the domains table, error if it doesn't exist
        if($galleriesTable == null){
            $galleryExists = false; // a gallery is required for a profile
            return view('profile.create')->with(compact('galleryExists'));
        }

        $galleryCheck = Gallery::where('gallery', $galleriesTable->gallery)->first(); // finding Gallery in galleries table
        $galleryValue = $galleryCheck->gallery;

        // Getting input data for password expirations
        $reminders = $request->reminders;
        $expirations = $request->expirations;
        $url = $request->gallery;

        // notification options for password expiration dates
		if($reminders == null){
		    $reminders = 0;
		} else{
		    $reminders = 1;}

		if($expirations == null){
	        $expirations = 0;
		} else{
	        $expirations = 1;}

		// removing https:// if it was entered
		if(substr($url, 0, 8) === "https://"){
		    $url = substr($url, 8);
		}
		// making sure there is not a trailing forward slash
		if(substr($url, -1) === "/"){
		    $url = substr($url, 0, -1);
		}

		$profile = Profile::create([
	        'profile_id' => $userId,
	        'name' => ucwords($request->name),
	        'email' => $request->email,
	        'gallery' => $request->gallery,
	        'reminders_on' => $reminders,
	        'expirations_on' => $expirations,
		]);
	}

	public function updateUserInfo($request, $id){

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
	}
}