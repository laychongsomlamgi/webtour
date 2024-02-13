<?php

namespace App\Http\Controllers;

use App\Http\Requests\TourRequest;
use Illuminate\Http\Request;
use App\Model\Tour;
use App\Model\Category;
use App\Model\TourGuide;

class TourController extends Controller
{
    //
    public function index(){
        $tours = Tour::join('tourguides', 'tours.tourGuide_id', 'tourguides.tourGuide_id')
        ->orderBy('category_id', 'desc')
        ->select(
            'tours.tour_id',
            'tours.tour_name',
            'tours.tour_price',
            'tourguides.tourGuide_name',
            'tours.tour_quantytiDate'
        )->paginate(10);
        return view('admin.tour.index', compact('tours'));
    }
    public function show($id){
        $tours = Tour::findOrFail($id);
        $tours->get();
        $category_id = $tours->category_id;
        $category = Category::findOrFail($category_id);
        $tourGuide_id = $tours->tourGuide_id;
        $tourGuide = TourGuide::findOrFail($tourGuide_id);
        return view('admin.tour.detail', compact('tours', 'category', 'tourGuide'));
    }
    public function create(){
        $categories = Category::all(); 
        $tourguides = TourGuide::all(); 
        return view('admin.tour.create', compact('categories', 'tourguides'));
    }
    public function store(TourRequest $request){
        $image = $request->file('tour_image');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        Tour::query()->create([
            'tour_id' => $request->tour_id,
            'tour_name' => $request->tour_name,
            'category_id' => $request->category_id,
            'tour_price' => $request->tour_price,
            'tour_discount' => $request->tour_discount,
            'tour_image' => $new_name,
            'tour_place' => $request->tour_place,
            'tour_vehicle' => $request->tour_vehicle,
            'tour_locationStart' => $request->tour_locationStart,
            'tour_locationEnd' => $request->tour_locationEnd,
            'tour_quantytiDate' => $request->tour_quantytiDate,
            'tour_dateStart' => $request->tour_dateStart,
            'tour_dateEnd' => $request->tour_dateEnd,
            'tour_description' => $request->tour_description,
            'tour_trip' => $request->tour_trip,
            'tourGuide_id' => $request->tourGuide_id,
            'tour_hot' => $request->tour_hot
        ]);
        return redirect()->route('tour.index');
    }
    public function edit(Tour $tour){
        $categories = Category::all();
        $tourguide = TourGuide::all();
        return view('admin.tour.edit', compact('tourguide', 'categories', 'tour'));
    }
    public function update(Tour $tour, TourRequest $request){
        $image_name = $request->hidden_image;
        $image = $request->file('tour_image');
        if($image != ''){
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        $form_data = array(
            'tour_name' => $request->tour_name,
            'category_id' => $request->category_id,
            'tour_price' => $request->tour_price,
            'tour_discount' => $request->tour_discount,
            'tour_image' => $image_name,
            'tour_place' => $request->tour_place,
            'tour_vehicle' => $request->tour_vehicle,
            'tour_locationStart' => $request->tour_locationStart,
            'tour_locationEnd' => $request->tour_locationEnd,
            'tour_quantytiDate' => $request->tour_quantytiDate,
            'tour_dateStart' => $request->tour_dateStart,
            'tour_dateEnd' => $request->tour_dateEnd,
            'tour_description' => $request->tour_description,
            'tour_trip' => $request->tour_trip,
            'tourGuide_id' => $request->tourGuide_id
        );
        
        $tour->update($form_data);
        return redirect()->route('tour.index');
    }
    public function destroy(Tour $tour) {
        $tour->delete();
        return redirect()->route('tour.index');
    }
}
