<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Buku;
use Intervention\Image\ImageManagerStatic as Image;
class BukuController extends Controller
{
    public function imgResize(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'imgFile' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ]);
  
        $image = $request->file('imgFile');
        $input['imagename'] = time().'.'.$image->extension();
     
        $filePath = public_path('/thumbnails');
        $img = Image::make($image->path());
        $img->resize(null, 500, function ($const) {
            $const->aspectRatio();
        })->save($filePath.'/'.$input['imagename']);
   
        $filePath = public_path('/images');
        $image->move($filePath, $input['imagename']);
   
        return back()
            ->with('success','Image uploaded')
            ->with('fileName',$input['imagename']);
    }
}
