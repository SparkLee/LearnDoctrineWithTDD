<?php

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

use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $select = DB::select("select * from c_members limit 1");
    var_dump($select);

    return view('welcome');
});

Route::get('/members/{id}/profile', [MemberController::class, 'profile']);

Route::put('/members/{id}', [MemberController::class, 'modify']);
Route::get('/members/{id}', [MemberController::class, 'modify']);

Route::post('/members', [MemberController::class, 'register']);
Route::get('/members', [MemberController::class, 'register']);

