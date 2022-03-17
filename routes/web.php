<?php

use Illuminate\Support\Facades\Route;
use App\Models\Record;

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

//Route::view('/dashboard','layouts.template');
//Route::view('/fileEntry','fileEntry');
//Route::view('/fileView','fileView');
//Route::view('/recordEntry','recordEntry');
//Route::view('/recordView','recordView');

Route::view('/','auth.login');
Route::view('/forgetPassword','auth.passwords.email');
Route::view('/reset','auth.passwords.reset');
Route::view('/comfirm','auth.passwords.confirm');
Route::view('/verify','auth.verify');
Route::view('/addUser','addUser');


Auth::routes();

Route::get('test', function(){
    $records = Record::all();

    foreach($records as $record)
    {
        @list($d, $m, $y) = explode('/', $record->tarikh_terima);
        @list($d, $m, $y) = explode('.', $record->tarikh_terima);
        @$newDate = $y.'-'.$m.'-'.$d;
        $record->tarikh_terima = $newDate;
        $record->save();
    }
});


/*--------------------------------------- LOGIN | LOGOUT ------------------------------------------------------------*/
Route::get(uri: "/", action:[App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name(name:'login');
// Route::post(uri: "/login", action:[App\Http\Controllers\Auth\LoginController::class, 'login'])->name(name:'login');
// Route::post(uri: "/", action:[App\Http\Controllers\Auth\LoginController::class, 'logout'])->name(name:'logout');


/*--------------------------------------- DASHBOARD ------------------------------------------------------------*/
Route::get(uri: "/dashboard", action:[App\Http\Controllers\HomeController::class, 'index'])->name(name:'dashboard');


/*--------------------------------------- RECORD ENTRY ------------------------------------------------------------*/
Route::get(uri: "/recordEntry", action:[App\Http\Controllers\recordEntryController::class, 'index'])->name(name:'recordEntry');
Route::post(uri: "/recordEntry", action:[App\Http\Controllers\recordEntryController::class, 'saveRecord'])->name(name:'recordEntry');


/*--------------------------------------- RECORD VIEW ------------------------------------------------------------*/
Route::get(uri: "/recordView", action:[App\Http\Controllers\recordViewController::class, 'index'])->name(name:'recordView');
Route::get(uri: "/editRecord/{id}", action:[App\Http\Controllers\recordViewController::class, 'edit'])->name(name:'editRecord');
Route::post(uri: "/editRecord", action:[App\Http\Controllers\recordViewController::class, 'update'])->name(name:'editRecord');
// Route::get(uri: "/deleteRecord/{id}", action:[App\Http\Controllers\recordViewController::class, 'delete'])->name(name:'deleteRecord');
Route::post(uri: "/deleteRecord/{id}", action:[App\Http\Controllers\recordViewController::class, 'delete'])->name(name:'deleteRecord');
Route::get(uri: "/searchRecord", action:[App\Http\Controllers\recordViewController::class, 'searchRecord'])->name(name:'search');


/*--------------------------------------- SERAHAN ------------------------------------------------------------*/
Route::get(uri: "/serahan", action:[App\Http\Controllers\SerahanController::class, 'index'])->middleware('admin')->name(name:'serahan');
Route::post(uri: "/serahan", action:[App\Http\Controllers\SerahanController::class, 'saveSerahan'])->middleware('admin')->name(name:'serahan');
Route::get(uri: "/editSerahan/{id}", action:[App\Http\Controllers\SerahanController::class, 'edit'])->middleware('admin')->name(name:'editSerahan');
Route::post(uri: "/editSerahan", action:[App\Http\Controllers\SerahanController::class, 'update'])->middleware('admin')->name(name:'editSerahan');
Route::get(uri: "/deleteSerahan/{id}", action:[App\Http\Controllers\SerahanController::class, 'delete'])->middleware('admin')->name(name:'deleteSerahan');
Route::get(uri: "/searchSerahan", action:[App\Http\Controllers\SerahanController::class, 'searchSerahan'])->name(name:'search');


/*--------------------------------------- ADD USER ------------------------------------------------------------*/
Route::get(uri: "/addUser", action:[App\Http\Controllers\addUserController::class, 'index'])->middleware('admin')->name(name:'addUser');
Route::post(uri: "/addUser", action:[App\Http\Controllers\addUserController::class, 'addUser'])->middleware('admin')->name(name:'addUser');
Route::get(uri: "/editUser/{id}", action:[App\Http\Controllers\addUserController::class, 'edit'])->middleware('admin')->name(name:'editUser');
Route::post(uri: "/editUser", action:[App\Http\Controllers\addUserController::class, 'update'])->middleware('admin')->name(name:'editUser');
Route::get(uri: "/deleteUser/{id}", action:[App\Http\Controllers\addUserController::class, 'delete'])->middleware('admin')->name(name:'deleteUser');
Route::get(uri: "/searchUser", action:[App\Http\Controllers\addUserController::class, 'searchUser'])->name(name:'search');


/*--------------------------------------- GRAPH ------------------------------------------------------------*/
//Route::view('/chart','Charts.SampleChart');
//Route::view('/chartSerahan','Charts.SampleChartSerahan');

