<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin; // Import the Admin controllers namespace

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Public facing simple routes (optional)
// Route::get('/', function () { return view('welcome'); });
// Route::get('/about', function () { return view('about'); });

// Admin Panel Routes
// Group admin routes under a prefix and apply middleware (e.g., auth, admin role)
Route::prefix('admin')->middleware(['auth', 'can:access-admin-panel'])->group(function () {

    // Admin Dashboard
    Route::get('/', [Admin\DashboardController::class, 'index'])->name('admin.dashboard'); // You'll need to create Admin\DashboardController

    // Resource Management Routes (using Route::resource)
    Route::resource('users', Admin\UserController::class);
    Route::resource('product-categories', Admin\ProductCategoryController::class);
    Route::resource('products', Admin\ProductController::class);
    Route::resource('product-orders', Admin\ProductOrderController::class)->only(['index', 'show']); // Maybe limited actions via admin panel

    Route::resource('site-categories', Admin\SiteCategoryController::class);
    Route::resource('tourist-sites', Admin\TouristSiteController::class);
    Route::resource('tourist-activities', Admin\TouristActivityController::class);

    Route::resource('hotels', Admin\HotelController::class);
    Route::resource('hotel-room-types', Admin\HotelRoomTypeController::class);
    Route::resource('hotel-rooms', Admin\HotelRoomController::class);
    Route::resource('hotel-bookings', Admin\HotelBookingController::class)->only(['index', 'show']); // Maybe limited actions

    Route::resource('site-experiences', Admin\SiteExperienceController::class); // For moderation
    Route::resource('articles', Admin\ArticleController::class);

    // Routes for managing polymorphic content (optional, could be part of resource pages)
    // Route::get('ratings', [Admin\RatingController::class, 'index'])->name('admin.ratings.index');
    // Route::get('comments', [Admin\CommentController::class, 'index'])->name('admin.comments.index');

    // Add more admin-specific routes here as needed (e.g., reports, settings, payment gateway config)

});

// Admin Authentication Routes (if using Laravel's built-in auth for admin panel)
// You might use Breeze/Jetstream or custom auth for admin login
// Example (if using custom auth):
// Route::get('admin/login', [Admin\Auth\LoginController::class, 'showLoginForm'])->name('admin.login');
// Route::post('admin/login', [Admin\Auth\LoginController::class, 'login']);
// Route::post('admin/logout', [Admin\Auth\LoginController::class, 'logout'])->name('admin.logout');

// Fallback route for SPA or generic welcome
Route::get('/{any}', function () {
    return view('welcome'); // Or your admin panel's base view
})->where('any', '.*'); // Catch all route for SPA (if admin is an SPA)