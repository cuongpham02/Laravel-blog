<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Comment;
use App\Models\Post;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
     public function validation($request){
        return $this->validate($request,[
            'desc' => 'required|max:255|min:3', 
            'name' => 'required|max:100|min:3', 
        ],
        );
    }

    public function send_comment(Request $request){
        $this->validation($request);
        $time=Carbon::now();
        $id = $request->post_id;
        if (Post::findOrFail($id)) {
            $comment = new Comment();
            $comment->desc = $request->desc;
            $comment->created_at =  $time;
            $comment->name = $request->name;
            $comment->post_id = $id;
            $comment->status = 0;
            $comment->rep_comment = 0;
            $comment->save();
        }

    }

    public function load_comment(Request $request){
        $id = $request->post_id;
        $comment = Comment::where('post_id',$id)->where('status',0)->where('rep_comment','=',0)->get();
        $comment_rep = Comment::with('post')->where('rep_comment','>',0)->get();
        $output = '';
        foreach($comment as $key => $comm){
            $output.= ' 
            <div class="row style_comment">

            <div class="col-md-2">
                <img width="100%" src="'.url('/frontend/images/customer.png').'" class="img img-responsive img-thumbnail">
            </div>
            <div class="col-md-10">
                <p style="color:green;">@'.$comm->name.'</p>
                <p style="color:#000;">'.$comm->created_at.'</p>
                <p>'.$comm->desc.'</p>
            </div>
        </div><p></p>';

        foreach($comment_rep as $key => $rep_comment)  {
            if($rep_comment->rep_comment==$comm->id)  {
            $output.= ' <div class="row style_comment" style="margin:5px 40px;background: aquamarine;">

            <div class="col-md-2">
                <img width="80%" src="'.url('/frontend/images/manager.png').'" class="img img-responsive img-thumbnail">
            </div>
            <div class="col-md-10">
                <p style="color:blue;">@Admin-CTShop</p>
                <p style="color:#000;">'.$rep_comment->desc.'</p>
                <p></p>
            </div>
        </div><p></p>';
            }
                                    }
        }
        echo $output;

    }
}