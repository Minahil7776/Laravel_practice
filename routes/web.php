<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;

// Guest Routes
Route::middleware('guest')->group(function(){

Route::get('/', function () {
    return view('home');
});
    
Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/signup', [AuthController::class, 'store'])->name('signup.store');
    
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate');
});

Route::get('/about',function(){
        return view('about');
        });
Route::get('/contact',function(){
            return view('contact');
            });
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
Route::get('/terms',function(){
                return view('terms');
                });

Route::get('/blog-images/{filename}', function (string $filename) {
    $path = "blog_images/{$filename}";
    $disk = Storage::disk('public');

    abort_unless($disk->exists($path), 404);

    return $disk->response($path);
})->where('filename', '[A-Za-z0-9_-]+\\.(?:jpe?g|png|gif|svg)')->name('blog-images.show');

// Authenticated Routes
Route::middleware('auth')->group(function(){
Route::get('/dashboard', function(){


    return view('/dashboard');
    });

    // Blog Routes
Route::get('/blogs', function () {
    $blogs = \App\Models\Blog::with('user')->latest()->get();

    return view('blogs', compact('blogs'));
})->name('blogs.index');

Route::post('/blogs', [BlogController::class, 'store'])
    ->name('blogs.store');

Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show');

            
Route::post('/logout',[AuthController::class, 'logout'])->name('logout');


});