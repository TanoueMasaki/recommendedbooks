<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecommendedBook_view extends Model
{
    protected $table = 'recommended_books_view';

    use HasFactory;

    public function getData()
    {
        return $this->id . ':' . $this->book_name . '(' . $this->book_author . ')';
    }
    //スコープの定義
    public function scopeContributorId($query,$id){
        return $query->where('contributor_id',$id);
    }
    public function scopePublishingSet($query){
        return $query->where('publishing_settings',"public");
    }
}
