<?php

namespace App\Providers;

use App\Category;
use App\Post;
use App\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $categories = Category::where('status', 1)->get();
        $authors = User::where('id', '!=', 1)->get();
        $popular_news = Post::where('status', 1)->orderBy('view_count', 'DESC')->limit(5)->get();
        $most_commented = Post::withCount('comments')->where('status', 1)->orderBy('comments_count', 'DESC')->limit(5)->get();

        $share = array(
            'categories' => $categories,
            'authors' => $authors,
            'popular_news' => $popular_news,
            'most_commented' => $most_commented
        );
        view()->share('share', $share);
    }
}
