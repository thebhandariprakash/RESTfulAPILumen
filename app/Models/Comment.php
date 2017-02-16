<?php
/**
 * Created by PhpStorm.
 * User: bhprakash
 * Date: 2/15/17
 * Time: 2:26 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'post_comments';
    protected $fillable = ['post_id', 'comments'];

    function commentsByPostId($postId)
    {
        return $this->where('post_id',$postId)
            ->get();
    }
}