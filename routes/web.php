<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/detail-course/{id}', [HomeController::class, 'detailCourse'])->name('detailCourse');
Route::get('/detail-choosen-course/{id}', [HomeController::class, 'detailChoosenCourse'])->name('detailChoosenCourse');
Route::get('/courses', [HomeController::class, 'courses'])->name('courses');
Route::get('/about-we', [HomeController::class, 'aboutWe'])->name('aboutWe');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'store'])->name('register');
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/transactions', [HomeController::class, 'transactions'])->name('transactions');
    Route::get('/detail-transaction/{no_transactions}', [TransactionController::class, 'detailTransactions'])->name('detailTransaction');
    Route::post('/payment-transaction/{id}', [PaymentController::class, 'storePayment'])->name('storePayment');
    Route::get('/profile',[HomeController::class,'profile'])->name('profile');
    Route::post('/profile/user-edit/{id}',[AuthController::class,'userEdit'])->name('userEdit');
});

Route::middleware('auth', 'admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('adminDashboard');

    // Course
    Route::get('/admin/courses', [AdminController::class, 'listCourses'])->name('adminListCourses');
    Route::get('/admin/courses-create', [AdminController::class, 'createCourses'])->name('adminCreateCourses');
    Route::post('/admin/courses-create', [CourseController::class, 'store'])->name('adminStoreCourses');
    Route::get('/admin/courses-detail/{id}', [AdminController::class, 'detailCourses'])->name('adminDetailCourses');
    Route::get('/admin/courses-delete/{id}', [CourseController::class, 'delete'])->name('adminDeleteCourses');
    Route::get('/admin/courses-edit/{id}', [AdminController::class, 'editCourses'])->name('adminEditCourses');
    Route::post('/admin/courses-edit/{id}', [CourseController::class, 'update'])->name('adminUpdateCourses');
    Route::get('/admin/courses-image-delete/{id}', [CourseController::class, 'deleteImage'])->name('adminDeleteImageCourse');

    // Product
    Route::get('/admin/products', [AdminController::class, 'listProducts'])->name('adminListProducts');
    Route::get('/admin/products-create', [AdminController::class, 'createProducts'])->name('adminCreateProducts');
    Route::post('/admin/products-create', [ProductController::class, 'store'])->name('adminStoreProducts');
    Route::get('/admin/products-detail/{id}', [AdminController::class, 'detailProducts'])->name('adminDetailProducts');
    Route::get('/admin/products-delete/{id}', [ProductController::class, 'delete'])->name('adminDeleteProducts');
    Route::get('/admin/products-edit/{id}', [AdminController::class, 'editProducts'])->name('adminEditProducts');
    Route::get('/admin/product-image-delete/{id}', [ProductController::class, 'deleteImage'])->name('adminDeleteImageProducts');
    Route::get('/admin/product-subscribe-delete/{id}', [ProductController::class, 'deleteSubscribe'])->name('adminDeleteSubscribeProducts');
    Route::post('/admin/product-subscribe-edit/{id}', [ProductController::class, 'updateSubscribe'])->name('adminUpdateSubscribeProducts');
    Route::post('/admin/product-edit/{id}', [ProductController::class, 'update'])->name('adminUpdateProducts');

    // Transactions
    Route::get('/admin/transactions', [AdminController::class, 'listTransactions'])->name('adminListTransactions');
    Route::get('/admin/transactions-detail/{no_transactions}', [AdminController::class, 'detailTransactions'])->name('adminDetailTransaction');
    Route::get('/admin/transactions-send-email/{no_transactions}', [TransactionController::class, 'sendTransactions'])->name('adminSendTransaction');

    // Users
    Route::get('/admin/users',[AdminController::class,'listUsers'])->name('adminListUsers');
    Route::get('/admin/users-detail/{id}',[AdminController::class,'detailUsers'])->name('adminDetailUser');
});

Route::middleware('auth','owner')->group(function(){
    Route::get('/profile/products',[OwnerController::class,'listProducts'])->name('ownerListProducts');
    Route::get('/profile/products-detail/{id}',[OwnerController::class,'detailProducts'])->name('ownerDetailProducts');
    Route::get('/profile/products-list-users/{id}',[OwnerController::class,'listUsersProduct'])->name('ownerListUsersProduct');
    Route::get('/profile/products-detail-transaction-user/{no_transactions}',[OwnerController::class,'pdfStream'])->name('ownerDetailTransactionUser');
});

Route::get('/storage-link', function() {
   $target = $_SERVER['DOCUMENT_ROOT'].'/../course-app/storage/app/public';
   $link = $_SERVER['DOCUMENT_ROOT'].'/storage';
   app(Filesystem::class)->link($target,$link);
   $permission = 0777;
   Storage::disk('public')->setVisibility('','public');
   chmod($link, $permission);
});