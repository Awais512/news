<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $hot_news = Post::with('creator')->withCount('comments')->where('hot_news', 1)->where('status', 1)->orderBy('id', 'DESC')->first();

        $top_viewed = Post::with('creator')->withCount('comments')->where('status', 1)->orderBy('view_count', 'DESC')->limit(2)->get();

        return view('front.home', compact('hot_news', 'top_viewed'));
    }
}
