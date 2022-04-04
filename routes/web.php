<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Social\Explore;
use App\Http\Controllers\Social\Chat;
use App\Events\Message;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/explore',[Explore::class,'Explore'])->middleware(['auth'])->name('explore');

Route::post('/chat',[Chat::class,'Chat'])->middleware(['auth'])->name('chat');

Route::post('/sendmessage',function(Request $request){
    event(
        new Message($request->input('username'),$request->input('message'))
    );
    return ["successs"=>true];
});