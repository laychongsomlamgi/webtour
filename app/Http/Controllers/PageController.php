<?php

namespace App\Http\Controllers;

use App\Model\BillDetail;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Tour;
use App\Model\News;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
class PageController extends Controller
{
    //
    public function getInfo(){
        $tours = Tour::limit(9)->get();
        //Tour trong nước
        $tourDomestic = Tour::where('category_id', '1')->limit(6)->get();
        return view('home.homePage', compact('tours', 'tourDomestic'));
    }

    public function getDetail($id_name){
        $tours = Tour::where('tour_id', $id_name)->first();
        $tour_relate = Tour::where('category_id', $tours->category_id)
            ->where('tour_id', '<>', $id_name)
            ->orderby('tour_id', 'desc')
            ->limit(5)->get();
        return view('home.detailTour', compact('tours', 'tour_relate'));
    }
    
    public function getCategory($id){
        $categories = Category::where('category_id', $id)->first();
        $tour = Tour::where('category_id', $id)
            ->limit(5)->get();
        return view('home.categoryTour', compact('categories', 'tour'));
    }

    public function search(Request $request){
        $tour = Tour::where('tour_name', 'like', '%'. $request->keyTour .'%')
            ->paginate(10);
        return view('home.search', compact('tour'));
    }
    public function unpaid(){
        $carts = Session::get('carts');
        // dd($carts);
        return view('home.unpaid', compact('carts'));
    }
    public function paid(){
        $tours = BillDetail::join('tours', 'tours.tour_id', 'bill_detail.tour_id')
        ->join('bill', 'bill.bill_id', 'bill_detail.bill_id')
        ->where('bill.id', Auth::id())
        ->orderBy('bill.bill_date', 'desc')
        ->select(
            'tours.tour_id',
            'tours.tour_name',
            'tours.tour_image',
            'tours.tour_place',
            'tours.tour_vehicle',
            'tours.tour_quantytiDate',
            'bill.bill_date',
            'bill.bill_total'
        )->get();
        return view('home.paid', compact('tours'));
    }
    public function detailPaid($id){
        $tours = BillDetail::join('tours', 'tours.tour_id', 'bill_detail.tour_id')
        ->join('bill', 'bill.bill_id', 'bill_detail.bill_id')
        ->join('customers', 'customers.customer_id', 'bill_detail.customer_id')
        ->where('bill.id', Auth::id())
        ->where('tours.tour_id', $id)
        ->select(
            'tours.tour_id',
            'tours.tour_name',
            'tours.tour_image',
            'tours.tour_place',
            'tours.tour_locationStart',
            'tours.tour_vehicle',
            'tours.tour_price',
            'tours.tour_discount',
            'tours.tour_quantytiDate',
            'bill_detail.dateStart',
            'bill_detail.quantity_OldPerson',
            'bill_detail.quantity_YoungPerson',
            'bill_detail.quantity_Children',
            'bill_detail.quantity_Infant',
            'bill_detail.note',
            'customers.customer_name',
            'customers.customer_phone',
            'customers.customer_email',
            'bill.bill_total'
        )->firstOrFail();
        return view('home.detailPaid', compact('tours'));
    }

    public function news(){
        $news = News::all();
        return view('home.news', compact('news'));
    }

    public function newsDetail($id){
        $newsDetail = News::findOrFail($id);
        return view('home.newsDetail', compact('newsDetail'));
    }
}
