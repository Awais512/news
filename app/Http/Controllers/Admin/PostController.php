<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = 'Posts';
        if (Auth::user()->type === 1 || Auth::user()->hasRole('Editor')) {
            $posts = Post::orderBy('id', 'DESC')->get();
        } else {
            $posts = Post::where('created_by', Auth::user()->id)->orderBy('id', 'DESC')->get();
        }
        return view('admin.post.list', compact('page_name', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = 'Post Create Page';
        $categories = Category::where('status', 1)->pluck('name', 'id');
        return view('admin.post.create', compact('page_name', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'short_desc' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'image' => 'required',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->slug = str_slug($request->title, '-');
        $post->short_desc = $request->short_desc;
        $post->description = $request->description;
        $post->category_id = $request->category_id;
        $post->status = 1;
        $post->hot_news = 0;
        $post->view_count = 0;
        $post->main_image = '';
        $post->thumb_image = '';
        $post->list_image = '';
        $post->created_by = Auth::id();
        $post->save();

        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $main_image = 'post_main_' . $post->id . '.' . $extension;
        $thumb_image = 'post_thumb_' . $post->id . '.' . $extension;
        $list_image = 'post_list_' . $post->id . '.' . $extension;
        Image::make($file)->resize(653, 569)->save(public_path('post/' . $main_image));
        Image::make($file)->resize(360, 309)->save(public_path('post/' . $thumb_image));
        Image::make($file)->resize(122, 122)->save(public_path('post/' . $list_image));
        $post->main_image = $main_image;
        $post->thumb_image = $thumb_image;
        $post->list_image = $list_image;
        $post->save();

        return redirect(route('admin.post.list'))->with('success', 'Post Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
