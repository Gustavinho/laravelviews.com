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

Route::view('/examples', 'examples.index')->name('examples');
Route::get('/examples/{page?}', [ExamplesController::class, 'show'])->name('example');
Route::get('/{page?}', [DocsController::class, 'show'])->name('doc');
