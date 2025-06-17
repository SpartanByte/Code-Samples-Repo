@extends('layouts.default')
@section('description', 'slideshow example using jQuery, JavaScript and Laravel')
@section('title', 'jQuery: Slideshow Example')

@section('content')
  <div class="static-content">
  	<div id="gallery-thumbnails" class="slideshow" style="padding-bottom:15px;">
      <h1 class="page-header">jQuery Slideshow Example</h1>
{{--       	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> --}}
        <div id="slideshow">
          <div class="picture">
            <img src="/images/slide/edited/california-highway-mountains.jpg" alt="California Highway"><br>
          </div>
          <div class="picture">
            <img src="/images/slide/edited/wet-highway.jpg" alt="Wet Highway"><br>
          </div>
          <div class="picture">
            <img src="/images/slide/edited/highway-in-shadows.jpg" alt="Highway In Shadows"><br>
          </div>
          <div class="picture">
          	<img src="/images/slide/edited/dock-at-sunset.jpg" alt="Dock At Sunset"><br>
        	</div>
          <div class="picture">
            <img src="/images/slide/edited/ocean-dock.jpg" alt="Ocean Dock"><br>
        </div>
          <div class="picture">
            <img src="/images/slide/edited/dock-in-weeds.jpg" alt="Dock In Weeds"><br>
          </div>
      </div>
      <div id="gallery-clear-bottom"><button type="button" class="btn-primary btn-lg home-redirect"><a href="#">Back To Home</a></button>
      <button type="button" class="btn-primary btn-lg home-redirect"><a href="#">Back To Home</a></button></div>
    
  {{-- js-examples.js --}}
  <script src="{{ URL::asset('js/js-examples.js') }}" /></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
@stop


