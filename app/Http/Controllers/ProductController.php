<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductSubscribe;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'course_id' => 'required',
            'subscribe' => 'required',
            'subscribe_price' => 'required'
        ]);

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'course_id' => $request->course_id
        ]);

        foreach ($request->subscribe as $indexSubscribe => $subscribe) {
            foreach ($request->subscribe_price as $indexSubscribePrice => $price_subscribe) {
                if ($indexSubscribePrice == $indexSubscribe) {
                    ProductSubscribe::create([
                        'product_id' => $product->id,
                        'name' => $subscribe,
                        'price' => $price_subscribe
                    ]);
                }
            }
        }

        return redirect()->route('adminListProducts');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'course_id' => 'required'
        ]);

        Product::where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'course_id' => $request->course_id
        ]);

        if ($request->subscribe) {
            foreach ($request->subscribe as $indexSubscribe => $subscribe) {
                foreach ($request->subscribe_price as $indexSubscribePrice => $price_subscribe) {
                    if ($indexSubscribePrice == $indexSubscribe) {
                        ProductSubscribe::create([
                            'product_id' => $id,
                            'name' => $subscribe,
                            'price' => $price_subscribe
                        ]);
                    }
                }
            }
        }

        return redirect()->route('adminListProducts');
    }


    public function updateSubscribe(Request $request, $id)
    {
        $request->validate([
            'subscribe' => 'required',
            'subscribe_price' => 'required',
        ]);

        ProductSubscribe::where('id', $id)->update([
            'name' => $request->subscribe,
            'price' => $request->subscribe_price
        ]);

        return back();
    }

    public function delete($id)
    {
        $subscribes = ProductSubscribe::where('product_id', $id)->get();
        foreach ($subscribes as $subs) {
            $subs->delete();
        }
        Product::where('id', $id)->delete();
        return redirect()->route('adminListProducts');
    }


    public function deleteSubscribe($id)
    {
        ProductSubscribe::where('id', $id)->delete();
        return back();
    }
}
