<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PostController;
use \App\Http\Controllers\BlogController;
use \App\Http\Controllers\CommentController;
use \App\Http\Controllers\HamshController;
use \App\Http\Controllers\PromReqController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
Route::get('/posts/create',[PostController::class, 'create'])->name('posts.create')->middleware('role:admin|writer');
Route::get('/posts/{post}/edit',[PostController::class, 'edit'])->name('posts.edit')->middleware('role:admin|editor');


Route::resource('/blogs', BlogController::class);

Route::view('stage','prom.index');
Route::resource('comments',CommentController::class);
Route::resource('hamshs',HamshController::class);


Route::get('/hamshs/forms/sciplan',[HamshController::class, 'sciplanindex'])->name('hamshs.forms.sciplanindex');

/*Route::view('/sciplanEdit','hamshs.forms.edit')->name('sciplanEdit');*/
Route::get('/sciplan/createform',[HamshController::class, 'createsciplanForm'])->name('sciplancreateform');

Route::get('/sciplan/forms/createHamsh',[HamshController::class, 'createsciplanHamsh'])->name('createsciplanHamsh');
Route::post('/hamshs/forms/sciplan',[HamshController::class, 'storef'])->name('hamshs.forms.storef');
Route::get('/hamshs/forms/editHsci/{form_id}',[HamshController::class, 'edit2'])->name('hamshs.forms.editHsci');// this route for edit form in forms folder for sciplan

Route::delete('/hamshs/forms/deleteFsci/{form_id}',[HamshController::class, 'destroy2'])->name('hamshs.forms.deleteFsci');// this route for delete form in forms folder for sciplan


Route::post('/hamshs/forms/sciplanH',[HamshController::class, 'storefH'])->name('hamshs.forms.storefH'); //f for form, H for hamesh

Route::get('/hamshs/edit2/{form_id}',[HamshController::class, 'edit2'])->name('hamshs.forms.edit');
Route::post('/hamshs/update2/{form_id}',[HamshController::class, 'update2'])->name('site-update');
//Route::post('hamshs/update/{form_id}', 'HamshController@update')->name('site-update');
Route::get('/hamshs/show2/{form_id}',[HamshController::class, 'show2'])->name('hamshs.forms.show');

Route::get('/hamshs/forms/showHamsh/{Ham_id}',[HamshController::class, 'showHamsh'])->name('hamshs.forms.showHamsh');
Route::get('/hamshs/editHamshsciplan/{Ham_id}',[HamshController::class, 'editHamshsciplan'])->name('hamshs.forms.editHamshsciplan');
Route::put('/hamshs/forms/updateHamshsciplan/{hamsh_id}',[HamshController::class, 'updateHamshsciplan'])->name('hamshs.forms.updateHamshsciplan');

Route::delete('/hamshs/forms/destroyHamshsciplan/{hamsh}', [HamshController::class, 'destroyHamshsciplan'])->name('hamshs.forms.destroyHamshsciplan');
/*Route::view('/hamshs/newapplicaion','hamshs.newapplicaion');*/
Route::view('/newapplicaiono','hamshs.newapplicaion')->name('newapplicaion');
Route::view('/NewApplication','NewApplication.index')->name('NewApplicationBoard');
