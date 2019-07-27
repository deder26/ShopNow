<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Cart;
use DB;
use PDF;

use App\Catagory;
use App\ProductType;
use App\Product;
use App\ShippingInformation;
use App\Order;

use App\OrderDetail;
use App\Payment;
class OrderController extends Controller
{
   
    
    public function OrderIndex(){
        $catagories = Catagory::all();
        $productTypes = ProductType::all();
        $products = Product::all();
        
        if(Session::get('user_id'))
            return view('front-end.order.orderForm',['catagories'=>$catagories,'productTypes'=>$productTypes,'products'=>$products]);
        else
            return view('auth.login');
    }
    
    public function saveOrder(Request $request){
        
        
        $this->validate($request,[
            'customer_name' => 'required',
            'customer_email' => 'required',
            'customer_contact' => 'required',
            'customer_address' => 'required|regex:'
            
        ]);
        
        $shippingInfo = new ShippingInformation();
        $shippingInfo->customer_id = Session::get('user_id');
        $shippingInfo->customer_name = $request->customer_name;
        $shippingInfo->customer_email = $request->customer_email;
        $shippingInfo->customer_contact = $request->customer_contact;
        $shippingInfo->customer_address = $request->customer_address;
        $shippingInfo->save();
        
        Session::put('shipping_id',$shippingInfo->id);
        
        return redirect('/payment');
    }
    
    public function payment(){
        $catagories = Catagory::all();
        $productTypes = ProductType::all();
        $products = Product::all();
        
        return view('front-end.order.payment',['catagories'=>$catagories,'productTypes'=>$productTypes,'products'=>$products]);
    }
    
    public function showConfirm(){
        $catagories = Catagory::all();
        $productTypes = ProductType::all();
        $products = Product::all();
        
        return view('front-end.order.orderConfirmView',['catagories'=>$catagories,'productTypes'=>$productTypes,'products'=>$products]);
    }
    
    
    
    public function SavePayment(Request $request){
        
        $this->validate($request, [
            'paymentType' => 'required'
        ]);
        
       
        
        
        $paymentType = $request->paymentType;
       $order = new Order();
       $order->customer_id = Session::get('user_id');
       $order->shipping_id = Session::get('shipping_id');
       $order->order_total = Session::get('total_order');
       $order->save();
       
       $payment = new Payment();
       $payment->order_id = $order->id;
       $payment->paymentType = $paymentType;
       
       $payment->save();
       Session::put('payment_id',$payment->id);
       $cartProducts = Cart::content();
       
       foreach($cartProducts as $cartProduct)
       {
           $orderDetail = new OrderDetail();
           $orderDetail->order_id = $order->id;
           $orderDetail->product_id = $cartProduct->id;
           $orderDetail->product_name = $cartProduct->name;
           $orderDetail->product_price = $cartProduct->price;
           $orderDetail->product_quantity = $cartProduct->qty;
           
           $orderDetail->save();
       }
       Cart::destroy();
       return redirect('/order-confirmation');
       
    }
    
    
    
    public function OrderList(){
        
        $catagories = Catagory::all();
        $productTypes = ProductType::all();
        $products = Product::all();
        
        $orders = Order::all();
        $orderDetails = OrderDetail::all();
        $shippings = ShippingInformation::all();
        $payments = Payment::all();
        
        $orderList =  DB::table('orders')
                   ->join('shipping_information','orders.customer_id','=','shipping_information.customer_id')
                   ->join('payments','orders.id','=','payments.order_id')
                   ->select('orders.*','payments.*','shipping_information.*')
                   ->get();
       //return $orderList;
        
       return view('admin.orders.OrderList',['catagories'=>$catagories,'productTypes'=>$productTypes,'products'=>$products,'orderList'=>$orderList]);
    }
    
    public function ViewOrderDetails($id){
        
        $order = Order::find($id);
        //return $order;
        $shipping = ShippingInformation::find($order->shipping_id);
        $payment = Payment::where('order_id',$order->id)->first();
        $orderDetail = OrderDetail::where('order_id',$order->id)->get();
        return view('admin.orders.ViewOrderDetails',['order'=>$order,'shipping'=>$shipping,'payment'=>$payment,'orderDetail'=>$orderDetail]);
    }
    public function ViewInvoice($id){
        
        $order = Order::find($id);
        //return $order;
        $shipping = ShippingInformation::find($order->shipping_id);
        $payment = Payment::where('order_id',$order->id)->first();
        $orderDetail = OrderDetail::where('order_id',$order->id)->get();
        return view('admin.orders.ViewInvoice',['order'=>$order,'shipping'=>$shipping,'payment'=>$payment,'orderDetail'=>$orderDetail]);
    }
    
    public function DownloadInvoice($id){
        
        $order = Order::find($id);
        //return $order;
        $shipping = ShippingInformation::find($order->shipping_id);
        $payment = Payment::where('order_id',$order->id)->first();
        $orderDetail = OrderDetail::where('order_id',$order->id)->get();
        
        $pdf = PDF::loadView('admin.orders.DownloadOrderInvoice',['order'=>$order,'shipping'=>$shipping,'payment'=>$payment,'orderDetail'=>$orderDetail]);
        return $pdf->stream('invoice.pdf');
    }
    
    public function ConfirmedOrder(){
       
        $var = "Confirmed";
        $orders = Order::where('orderStatus',$var)->get();
        $orderDetails = OrderDetail::all();
        $shippings = ShippingInformation::all();
        $payments = Payment::all();
        
        $orderList =  DB::table('orders')
        ->join('shipping_information','orders.customer_id','=','shipping_information.customer_id')
        ->join('payments','orders.id','=','payments.order_id')
        ->select('orders.*','payments.*','shipping_information.*')
        ->get();
        return view('admin.orders.ConfirmedOrder',['orderList'=>$orderList]);
    }
    
    public function OrderConfirm($id){
        
       
        
        $order = Order::find($id);
        
        $var = "Confirmed";
        $order->orderStatus =$var; 
        $order->save();
       // return $order;
        return redirect('/order/list');
    }
    
    public function OrderDeleteConfirm($id){
        
        
        
        $order = Order::find($id);
        $order->delete();
        // return $order;
        return redirect('/order/list');
    }
    public function PaymentOfOrderConfirm($id){
        
        
        
        $payments = Payment::where('order_id',$id)->get();
        
        $var = "Confirmed";
        foreach($payments as $payment){
            $payment->paymentStatus =$var;
            $payment->save();
        }
        return redirect('/order/list');
    }
}
