<?php

use Illuminate\Support\Facades\Route;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;


use App\Http\Controllers\Auth\GoogleAuthController;


Route::get('/huong-dan', function () {
    return view('user-guide');
})->name('user.guide');

Route::get('auth/google', [GoogleAuthController::class, 'redirectToGoogle'])
    ->name('auth.google');
    
Route::get('auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback'])
    ->name('auth.google.callback');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect('/', '/admin');



Route::get('/invoices/preview/{order}', function (Order $order) {
    return view('invoices.order-invoice', ['order' => $order]);
})->name('invoices.preview');

Route::get('/invoices/download/{order}', function (Order $order) {
    $pdf = Pdf::loadView('invoices.order-invoice', ['order' => $order])
        ->setPaper('a4');
    
    return $pdf->download("hoa-don-{$order->code}.pdf");
})->name('invoices.download');