<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery_video;
use App\Models\Gallery_category;

class GalleryVideoController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = Gallery_video::all();

        return view('gallery-video.index', compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Gallery_category::all();
        return view('gallery-video.create', compact('category'));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'file' => 'required',
        ]);

        $gallery = new Gallery_video();
        $gallery->category_id = $request->category_id;
        $gallery->name = $request->name;
        if($request->file('file')){
            $file= $request->file('file');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $path = $file-> move(public_path('public/uploads/gallery/video'), $filename);
            $gallery->path = $filename;
        }
        $gallery->save();
        $request->session()->put('create_date', $request->create_date);
        return redirect()->route('gallery-video.index')
                        ->with('success','gallery created successfully.');
    }
}
