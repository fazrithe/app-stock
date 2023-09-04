<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery_image;
use App\Models\Gallery_category;

class GalleryController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = Gallery_image::all();

        return view('gallery.index', compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Gallery_category::all();
        return view('gallery.create', compact('category'));
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
            'image' => 'required',
        ]);

        $gallery = new Gallery_image();
        $gallery->category_id = $request->category_id;
        $gallery->name = $request->name;
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $path = $file-> move(public_path('public/uploads/gallery/img'), $filename);
            $gallery->path = $filename;
        }
        $gallery->save();
        $request->session()->put('create_date', $request->create_date);
        return redirect()->route('gallery.index')
                        ->with('success','gallery created successfully.');
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery_image $gallery)
    {
        $category = Gallery_category::all();
        return view('gallery.edit',compact('gallery','category'));
    }

      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery_image $gallery)
    {
         request()->validate([
            'name' => 'required',
        ]);

        $gallery = Gallery_image::find($request->id);
        $gallery->category_id = $request->category_id;
        $gallery->name = $request->name;
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $path = $file-> move(public_path('public/uploads/gallery/img'), $filename);
            $gallery->path = $filename;
        }
        $gallery->save();

        return redirect()->route('gallery.index')
                        ->with('success','Gallery updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery_image  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery_image $gallery)
    {
        $gallery->delete();

        return redirect()->route('gallery.index')
                        ->with('success','Gallery deleted successfully');
    }
}
