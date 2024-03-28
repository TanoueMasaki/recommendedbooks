<?php

namespace App\Http\Controllers;

use App\Models\RecommendedBook;
use App\Models\RecommendedBook_view;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class MainController extends Controller
{
    // 一覧表示（view）
    public function publicGet(Request $request){
        // $items = RecommendedBook_view::contributorId($request->user()->id)->get();
        $items = RecommendedBook_view::publishingSet()->get();

        return view('dashboard')
        ->with([
            "items" => $items,
         ]);
    }

    // 一覧表示（view）
    public function privateGet(Request $request){
        $items = RecommendedBook_view::contributorId($request->user()->id)->get();
        
        // 分類イメージ画像を配列に入れる
        $images = [
            asset('/data/image/comic.png'),
            asset('/data/image/doujinshi.png'),
            asset('/data/image/no_image.png')
        ];
        $imageNum = 2;
        

        return view('userOnly.index')
        ->with([
            "items" => $items,
            "images" => $images,
            "imageNum" => $imageNum
         ]);
    }

    // データの追加(INSERT)
    public function privateGetPost(Request $request){

        // if($request->book_name==="" || !isset($_book_name) || $request->book_name===null){
        //     exit;
        // }

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
            "contributor_id" =>  $request-> contributor_id,
            "classification" => $request->classification
        ]);  

        // リダイレクトはルートのnameを入れる
        return redirect()->route('privateGet');
    }

    // データの削除(DELETE)
    public function delete(Request $request){

        $checkedId = $request->checkedId;
        
        // 複数条件での検索はwhereInで出来る
        $items = RecommendedBook_view::all()->whereIn('id', $checkedId);

        // 分類イメージ画像を配列に入れる
        $images = [
            asset('/data/image/comic.png'),
            asset('/data/image/doujinshi.png'),
            asset('/data/image/no_image.png')
        ];
        $imageNum = 2;

        return view('userOnly.delete')
        ->with([
            "items" => $items,
            "images" => $images,
            "imageNum" => $imageNum
         ]);

        // リダイレクトはルートのnameを入れる
        // return redirect()->route('privateGet');
    }
}
