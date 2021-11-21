<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\masakanController;
use App\Http\Controllers\jenis_masakanController;
use App\Http\Controllers\waiterController;
use App\Http\Controllers\mejaController;
use App\Http\Controllers\statusController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\orderWaiterController;
use App\Http\Controllers\QRcodeController;
use Illuminate\Http\Request;


Route::get('/', function () {
    return view('home');
});



Auth::routes();
Route::post('/pesanmeja', [App\Http\Controllers\orderController::class, 'pesanmeja']);
Route::get('/scan', [App\Http\Controllers\guessController::class, 'scan']);

Route::resource('order', orderController::class);
Route::get('/pesan/meja/{id}', [App\Http\Controllers\orderController::class, 'cekDataPesanan']);
Route::post('/send/nama', [App\Http\Controllers\orderController::class, 'dataPesanan'])->name('sendNama');
Route::post('/order/list', [App\Http\Controllers\orderController::class, 'orderList'])->name('orderList');

//Route::get('/send/nama/soryBy/{id}', [App\Http\Controllers\orderController::class, 'kategorijenis'])->name('sendNama');


Route::any('cekorder', [App\Http\Controllers\orderController::class, 'cekorder']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/meja', [mejaController::class, 'index']);
//Route::post('/meja', [mejaController::class, 'store'])->name('store');
//Route::get('qrcode/{id}', [mejaController::class, 'generate'])->name('generate');



Route::middleware(['auth'])->group(function () {
    Route::resource('masakan', masakanController::class);
    Route::resource('jenis_masakan', jenis_masakanController::class);
    Route::resource('extra', extraController::class);
    Route::resource('waiter', waiterController::class);
    Route::resource('orderWaiter', orderWaiterController::class);
    Route::resource('qrcode', QRcodeController::class);
    Route::get('/waiter/detailorder/{id}', [orderWaiterController::class, 'show']);
    Route::get('/waiter/konfirmasistatus/{id}/{code}', [orderWaiterController::class, 'konfirmasi']);
    Route::get('updateStatus/{id}', [orderWaiterController::class, 'updateStatus'])->name('updateStatus');
    Route::get('close/order/', [orderWaiterController::class, 'closeOrder'])->name('closeOrder');
    Route::get('updateStatus/dibayar/{id}', [statusController::class, 'toDibayar']);
    Route::get('updateStatus/dimasak/{id}', [statusController::class, 'toDimasak']);
    Route::get('updateStatus/siap/{id}', [statusController::class, 'toSiap']);
    Route::get('updateStatus/diantar/{id}', [statusController::class, 'toDiantar']);
    Route::get('updateStatus/ditutup/{id}', [statusController::class, 'toDitutup']);
});