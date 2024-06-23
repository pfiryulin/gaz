<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\Purchases;
use App\Models\Product;
use App\Http\Requests\Salers\CreateSaleRequest;
use App\Http\Requests\Salers\SaleRequestListPeriod;

class Salers extends Controller
{
    public function sale(CreateSaleRequest $request)
    {
        $sale = json_decode($request->input('sale'), true);
        $summ = 0;
        foreach($sale as $sal){
            $total = $sal['count'] * $sal['price'];
            $summ += $total;
        }
        $bill = Bill::create(
            [
                'total'=>$summ,
                'date'=> time(),
            ]
        );
        foreach($sale as $sal){
            $product = Product::firstOrNew(
                [
                    'name' => $sal['name'],
                    'product_type_id' => $sal['type'],
                ]
            );
            $purchases = Purchases::create([
                'bill_id'=>$bill->id,
                'product_id'=>$product->id,
                'price_unit'=>$sal['price'],
                'count'=>$sal['count'],
                'category_id'=>$sal['category'],
                'product_type_id' => $sal['type'],
                'total_price'=>$sal['count'] * $sal['price'],
                'date' => time(),
            ]);
        }

    }
    public function list()
    {
        return Bill::all();
    }

    public function listPeriod(SaleRequestListPeriod $request)
    {
        $start = $request->input('start');
        $end = $request->input('end');
        $format = $request->input('format');;
        $bills = Bill::whereBetween('date', [$start, $end])->get();
        if($format != 'csv')
        {
            return $bills;
        }
        else
        {
            $csv = fopen('/reports/'.$start.'-'.$end.'.csv', 'x');
            return $csv;
        }
    }
}
