<?php

use  App\Post;

Route::get('/', function () {

    $post = Post::where('id', '>=', 13)->get();
    return response()->json($post);
    return view('welcome');
});
