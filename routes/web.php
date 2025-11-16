<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;

/*
|--------------------------------------------------------------------------
| Landing Page
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Dashboard Redirect by Role
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    $user = request()->user();

    if (!$user) {
        return redirect('/login');
    }

    return $user->role === 'admin'
        ? redirect()->route('admin.dashboard')
        : redirect()->route('vendor.dashboard');
})->middleware('auth');



/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->as('admin.')
    ->group(function () {

        Route::get(
            '/dashboard',
            [\App\Http\Controllers\Admin\DashboardController::class, 'index']
        )
            ->name('dashboard');

        // STANDS CRUD
        Route::resource(
            'stands',
            \App\Http\Controllers\Admin\StandController::class
        );

        // BOOKING APPROVE / REJECT
        Route::get(
            'bookings/{booking}/approve',
            [\App\Http\Controllers\Admin\BookingController::class, 'approve']
        )
            ->name('bookings.approve');

        Route::get(
            'bookings/{booking}/reject',
            [\App\Http\Controllers\Admin\BookingController::class, 'rejectForm']
        )
            ->name('bookings.rejectForm');

        Route::post(
            'bookings/{booking}/reject',
            [\App\Http\Controllers\Admin\BookingController::class, 'reject']
        )
            ->name('bookings.reject');

        // BOOKING LIST & DETAIL
        Route::resource(
            'bookings',
            \App\Http\Controllers\Admin\BookingController::class
        )
            ->only(['index', 'show']);

        // VENDOR LIST & DETAIL
        Route::resource(
            'vendors',
            \App\Http\Controllers\Admin\VendorController::class
        )
            ->only(['index', 'show', 'destroy']);

        Route::get(
            'stands/{stand}/bookings',
            [\App\Http\Controllers\Admin\StandBookingController::class, 'index']
        )
            ->name('stands.bookings');
    });

/*
|--------------------------------------------------------------------------
| VENDOR ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:vendor'])
    ->prefix('vendor')
    ->as('vendor.')
    ->group(function () {

        Route::get(
            '/dashboard',
            [\App\Http\Controllers\Vendor\StandController::class, 'index']
        )->name('dashboard');

        Route::get(
            '/stands',
            [\App\Http\Controllers\Vendor\StandController::class, 'index']
        )->name('stands.index');

        Route::get('/stands/search', [\App\Http\Controllers\Vendor\StandController::class, 'search'])
            ->name('stands.search');


        // Booking CRUD (index, create, store, destroy)
        Route::resource(
            'bookings',
            \App\Http\Controllers\Vendor\BookingController::class
        )->only(['index', 'create', 'store', 'destroy']);

        Route::get(
            'bookings/{booking}',
            [\App\Http\Controllers\Vendor\BookingController::class, 'show']
        )->name('bookings.show');

        // Upload Bukti Pembayaran (FORM)
        Route::get(
            'bookings/{booking}/upload',
            [\App\Http\Controllers\Vendor\BookingController::class, 'uploadForm']
        )->name('bookings.uploadForm');

        // Upload Bukti Pembayaran (POST)
        Route::post(
            'bookings/{booking}/upload',
            [\App\Http\Controllers\Vendor\BookingController::class, 'upload']
        )->name('bookings.upload');
    });





/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get(
        '/profile',
        [ProfileController::class, 'edit']
    )
        ->name('profile.edit');

    Route::patch(
        '/profile',
        [ProfileController::class, 'update']
    )
        ->name('profile.update');

    Route::delete(
        '/profile',
        [ProfileController::class, 'destroy']
    )
        ->name('profile.destroy');
});



/*
|--------------------------------------------------------------------------
| NOTIFICATIONS (GLOBAL — ADMIN & VENDOR)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // DROPDOWN (5 notifikasi terbaru)
    Route::get('/notifications/dropdown', function () {
        $notifications = \App\Models\Notification::where('user_id', request()->user()->id)
            ->latest()
            ->take(5)
            ->get();

        return view('notifications.dropdown', compact('notifications'));
    })->name('notifications.dropdown');


    // FULL INDEX PAGE (pagination)
    Route::get('/notifications', function () {
        $notifications = \App\Models\Notification::where('user_id', request()->user()->id)
            ->latest()
            ->paginate(10);

        return view('notifications.index', compact('notifications'));
    })->name('notifications.index');


    // MARK AS READ (single)
    Route::post('/notifications/{notification}/read', function (\App\Models\Notification $notification) {
        if ($notification->user_id === request()->user()->id) {
            $notification->update(['read_at' => now()]);
        }
        return back();
    })->name('notifications.read');
});

Route::view('/help', 'help')->name('help');


/*
|--------------------------------------------------------------------------
| AUTH ROUTES (breeze)
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';
