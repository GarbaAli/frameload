<?php

namespace App\Http\Controllers;

use App\Post;
use App\CommentPost;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CommentPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('fetchComment');
    }

    public function store(Request $request, Post $post)
    {
        // $validator = request()->validate([
        //     'content' => 'required|min:2|max:200'
        // ]);

        $validator = Validator::make($request->all(), [
            'content' => 'required|min:2'
        ]);

        
        //Ajax
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors' => $validator->messages(), 
            ]);
        }else{
            $comment = new CommentPost();
            $comment->content = $request->input('content');
            $comment->user_id = auth()->user()->id;
  
            $post->commentPosts()->save($comment);
            return response()->json([
              'status' =>200,
              'message' => 'Message posté'
            ]);
        }

    }

    public function fetchComment(Post $post)
    {
        // $comments = $post->commentPosts;  
        // dd($post->title);
        $comments = DB::select('select C.id, C.content, C.created_at, U.name, R.image FROM comment_posts C, posts P, users U, profiles R WHERE P.id = C.commentable_id AND P.title = ? AND U.id = C.user_id and U.id = R.user_id', [$post->title]);

        // dd($comments);
        
        return response()->json([
            'comments' => $comments,
        ]);
    }
}
