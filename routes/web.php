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

/*sciplan */
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

/*Route::get('/hamshs/forms/edit/{user_id}', [HamshController::class, 'storef'])->name('fillOutPaper');*/
Route::post('hamshs/forms/createform/edit', [HamshController::class, 'editPaper'])->name('editPaper');
Route::post('hamshs/forms/createform/update', [HamshController::class, 'updatePaper'])->name('updatePaper');

/*requestapplying*/
Route::get('/hamshs/PromReq_submissionForm/editHamshsciplan/{Ham_id}', [HamshController::class, 'editHamshProReq'])->name('hamshs.PromReq_submissionForm.forms.editHamsh');
Route::put('/hamshs/PromReq_submissionForm/updateHamshsrequest_applying/{hamsh_id}', [HamshController::class, 'updateHamshsrequest_applying'])->name('hamshs.forms.updateHamshsrequest_applying');
Route::get('/hamshs/forms/PromReq_submissionFormdd/index/{user_id}', [HamshController::class, 'requestApplyingindex'])->name('requestApplyingindex');
Route::get('/hamshs/forms/PromReq_submissionForm/showHamsh/{Ham_id}', [HamshController::class, 'showHamshrequest_applying'])->name('hamshs.forms.showHamshrequest_applying');

/*admins*/
Route::view('/administrators/indexrequestApplying', 'hamshs.forms.administrators.indexrequestApplying')->name('hamshs.forms.administrators.indexrequestApplying');// صفحة مسؤلين انجاز 'طلب الترقية'
Route::view('/administrators/requestApplyingListForAdmins', 'hamshs.forms.administrators.RequestApplyingListForAdmins')->name('hamshs.forms.administrators.RequestApplyingListForAdmins');// صفحة رئيس قسم انجاز 'طلب الترقية'
Route::get('/hamshs/forms/RequestApplyinglistindex', [HamshController::class, 'RequestApplyinglistindex'])->name('hamshs.forms.RequestApplyinglistindex');

/*AcademicReputation*/
Route::get('/hamshs/forms/AcademicReputation/iiindex/{user_id}', [HamshController::class, 'AcademicReputationindex'])->name('AcademicReputationindex');
Route::get('/hamshs/forms/AcademicReputation/createAcademicReputationHamsh', [HamshController::class, 'createAcademicReputationHamsh'])->name('createAcademicReputationHamsh');
Route::post('/hamshs/forms/AcademicReputation/store', [HamshController::class, 'storeAcademicReputationHamsh'])->name('storeAcademicReputationHamsh');
Route::get('/hamshs/forms/AcademicReputation/showHamsh/{Ham_id}', [HamshController::class, 'showHamshAcademicReputation'])->name('hamshs.forms.showHamshAcademicReputation');
Route::get('/hamshs/AcademicReputation/editHamsh/{Ham_id}', [HamshController::class, 'editHamshAcademicReputation'])->name('hamshs.AcademicReputation.forms.editHamsh');
Route::put('/hamshs/AcademicReputation/updateHamsh/{hamsh_id}', [HamshController::class, 'updateHamshAcademicReputation'])->name('updateHamshAcademicReputation');
/*admins*/
Route::view('/administrators/AcademicReputationindex', 'hamshs.forms.administrators.AcademicReputationindex')->name('adminAcademicReputationindex');// صفحة مسؤلين انجاز 'السمعة الاكاديمية'
Route::view('/administrators/AcademicReputationlistindex', 'hamshs.forms.administrators.AcademicReputationlistindex')->name('AcademicReputationlistindex');// صفحة مسؤول مركز الحاسبة  'السمعة الاكاديمية'
Route::get('/hamshs/forms/AcademicReputationlistindex', [HamshController::class, 'AcademicReputationindex'])->name('RequestApplyinglistindex');

/*positionsDegrees*/
Route::get('/hamshs/forms/positionsDegrees/index/{user_id}', [HamshController::class, 'positionsDegreesindex'])->name('positionsDegreesindex');
Route::get('/hamshs/forms/positionsDegrees/create', [HamshController::class, 'createpositionsDegrees'])->name('createpositionsDegrees');
Route::post('/hamshs/forms/positionsDegrees/store', [HamshController::class, 'storepositionsDegrees'])->name('storepositionsDegrees');
Route::get('/hamshs/positionsDegrees/editHamsh', [HamshController::class, 'editpositionsDegrees'])->name('editpositionsDegrees');
/*Route::put('/hamshs/positionsDegrees/updateHamsh/{hamsh_id}', [HamshController::class, 'updateHamshAcademicReputation'])->name('updateHamshAcademicReputation');*/

Route::post('hamshs/forms/positionsDegrees/editSingle', [HamshController::class, 'editsinglePositionsDegrees'])->name('editsinglePositionsDegrees');
Route::post('hamshs/forms/positionsDegrees/update', [HamshController::class, 'updatePositionsDegrees'])->name('updatePositionsDegrees');
Route::get('/hamshs/forms/positionsDegrees/showHamsh', [HamshController::class, 'showPositionsDegrees'])->name('showPositionsDegrees');
/*add degrees*/
Route::get('/hamshs/forms/positionsDegrees2/create', [HamshController::class, 'createpositionsDegrees2'])->name('createpositionsDegrees2');
Route::post('/hamshs/forms/positionsDegrees2/store', [HamshController::class, 'storepositionsDegrees2'])->name('storepositionsDegrees2');
Route::get('/hamshs/positionsDegrees2/editHamsh', [HamshController::class, 'editpositionsDegrees2'])->name('editpositionsDegrees2');
Route::post('hamshs/forms/positionsDegrees2/editSingle', [HamshController::class, 'editsinglePositionsDegrees2'])->name('editsinglePositionsDegrees2');
Route::get('/hamshs/forms/positionsDegrees2/showHamsh', [HamshController::class, 'showPositionsDegrees2'])->name('showPositionsDegrees2');

/* add theses */
Route::get('/hamshs/forms/theses/index/{user_id}', [HamshController::class, 'thesesindex'])->name('thesesindex');
Route::get('/hamshs/forms/theses/create', [HamshController::class, 'createthesis'])->name('createthesis');
Route::post('/hamshs/forms/theses/store', [HamshController::class, 'storethesis'])->name('storethesis');
Route::get('/hamshs/theses/editHamsh', [HamshController::class, 'edittheses'])->name('edittheses');
Route::post('hamshs/forms/theses/update', [HamshController::class, 'updatethesis'])->name('updatethesis');

Route::post('hamshs/forms/theses/editSingle', [HamshController::class, 'editthesis'])->name('editthesis');
Route::get('/hamshs/forms/theses/show', [HamshController::class, 'showtheses'])->name('showtheses');

/*ProApplicationSummary*/
Route::get('/hamshs/forms/ProApplicationSummary/index/{user_id}', [HamshController::class, 'ProApplicationSummaryindex'])->name('ProApplicationSummaryindex');
Route::get('/hamshs/forms/ProApplicationSummary/create', [HamshController::class, 'createProApplicationSummary'])->name('createProApplicationSummary');
Route::post('/hamshs/forms/ProApplicationSummary/store', [HamshController::class, 'storeProApplicationSummary'])->name('storeProApplicationSummary');
Route::get('/hamshs/forms/ProApplicationSummary/editHamsh/{Ham_id}', [HamshController::class, 'editProApplicationSummary'])->name('editProApplicationSummary');
Route::put('/hamshs/forms/ProApplicationSummary/update/{hamsh_id}', [HamshController::class, 'updateProApplicationSummary'])->name('updateProApplicationSummary');
Route::get('/hamshs/forms/ProApplicationSummary/show/{Ham_id}', [HamshController::class, 'showProApplicationSummary'])->name('showProApplicationSummary');
/**
 * بيانات الترقية
 */
Route::get('/hamshs/forms/promotionData/index/{user_id}', [HamshController::class, 'promotionDataindex'])->name('promotionDataindex');

/*admins*/
Route::view('/administrators/AcademicReputationindex', 'hamshs.forms.administrators.AcademicReputationindex')->name('adminAcademicReputationindex');// صفحة مسؤلين انجاز 'السمعة الاكاديمية'
Route::view('/administrators/AcademicReputationlistindex', 'hamshs.forms.administrators.AcademicReputationlistindex')->name('AcademicReputationlistindex');// صفحة مسؤول مركز الحاسبة  'السمعة الاكاديمية'
Route::get('/hamshs/forms/AcademicReputationlistindex', [HamshController::class, 'AcademicReputationindex'])->name('RequestApplyinglistindex');


/*add applicant data */
Route::get('/hamshs/forms/userPromotiondata/createEdit', [HamshController::class, 'userPromotiondata'])->name('userPromotiondata');
Route::post('hamshs/forms/userPromotiondata/update', [HamshController::class, 'updateuserPromotiondata'])->name('updateuserPromotiondata');

/*
 * add attachments
 */
Route::get('/hamshs/attachments/index/{user_id}', [HamshController::class, 'attachmentsindex'])->name('attachmentsindex');
/* assign role
*/
Route::get('/users_list', [\App\Http\Controllers\HamshController::class, 'getUsers'])->name('users_list');
Route::post('/change_use_role', [\App\Http\Controllers\HamshController::class, 'changeRoleUsers'])->name('change_use_role');
