<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Model\BillDetail;
use App\Model\Customer;
use App\Model\Tour;
use App\Model\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class BookTourController extends Controller
{
    //
    public function index($id){
        $tours = Tour::where('tour_id', $id)->first();
        return view('home.bookTour', compact('tours'));
    }
    public function orderTour(CustomerRequest $request, $id){
        $carts = Session::get('carts') ?? [];
        $tour = Tour::query()->findOrFail($id);
        $tourKey = sprintf('tour_id_%s', $id);
        $price_OldPerson = ($tour->tour_discount > 0) ? $tour->tour_discount : $tour->tour_price;
        $price_YoungPerson = $price_OldPerson / 2;
        
        if(!array_key_exists($tourKey, $carts)){
            $carts[$tourKey] = [
                'id' => $id,
                'name' => $tour->tour_name,
                'image' => $tour->tour_image,
                'discount' => $tour->tour_discount,
                'price' => $tour->tour_price,
                'place' => $tour->tour_place,
                'vehicle' => $tour->tour_vehicle,
                'dateStart' => $tour->tour_dateStart,
                'quantytiDate' => $tour->tour_quantytiDate,
                'date' => $request->date,
                'customer_name' => $request->customer_name,
                'customer_phone' => $request->customer_phone,
                'customer_email' => $request->customer_email,
                'price_OldPerson' => $price_OldPerson,
                'price_YoungPerson' => $price_YoungPerson,
                'quantity_OldPerson' => $request->quantity_OldPerson,
                'quantity_YoungPerson' => $request->quantity_YoungPerson,
                'quantity_Children' => $request->quantity_Children,
                'quantity_Infant' => $request->quantity_Infant,
                'priceTotal' => $price_OldPerson * $request->quantity_OldPerson + $price_YoungPerson * $request->quantity_YoungPerson,
                'note' => $request->note
            ];
        } else{
            $tourCart = $carts[$tourKey];
            $tourCart['image'] =  $tour->tour_image;
            $tourCart['discount'] =  $tour->tour_discount;
            $tourCart['price'] =  $tour->tour_price;
            $tourCart['place'] =  $tour->tour_place;
            $tourCart['vehicle'] =  $tour->tour_vehicle;
            $tourCart['dateStart'] =  $tour->tour_dateStart;
            $tourCart['quantytiDate'] =  $tour->tour_quantytiDate;
            $tourCart['date'] =  $request->date;
            $tourCart['customer_name'] =  $request->customer_name;
            $tourCart['customer_phone'] =  $request->customer_phone;
            $tourCart['customer_email'] =  $request->customer_email;
            $tourCart['quantity_OldPerson'] = $request->quantity_OldPerson;
            $tourCart['quantity_YoungPerson'] = $request->quantity_YoungPerson;
            $tourCart['quantity_Children'] = $request->quantity_Children;
            $tourCart['quantity_Infant'] = $request->quantity_Infant;
            $tourCart['priceTotal'] = $price_OldPerson * $request->quantity_OldPerson + $price_YoungPerson * $request->quantity_YoungPerson;
            $tourCart['note'] = $request->note;
            $carts[$tourKey] = $tourCart;
        }
        Session::put('carts', $carts);
        return redirect()->route('orderPage', $id);
    }
    public function showOrder($id){
        $tourKey = sprintf('tour_id_%s', $id);
        $carts = Session::get('carts')[$tourKey];
        return view('home.orderPage', compact('carts'));
    }
    public function pay($id){
        // dd(Session::all());
        $tourKey = sprintf('tour_id_%s', $id);
        $carts = Session::get('carts')[$tourKey];
            DB::transaction(function() use($carts) {
                $customers = Customer::query()->firstOrCreate([
                    
                    'customer_phone' => $carts['customer_phone'],
                    'customer_email' => $carts['customer_email'],
                ], [
                    'customer_name' => $carts['customer_name'],
                ]);

                $bill = new Bill;
                $bill->customer_id = $customers->customer_id;
                $bill->bill_total = $carts['priceTotal'];
                $bill->bill_date = now();
                $bill->id = Auth::id();
                $bill->save();

                $billDetails = new BillDetail;
                $billDetails->bill_id = $bill->bill_id;
                $billDetails->tour_id = $carts['id'];
                $billDetails->customer_id = $customers->customer_id;
                $billDetails->dateStart = $carts['date'];
                $billDetails->quantity_OldPerson = $carts['quantity_OldPerson'];
                $billDetails->quantity_YoungPerson = $carts['quantity_YoungPerson'];
                $billDetails->quantity_Children = $carts['quantity_Children'];
                $billDetails->quantity_Infant = $carts['quantity_Infant'];
                $billDetails->note = $carts['note'];
                $billDetails->save();

                Session::forget('carts');
            });

        return view('home.paySuccess');
    }
}
