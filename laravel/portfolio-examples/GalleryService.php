<?php
namespace App\Services\Gallery;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;
use Input;

class GalleryService
{
    public function getPhotography()
    {
		$imagePath = 'images/photography';
    	$imageFiles = File::allFiles($imagePath);
    	return $imageFiles;
	}

    public function makePhotoshopGallery()
    {
    	$imageFiles = File::allFiles($imagePath);
    	return $imageFiles;
	}
}