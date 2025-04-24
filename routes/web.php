<?php

use App\Http\Controllers\Admin\ContentsController;
use App\Http\Controllers\Admin\UsersController;
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

    Route::post('sponsor/{id}/post-store', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
    Route::get('sponsor/{id}/event-detail', [App\Http\Controllers\PostController::class, 'show'])->name('event-detail.show');
    Route::get('/user/payment', function () {
        return view('User.payment');
    })->name('payment');
    Route::post('/research', [App\Http\Controllers\PostController::class, 'research'])->name('events.research');

    // schedule
    Route::get('/schedule/{id}/participants-list', [App\Http\Controllers\PostController::class, 'show_participants'])->name('schedule.participants');

    // reserve
    Route::post('reservation/{post_id}/store', [App\Http\Controllers\ReservationController::class, 'store'])->name('reservation.store');
    Route::get('reservation/show', [App\Http\Controllers\ReservationController::class, 'show'])->name('reservation.show');
}
);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    // sponsor
    Route::get('/admin/sponsors-list', [UsersController::class, 'sponsors_show'])->name('sponsors');

    // user
    Route::get('/admin/users-list', [UsersController::class, 'users_show'])->name('users');

    // content
    Route::get('/admin/users-content', [ContentsController::class, 'contents_show'])->name('contents');

});

Route::get('/sponsor/post', function () {
    $user = Auth::user();

    return view('sponsor.post')->with('user', $user);
})->name('sponsor.post');

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
