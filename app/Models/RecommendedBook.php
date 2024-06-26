<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class RecommendedBook extends Model
{

    protected $table = 'recommended_books';

    //データ挿入の許可をするカラムを指定(許可しない設定をする場合は$guardedにする)
    protected $fillable = ['book_name','book_author','book_publisher','book_price','book_url','comment','publishing_settings','contributor_id','post_date','post_time','classification']; 

    // タイムスタンプはなしで(Unknown column 'updated_at'が出ないように)
    // created_atとupdated_atが自動で入るようになっている為
    // public $timestamps = false;

    use HasFactory;

    public function getData()
    {
        return $this->id . ':' . $this->book_name . '(' . $this->book_author . ')';
    }
    //スコープの定義
    public function scopeNameEqual($query,$str){
        return $query->where('name', "LIKE", '%'.$str.'%');//含まれてたら
    }

}
