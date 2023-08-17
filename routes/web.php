<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\admin\ProductAttributeController;
use App\Http\Controllers\admin\ProductAttributeTermsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\AdminProductController;
use App\Http\Controllers\admin\CookieController;
use App\Http\Controllers\admin\PaymentGatwayController;

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\OrderController;

use App\Http\Controllers\admin\ShippingController;
use App\Http\Controllers\admin\CouponController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\admin\TaxController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;

use App\Http\Controllers\TestController;
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

// Route::get('/admin', function () {
//     return view('admin.dashboard');
// })->name('admin.home');


Route::get('/admin', [ProfileController::class, 'redirection'])->name('admin')->middleware('isAdmin');

Route::get('/dashboard/{type?}', [ProfileController::class, 'dashboard'])->name('front.dashboard');


// user login register route
Route::get('/login',[AuthController::class, 'index'])->name('login');
Route::get('/register',[AuthController::class, 'register_ui'])->name('register');
Route::post('/register',[AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/forget-password', [AuthController::class, 'forgot_password_view'])->name('forgot-password');
Route::post('/forget-password', [AuthController::class, 'forgetPassword'])->name('forget-password');

Route::get('/verify/{token}', [AuthController::class,'verifyEmail'])->name('verify');
Route::get('/reset-password/{token}', [AuthController::class,'resetPasswordLoad'])->name('reset-password');
Route::post('/password-reset', [AuthController::class,'resetPassword'])->name('password-reset');

// Resend verification email
Route::post('/resend-verification-email', [AuthController::class, 'resendVerificationEmail'])->name('resend-verification-email');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('update_profile/{id}', [ProfileController::class, 'update_profile'])->name('update_profile');
Route::post('change_password/{id}', [AuthController::class, 'changePassword'])->name('change_password');
Route::post('add_address/{id}', [ProfileController::class, 'add_address'])->name('add_address');

//shop

Route::get('/catalog', [ShopController::class, 'catalog'])->name('catalog');
Route::get('/shop/{slug}', [ShopController::class, 'index'])->name('shop');
Route::get('/categories-product', [ShopController::class, 'categoriesProduct'])->name('categories-product');
Route::get('/get-subcategories', [CategoryController::class, 'getSubcategories'])->name('getSubcategories');


Route::get('/cart',function(){
    return view('pages.cart');
})->name('cart');

// cart route

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index']);
});


Route::get('/testing', [ProductAttributeController::class, 'edit'])->name('ssd');
Route::get('/testingss/{id}', [ProductAttributeController::class, 'delete'])->name('vales');
Route::get('/testingsssss/{id?}', [ProductAttributeController::class, 'new'])->name('valesssss');


Route::name('admin.product.attribute.')->prefix('admin/product/attribute/')->middleware('isAdmin')->group(function () {
    Route::get('list', [ProductAttributeController::class, 'index'])->name('list');
    Route::get('add', [ProductAttributeController::class, 'add'])->name('add');
    Route::post('store', [ProductAttributeController::class, 'store'])->name('store');
    Route::get('delete/{id}', [ProductAttributeController::class, 'delete'])->name('delete');
    Route::get('view/{id}', [ProductAttributeController::class, 'view'])->name('view');
    Route::get('edit/{id}', [ProductAttributeController::class, 'edit'])->name('edit');
    Route::post('update', [ProductAttributeController::class, 'update'])->name('update');
    Route::post('update_status', [ProductAttributeController::class, 'update_attribute_status'])->name('update_status');
});

Route::name('admin.product.attribute.type.')->prefix('admin/product/attribute/type')->middleware('isAdmin')->group(function () {
    Route::post('create_attribute_type', [ProductAttributeController::class, 'create_attribute_type'])->name('create');
    Route::post('update_attribute_type', [ProductAttributeController::class, 'update_attribute_type'])->name('update');
    Route::post('delete_attribute_type', [ProductAttributeController::class, 'delete_attribute_type'])->name('delete');
});


Route::name('admin.product.attribute_terms.')->prefix('admin/product/attribute_terms/')->middleware('isAdmin')->group(function () {
        Route::get('list', [ProductAttributeTermsController::class, 'index'])->name('list');
        Route::get('add/{id}', [ProductAttributeTermsController::class, 'add'])->name('add');
        Route::post('store', [ProductAttributeTermsController::class, 'store'])->name('store');
        Route::get('edit/{id}', [ProductAttributeTermsController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [ProductAttributeTermsController::class, 'update'])->name('update');
        Route::get('delete/{id}', [ProductAttributeTermsController::class, 'delete'])->name('delete');
});

// Coupon route
Route::name('admin.coupon.')->prefix('admin/coupon/')->middleware('isAdmin')->group(function () {
    Route::get('list', [CouponController::class, 'view'])->name('list');
    Route::get('add', [CouponController::class, 'add'])->name('add');
    Route::post('store', [CouponController::class, 'store'])->name('store');
    Route::get('edit/{id}', [CouponController::class, 'edit'])->name('edit');
    Route::post('update/{id}', [CouponController::class, 'update'])->name('update');
    Route::get('delete/{id}', [CouponController::class, 'delete'])->name('delete');

});


// users
Route::name('admin.users.')->prefix('admin/users/')->middleware('isAdmin')->group(function () {
    Route::get('list', [UsersController::class, 'index'])->name('list');
    Route::get('view/{id}', [UsersController::class, 'view_user'])->name('view');
    // Route::get('add', [UsersController::class, 'add'])->name('add');
    // Route::post('update/{id}', [UsersController::class, 'update'])->name('update');
    // Route::get('delete/{id}', [UsersController::class, 'delete'])->name('delete');

});


Route::name('admin.orders.')->prefix('admin/orders/')->middleware('isAdmin')->group(function () {
    Route::get('list', [OrderController::class, 'index'])->name('list');
    Route::get('view/{id}', [OrderController::class, 'show'])->name('view');

});

Route::name('admin.shipping.')->prefix('admin/shipping/')->middleware('isAdmin')->group(function () {
    Route::get('list', [ShippingController::class, 'index'])->name('list');
    Route::get('add', [ShippingController::class, 'add'])->name('add');
    Route::post('store', [ShippingController::class, 'store'])->name('store');
    Route::post('update', [ShippingController::class, 'update'])->name('update');
    Route::get('delete/{id}', [ShippingController::class, 'delete'])->name('delete');
});

Route::name('admin.shipping.country.')->prefix('admin/shipping/country')->middleware('isAdmin')->group(function () {
    Route::get('list/{id?}', [ShippingController::class, 'countryIndex'])->name('list');
    Route::get('add/{id}', [ShippingController::class, 'countryAdd'])->name('add');
    Route::post('store', [ShippingController::class, 'countryStore'])->name('store');
    Route::post('update', [ShippingController::class, 'countryUpdate'])->name('update');
    Route::get('delete/{id}', [ShippingController::class, 'countryDelete'])->name('delete');

});


Route::name('admin.product.')->prefix('admin/product/')->middleware('isAdmin')->group(function () {
    Route::get('list', [AdminProductController::class, 'index'])->name('list');
    Route::get('add', [AdminProductController::class, 'add'])->name('add');
    Route::post('store', [AdminProductController::class, 'store'])->name('store');
    Route::put('update', [AdminProductController::class, 'update'])->name('update');
    Route::get('view/{id}', [AdminProductController::class, 'view'])->name('view');
    Route::get('edit/{id}', [AdminProductController::class, 'edit'])->name('edit');
    Route::get('delete/{id}', [AdminProductController::class, 'delete'])->name('delete');
});
Route::get('product-feed/{slug}', [AdminProductController::class, 'generateProductFeed'])->name('feed');
// public routes

Route::get('/about-us', function () {
    return view('pages.about');
});

Route::get('/contact-us', function () {
    return view('pages.contact');
});

Route::get('/products', function () {
    return view('pages.products.products');
})->name('products');

Route::get('/product/{id}', function () {
    return view('pages.products.single-product');
});

Route::get('/orders', function () {
    return view('pages.orders.orders');
});

Route::get('term-html', [ProductController::class, 'term_html_components']);

Route::get('/order/{id}', function () {
    return view('pages.orders.single-order');
});

Route::get('/privacy-policy', function () {
    return view('pages.privacy-policy');
});

Route::get('/data-sheet', function () {
    return view('pages.data-sheet');
});

Route::get('/terms-condition', function () {
    return view('pages.terms-condition');
});


Route::get('product-detail/{id?}', [ProductController::class, 'productDetail'])->name('product.detail');
Route::get('/', [ProductController::class, 'index'])->name('homepage');
Route::get('product-terms', [ProductController::class, 'attributeTerms'])->name('product.attributeTerms');
Route::get('product-terms-admin/{id?}', [ProductController::class, 'attributeTermsAdmin'])->name('product.admin.attributeTerms');


Route::post('/add-to-cart', [FrontendController::class, 'addToCart']);
Route::get('/add_to_wishlist/{id}', [FrontendController::class, 'add_to_wishlist']);
Route::get('/get_all_cart_value', [FrontendController::class, 'get_all_cart_value']);
Route::post('/remove_from_cart', [FrontendController::class, 'remove']);
Route::post('/update_cart_value', [FrontendController::class, 'update_cart_value']);
Route::post('/remove_to_cart', [FrontendController::class, 'remove_to_cart']);
Route::get('/order_confirmation/{id}', [FrontendController::class, 'order_confirmation'])->name('order_confirmation');
Route::get('/checkout',[FrontendController::class, 'get_checkout'] );
Route::post('/checkout',[FrontendController::class, 'checkout']);

// admin protected routes

// category
Route::name('admin.category.')->prefix('admin/category/')->middleware('isAdmin')->group(function () {
    Route::get('list', [CategoryController::class, 'index'])->name('list');
    Route::get('add', [CategoryController::class, 'add'])->name('add');
    Route::post('insert', [CategoryController::class, 'insert'])->name('insert');
    Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('edit');
    Route::post('update/{id}', [CategoryController::class, 'update'])->name('update');
    Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('delete');
});

// settings
Route::name('admin.settings.slider.')->prefix('admin/settings/slider')->middleware('isAdmin')->group(function() {
    Route::get('list', [SettingController::class, 'index'])->name('list');
    Route::get('add', [SettingController::class, 'add'])->name('add');
    Route::post('upload', [SettingController::class, 'upload'])->name('upload');
    Route::get('edit_slider/{id}', [SettingController::class, 'edit_slider'])->name('edit_slider');
    Route::post('update_slider/{id}', [SettingController::class, 'update_slider'])->name('update_slider');
    Route::get('delete/{id}', [SettingController::class, 'delete_slider'])->name('delete');
});
Route::name('admin.settings.payment-gatway.')->prefix('admin/settings/payment-gatway')->middleware('isAdmin')->group(function() {
    Route::get('list', [PaymentGatwayController::class, 'payment_gatway_list'])->name('list');
    Route::get('add', [PaymentGatwayController::class, 'add'])->name('add');
    Route::post('upload', [PaymentGatwayController::class, 'upload'])->name('upload');
    Route::get('edit-payment-gatway/{id}', [PaymentGatwayController::class, 'edit_payment_gatway'])->name('edit_payment_gatway');
    Route::post('update-payment-gatway/{id}', [PaymentGatwayController::class, 'update_payment_gatway'])->name('update_payment_gatway');
    Route::get('delete/{id}', [PaymentGatwayController::class, 'delete_payment_gatway'])->name('delete');
});

Route::name('admin.taxation.')->prefix('admin/taxation')->middleware('isAdmin')->group(function(){
    Route::get('list',[TaxController::class,'list'])->name('list');
    Route::get('edit/{id}',[TaxController::class,'edit_view'])->name('edit');
    Route::get('add',[TaxController::class,'add_view'])->name('add');
    Route::get('delete/{id}',[TaxController::class,'delete'])->name('delete');
    Route::post('store',[TaxController::class,'store'])->name('store');
    Route::post('update',[TaxController::class,'update'])->name('update');
});

// user
Route::middleware(['auth'])->prefix('user')->group(function () {
    Route::get('dashboard', [ProfileController::class, 'index'])->name('user.dashboard');
    Route::get('account', [ProfileController::class, 'account'])->name('user.account');
    Route::get('address', [ProfileController::class, 'address'])->name('user.address');
    Route::get('wishlist', [ProfileController::class, 'wishlist'])->name('user.wishlist');
    Route::get('orders', [ProfileController::class, 'orders'])->name('user.orders');
    Route::get('orders/{orderId?}', [ProfileController::class, 'order_details'])->name('user.order-details');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/search', [FrontendController::class, 'searchData'])->name('search');


Route::get('/email-view', [TestController::class, 'email_view']);


Route::post('/coupon/apply',[CouponController::class,'apply_code'])->name('coupon.apply');
Route::get('/coupon/remove',[CouponController::class,'code_remove'])->name('coupon.remove');

Route::post('/admin/shipping/country/shipping_country_update', [ShippingController::class,'shippingPrice']);

Route::post('/set-cookie', [CookieController::class,'setCookie'])->name('set.cookie');

Route::get('/quick-view', [ProductController::class,'quick_view_products'])->name('quick.view');







