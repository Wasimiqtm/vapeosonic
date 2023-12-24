<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

if (Auth::user()->type == 'dropshipper'){
            $subTotal=0;
        }else{
            $subTotal       = (Auth::id())?Cart::session(Auth::id())->getSubTotal():Cart::getSubTotal();
        }
      
        $cart=ShoppingCart::where(['user_id' => Auth::id(), 'payment_status' => 'pending'])->first();

        if(!$cart){
            return back()->with('error','No data found');
        }

        $courier_assign = CouriersAssignment::where('cart_id',$cart->id)->first();

        $cartSum = 0;
        $originalPrice = 0;
        $woriginalPrice = 0;
        $wsubtotal = 0;
        $total_shipment_charges = 0;
        
        foreach($cartContents as $item){

            

            if (Auth::user()->type != 'retailer') {
                $subTotal += $item->getPriceSum();
            }
           
            $productDetails = getProductDetails($item->id);
            if($productDetails) {
                $originalPrice += ($productDetails->price * $item->quantity);
            }

            if (Auth::user()->type == 'dropshipper') {
                
                if (@$courier_assign && $courier_assign->status == 2) {
                    $courierAssignmentDetail = CouriersAssignmentDetail::where('product_id', '=', $item->id)->where('cart_id', $cart->id)->first();
                    $item->courier_detail = $courierAssignmentDetail;
                       
                   
                    $item->courier_id = $courierAssignmentDetail->couriers->id??'';
                } else if ($count == 1 && $item->quantity == 1) {
                    
                    $total_shipment_charges = @$productDetails->courier->charges;
                 
                    $item->courier_id = @$productDetails->courier->id;
                    $subTotal = $subTotal+$total_shipment_charges;
                }
            } elseif (Auth::user()->type == 'wholesaler') {

                $this->applyDiscount($cartContents);
                $originalPrice = $cartContents->orignalPrice;
                $subTotal = $cartContents->subTotal;
                

            }

        }

        if(Auth::user()->type == 'dropshipper' && @$courier_assign->status == 2 ) {
 
            $cartContents = $cartContents->sortBy('courier_id');
            $this->attach_color($cartContents);
            $this->attach_shipment_charges($cartContents);
            $total_shipment_charges=$cartContents->shipment_charges;
            $subTotal = $subTotal+$total_shipment_charges;
           

        }

        if(Auth::user()->type == 'wholesaler' && Auth::user()->type == 'dropshipper'  ) {
               
            $cartContents = $courier_assign->sortBy('courier_id');
            $this->attach_color($cartContents);
            $this->attach_shipment_charges($cartContents);
            $total_shipment_charges=$cartContents->shipment_charges;

        }



        $couriers= Courier::all();
        $vatCharges=TaxRate::select('rate')->where('id',1)->first();
        $vatCharges=(int)$vatCharges->rate;
        
        //$subTotal = number_format($subTotal,2);
                // dd($subTotal);

//        dd($vatCharges);


        // if(Auth::id()==4) {
        //     dump($cartContents);
        //     dd($total_shipment_charges);
        // }
        if(request()->has('from')){
            return view('cart.home_cart', compact('vatCharges','cartContents','couriers','total_shipment_charges','cart','count', 'subTotal', 'cartSum', 'originalPrice'));
        }

        return view('cart.cartDetails', compact('vatCharges','couriers','total_shipment_charges','cart','count', 'cartContents', 'subTotal', 'cartSum', 'originalPrice'));
   
    
</body>
</html>

