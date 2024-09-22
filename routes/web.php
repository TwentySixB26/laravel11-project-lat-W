<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('home', [
        'title' => 'Home Page'
    ]);
});


Route::get('/about', function () {
    return view('about',[
        'title' => 'About' , 
        'nama' => 'Cornelia Syafa Vanisa'
    ]);
});

Route::get('/posts', function () {
    //1.  ini untuk cara pertama 
    // $posts = Post::with(['author','category'])->latest()->get() ;
    // $posts = Post::latest() ;

    //mengecek ada data apa yang di serach tidak,jika ada maka code ini akan dieksekusi
    // if (request('search')) {
    //     $posts->where('title','like' , '%' . request('search') . '%' ) ;
    // } 

    //jika data tidak ada, atau sudah dilakukan ditag sebelumnya maka akan menjalankan code ini 
    // return view('/posts' , [
    //     'title' => 'Blog',
    //     'posts' => $posts->get()
    // ]);


    // ==========================================================================


    //2. ini untuk cara yang kedua 
    return view('/posts' , [
        'title' => 'Blog',
        'posts' => Post::filter(request(['search','category','author']))->latest()->paginate(6)->withQueryString()
    ]);


});

Route::get('/posts/{post:slug}', function (Post $post) {
    // $post = Post::find($slug) ; 
    return view('post',[
        'title' => 'single post' ,
        'post' => $post
    ]) ;
});

Route::get('/authors/{user:username}', function (User $user) {
    // $posts = $user->posts->load(['category','author']) ;
    return view('posts',[
        'title' => count($user->posts) . ' Artikels by '. $user->name ,
        'posts' => $user->posts
    ]) ;
});

Route::get('/category/{category:slug}', function (Category $category) {
    // $posts = $category->posts->load(['category','author']) ;
    return view('posts',[
        'title' => 'Category :  '. $category->title,
        'posts' => $category->posts
    ]) ;
});


Route::get('/contact', function () {
    return view('/contact', [
        'title' => 'Contact'
    ]);
});