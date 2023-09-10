<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery_data;
use App\Models\Gallery_category;

class GalleryDataController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = Gallery_data::all();

        return view('gallery-data.index', compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Gallery_category::all();
        return view('gallery-data.create', compact('category'));
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

        $gallery = new Gallery_data();
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
        return redirect()->route('gallery-data.index')
                        ->with('success','gallery created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery_data  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = Gallery_data::find($id);
        $category = Gallery_category::all();
        return view('gallery-data.edit',compact('gallery','category'));
    }

      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery_data $gallery)
    {
         request()->validate([
            'name' => 'required',
        ]);

        $gallery = Gallery_data::find($request->id);
        $gallery->category_id = $request->category_id;
        $gallery->name = $request->name;
        if($request->file('file')){
            $file= $request->file('file');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $path = $file-> move(public_path('public/uploads/gallery/data'), $filename);
            $gallery->path = $filename;
        }
        $gallery->save();

        return redirect()->route('gallery-data.index')
                        ->with('success','Gallery updated successfully');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery_data  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery_data::where('id', $id);
        $gallery->delete();

        return redirect()->route('gallery-data.index')
                        ->with('success','Gallery deleted successfully');
    }
}
