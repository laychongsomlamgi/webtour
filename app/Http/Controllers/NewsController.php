<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use Illuminate\Http\Request;
use App\Model\News;
class NewsController extends Controller
{
    //
    public function index(){
        $news = News::paginate(5);
        return view('admin.news.index', compact('news'));
    }
    public function create(){
        return view('admin.news.create');
    }
    public function store(NewsRequest $request){
        $image = $request->file('new_image');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('news/images'), $new_name);
        News::query()->create([
            'new_name' => $request->new_name,
            'new_image' => $new_name,
            'new_date' => now(),
            'new_description' => $request->new_description
        ]);
        return redirect()->route('news.index');
    }
    public function show($id) {
        $news = News::findOrFail($id);
        return view('admin.news.detail', compact('news'));
    }
    public function edit(News $news) {
        return view('admin.news.edit', compact('news'));
    }
    public function update(News $news, NewsRequest $request) {
        $image_name = $request->hidden_image;
        $image = $request->file('new_image');
        if($image != ''){
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('news/images'), $image_name);
        }

        $form_data = array(
            'new_name' => $request->new_name,
            'new_image' => $image_name,
            'new_date' => now(),
            'new_description' => $request->new_description
        );
        $news->update($form_data);
        return redirect()->route('news.index');
    }
    public function destroy(News $news){
        $news->delete();
        return redirect()->route('news.index');
    }
}
