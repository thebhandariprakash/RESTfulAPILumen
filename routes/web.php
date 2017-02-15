<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});



$app->get('/', function() use ($app) {
    return "Lumen RESTful API By Prakash";
});


$app->group(['prefix' => 'api/v1'], function($app)
{
    $app->get('post','PostController@index');
    $app->get('post/{id}','PostController@getPost');
    $app->post('post','PostController@createPost');
    $app->put('post/{id}','PostController@updatePost');
    $app->delete('post/{id}','PostController@deletePost');
});


$app->group(['prefix' => 'api/v1'], function($app)
{
    $app->get('comment','CommentController@index');
    $app->get('comment/{id}','CommentController@getComment');
    $app->get('postComment/{id}','CommentController@getCommentsByPostId');
    $app->post('comment','CommentController@createComment');
    $app->put('comment/{id}','CommentController@updateComment');
    $app->delete('comment/{id}','CommentController@deleteComment');
});

