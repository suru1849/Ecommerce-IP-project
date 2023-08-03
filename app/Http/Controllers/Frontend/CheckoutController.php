<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function placeOrder(Request $request)
    {
         if(!Cart::where('user_id',Auth::id())->exists())
         {
            return redirect('/')->with('status','Add Product to Cart first!');
         }
        

         $cartitems=Cart::where('user_id',Auth::id())->get();
         $total_price=0;
         foreach($cartitems as $item)
         {
             $total_price+=($item->product->selling_price) * ($item->prod_qty);

         }     
         


         $order=new Order();
         $order->user_id = Auth::id();
         $order->phone = $request->input('phone');
         $order->address1 = $request->input('address1');
         $order->city = $request->input('city');
         $order->state = $request->input('state');
         $order->country = $request->input('country');
         $order->total_price = $total_price;

         $order->payment_mode='cod';
         $order->save();

        
         foreach($cartitems as $item)
         {
             OrderItem::create([
                 'order_id'=>$order->id,
                 'prod_id'=>$item->prod_id,
                 'qty'=>$item->prod_qty,
                 'price'=>$item->product->selling_price,
             ]);

             //reducing quantity
             $prod=Product::where('id',$item->prod_id)->first();
             $prod->qty=$prod->qty - $item->prod_qty;
             $prod->update();
         }   
         
         


         $cartitems=Cart::where('user_id',Auth::id())->get();
         Cart::destroy($cartitems);

         
         return redirect('/')->with('status','Order Placed Successfully');
         
    }




}
