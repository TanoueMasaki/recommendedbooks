<?php

namespace App\Http\Controllers;

use App\Models\RecommendedBook;
use App\Models\RecommendedBook_view;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class MainController extends Controller
{
    // 一覧表示（view）
    public function publicGet(Request $request){
        // $items = RecommendedBook_view::contributorId($request->user()->id)->get();
        // $items = RecommendedBook_view::publishingSet()->get()->paginate(1);
        $items = RecommendedBook_view::publishingSet()->paginate(3);

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
            asset('/data/image/no_image.png'),
            asset('/data/image/comic.png'),
            asset('/data/image/doujinshi.png'),
            asset('/data/image/ehon.png'),
            asset('/data/image/fashion.png'),
            asset('/data/image/meigensyu.png'),
            asset('/data/image/music.png')
        ];
        $imageNum = 0;
        

        return view('userOnly.index')
        ->with([
            "items" => $items,
            "images" => $images,
            "imageNum" => $imageNum
         ]);
    }

    // データの追加(INSERT)
    public function privateGetPost(Request $request){

        // バリデーションチェック
        $input = $request->validate([
            "book_name" => 'required | string',
            "book_author" => 'required | string',
            "book_publisher" => 'required | string',
            "book_price" => 'integer | min:0',
            "classification" => 'required | string',
            "publishing_settings" => 'required | string'
        ]);

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

    // データの削除or更新(DELETE or UPDATE)
    public function deleteOrUpdate(Request $request){

        if($request->checkedId===null){
            return redirect()->route('privateGet')
            ->with('errorMessage','チェックして下さい');
        }

        // 削除ボタンが押されたら
        if ($request->has('bookDataDelete')) {
            $checkedId = $request->checkedId;
            // セッションに$checkedIdを一旦保存しておく
            $request->session()->put('checkedId',$checkedId);
            
            // 複数条件での検索はwhereInで出来る
            $items = RecommendedBook_view::all()->whereIn('id', $checkedId);

            // 分類イメージ画像を配列に入れる
            $images = [
                asset('/data/image/no_image.png'),
                asset('/data/image/comic.png'),
                asset('/data/image/doujinshi.png'),
                asset('/data/image/ehon.png'),
                asset('/data/image/fashion.png'),
                asset('/data/image/meigensyu.png'),
                asset('/data/image/music.png')
            ];
            $imageNum = 0;

            return view('userOnly.delete')
            ->with([
                "items" => $items,
                "images" => $images,
                "imageNum" => $imageNum
            ]);

        // 更新ボタンが押されたら
        } elseif ($request->has('bookDataUpdate')) {
            $checkedId = $request->checkedId;
            // セッションに$checkedIdを一旦保存しておく
            $request->session()->put('checkedId',$checkedId);
            
            // 複数条件での検索はwhereInで出来る
            $items = RecommendedBook_view::all()->whereIn('id', $checkedId);

            return view('userOnly.update')
            ->with([
                "items" => $items
            ]);
        } 
    }

    // データの削除実行(REMOVE)
    public function remove(Request $request){
        // セッションに'checkedId'があれば削除する
        if($request->session()->has('checkedId')){
            $checkedId = $request->session()->get('checkedId');
            $items = RecommendedBook::whereIn('id', $checkedId)->delete();
            // セッションの'checkedId'を消去する
            $request->session()->forget('checkedId');
        }
            
        return redirect()->route('privateGet');
    }

    // データの更新実行(UPDATE)
    public function update(Request $request){

        // バリデーションチェック
        $input = $request->validate([
            "book_name" => 'required | string | max:50',
            "book_author" => 'required | string | max:10',
            "book_publisher" => 'required | string | max:50',
            "book_price" => 'integer | min:0',
            "book_url" => 'string | max:200',
            "comment" => 'max:200',
            "classification" => 'required | string',
            "publishing_settings" => 'required | string'
        ]);
        
            
            $checkedId = $request->session()->get('checkedId');
            $items = RecommendedBook::find($request->id);

            $items->book_name = $request->book_name;
            $items->book_author = $request->book_author;
            $items->book_publisher = $request->book_publisher;
            $items->book_price = $request->book_price;
            $items->book_url = $request->book_url;
            $items->comment = $request->comment;
            $items->publishing_settings = $request->publishing_settings;
                // "post_date" = date("Y-m-d"),
                // "post_time" = date("H:i:s"),
                // "contributor_id" =  $request-> contributor_id,
            $items->classification = $request->classification;  
            $items->save();
            
            $items = RecommendedBook_view::all()->whereIn('id', $checkedId);
            return view('userOnly.update')
            ->with([
                "items" => $items
            ]);
    }
    public function updateEnd(Request $request){
        // セッションに'checkedId'があれば実行する
        if($request->session()->has('checkedId')){
            // セッションの'checkedId'を消去する
            $request->session()->forget('checkedId');
        }
        return redirect()->route('privateGet');
    }
}
