<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Recommended_booksTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('recommended_books')->insert([
            'book_name' => 'サンプル',
            'book_author' => '田中一郎',
            'book_publisher' => 'サンプル出版',
            'book_price' => 2000,
            'book_url' => 'http://localhost/laravel/recommendedbooks/public/',
            'comment' => 'サンプルコメント',
            'publishing_settings' => 'public',
            "post_date" => date("Y-m-d"),
            "post_time" => date("H:i:s"),
            'contributor_id' => 1,
            'classification' => 'その他',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('recommended_books')->insert([
            'book_name' => 'サンプル2',
            'book_author' => '佐藤太郎',
            'book_publisher' => 'サンプル出版2',
            'book_price' => 500,
            'book_url' => 'http://localhost/laravel/recommendedbooks/public/',
            'comment' => 'サンプルコメント2',
            'publishing_settings' => 'private',
            "post_date" => date("Y-m-d"),
            "post_time" => date("H:i:s"),
            'contributor_id' => 2,
            'classification' => 'コミック',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('recommended_books')->insert([
            'book_name' => 'サンプル3',
            'book_author' => '佐々木智子',
            'book_publisher' => 'サンプル出版3',
            'book_price' => 3000,
            'book_url' => 'http://localhost/laravel/recommendedbooks/public/',
            'comment' => 'サンプルコメント3',
            'publishing_settings' => 'public',
            "post_date" => date("Y-m-d"),
            "post_time" => date("H:i:s"),
            'contributor_id' => 3,
            'classification' => '女性ファッション誌',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('recommended_books')->insert([
            'book_name' => 'サンプル4',
            'book_author' => '鈴木久美子',
            'book_publisher' => 'サンプル出版4',
            'book_price' => 2000,
            'book_url' => 'http://localhost/laravel/recommendedbooks/public/',
            'comment' => 'サンプルコメント4',
            'publishing_settings' => 'private',
            "post_date" => date("Y-m-d"),
            "post_time" => date("H:i:s"),
            'contributor_id' => 4,
            'classification' => '名言集',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('recommended_books')->insert([
            'book_name' => 'サンプル5',
            'book_author' => '高橋敏夫',
            'book_publisher' => 'サンプル出版5',
            'book_price' => 10000,
            'book_url' => 'http://localhost/laravel/recommendedbooks/public/',
            'comment' => 'サンプルコメント5',
            'publishing_settings' => 'public',
            "post_date" => date("Y-m-d"),
            "post_time" => date("H:i:s"),
            'contributor_id' => 5,
            'classification' => '同人誌',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
