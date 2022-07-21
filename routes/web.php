<?php

use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\HrController;
use App\Http\Controllers\Client\JobController;
use App\Http\Controllers\Client\PostController as ClientPostController;
use App\Http\Controllers\Client\UserPostsController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;


//home
Route::get('/', [HomeController::class,'index'])->name('home');
//hr
Route::group(['prefix' => 'hr','middleware' => 'auth.hr'],function () {
    Route::get('/user-posts/{postid}', [HrController::class,'getUserPosts']);
    Route::get('/user-posts/accept/{userid}', [UserPostsController::class,'updateStatus']);
    Route::get('/user-posts/cancel/{userid}', [UserPostsController::class,'updateStatus']);
    Route::get('/posts', [HrController::class,'index'])->name('client.hr');
    Route::resource('posts',ClientPostController::class)->except([
        'index', 'show'
    ]);
});

//user client side
Route::get('/user/profile/{userId}',[UserController::class,'show'])->name('client.user.show');
Route::put('/user/update/{userId}',[UserController::class,'update'])->name('client.user.update');
//user-jobs
Route::get('/user/job/show/{userId}',[UserPostsController::class,'show']);
Route::get('/user/job/cancel/{postId}',[UserPostsController::class,'cancelPost']);
Route::get('/user/job/applynow/{postId}',[UserPostsController::class,'applyNow']);

//jobs
Route::get('/jobs', [JobController::class,'index'])->name('client.jobs');
Route::get('/viewjob/{post}', [JobController::class,'show'])->name('client.viewjob');

//auth socical
Route::get('/login', [AuthController::class,'login'])->name('auth.login');
Route::get('/register', [AuthController::class,'register'])->name('auth.register');
Route::get('/registerhr', [AuthController::class,'registerhr'])->name('auth.registerhr');
Route::get('/auth/redirect/github', function () {
    return Socialite::driver('github')->redirect();
})->name('auth.redirect');
Route::get('/auth/callback/github',[AuthController::class,'callback'])->name('auth.callback');
Route::post('/auth/registration',[AuthController::class,'registration'])->name('auth.registration');
Route::post('/auth/authenticate',[AuthController::class,'authenticate'])->name('auth.authenticate');
Route::get('/auth/logout',[AuthController::class,'logout'])->name('auth.logout');
//end - auth


// admin
Route::group(['prefix' => 'admin','middleware' => 'auth.admin'],function () {
    //dashboard
    Route::get('/', [DashBoardController::class,'index'])->name('admin.dashboard');
    Route::get('/barchart', [DashBoardController::class,'getDataBarChart'])->name('admin.barchart');
    Route::get('/donutchart', [DashBoardController::class,'getDataDonutchart'])->name('admin.donutchart');
    //users
    Route::get('/users', [UserController::class,'index'])->name('admin.users');
    Route::delete('/users/destroy/{id}', [UserController::class,'destroy'])->name('admin.users.destroy');
    Route::get('/users/edit/{id}', [UserController::class,'edit'])->name('admin.users.edit');
    Route::put('/users/edit/{id}', [UserController::class,'update'])->name('admin.users.update');
    //posts
    Route::get('/posts', [PostController::class,'index'])->name('admin.posts');
    Route::get('/posts/fetch', [PostController::class,'fetch'])->name('admin.posts.fetch');
    Route::get('/posts/show/{id}', [PostController::class,'show'])->name('admin.posts.show');
    Route::get('/posts/destroy/{id}', [PostController::class,'destroy'])->name('admin.posts.destroy');
    Route::post('/posts/edit/{id}', [PostController::class,'update'])->name('admin.posts.update');
});