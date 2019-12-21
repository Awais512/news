<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $hot_news = Post::with('creator')->withCount('comments')->where('hot_news', 1)->where('status', 1)->orderBy('id', 'DESC')->first();

        return view('front.home', compact('hot_news'));
    }
}
