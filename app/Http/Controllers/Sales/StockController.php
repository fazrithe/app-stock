<?php

namespace App\Http\Controllers\sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class StockController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        //  $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
        //  $this->middleware('permission:product-create', ['only' => ['create','store']]);
        //  $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
        //  $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [
            'login_date' => $request->session()->get('login_date'),
            'area'  => Auth::user()->area,
        ];
        return view('stock.index', compact('data'));
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchProduct(Request $request)
    {
        $data = Product::where('kode_barang', $request->kode_barang)->orWhere('barcode',$request->kode_barang)->first();
        if($request->area == "gudang"){
            $stok = $data->stok_gudang;
        }else{
            $stok = $data->stok_toko;
        }
        if(empty($data)){
            $statusCode = 500;
        }else{
            $statusCode = 200;
        }
        return json_encode(array(
            "data"=>$data,
            "stok"=>$stok,
            "statusCode"=>$statusCode,
        ));
    }

       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateProduct(Request $request)
    {
        $area = Auth::user()->area;
        $data = Product::find($request->id);
        if($area == 'toko'){
            $data->stok_toko = $request->stock;
        }else{
            $data->stok_gudang = $request->stock;
        }
        $data->save();

        return redirect()->to('showProduct/'.$request->id);
    }

          /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showProduct($id)
    {
        $data = Product::find($id);
        return view('stock.show', compact('data'));
    }
}
