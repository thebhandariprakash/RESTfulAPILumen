<?php
/**
 * Created by PhpStorm.
 * User: bhprakash
 * Date: 2/15/17
 * Time: 12:21 PM
 */

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * @var Comment
     */
    private $comment;

    /**
     * CommentController constructor.
     * @param Comment $comment
     */
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function index(){
        $Comments  = Comment::all();
        return response()->json($Comments);
    }

    public function getComment($id){
        $Comment  = Comment::find($id);
        return response()->json($Comment);
    }

    public function getCommentsByPostId($postId){
      //  return $postId;
        $Comment  = Comment::where('post_id', $postId)
            ->get();
        return response()->json($Comment);
    }


    public function createComment(Request $request){
        $Comment = Comment::create($request->all());
        return response()->json($Comment);

    }

    public function deleteComment($id){
        $Comment  = Comment::find($id);
        $Comment->delete();

        return response()->json('deleted');
    }

    public function updateComment(Request $request,$id){
        $Comment  = Comment::find($id);
        $Comment->title = $request->input('title');
        $Comment->post = $request->input('post');
        $Comment->author_id = $request->input('author_id');
        $Comment->save();

        return response()->json($Comment);
    }
}