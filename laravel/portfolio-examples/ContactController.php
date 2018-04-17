<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;

class ContactController extends Controller
{
    //
    public function create()
    {
        // Working on creating a custom confermation message without showing the form again
        $confirm = 'Thank you. I will follow up with you soon!';
        $success = true;
        return view('pages.contact', ['confirm' => $confirm, 'success' => $success]);
    }

    public function store(ContactFormRequest $request)
    {
        // Getting information from request and sending email with array values
        \Mail::send('emails.contact',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'reason' => $request->get('contact_reason'),
                'user_message' => $request->get('message')
            ), function($message){

                // Declaring email addresses to send emails to outlook while testing
            	$message->from('brianwardwell79@gmail.com');
            	$message->to('briwar10@outlook.com', 'Admin')->subject('A message from your web portfolio');
        	});

        // Using route to show confirmation on page to customer (still working on this, condition is not working)
        $confirmation = "Thank you. I will be following up with you soon";
        return view('pages/confirmation')->with(compact('confirmation'));
    }
}
