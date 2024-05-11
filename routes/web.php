<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
 //   return view('welcome');
//});
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/account/register',[AccountController::class,'registration'])->name('account.registration');
