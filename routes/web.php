<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Web\AboutController;
use App\Http\Controllers\Web\EventController;
use App\Http\Controllers\Web\ContactController;
use App\Http\Controllers\Web\ProjectController;
use App\Http\Controllers\Web\ServiceController;
use App\Http\Controllers\Web\HomePageController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminEventController;
use App\Http\Controllers\Admin\AdminProjectController;
use App\Http\Controllers\Admin\AdminServiceController;

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



Route::get('/', [HomePageController::class, "index"])->name("front.homepage");
Route::get('/about-us', [AboutController::class, "index"])->name("front.about-us");
Route::get('/projects', [ProjectController::class, "fetch"])->name("front.projects-list");
Route::get('/projects-single/{id}', [ProjectController::class, "fetchSingle"])->name("front.projects-single");
Route::get('/services', [ServiceController::class, "fetch"])->name("front.services-list");
Route::get('/service-single/{id}', [ServiceController::class, "fetchSingle"])->name("front.services-single");
Route::get('/events', [EventController::class, "fetch"])->name("front.events-list");
Route::get('/events-single/{id}', [EventController::class, "fetchSingle"])->name("front.events-single");
Route::get('/contact', [ContactController::class, "contact"])->name("front.contact");
Route::get('/search', [ServiceController::class, "search"])->name('search');




Route::prefix('dashboard')->group(function () {

    Route::get('/', [AdminHomeController::class, "index"])->name('admin.homepage');
    Route::get('/projects', [AdminProjectController::class, "index"])->name('admin.all-projects');
    Route::post('/projects/store', [AdminProjectController::class, "store"])->name('admin.store-projects');
    Route::post('/projects/update', [AdminProjectController::class, "update"])->name('admin.update-projects');
    Route::get('/projects/delete/{id}', [AdminProjectController::class, "delete"])->name('admin.delete-projects');

    Route::get('/services', [AdminServiceController::class, "index"])->name('admin.all-services');
    Route::post('/services/store', [AdminServiceController::class, "store"])->name('admin.store-services');
    Route::post('/services/update', [AdminServiceController::class, "update"])->name('admin.update-services');
    Route::get('/services/delete/{id}', [AdminServiceController::class, "delete"])->name('admin.delete-services');

    Route::get('/events', [AdminEventController::class, "index"])->name('admin.all-events');
    Route::post('/events/store', [AdminEventController::class, "store"])->name('admin.store-events');
    Route::post('/events/update', [AdminEventController::class, "update"])->name('admin.update-events');
    Route::get('/events/delete/{id}', [AdminEventController::class, "delete"])->name('admin.delete-events');
});




Route::get("/register", [AuthController::class, "registerForm"])->name('auth.registerForm');
Route::Post("/register", [AuthController::class, "register"])->name('auth.register');
Route::get("/login", [AuthController::class, "loginForm"])->name('auth.loginForm');
Route::Post("/login", [AuthController::class, "login"])->name('auth.login');

Route::Post("/logout", [AuthController::class, "logout"])->name('auth.logout');
