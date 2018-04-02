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

//Index Laravel
// Route::get('/', function () {
//     return view('welcome');
// });

//Login
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

//Logout
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

//Posts
Route::get('noticias', 'PostController@allPost')->name('posts');

//Posts-Slug
Route::get('noticias/{slug}', 'PostController@post')->name('postslug');

//Categorias-slug
Route::get('categoria/{slug}', 'PostController@category')->name('categoryslug');

//Tags-slug
Route::get('etiqueta/{slug}', 'PostController@tag')->name('tagslug');

//Todos los tags
Route::get('etiquetas', 'Admin\TagController@index')->name('tags');

//Administrator
//Crud de usuarios para tags
Route::middleware(['auth'])->group(function () {
    Route::get('editetiquetas', function () {
        // Uses first & second Middleware
    });

    Route::get('perfil', 'PerfilController@index')->name('Perfil');

    // Route::get('user/profile', function () {
    //     // Uses first & second Middleware
    // });
});

//Categorys
// Route::resource('categorias', 'Admin\CategoryController')->name('AdminCategory');

//Categorys
// Route::resource('noticias', 'Admin\PostController')->name('AdminPost');