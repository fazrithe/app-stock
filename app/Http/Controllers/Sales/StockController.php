<?php

namespace App\Http\Controllers\sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Sales_stock;

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
        $datastock = Sales_stock::where('product_id', $data->id)->first();
        if(!empty($datastock)){
            if($request->area == "gudang"){
                $stok = $datastock->stok_gudang;
            }else{
                $stok = $datastock->stok_toko;
            }
        }else{
            $stok = 0;
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
        $user_id = Auth::user()->id;
        $data = Sales_stock::where('product_id',$request->id)
        ->where('user_id',$user_id)
        ->first();
        if(!empty($data)){
            $salesStock = Sales_stock::where('product_id',$request->id)->first();
            $salesStock->user_id = $user_id;
            $salesStock->product_id = $request->id;
            if($area == 'toko'){
                $salesStock->stok_toko = $request->stock;
            }else{
                $salesStock->stok_gudang = $request->stock;
            }
            $salesStock->save();
        }else{
            $salesStock = new Sales_stock();
            $salesStock->user_id = $user_id;
            $salesStock->product_id = $request->id;
            if($area == 'toko'){
                $salesStock->stok_toko = $request->stock;
            }else{
                $salesStock->stok_gudang = $request->stock;
            }
            $salesStock->updated_at = $request->update_date;
            $salesStock->save();
        }

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
        $datastock = Sales_stock::where('product_id',$id)->first();
        $total = $datastock->stok_gudang + $datastock->stok_toko;
        return view('stock.show', compact('data','datastock','total'));
    }
}
