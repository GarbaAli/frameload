<?php

namespace App\Http\Controllers;

use App\Topics;
use App\CommentForum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CommentForumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('fetchComment');
    }

    public function store(Request $request,Topics $topic)
    {
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
            $comment = new CommentForum();
            $comment->content = $request->input('content');
            $comment->user_id = auth()->user()->id;
  
            $topic->commentsForum()->save($comment);
            return response()->json([
              'status' =>200,
              'message' => 'Message posté'   
            ]);
        }
    }

    public function fetchComment(Topics $topic)
    {
        // $comments = $post->commentPosts; 
        // dd($post->title);
        $data = DB::select('select C.id, C.content, C.created_at, U.name, R.image FROM comment_forums C, Topics T, users U, profiles R WHERE T.id = C.commentable_id AND T.title = ? AND U.id = C.user_id and U.id = R.user_id', [$topic->title]);


        $output = '';
        foreach($data as $item){
            $reply = DB::select('select C.id, C.content, C.created_at, U.name, R.image FROM comment_forums C, users U, profiles R WHERE U.id = C.user_id and U.id = R.user_id AND C.commentable_id = ?', [$item->id]);

            $outputReply = '';
            foreach($reply as $rep)
            {
                $imgReply = !($rep->image)?'avatar.png': $rep->image;
                $outputReply .= '<li class="comment">
                <div class="vcard bio">
                <img src="/storage/avatars/'.$imgReply.'">
                </div>
                <div class="comment-body">
                <h3>'.$rep->name.'</h3>
                <div class="meta">'.$rep->created_at.'</div>
                <p>'.$rep->content.'</p>
                </div>
               </li> 
               ';
            }

            $img = !($item->image)?'avatar.png': $item->image;

            $output .=  '<li class="comment">
            <div class="vcard bio">
            <img src="/storage/avatars/'.$img.'">
            </div>
            <div class="comment-body">
            <h3>'.$item->name.'</h3>
            <div class="meta">'.$item->created_at.'</div>
            <div class="d-flex justify-content-between">
                <p>'.$item->content.'</p>
                <button id="" class="btn btn-success btn-sm element">Solution</button>
            </div>
            

            <ul class="list">
                '.$outputReply.'
            </ul>
            <button id="'.$item->id.'" class="btn btn-outline-primary btn-sm element">Répondre</button>
              <form id="'.$item->id.'-reply" class=" ml-5 mt-5 comment_form d-none">
                  <div class="form-group">
                      <textarea name="replycontent" id="content'.$item->id.'"  class="comments_input comment_textarea form-control" rows="5"></textarea>
                      <span style="color: red" id="errorss"></span>
                  </div>
                  <div>
                    <button style="text-align:right" id="'.$item->id.'"  class="btn btn-outline-primary btn-sm reply_button">Poster Votre Commentaire</button>
                </div>
              </form>
         
            </div>
           </li>';
        }
        echo $output;
        






        // return response()->json([
        //     'comments' => $comments,
        // ]);
    }

    //Store pour les reponses aux commentaires
    public function storeReply(Request $request,CommentForum $comment)
    {
        $validator = Validator::make($request->all(), [
            'replycontent' => 'required|min:2'
        ]);
        
        //Ajax
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors' => $validator->messages(), 
            ]);
        }else{
            $commentReply = new CommentForum();
            $commentReply->content = $request->input('replycontent');
            $commentReply->user_id = auth()->user()->id;
  
            $comment->commentsForum()->save($commentReply);
            return response()->json([
              'status' =>200,
              'message' => 'Message posté'
            ]);
        }
    }

    // public function fetchCommentReply(CommentForum $comment)
    // {
        
    //         $data = DB::table('topics')->where('title', 'LIKE',"%{$query}%")->get();
            
    //         foreach($data as $row){
    //             $output .= '<li class="tags"><a style="font=size:17px; color:black; font-weight:bold" href="forum/'. $row->souscat_forum_id .'/'. $row->title .'/show"> '. $row->title .' </a></li><hr>';
    //         }
    //         $output .= '</ul>';  
    //         echo $output;
        
    // }
}
