<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request){
        $years = DB::table('cars')->select('year')->distinct->get()->pluck('year');
        $courses = DB::table('cars')->select('course')->distinct->get()->pluck('course');
        $prices = DB::table('cars')->select('price')->distinct->get()->pluck('price');
        $car_statuses_id = DB::table('cars')->select('car_status_id')->distinct->get()->pluck('car_status_id');

        $post = POST::qeury();

        if($request->filled('price')){
            $post->where('price', $request->price);
        }
    }
}
