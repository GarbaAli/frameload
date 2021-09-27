<?php

use Illuminate\Support\Facades\Route;
// use Post;


Route::get('/', function () {
    $var = mt_rand(1,10);
    if($var % 2 != 0){
        session()->flash('message', 'popup');
    }
    $posts = App\Post::latest()->paginate(3); // les 3 derniers posts
    return view('index', compact(['posts']));
});

// Routes pour vider les caches et autres
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    return "Cache is cleared";
});
 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// profiles
Route::get('/profiles/{user}', 'ProfileController@show')->name('profiles.show');
Route::get('/profiles/{user}/edit', 'ProfileController@edit')->name('profiles.edit');
Route::patch('/profiles/{user}', 'ProfileController@update')->name('profiles.update');
Route::patch('/profiles/couverture/{user}', 'ProfileController@couverture')->name('profiles.couverture');

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

//Static Pages
Route::get('/nous', 'staticController@propos')->name('staticPage.nous');
Route::get('/conditionVente', 'staticController@vente')->name('staticPage.vente');
Route::get('/mention_legale', 'staticController@mention_legale')->name('staticPage.mention_legale');
Route::get('/condition', 'staticController@condition')->name('staticPage.condition');
Route::get('/contact', 'staticController@contact')->name('staticPage.contact');


//Administration

Route::get('dashboard','Admin\HomeController@index')->name('dashboard');
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


// Adminstration Julie

// // Librairie
// Etablissement
Route::get('etablissement','EtablissementController@index')->name('ets');
Route::get('etablissement/create','EtablissementController@create')->name('ets.create');
Route::post('etablissement','EtablissementController@store')->name('ets.store');
Route::get('etablissement/{ets_id}/edit','EtablissementController@edit')->name('ets.edit');
Route::patch('etablissement/{ets_id}','EtablissementController@update')->name('ets.update');
Route::delete('etablissement/{ets_id}','EtablissementController@destroy')->name('ets.destroy');

// //Filiere
Route::get('filiere','FiliereController@index')->name('filiere');
Route::get('filiere/create','FiliereController@create')->name('filiere.create');
Route::post('filiere','FiliereController@store')->name('filiere.store');
Route::get('filiere/{fil_id}/edit','FiliereController@edit')->name('filiere.edit');
Route::patch('filiere/{fil_id}','FiliereController@update')->name('filiere.update');
Route::delete('filiere/{fil_id}','FiliereController@destroy')->name('filiere.destroy');

// // Cycle
Route::get('cycle','CycleController@index')->name('cycle');
Route::get('cycle/create','CycleController@create')->name('cycle.create');
Route::post('cycle','CycleController@store')->name('cycle.store');
Route::get('cycle/{cycle_id}/edit','CycleController@edit')->name('cycle.edit');
Route::patch('cycle/{cycle_id}','CycleController@update')->name('cycle.update');
Route::delete('cycle/{cycle_id}','CycleController@destroy')->name('cycle.destroy');

// // Epreuve
Route::get('epreuve','EpreuveController@index')->name('epreuve');

Route::get('epreuve/create','EpreuveController@create')->name('epreuve.create');
Route::post('epreuve','EpreuveController@store')->name('epreuve.store');
Route::get('epreuve/{epr_id}/vue','EpreuveController@vue_Epreuve')->name('epreuve.vue');
Route::get('epreuve/{epr_id}/edit','EpreuveController@edit')->name('epreuve.edit');
Route::patch('epreuve/{epr_id}','EpreuveController@update')->name('epreuve.update');
Route::delete('epreuve/{epr_id}','EpreuveController@destroy')->name('epreuve.destroy');

// // Rapport
Route::get('rapport','RapportController@index')->name('rapport');
Route::get('rapport/create','RapportController@create')->name('rapport.create');
Route::post('rapport','RapportController@store')->name('rapport.store');
Route::get('rapport/{rap_id}/vue','RapportController@vue_Rapport')->name('rapport.vue');
Route::get('rapport/{rap_id}/edit','RapportController@edit')->name('rapport.edit');
Route::patch('rapport/{rap_id}','RapportController@update')->name('rapport.update');
Route::delete('rapport/{rap_id}','RapportController@destroy')->name('rapport.destroy');


// Fin Administration