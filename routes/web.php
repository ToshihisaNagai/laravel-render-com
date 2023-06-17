<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SujiController;
//use App\Http\Controllers\DateController;
use App\Http\Controllers\ReviewController;

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

Auth::routes();

Route::get('/', [SujiController::class, 'index'])->middleware('auth');
Route::resource('sujis', SujiController::class)->middleware('auth');

// 投稿の一覧ページ
//Route::get('/sujis', [SujiController::class, 'index'])->name('sujis.index');

// 投稿の作成ページ
//Route::get('/sujis/create', [SujiController::class, 'create'])->name('sujis.create');

// 投稿の作成機能
//Route::post('/sujis', [SujiController::class, 'store'])->name('sujis.store');

// 投稿の詳細ページ
//Route::get('/sujis/{suji}', [SujiController::class, 'show'])->name('sujis.show');

// 投稿の更新ページ
//Route::get('/sujis/{suji}/edit', [SujiController::class, 'edit'])->name('sujis.edit');

// 投稿の更新機能
//Route::patch('/sujis/{suji}', [SujiController::class, 'update'])->name('sujis.update');

// 投稿の削除機能
//Route::delete('/sujis/{suji}', [SujiController::class, 'destroy'])->name('sujis.destroy');

Route::post('reviews', [ReviewController::class, 'store'])->name('reviews.store');