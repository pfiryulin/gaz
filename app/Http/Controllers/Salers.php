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
        echo '<pre>';
        var_dump($sale);
        echo '</pre>';
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
        //      echo '<pre>';
        // var_dump($product);
        // echo '</pre>';
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
}
