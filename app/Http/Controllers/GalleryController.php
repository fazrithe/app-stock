<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery_image;

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
}
