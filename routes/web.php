<?php

use Illuminate\Support\Facades\Route;

// CONTROLLERS
use App\Http\Controllers\BookingController;
use App\Http\Controllers\InvoiceController;

// DASHBOARD PER ROLE
use App\Livewire\Admin\Dashboard as AdminDashboard;
use App\Livewire\Staff\Dashboard as StaffDashboard;
use App\Livewire\Customer\Dashboard as CustomerDashboard;

// ADMIN PAGES
use App\Livewire\Admin\Services\Index as AdminServicesIndex;
use App\Livewire\Admin\Bookings\Index as AdminBookingsIndex;

// CUSTOMER PAGES
use App\Livewire\Customer\Services\Index as CustomerServicesIndex;
use App\Livewire\Customer\Bookings\History as CustomerBookingHistory;

// STAFF PAGES
use App\Livewire\Staff\BookingsToday;
use App\Livewire\Staff\BookingProcess;

// BOOKING 4 STEP
use App\Livewire\Booking\Step1Service;
use App\Livewire\Booking\Step2Staff;
use App\Livewire\Booking\Step3Schedule;
use App\Livewire\Booking\Step4Confirm;

/*
|--------------------------------------------------------------------------
| LANDING PAGE (PUBLIC)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {

    // Jika user sudah login → langsung masuk dashboard sesuai role
    if (auth()->check()) {
        return redirect()->route(auth()->user()->role . '.dashboard');
    }

    // Jika belum login → tampilkan landing page
    return view('landing');

})->name('landing');



/*
|--------------------------------------------------------------------------
| AUTHENTICATED ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | ADMIN ROUTES
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:admin')
        ->prefix('admin')->name('admin.')
        ->group(function () {

            Route::get('/dashboard', AdminDashboard::class)->name('dashboard');
            Route::get('/services', AdminServicesIndex::class)->name('services.index');
            Route::get('/bookings', AdminBookingsIndex::class)->name('bookings.index');
            Route::get('/reports', \App\Livewire\Admin\Reports\Index::class)->name('reports');
            
        });


    /*
    |--------------------------------------------------------------------------
    | STAFF ROUTES
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:staff')
        ->prefix('staff')->name('staff.')
        ->group(function () {

            Route::get('/dashboard', StaffDashboard::class)->name('dashboard');
            Route::get('/bookings/today', BookingsToday::class)->name('bookings.today');
            Route::get('/booking/{booking}/process', BookingProcess::class)->name('booking.process');
            Route::get('/reviews', \App\Livewire\Staff\Reviews::class)->name('reviews');
            Route::get('/schedule', \App\Livewire\Staff\Schedule::class)->name('schedule');
            
        });


    /*
    |--------------------------------------------------------------------------
    | CUSTOMER ROUTES
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:customer')
        ->prefix('customer')->name('customer.')
        ->group(function () {

            Route::get('/dashboard', CustomerDashboard::class)->name('dashboard');
            Route::get('/services', CustomerServicesIndex::class)->name('services.index');

            Route::get('/book', fn() => redirect()->route('booking.step1'))->name('book');

            Route::get('/bookings/history', CustomerBookingHistory::class)
                ->name('bookings.history');

            // QR + Invoice
            Route::get('/booking/{booking}/qr', [BookingController::class, 'qr'])
                ->name('booking.qr');

            Route::get('/booking/{booking}/invoice', [InvoiceController::class, 'download'])
                ->name('booking.invoice');
        });


    /*
    |--------------------------------------------------------------------------
    | DETAIL BOOKING CUSTOMER
    |--------------------------------------------------------------------------
    */
    Route::get('/customer/bookings/{booking}/detail',
        \App\Livewire\Customer\Bookings\Detail::class
    )->name('customer.bookings.detail');


    /*
    |--------------------------------------------------------------------------
    | BOOKING WIZARD (STEP1–STEP4)
    |--------------------------------------------------------------------------
    */
    Route::prefix('booking')->name('booking.')->group(function () {
        Route::get('/step-1', Step1Service::class)->name('step1');
        Route::get('/step-2', Step2Staff::class)->name('step2');
        Route::get('/step-3', Step3Schedule::class)->name('step3');
        Route::get('/step-4', Step4Confirm::class)->name('step4');
    });


    /*
    |--------------------------------------------------------------------------
    | UNIVERSAL DASHBOARD AUTO-REDIRECT
    |--------------------------------------------------------------------------
    */
    Route::get('/dashboard', fn() =>
        redirect()->route(auth()->user()->role . '.dashboard')
    )->name('dashboard');

});
