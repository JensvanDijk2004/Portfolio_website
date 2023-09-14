<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
class homeController extends Controller
{
    public function index(){
        return view('home', [
            'posts' =>post::paginate(6)
        ]);
    }


}