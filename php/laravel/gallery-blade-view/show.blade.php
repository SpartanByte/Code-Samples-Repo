
@extends('layouts.default')
@section('content')

    <header class="row">
        @include('includes.header')
    </header>
    <div class="panel panel-default">
      <div class="page-header"> 
          <span class="h3 uppercase-shadow">Uploaded Photo Index</span>
      </div>
      <div class="panel-body">
        <ul>
          @foreach($imageFiles as $imageFile){{-- $imageFile should be coming from PhotosController  --}}
              
              {{-- <img src="{{ $imageFile }}" /> --}}
              <li>/{{ $imageFile }}</li>

          @endforeach
        </ul>
        </div>{{-- end of panel-body --}}
    </div>
@stop