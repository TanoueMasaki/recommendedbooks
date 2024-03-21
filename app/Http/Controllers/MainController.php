<?php

namespace App\Http\Controllers;

use App\Models\RecommendedBook;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function find(){
        $items = RecommendedBook::all();
        
        return view('dashboard')
        ->with([
            "items" => $items,
         ]);
    }

    public function userOnly(){
        
        return view('userOnly.index');
    }
}
