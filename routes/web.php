<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
 //   return view('welcome');
//});
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/account/register',[AccountController::class,'registration'])->name('account.registration');
Route::post('/account/process-register',[AccountController::class,'processRegistration'])->name('account.processRegistration');
Route::get('/account/login',[AccountController::class,'login'])->name('account.login');
Route::post('/account/authenticate',[AccountController::class,'authenticate'])->name('account.authenticate');
Route::get('/account/profile',[AccountController::class,'profile'])->name('account.profile');
Route::put('/account/updateprofile',[AccountController::class,'updateProfile'])->name('account.updateProfile');
Route::get('/account/logout',[AccountController::class,'logout'])->name('account.logout');
Route::post('/account/update-profile-pic',[AccountController::class,'updateProfilePic'])->name('account.updateProfilePic');
Route::get('/account/create-job',[AccountController::class,'createJob'])->name('account.createJob');
Route::post('/account/save-job',[AccountController::class,'saveJob'])->name('account.saveJob');
Route::get('/account/my-jobs', [AccountController::class, 'myJobs'])->name('account.myJobs');
Route::get('/account/my-jobs/edit/{jobId}', [AccountController::class, 'editJob'])->name('account.editJob');
Route::post('/account/update-job/{jobId}',[AccountController::class,'updateJob'])->name('account.updateJob');
