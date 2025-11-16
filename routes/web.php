<?php

use Illuminate\Support\Facades\Route;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;

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