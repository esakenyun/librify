<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\BookFileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PublisherController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\UsertypeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider and all of them will
 * | be assigned to the "web" middleware group. Make something great!
 * |
 */

Route::controller(App\Http\Controllers\FrontendController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/books', 'book');
    Route::get('/categories', 'categories');
    Route::get('/categories/{category_name}/book', 'showBookByCategory');
    Route::get('/books/detail/{book_id}', 'detailBook');
    Route::get('/search', 'searchBook')->name('search.result');
    Route::post('/postReview', 'postReviewBook');
    Route::get('/books/view/{bookfile_id}', 'viewBook');
    Route::get('/books/download/{bookfile_id}', 'downloadBook');
});

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::controller(ReviewController::class)->group(function () {
        Route::get('/userReview', 'index')->name('adminreview');
        Route::get('/edit-review/{rating_id}', 'edit')->name('review.edit');
        Route::put('/update-review/{rating_id}', 'update');
        Route::delete('/delete-review/{rating_id}', 'destroy');
    });

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category', 'index')->name('admincategory');
        Route::get('/category/create', 'create')->name('category.create');
        Route::post('/category/create', 'store')->name('author.store');
        Route::get('/edit-category/{category}', 'edit')->name('category.edit');
        Route::put('/update-category/{category_id}', 'update');
        Route::delete('/delete-category/{category_id}', 'destroy');
    });

    Route::controller(PublisherController::class)->group(function () {
        Route::get('/publisher', 'index')->name('adminpublisher');
        Route::get('/publisher/create', 'create')->name('publisher.create');
        Route::post('/publisher/create', 'store')->name('publisher.store');
        Route::get('/edit-publisher/{publisher}', 'edit')->name('publisher.edit');
        Route::put('/update-publisher/{publisher_id}', 'update');
        Route::delete('/delete-publisher/{publisher_id}', 'destroy');
    });

    Route::controller(UsertypeController::class)->group(function () {
        Route::get('/usertype', 'index')->name('adminuser');
        Route::get('/usertype/create', 'create')->name('user.create');
        Route::post('/usertype/create', 'store')->name('user.store');
        Route::get('/edit-user/{usertype_id}', 'edit')->name('user.edit');
        Route::put('/update-user/{usertype_id}', 'update');
        Route::delete('/delete-user/{usertype_id}', 'destroy');
    });

    Route::controller(BookController::class)->group(function () {
        Route::get('/book', 'index')->name('adminbooks');
        Route::get('/book/create', 'create')->name('book.create');
        Route::post('/book/create', 'store')->name('book.store');
        Route::get('/edit-book/{book_id}', 'edit')->name('book.edit');
        Route::put('/update-book/{book_id}', 'update');
        Route::delete('/delete-book/{book_id}', 'destroy');
    });

    Route::controller(BookFileController::class)->group(function () {
        Route::get('/bookfile', 'index')->name('adminbookfile');
        Route::get('/bookfile/create', 'create')->name('bookfile.create');
        Route::post('/bookfile/create', 'store')->name('bookfile.store');
        Route::get('/edit-bookfile/{bookfile_id}', 'edit')->name('bookfile.edit');
        Route::put('/update-bookfile/{bookfile_id}', 'update');
        Route::delete('/delete-bookfile/{bookfile_id}', 'destroy');
    });
});

require __DIR__ . '/auth.php';
