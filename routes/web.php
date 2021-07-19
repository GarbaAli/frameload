<?php

use Illuminate\Support\Facades\Route;
// use Post;


Route::get('/', function () {
    $posts = App\Post::latest()->paginate(3); // les 3 derniers posts
    return view('index', compact(['posts']));
});
 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// profiles
Route::get('/profiles/{user}', 'ProfileController@show')->name('profiles.show');
Route::get('/profiles/{user}/edit', 'ProfileController@edit')->name('profiles.edit');
Route::patch('/profiles/{user}', 'ProfileController@update')->name('profiles.update');

// Google account
Route::get("/auth/redirect/{provider}", "SocialiteController@redirect");
Route::get("/callback/{provider}", "SocialiteController@callback");

//Blogs (partie Utilisateur)
Route::get('/blog', 'PostController@index')->name('blog');
Route::get('/blog/{post}', 'PostController@show')->name('blog.show');
Route::get('/blog/categorie/{categorie}', 'PostController@indexCategorie')->name('blog.categorie');

//Commentaire Blog (Ajax)
Route::post('/commentsPost/{post}', 'CommentPostController@store');
Route::get('/commentsFetch/{post}', 'CommentPostController@fetchComment');

//Commentaire Forum (Ajax)
Route::post('/commentsForum/{topic}', 'CommentForumController@store');
Route::get('/commentsFetchTopic/{topic}', 'CommentForumController@fetchComment');


//reponse aux commentaires (ajax)
Route::post('/commentReply/{comment}', 'CommentForumcontroller@storeReply');
Route::get('/commentsFetchReply/{topic}', 'CommentForumController@fetchCommentReply');

//Forum
Route::get('/forum', 'ForumController@index')->name('forum');
Route::get('/forum/{souscategorie}', 'ForumController@show')->name('forum.show');

//recherche (Ajax) des topics
Route::post('/forum/search', 'ForumController@search')->name('search.fetch');

//Topics
Route::get('/forum/{souscategorie}/{topic}/show', 'TopicsController@show')->name('topics.show');
Route::get('/forum/{souscategorie}/create', 'TopicsController@create')->name('topics.create');
Route::post('/forum/store', 'TopicsController@store')->name('topics.store');
Route::delete('/forum/{souscategorie}/{topic}/destroy', 'TopicsController@destroy')->name('topics.destroy');
Route::get('/forum/{souscategorie}/{topic}/edit', 'TopicsController@edit')->name('topics.edit');
Route::patch('/forum/{souscategorie}/{topic}/update', 'TopicsController@update')->name('topics.update');


//Administration

//User
Route::resource('/admin/users', 'Admin\UsersController')->middleware('can:manager-users');
//Categorie
Route::resource('/admin/categoriePost', 'CategoriePostController')->middleware('can:manager-users');

// Blogs/Post
Route::get('/admin/posts', 'PostController@create')->name('blog.create');
Route::post('/admin/posts', 'PostController@store')->name('blog.store');
Route::delete('/admin/posts/{post}', 'PostController@destroy')->name('blog.destroy');
Route::get('/admin/posts/{post}', 'PostController@edit')->name('blog.edit');
Route::patch('/admin/posts/{post}', 'PostController@update')->name('blog.update');

//Forum - Categorie
Route::resource('/admin/categorieForum', 'Admin\CategoriesController')->middleware('can:edit-users');
//Forum - Sous-categorie
Route::get('/admin/souscatForum/{categorie}', 'Admin\SouscatForumController@create')->name('souscat.create');
Route::get('/admin/souscatForum/delete/{categorie}', 'Admin\SouscatForumController@index')->name('souscat.index');
Route::post('/admin/souscatForum/{categorie}', 'Admin\SouscatForumController@store')->name('souscat.store');
Route::delete('/admin/souscatForum/{categorie}/{souscategorie}', 'Admin\SouscatForumController@destroy')->name('souscat.destroy');

// Fin Administration