<?php
/**
 * Created by PhpStorm.
 * User: bhprakash
 * Date: 2/15/17
 * Time: 12:21 PM
 */

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @var Post
     */
    private $post;

    /**
     * PostController constructor.
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index(){

        $Posts  = Post::all();
        return response()->json($Posts);

    }

    public function getPost($id){
        $Post  = Post::find($id);
        return response()->json($Post);
    }

    public function createPost(Request $request){
        $Post = Post::create($request->all());
        return response()->json($Post);

    }

    public function deletePost($id){
        $Post  = Post::find($id);
        $Post->delete();

        return response()->json('deleted');
    }

    public function updatePost(Request $request,$id){
        $Post  = Post::find($id);
        $Post->title = $request->input('title');
        $Post->post = $request->input('post');
        $Post->author_id = $request->input('author_id');
        $Post->save();

        return response()->json($Post);
    }
}