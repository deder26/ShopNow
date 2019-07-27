@extends('admin.dashboard')

@section('dashcontent')
<style>
.invoice-title h2, .invoice-title h3 {
    display: inline-block;
}

.table > tbody > tr > .no-line {
    border-top: none;
}

.table > thead > tr > .no-line {
    border-bottom: none;
}

.table > tbody > tr > .thick-line {
  
</style>
	
<div class="container">
    <div class="row">
        <div class="col-md-11">
    		<div class="invoice-title">
    			<h2>Invoice</h2><h3 class="pull-right">Order # {{$order->id}}</h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Shipping Info:</strong><br>
    					Name: {{$shipping->customer_name}}<br>
    					Email: {{$shipping->customer_email}}<br>
    					Contact No. {{$shipping->customer_contact}}<br>
    					Address: {{$shipping->customer_address}}
    				</address> 
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    					<strong>Payment Method:</strong><br>
    					{{$payment->paymentType}}<br>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Order Date:</strong><br>
    					{{$order->created_at}}<br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Product Name</strong></td>
        							<td class="text-center"><strong>Price</strong></td>
        							<td class="text-center"><strong>Quantity</strong></td>
        							<td class="text-right"><strong>Totals</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							@foreach($orderDetail as $productInfo)
    							<tr>
    								<td>{{$productInfo->product_name}}</td>
    								<td class="text-center">Tk. {{$productInfo->product_price}}</td>
    								<td class="text-center">{{$productInfo->product_quantity}}</td>
    								
    								<td class="text-right">Tk.{{$productInfo->product_quantity*$productInfo->product_price }}</td>
    							</tr>
    							</br>
    							@endforeach
    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
    								<td class="thick-line text-right">Tk. {{$order->order_total}}</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Service Charge</strong></td>
    								<td class="no-line text-right">5.0%</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Total</strong></td>
    								<td class="no-line text-right">{{$order->order_total+$order->order_total*0.05}}</td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>

	@for($i = 0; $i < 11; $i++) 
		<br>
	@endfor
@endsection

