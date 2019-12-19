<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index($id)
    {
        $page_name = 'Comments';
        $comments = Comment::with(['post'])->where('post_id', $id)->orderBy('id', 'DESC')->get();
        return view('admin.comment.list', compact('page_name', 'comments'));
    }

    public function reply($id)
    {
        $page_name = 'Comment Reply';
        return view('admin.comment.reply', compact('page_name', 'id'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required',
            'post_id' => 'required'
        ]);

        $comment = new Comment();
        $comment->name = Auth::user()->name;
        $comment->comment = $request->comment;
        $comment->status = 0;
        $comment->post_id = $request->post_id;
        $comment->save();

        return redirect(route('admin.comment.list', ['id' => $request->post_id]))->with('success', 'Reply added Successfully.');
    }

    public function status($id)
    {
        $comment = Comment::findOrFail($id);
        if ($comment->status === 1) {
            $comment->status = 0;
        } else {
            $comment->status = 1;
        }

        $comment->save();

        return redirect()->back()->with('success', 'Comment status has been changed Successfully...');
    }
}
