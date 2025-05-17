<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api; // Import the API controllers namespace

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Authentication Routes (using Sanctum)
Route::post('/register', [Api\AuthController::class, 'register']);
Route::post('/login', [Api\AuthController::class, 'login']);

// Protected routes (require Sanctum token)
Route::middleware('auth:sanctum')->group(function () {

    // User Authentication (Logout and get authenticated user)
    Route::post('/logout', [Api\AuthController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return $request->user(); // Returns authenticated user details
    });

    // User Profile
    Route::get('/profile', [Api\UserProfileController::class, 'show']);
    Route::put('/profile', [Api\UserProfileController::class, 'update']); // Use PUT for full update, PATCH for partial

    // Shopping Cart
    Route::get('/cart', [Api\ShoppingCartController::class, 'index']);
    Route::post('/cart/add', [Api\ShoppingCartController::class, 'store']); // Add item to cart
    Route::put('/cart/{item}', [Api\ShoppingCartController::class, 'update']); // Update item quantity
    Route::delete('/cart/{item}', [Api\ShoppingCartController::class, 'destroy']); // Remove item

    // Product Orders
    Route::get('/my-orders', [Api\ProductOrderController::class, 'index']); // View user's orders
    Route::get('/my-orders/{order}', [Api\ProductOrderController::class, 'show']); // View single order
    Route::post('/orders', [Api\ProductOrderController::class, 'store']); // Place a new order (from cart)

    // Hotel Bookings
    Route::get('/my-bookings', [Api\HotelBookingController::class, 'index']); // View user's bookings
    Route::get('/my-bookings/{booking}', [Api\HotelBookingController::class, 'show']); // View single booking
    Route::post('/bookings', [Api\HotelBookingController::class, 'store']); // Place a new booking
    // Route::delete('/bookings/{booking}', [Api\HotelBookingController::class, 'destroy']); // Option to cancel booking?

    // Site Experiences (User can manage their own)
    Route::apiResource('my-experiences', Api\SiteExperienceController::class); // CRUD for user's experiences

    // Polymorphic Actions (Favorites, Ratings, Comments)
    Route::post('/favorites/toggle', [Api\FavoriteController::class, 'toggle']); // Add or remove a favorite
    Route::get('/my-favorites', [Api\FavoriteController::class, 'index']); // View user's favorites (Polymorphic)

    Route::apiResource('ratings', Api\RatingController::class)->only(['store', 'update', 'destroy']); // Users add/update/delete their own ratings
    // Note: Getting ratings for a specific target (site, product) would likely be a method on the target's controller
    // e.g., GET /api/tourist-sites/{site}/ratings -> TouristSiteController@ratings (or similar)

    Route::apiResource('comments', Api\CommentController::class)->only(['store', 'update', 'destroy']); // Users add/update/delete their own comments
    // Note: Getting comments for a specific target (article, product) would likely be a method on the target's controller
    // e.g., GET /api/articles/{article}/comments -> ArticleController@comments (or similar)
     Route::get('/comments/{comment}/replies', [Api\CommentController::class, 'replies']); // Get replies for a comment


     // Example of fetching ratings/comments for a target via its resource controller
     // (You'd add methods like 'ratings', 'comments', 'favorites' to those controllers)
     // Route::get('/tourist-sites/{site}/ratings', [Api\TouristSiteController::class, 'ratings']);
     // Route::get('/products/{product}/comments', [Api\ProductController::class, 'comments']);

    // Add more protected API routes here as needed
});


// Publicly Accessible API Routes (do NOT require Sanctum token)
// Users can browse/view resources without logging in
Route::get('/products', [Api\ProductController::class, 'index']);
Route::get('/products/{product}', [Api\ProductController::class, 'show']);
Route::get('/product-categories', [Api\ProductCategoryController::class, 'index']); // List categories

Route::get('/tourist-sites', [Api\TouristSiteController::class, 'index']);
Route::get('/tourist-sites/{touristSite}', [Api\TouristSiteController::class, 'show']);
Route::get('/site-categories', [Api\SiteCategoryController::class, 'index']); // List categories

Route::get('/tourist-activities', [Api\TouristActivityController::class, 'index']);
Route::get('/tourist-activities/{touristActivity}', [Api\TouristActivityController::class, 'show']);

Route::get('/hotels', [Api\HotelController::class, 'index']);
Route::get('/hotels/{hotel}', [Api\HotelController::class, 'show']);

Route::get('/articles', [Api\ArticleController::class, 'index']);
Route::get('/articles/{article}', [Api\ArticleController::class, 'show']);

// Public endpoints to get ratings/comments for a target (optional, can be done via target controller)
Route::get('/{targetType}/{targetId}/ratings', [Api\RatingController::class, 'indexForTarget']); // You'd need indexForTarget method
Route::get('/{targetType}/{targetId}/comments', [Api\CommentController::class, 'indexForTarget']); // You'd need indexForTarget method

// ... add other publicly accessible routes