<?php

use App\Http\Controllers\Admin\MediaFileController;
use App\Http\Controllers\Admin\PageBlockLibraryController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\UserImagesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StreamController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

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

Route::impersonate();

Route::middleware(['AccessAdmin'])->group(function () {
    Route::get('/admin', [PagesController::class, 'index']);
    Route::get('/blockmanager', [MediaFileController::class, 'popup']);

    Route::resource('/dashboard', PagesController::class);

    // ADMIN PAGE MANAGEMENT
    Route::resource('/admin/pages', PagesController::class, ['except' => ['show']]);

    // ADMIN FILE MANAGEMENT
    Route::resource('/admin/files', MediaFileController::class, ['except' => ['show']]);

    // ADMIN USER MANAGEMENT
    Route::resource('/admin/users', UsersController::class, ['except' => ['show', 'create', 'store']]);

    // API - Ajax to get a given block's tmpl
    Route::post('/api-getblocktemplate', [PageBlockLibraryController::class, 'getBlockTemplate']);
    Route::post('/api-blocks-sync', [PageBlockLibraryController::class, 'syncLibraryBlocks']);
    Route::post('/api-blocks-rebase', [PageBlockLibraryController::class, 'syncPageBlocks']);

    Route::post('/api-uploadavatar', [UsersController::class, 'uploadAvatar']);
    Route::get('/admin/images', [UserImagesController::class, 'create']);
    Route::post('/user-image-upload', [UserImagesController::class, 'store']);
    Route::post('/user-image-delete', [UserImagesController::class, 'destroy']);
    Route::get('/user-image-show', [UserImagesController::class, 'index']);

    Route::get('/preview/', [HomeController::class, 'show']);
    Route::get('/preview/{page}', [HomeController::class, 'show']);
});

Route::get('/download', function () {
    return File::get(public_path().'/download/index.htm');
});

Route::post('/log/video/views', [StreamController::class, 'logview'])->name('log.views');
Route::get('/log/video/views', [StreamController::class, 'exportcsv'])->name('log.views.export');

Route::get('/{page?}', [HomeController::class, 'show']);
