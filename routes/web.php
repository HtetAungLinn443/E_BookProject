<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['admin_auth'])->group(function () {
    Route::redirect('/', 'loginPage');
    Route::get('loginPage', [AuthController::class, 'loginPage'])->name('auth#loginPage');
    Route::get('registerPage', [AuthController::class, 'registerPage'])->name('auth#registerPage');
});

Route::middleware(['auth'])->group(function () {
    // deshboard
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('deshboard');

    // Admin
    Route::middleware(['admin_auth'])->group(function () {
        Route::get('profile', [AdminController::class, 'profile'])->name('admin#profile');
        Route::get('edit', [AdminController::class, 'profileEditPage'])->name('admin#profileEditpage');
        Route::post('edit/profile,{id}', [AdminController::class, 'editProfile'])->name('admin#editProfile');

        // Catregory Group
        Route::prefix('category')->group(function () {
            Route::get('list', [CategoryController::class, 'categoryList'])->name('admin#categoryList');
            Route::get('create/page', [CategoryController::class, 'categoryCreatePage'])->name('admin#categoryCreatePage');
            Route::post('category/create', [CategoryController::class, 'categoryCreate'])->name('admin#categoryCreate');
            Route::get('delete/{id}', [CategoryController::class, 'categoryDelete'])->name('admin#categoryDelete');
            Route::get('editPage/{id}', [CategoryController::class, 'editPage'])->name('admin#editPage');
            Route::post('edit/{id}', [CategoryController::class, 'categoryEdit'])->name('admin#categoryEdit');

        });

        // Books Group
        Route::prefix('book')->group(function () {
            Route::get('list', [BookController::class, 'bookList'])->name('admin#bookList');
            Route::get('createPage', [BookController::class, 'createPage'])->name('admin#bookCratePage');
            Route::post('create/book', [BookController::class, 'createBook'])->name('admin#createBook');
            Route::get('delete/{id}', [BookController::class, 'deleteBook'])->name('admin#deleteBook');
            Route::get('details/{id}', [BookController::class, 'detailsBook'])->name('admin#detailBook');
            Route::get('editPage/{id}', [BookController::class, 'editPage'])->name('admin#bookEditPage');
            Route::post('update', [BookController::class, 'updateBook'])->name('admin#updateBook');
        });

        // Setting Group
        Route::prefix('setting')->group(function () {
            Route::get('listPage', [AccountController::class, 'accountList'])->name('account#listPage');
            Route::get('change/passwordPage', [AccountController::class, 'changePasswordPage'])->name('admin#changePasswordPage');
            Route::post('change/password', [AccountController::class, 'changePassword'])->name('admin#changePassword');

        });

        // Admin and user  List Group
        Route::prefix('account')->group(function () {
            // admin list
            Route::get('adminList', [AccountController::class, 'adminList'])->name('admin#adminList');

            // user list
            Route::get('userList', [AccountController::class, 'userList'])->name('admin#userList');

            // user and admin role change
            Route::get('role/change', [AccountController::class, 'roleChange'])->name('admin#roleChange');

            // account delete
            Route::get('delete/{id}', [AccountController::class, 'adminAccDelete'])->name('admin#delete');

        });

    });

    // User
    Route::group(['prefix' => 'user', 'middleware' => 'user_auth'], function () {
        Route::get('homePage', [UserController::class, 'homePage'])->name('user#home');

        // book detail page
        Route::get('details/{id}', [UserController::class, 'detailsBook'])->name('user#detailsBook');

        //category filter
        Route::get('filter/{id}', [UserController::class, 'filter'])->name('user#filter');

        // download count
        Route::get('download/count', [UserController::class, 'downloadCount']);

        // Profile
        Route::get('profile', [UserController::class, 'userProfile'])->name('user#profile');
        Route::get('editProfile/{id}', [UserController::class, 'editProfile'])->name('user#editProfile');
        Route::post('update/{id}', [UserController::class, 'updateProfile'])->name('user#updateProfile');
        Route::get('change/passwordPage', [UserController::class, 'changePasswordPage'])->name('user#changePasswordPage');
        Route::post('change/password', [UserController::class, 'changePassword'])->name('user#changePassword');
    });
});
