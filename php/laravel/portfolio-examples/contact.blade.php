@extends('layouts.default')
@section('description', 'Contact Brian Wardwell for more information on web development, web design, user interface design, and more')
@section('title', 'Contact Me')

@section('content')
    <div class="static-content contact-page">
        <h2>Contact Me</h2>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <form style="width:50%;" class="form" method="POST" id="create" action="{{ route('contact_store') }}">
            {{ csrf_field() }}
            <div class="form-group" style="height:auto;">
                <label for="name">Your Name</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Your Name" autocomplete="off" required />
            </div>
            <div class="form-group">
                <label for="email">Your Email Address</label>
                <input name="email" type="email" class="form-control" placeholder="Your email address" autocomplete="off" required />
            </div>

            <div class="form-group">
                <label for="message">Your Message: | Note: No HTML is accepted in this form</label>
                <textarea  name="message" row="5" class="form-control" autocomplete="off"></textarea>
            </div>
            <div class="form-group">
                <label class="col-15">Select Reason</label>
                <select name="contact_reason" class="form-control" autocomplate="off">
                    <option value="">Any Reason</option>
                    <option value="laravel">Laravel Development</option>
                    <option value="umbraco">Umbraco Development</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary contact" value="Send Email">Send Email</button>
                <button type="reset" class="btn btn-primary contact" value="Reset Form">Reset Form</button>
            </div>
        </form>
    </div>
@stop