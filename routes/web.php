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

require __DIR__ . '/auth.php';
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('role:admin|writer');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware('role:admin|editor');


Route::resource('/blogs', BlogController::class);

Route::view('stage', 'prom.index');
Route::resource('comments', CommentController::class);
Route::resource('hamshs', HamshController::class);


Route::get('/hamshs/forms/sciplan/{user_id}', [HamshController::class, 'sciplanindex'])->name('hamshs.forms.sciplanindex');
/*Route::get('/hamshs/showUser/{user_id}', [HamshController::class, 'showUser'])->name('hamshs.forms.showUser');*/

/*Route::view('/sciplanEdit','hamshs.forms.edit')->name('sciplanEdit');*/
Route::get('/sciplan/createform', [HamshController::class, 'createsciplanForm'])->name('createpapersdata');

Route::get('/sciplan/forms/createHamsh', [HamshController::class, 'createsciplanHamsh'])->name('createsciplanHamsh');
Route::post('/hamshs/forms/sciplan/', [HamshController::class, 'storef'])->name('hamshs.forms.storef');
/*Route::get('/hamshs/forms/editHsci/{selected_paperId}', [HamshController::class, 'edit2'])->name('hamshs.forms.editHsci');// this route for edit form in forms folder for sciplan*/

Route::delete('/hamshs/forms/deleteFsci/{form_id}', [HamshController::class, 'destroy2'])->name('hamshs.forms.deleteFsci');// this route for delete form in forms folder for sciplan

Route::post('/hamshs/forms/sciplanH', [HamshController::class, 'storefH'])->name('hamshs.forms.storefH'); //f for form, H for hamesh

/*Route::get('/hamshs/edit2/{form_id}', [HamshController::class, 'edit2'])->name('hamshs.forms.edit');*/
Route::post('/hamshs/update2/{form_id}', [HamshController::class, 'update2'])->name('site-update');
//Route::post('hamshs/update/{form_id}', 'HamshController@update')->name('site-update');
Route::get('/hamshs/show2/{form_id}', [HamshController::class, 'show2'])->name('hamshs.forms.show');

Route::get('/hamshs/forms/showHamsh/{Ham_id}', [HamshController::class, 'showHamsh'])->name('hamshs.forms.showHamsh');
Route::get('/hamshs/editHamshsciplan/{Ham_id}', [HamshController::class, 'editHamshsciplan'])->name('hamshs.forms.editHamshsciplan');
Route::put('/hamshs/forms/updateHamshsciplan/{hamsh_id}', [HamshController::class, 'updateHamshsciplan'])->name('hamshs.forms.updateHamshsciplan');

Route::delete('/hamshs/forms/destroyHamshsciplan/{hamsh}', [HamshController::class, 'destroyHamshsciplan'])->name('hamshs.forms.destroyHamshsciplan');
/*Route::view('/hamshs/newapplicaion','hamshs.newapplicaion');*/
Route::view('/newapplicaiono', 'hamshs.newapplicaion')->name('newapplicaion');// صفحة اختيار نوع الترقية (الاولية اربعة خيارات)
Route::view('/NewApplication', 'NewApplication.index')->name('NewApplicationBoard');
Route::view('/administrators', 'hamshs.forms.administrators.index')->name('hamshs.forms.administrators.index');// صفحة مسؤلين انجاز الخطة البحثية
Route::view('/administrators/SciPlanListForAdmins', 'hamshs.forms.administrators.SciPlanListForAdmins')->name('hamshs.forms.administrators.SciPlanListForAdmins');// صفحة رئيس قسم انجاز الخطة البحثية

Route::get('/hamshs/forms/sciplanlistindex', [HamshController::class, 'sciplanlistindex'])->name('hamshs.forms.sciplanlistindex');

Route::get('/hamshs/hamshs.forms.sciplanindex1/{req}', [HamshController::class, 'sciplanlistindex'])->name('hamshs.forms.sciplanindex1'); // I think it is not needed (double check)
Route::get('/hamshs/showUser/{user_id}', [HamshController::class, 'showUser'])->name('hamshs.forms.showUser');
/*resources/views/hamshs/forms/PromReq_submissionForm/index.blade.php*/
/*Route::get('/hamshs/forms/sciplan/{user_id}', [HamshController::class, 'sciplanindex'])->name('hamshs.forms.sciplanindex');*/

Route::get('/hamshs/forms/PromReq_submissionForm/createRequestApplyingHamsh', [HamshController::class, 'createRequestApplyingHamsh'])->name('createRequestApplyingHamsh');

Route::post('/hamshs/forms/PromReq_submissionForm/store', [HamshController::class, 'storeReqApplyingHamsh'])->name('storeReqApplyingHamsh');
Route::get('/hamshs/forms/PromReq_submissionForm/index/{user_id}', [HamshController::class, 'requestApplyingindex'])->name('requestApplyingindex');

/*Route::get('/hamshs/forms/edit/{user_id}', [HamshController::class, 'storef'])->name('fillOutPaper');*/
Route::post('hamshs/forms/createform/edit', [HamshController::class, 'editPaper'])->name('editPaper');
Route::post('hamshs/forms/createform/update', [HamshController::class, 'updatePaper'])->name('updatePaper');
