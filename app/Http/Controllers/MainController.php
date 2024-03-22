<?php

namespace App\Http\Controllers;

use App\Models\RecommendedBook;
use App\Models\RecommendedBook_view;
use Illuminate\Http\Request;

class MainController extends Controller
{
    // 一覧表示（view）
    public function showGet(Request $request){
        // $items = RecommendedBook_view::contributorId($request->user()->id)->get();
        $items = RecommendedBook_view::publishingSet()->get();

        return view('dashboard')
        ->with([
            "items" => $items,
         ]);
    }

    // データの追加(INSERT)
    public function showPost(Request $request){
        RecommendedBook::create([  
            "book_name" => $request->book_name,
            "book_author" => $request->book_author,
            "book_publisher" => $request->book_publisher,
            "book_price" => $request->book_price,
            "book_url" => $request->book_url,
            "comment" => $request->comment,
            "publishing_settings" => $request->publishing_settings,
            "post_date" => date("Y-m-d"),
            "post_time" => date("H:i:s"),
            "contributor_id" =>  $request-> contributor_id
          ]);  
        
        return redirect('dashboard');
    }

    public function userOnly(){
        
        return view('userOnly.index');
    }
}
