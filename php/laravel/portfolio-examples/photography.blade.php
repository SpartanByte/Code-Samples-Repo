@extends('layouts.default')
@section('description', 'Brian Wardwell amateur photography: portraits, landscapes, macro. some from my profile as x-ample on deviantart.com')
@section('title', 'Photography')

@section('content')
<div class="static-content gallery">
    <span class="page-header uppercase-shadow gallery-header">Photography</span>
    <div class="gallery-description">
    	<p>I remember that I first took an active, rather than viewing only, interest in photography during a vacation to <a href="http://www.visitduluth.com/" title="visitduluth.com" target="_blank">Duluth, MN</a> in 1998. In awe of not only the huge oil ships but also the rugged North Shore of Lake Superior and the natural beauty of Duluth itself. Due to only having the ability to afford cheap film cameras at the time, it wasn't until about 2003 that I purchased a digital camera and started to really experiment. To be honest, I don't remember what image editing program I was using at the time but it was likely as barebones as you could get at the time. I take a keen interest in macro photography and capturing interesting angles of everday objects we commonly don't notice in our daily lives. I also enjoy portraits and nature/landscape scenes. Dutch photographer <a href="http://antoncorbijn.com/" title="antoncorbijn.com" target="_blank">Anton Corbijn</a> was a major influence to my photography. His style is dual-tones and black & white photography with heavy contrast. He wasn't afraid of grain and, most likely, commonly added it. As a result, even today, most of my photo-editing is adjusting contrast, shadow/highlight levels, and exposure to express a similar adoration for things a bit darker.</p>
    </div>
    <div id="gallery-thumbnails" style="padding-bottom:15px;">
        <ul class="photo-list">
            @foreach($imageFiles as $imageFile)
                <li><a href="/{{ $imageFile }}" title="View Full Size"><img src="/{{ $imageFile }}" /></a></li>
            @endforeach
        </ul>
    </div>
</div>
@stop