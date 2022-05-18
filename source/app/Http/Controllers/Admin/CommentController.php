<?php

namespace App\Http\Controllers\Admin;
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

    public function show_list_comment(){
        $comment = Comment::with('post')->where('rep_comment',0)->orderBy('id','DESC')->paginate(5);
        $comment_rep = Comment::with('post')->where('rep_comment','>',0)->get();
        return view('admin.comments.list_comments')->with(compact('comment','comment_rep'));
    }

    public function reply_comment(Request $request){

        $data = $request->all();
        $comment = new Comment();
        $comment->desc = $data['desc'];
        $comment->post_id = $data['post_id'];
        $comment->rep_comment = $data['id'];
        $comment->status = 0;
        $comment->name = 'Admin';
        $comment->save();

    }
    public function allow_comment(Request $request){
        $id = $request->id;
        $status = $request->status;
        if ($id) {
            $comment = Comment::find($id);
            $comment->status = $status;
            $comment->save();
        }
       
    }

    public function delete_comment($id){
        $comments = Comment::findOrFail($id);
        $comment_rep = Comment::where('rep_comment',$id);
        if ($comments) {
            $comments->delete();
        }
        if ( $comment_rep) {
             $comment_rep->delete();
        }
        return redirect()->back();
    }
}



