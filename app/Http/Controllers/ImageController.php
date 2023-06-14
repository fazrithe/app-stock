<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::orderBy('created_at', 'desc')->get();
        return view('images.index', compact('images'));
    }

      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload()
    {
        return view('images.upload');
    }

    /**
     * File Upload Method
     *
     * @return void
     */
    public  function uploadStore(Request $request)
    {
        $image = $request->file('file');
        $imageNameOri   = $request->file('file')->getClientOriginalName();
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('public/uploads'),$imageName);
        $url    = '/public/uploads/'.$imageName;

        $image = new Image();
        $image->image_name  = $imageNameOri;
        $image->image_url   = $url;
        $image->save();

        return response()->json(['success'=>$imageName]);
    }

       /**
     * File Upload Method
     *
     * @return void
     */
    public  function uploadDestory(Request $request)
    {
        $file = Image::where('image_name',$request->get('name'))->first();
        if (file_exists(public_path($file->image_url))){
            $filedeleted = unlink(public_path($file->image_url));
            DB::table("images")->where('id',$file->id)->delete();
            if ($filedeleted) {
                return response()->json($file->id);
            }
         } else {
            dd('Unable to delete the given file');
         }

        return back();
    }

}
