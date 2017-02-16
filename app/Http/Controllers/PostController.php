<?php
/**
 * Created by PhpStorm.
 * User: bhprakash
 * Date: 2/15/17
 * Time: 12:21 PM
 */

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @var Post
     */
    private $post;
    /**
     * @var Comment
     */
    private $comment;

    /**
     * PostController constructor.
     * @param Post $post
     * @param Comment $comment
     */
    public function __construct(Post $post,
                                Comment $comment)
    {
        $this->post = $post;
        $this->comment = $comment;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){

        $Posts  = $this->post->all();
        $posts=Array();
        $commentArray=Array();
        foreach($Posts as $post)
        {
            // post items
            $posts['id']=$post->id;
            $posts['name']=$post->title;
            $posts['post']=$post->post;
            $posts['created_at']=$post->created_at;
            $posts['updated_at']=$post->updated_at;

            //get comments by post id
            $comments =$this->comment->commentsByPostId($post->id);
            if($comments)
            {
                    foreach($comments as $comment)
                    {
                      if($comment->post_id===$post->id)
                      {
                          $posts['comments'][]=$comment;
                      }
                    }
            }
            array_push($commentArray,$posts);
            unset($posts['comments']);
        }
        return response()->json($commentArray);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPost($id){
        $Post  = $this->find($id);
        return response()->json($Post);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createPost(Request $request){
        $Post =$this->create($request->all());
        return response()->json($Post);

    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deletePost($id){
        $Post  = $this->find($id);
        $Post->delete();

        return response()->json('deleted');
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function updatePost(Request $request,$id){
        $Post  = $this->find($id);
        $Post->title = $request->input('title');
        $Post->post = $request->input('post');
        $Post->author_id = $request->input('author_id');
        $Post->save();

        return response()->json($Post);
    }
}