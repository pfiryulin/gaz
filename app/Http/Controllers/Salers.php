<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\Purchases;
use App\Models\Product;

class Salers extends Controller
{
    public function sale(Request $request){
        $sale = json_decode($request->input('sale'), true);
        $summ = 0;
        foreach($sale as $sal){
            $total = $sal['count'] * $sal['price'];
            $sum += $total;
        }
        $bill = Bill::create(
            [
                'total'=>$sum,
                'date'=> time(),
            ]
        );
        foreach($sale as $sal){
            $product = Product::firstOrNew(['name'=>$sal['name']]);
            $purchases = Purchases::create([
                'bill_id'=>$bill->id,
                'product_id'=>$product->id,
                'price_unit'=>$sal['price'],
                // 'count'=>
            ]);
            $total = $sal['count'] * $sal['price'];
            $sum += $total;
        }

    }
}
