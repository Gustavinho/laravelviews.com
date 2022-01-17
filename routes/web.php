<?php

use App\Http\Controllers\DocsController;
use App\Http\Controllers\ExamplesController;
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

Route::get('/examples/{page?}', [ExamplesController::class, 'show'])->name('page');
Route::get('/', [DocsController::class, 'index']);
Route::get('/{path}', [DocsController::class, 'show']);
