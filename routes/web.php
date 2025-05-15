<?php

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/posts', function () {
    return view('posts', ['title' => 'Blog', 'posts' => Post::filter(request(['cari', 'category', 'author']))->latest()->paginate(9)->withQueryString()]);
});

Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', ['title' => 'Single Post.php', 'post' => $post]);
});

Route::get('/authors/{user:username}', function (User $user) {
//    $posts = $user->writted->load('category', 'author');
//    return view('posts', ['title' => count($posts) . ' Articles by ' . $user->name , 'posts' => $posts]);
    return view('posts', ['title' => count($user->writted) . ' Articles by ' . $user->name , 'posts' => $user->writted]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
//    $posts = $category->writing->load('category', 'author');
//    return view('posts', ['title' => 'Articles in: ' . $category->name , 'posts' => $posts]);
    return view('posts', ['title' => 'Articles in: ' . $category->name , 'posts' => $category->writing]);
});

Route::get('/about', function () {
    return view('about', ['name' => 'Arief Cahyo Utomo'], ['title' => 'About']);
});

Route::get('/contact', function () {
    return view('contact',  ['title' => 'Contact']);
});

