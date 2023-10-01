<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery_category;
use App\Models\Gallery_sub_category;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class GallerySubCategoryControler extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = Gallery_sub_category::all();

        return view('category-sub-gallery.index', compact('gallery'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Gallery_category::all();
        return view('category-sub-gallery.create', compact('category'));
    }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = new Gallery_sub_category();
        $cat->name = $request->name;
        $cat->category_id = $request->category;
        $cat->save();
        return redirect()->route('category-sub-gallery.index')
        ->with('success','Kategori created successfully.');
    }

      /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery_category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Gallery_sub_category::find($id);
        $category_parent = Gallery_category::all();
        return view('category-sub-gallery.edit',compact('category','category_parent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery_category  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        request()->validate([
            'name' => 'required',
        ]);

        // return $request->name;
        $category = Gallery_sub_category::where('id', $request->id)->first();
        $category->category_id = $request->category_id;
        $category->name = $request->name;
        $category->save();
        return redirect()->route('category-sub-gallery.index')
                        ->with('success','Kategori updated successfully');
    }

      /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat    = Gallery_sub_category::find($id);
        $cat->delete();
        // $category->delete();

        return redirect()->route('category-sub-gallery.index')
                        ->with('success','Kategori deleted successfully');
    }
}
