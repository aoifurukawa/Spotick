<?php

use App\Http\Controllers\Admin\ContentsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\PayPalController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('landing');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::patch('/home/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.update');
    Route::get('/profile/{id}/show', [App\Http\Controllers\UserController::class, 'show'])->name('profile.show');

    // Route::get('/sponsor/post', function () {
    //     $user = Auth::user();

    //     return view('sponsor.post')->with('user', $user);
    // })->name('sponsor.post');
    Route::get('/sponsor/post', [App\Http\Controllers\PostController::class, 'page_show'])->name('sponsor.post');

    Route::post('sponsor/{id}/post-store', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
    Route::get('sponsor/{id}/event-detail', [App\Http\Controllers\PostController::class, 'show'])->name('event-detail.show');
    Route::get('/user/payment', function () {
        return view('User.payment');
    })->name('payment');
    Route::delete('sponsor/{id}/post-destroy', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');
    Route::patch('/sponsor/{id}/post-update', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');

    // Reserach
    Route::get('/research', [App\Http\Controllers\PostController::class, 'research'])->name('events.research');

    // schedule
    Route::get('/schedule/{id}/participants-list', [App\Http\Controllers\PostController::class, 'show_participants'])->name('schedule.participants');

    // reserve
    Route::post('reservation/{post_id}/store', [App\Http\Controllers\ReservationController::class, 'store'])->name('reservation.store');
    Route::get('reservation/show', [App\Http\Controllers\ReservationController::class, 'show'])->name('reservation.show');
    Route::delete('reservation/{post_id}/destroy', [App\Http\Controllers\ReservationController::class, 'destroy'])->name('reservation.destroy');

    // like
    Route::post('like/{post_id}/store', [App\Http\Controllers\LikeController::class, 'store'])->name('like.store');
    Route::delete('like/{post_id}/destroy', [App\Http\Controllers\LikeController::class, 'destroy'])->name('like.destroy');

}
);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    // sponsor
    Route::get('/admin/sponsors-list', [UsersController::class, 'sponsors_show'])->name('sponsors');
    Route::get('/admin/{id}/sponsor-information', [UsersController::class, 'sponsors_info_show'])->name('sponsor-info.show');
    Route::patch('/admin/{id}/activate', [UsersController::class, 'activate'])->name('sponsor.activate');
    Route::delete('/admin/{id}/deactivate', [UsersController::class, 'deactivate'])->name('sponsor.deactivate');

    // user
    Route::get('/admin/users-list', [UsersController::class, 'users_show'])->name('users');
    Route::get('/admin/{id}/user-information', [UsersController::class, 'users_info_show'])->name('user-info.show');

    // payment
    Route::get('admin/payment', [UsersController::class, 'payments_show'])->name('payments');

    // content
    Route::get('/users-content', [ContentsController::class, 'contents_show'])->name('contents');
    Route::post('/content/store', [ContentsController::class, 'store'])->name('content.store');
    Route::patch('/content/{id}/update', [ContentsController::class, 'update'])->name('content.update');
    Route::delete('/content/{id}/destroy', [ContentsController::class, 'destroy'])->name('content.destroy');

});

// paypal
Route::get('/paypal', [PayPalController::class, 'index'])->name('paypal.index');
Route::get('/create/{amount}', [PayPalController::class, 'create']);
Route::post('/complete', [PayPalController::class, 'complete']);
Route::post('/paypal/store', [PayPalController::class, 'store'])->name('payment.store');

Route::get('/sponsor/schedule', function () {
    return view('sponsor.schedule');
})->name('sponsor.schedule');

Route::get('/sponsor/event-page', function () {
    return view('sponsor.event-page');
});

Route::get('/sponsor/personal-information', function () {
    return view('sponsor.personal-information');
});

Route::get('/sponsor/particiants-list', function () {
    return view('sponsor.participant-list');
});

Route::get('/admin/user-list', function () {
    return view('admin.user-list');
});

Route::get('/admin/sponsor-list', function () {
    return view('admin.sponsor-list');
});

Route::get('/admin/content-list', function () {
    return view('admin.content-list');
});
