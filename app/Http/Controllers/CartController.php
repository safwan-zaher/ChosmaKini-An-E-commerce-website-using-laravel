<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Product;
use Cart;

Session_start();
function cardArray()
{
    $cartCollection = \Cart::getContent();
    return $cartCollection->toArray();
}


class CartController extends Controller
{
    public function add_to_cart(Request $request)
    {
       
        $quantity = $request->quantity;
        $id = $request->id;

        $products = Product::where('id',$id)->first();
        $data['quantity']= $quantity;
        $data['id']= $products->id;
        $data['name']= $products->name;
        $data['price']= $products->price;
        $data['attribute']= [$products->image];
        Session::put('cart_image_'.$products->id, $products->image);
        Cart::add( $data);
        cardArray();
        return redirect()->back();


    }

    public function delete($id)
   {
    Cart::remove($id);
    return redirect()->back();
   }

    
}
