<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProductExport implements FromView
{
     /**
     * @return \Illuminate\Support\Collection
     */
    public function __construct(string $keyword)
    {
        $this->date = $keyword;
    }

    public function view(): View
    {
        return view('products.export', [
            'data' => Product::select('products.*','sales_stocks.*','users.name as name_user')
            ->whereDate('sales_stocks.updated_at', $this->date)
            ->join('sales_stocks', 'sales_stocks.product_id', '=', 'products.id')
            ->join('users', 'users.id', '=', 'sales_stocks.user_id')
            ->get()
        ]);
    }
}
