<?php


use App\Http\Controllers\TaskController;
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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::group([
    'as' => 'tasks.',
    'prefix' => 'tasks',
], function() {
    Route::get('/', [TaskController::class, 'index'])->name('index');
    Route::get('/create', [TaskController::class, 'create'])->name('create');
    Route::post('/', [TaskController::class, 'store'])->name('store');
    Route::get('/{task}', [TaskController::class, 'show'])->name('show');
    Route::get('/{task}/edit', [TaskController::class, 'edit'])->name('edit');
    Route::put('/{task}', [TaskController::class, 'update'])->name('edit');
    Route::delete('/{task}', [TaskController::class, 'destroy'])->name('destroy');
});


//Route::prefix('tasks')->group(function () {
//    Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
//    Route::get('/create', [TaskController::class, 'create'])->name('tasks.create');
//    Route::post('/', [TaskController::class, 'store'])->name('tasks.store');
//    Route::get('/{task}', [TaskController::class, 'show'])->name('tasks.show');
//    Route::get('/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
//    Route::put('/{task}', [TaskController::class, 'update'])->name('tasks.edit');
//    Route::delete('/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
//});

