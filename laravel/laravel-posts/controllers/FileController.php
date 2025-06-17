<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;


    /**
     * ==== MAKING SURE THIS IS NO LONGER BEING USED BEFORE REMOVING
     */
class FileController extends Controller {
    public function getResizeImage()
    {
        return view('files.resizeimage');
    }
    public function postResizeImage(Request $request)
    {
        $this->validate($request, [
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
        $photo = $request->file('photo');
        $imagename = time().'.'.$photo->getClientOriginalExtension(); 
   
        $destinationPath = public_path('/thumbnail_images');
        $thumb_img = Image::make($photo->getRealPath())->resize(100, 100);
        $thumb_img->save($destinationPath.'/'.$imagename,80);
                    
        $destinationPath = public_path('/normal_images');
        $photo->move($destinationPath, $imagename);
        return back()
            ->with('success','Image Upload successful')
            ->with('imagename',$imagename);
    }
    public function showImage(Request $request)
    {
        $this->validate($request, [
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
        $thisImage = $request->file('photo');
        $pictureName = time().'.'.$photo->getClientOriginalExtension();

        $imagePath = public_path('/images/logos');
        $thumb = Image::make($photo->getRealPath())->resize(450,300);
        $thumb->save($imagePath.'/'.$pictureName);

        return back()
            ->with('Your method worked')
            ->with('pictureName', $pictureName);
    }
}