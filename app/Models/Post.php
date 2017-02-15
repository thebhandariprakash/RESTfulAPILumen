<?php

/**
 * Created by PhpStorm.
 * User: bhprakash
 * Date: 2/15/17
 * Time: 12:19 PM
 */
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Post extends Model
{
    protected $fillable = ['title', 'post', 'author_id'];
}