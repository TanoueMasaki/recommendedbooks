<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class RecommendedBook extends Model
{

    protected $table = 'recommended_books';

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
