<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    function index()
    {
        $comments = Comment::whereNull('parent_id')->get();

        return view("list", [
            "comments" => $comments
        ]);
    }

    function store(Request $request)
    {
        $request->validate([
            "body" => "required|min:4|max:255",
            "parent_id" => "integer"
        ]);

        $comment = new Comment();
        $comment->user_id = auth()->id();
        $comment->body = $request->body;
        $comment->created_at = Carbon::now();
        $comment->updated_at = Carbon::now();

        if (isset($request->parent_id)) {
            $comment->parent_id = $request->parent_id;
        }

        $comment->save();

        return redirect("/")->with("success", "Comment created");
    }
}
