<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'DocumentsController@welcome');

Route::get('/forum/rules', function () {
    return view('forum.rules');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
// forum

Route::get('/forum', 'ForumController@index')->name('forum');
Route::post('/forum/create-question', 'ForumController@create_question_post')->name('creat-question_post');
Route::get('/forum/{slug}', 'ForumController@show')->name('forum-discission');
Route::post('/answer', 'ForumController@answer')->name('answer');
Route::get('/answers/{id}', 'ForumController@answers')->name('answers');
Route::get('/questions{id}', 'ForumController@questions')->name('questions');

// NPA

Route::get('/zakon', 'ZakonController@index')->name('zakon-index');
Route::post('/zakon', 'ZakonController@index');
Route::get('/zakon/{id}', 'ZakonController@show')->name('zakon-show');
Route::post('/get-document', 'ZakonController@get_document');
Route::post('/search-on-show', 'ZakonController@search_on_show');
Route::post('/npa-show', 'ZakonController@npa_show');
Route::post('/npa-v-izbrannoe', 'ZakonController@npa_v_izbrannoe');
Route::post('/npa-iz-izbrannogo', 'ZakonController@npa_iz_izbrannogo');
Route::post('/npa-izbrannoe', 'ZakonController@npa_izbrannoe');

// users

Route::get('/lawyers', 'UserController@lawyer')->name('lawyer');
Route::get('/user/{id}', 'UserController@user')->name('user');
Route::post('/user-delete', 'UserController@user_delete')->name('user-delete');
Route::post('/user/change_user', 'UserController@change_user')->name('change_user');
Route::get('/home/my-documents/{id}', 'HomeController@my_document')->name('userdocument');

//documents
Route::get('/documents', 'DocumentsController@index')->name('documents-index');
Route::get('/documents/{category}', 'DocumentsController@category')->name('documents-category');

Route::get('/documents/{category}/{subcategory}', 'DocumentsController@subcategory')->name('documents-subcategory');
  
Route::get('/documents/{category}/{subcategory}/{slug}', 'DocumentsController@show')->name('documents-show');
Route::post('/document-v-izbrannoe', 'DocumentsController@document_v_izbrannoe');
Route::post('/document-save', 'DocumentsController@document_save');
Route::post('/document-resave', 'DocumentsController@document_resave');


//admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/documents/{category}/{subcategory}/{slug}', 'AdminController@document_show')->name('admin-documents-show');
    Route::post('/admin/save-document', 'AdminController@save_document')->name('save-document');
    Route::post('/admin/create-document', 'AdminController@create_document')->name('create-document');
    Route::get('/admin/create-document', 'AdminController@create_document_get')->name('create-document-get');
    Route::get('/admin/zakon/{id}', 'AdminController@zakon_show')->name('admin-zakon-show');
    Route::post('/admin/save-npa', 'AdminController@save_npa')->name('save-npa');
});


//contact
Route::get('/contact', 'ContactController@index');
Route::post('/contact', 'ContactController@send_message');

//sitemap
Route::get('sitemap.xml', 'SitemapController@sitemap');

Route::middleware('logger')->group(function () {
Route::get('/genotcid-islama', function () {
  return view('Test');
});
  });