<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LearningRecordController;

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

Auth::routes();

Route::get('/mypage', [App\Http\Controllers\MypageController::class, 'index'])->name('mypage');
Route::get('/mypage_edit', [App\Http\Controllers\MypageController::class, 'edit'])->name('mypage_edit');
Route::patch('/mypage_update', [App\Http\Controllers\MypageController::class, 'update'])->name('mypage_update');
Route::resource('learningrecords', LearningRecordController::class);

