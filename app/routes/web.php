<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\ProfileController;

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

// 認証関係ルーティング自動生成
Auth::routes();

// 未ログインユーザーメインページ表示(未ログインユーザードキュメントルート)
Route::get('/', [GuestController::class, 'index'])->name('guest.index');

// 以下ログイン済ユーザー関係処理
Route::name('profile.')->group(function() {

    // ユーザープロフィール表示処理(ログイン済ユーザードキュメントルート)
    Route::get('/profile/{id}', [ProfileController::class, 'showUserProfile'])->name('show_profile');

    // ユーザープロフィールカスタム画面表示処理
    Route::get('/profile/{id}/custom', [ProfileController::class, 'showProfileCustom'])->name('show_profile_custom');

    // ユーザープロフィールカスタム処理
    Route::post('/profile/{id}/custom', [ProfileController::class, 'updateProfileCustom'])->name('update_profile_custom');
});

// リソースフルルーティング作成
// 投稿画面の中に新規投稿処理と更新処理を入れるので、editは除外している
Route::resource('/records', RecordController::class)->only(['index', 'store', 'create', 'show', 'destroy'])->middleware('auth');

Route::put('/records', [RecordController::class, 'update'])->name('records.update');
