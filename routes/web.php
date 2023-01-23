<?php

use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\WishlistController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:admin'])->group(function(){




Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard')->middleware('auth:admin');

//Admin all routes
Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
Route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');
Route::get('/admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');
Route::post('/update/change/password', [AdminProfileController::class, 'AdminUpdateChangePassword'])->name('update.admin.password');

});
//User all routes
Route::get('/', [IndexController::class, 'index']);
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id=Auth::user()->id;
    $user=User::find($id);
    return view('dashboard',compact('user'));
})->name('dashboard');
Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');
Route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');
Route::post('/user/profile/store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');
Route::get('/user/profile/changePassword', [IndexController::class, 'UserChangePassword'])->name('change.password');
Route::post('/user/password/update', [IndexController::class, 'UserPasswordUpdate'])->name('user.password.update');

//Admin all brands
Route::prefix('brand')->group(function(){
    Route::get('/view', [BrandController::class, 'BrandView'])->name('all.brand');
    Route::post('/store', [BrandController::class, 'BrandStore'])->name('brand.store');
    Route::get('/edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit');
    Route::post('/update', [BrandController::class, 'BrandUpdate'])->name('brand.update');
    Route::get('/delete/{id}', [BrandController::class, 'BrandDelete'])->name('brand.delete');
});
//Admin all categories
Route::prefix('category')->group(function(){
    Route::get('/view', [CategoryController::class, 'CategoryView'])->name('all.category');

   Route::get('/edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');
   Route::post('/update', [CategoryController::class, 'CategoryUpdate'])->name('category.update');
   Route::get('/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete');

//   Admin all Sub categories
    Route::get('/subcategory/view', [SubCategoryController::class, 'SubCategoryView'])->name('all.subcategory');
    Route::post('/store', [SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store');
    Route::get('/subcategory/edit/{id}', [SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');
    Route::post('/subcategory/update', [SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');
    Route::get('subcategory/delete/{id}', [SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete');
    Route::post('/store', [CategoryController::class, 'CategoryStore'])->name('category.store');
    Route::post('/subcategory/store', [SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store');

//    All Sub Sub-Category
    Route::get('/sub/subcategory/view', [SubCategoryController::class, 'SubSubCategoryView'])->name('all.subsubcategory');
    Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory']);

    Route::post('/sub/subcategory/store', [SubCategoryController::class, 'SubSubCategoryStore'])->name('subsubcategory.store');
    Route::get('/sub/subcategory/edit/{id}', [SubCategoryController::class, 'SubSubCategoryEdit'])->name('subsubcategory.edit');
    Route::post('/sub/subcategory/update', [SubCategoryController::class, 'SubSubCategoryUpdate'])->name('subsubcategory.update');
    Route::get('/sub/subcategory/delete/{id}', [SubCategoryController::class, 'SubSubCategoryDelete'])->name('subsubcategory.delete');
});
//Admin all categories
Route::prefix('product')->group(function(){
    Route::get('/view', [ProductController::class, 'AddProduct'])->name('add-product');
    Route::post('/store', [ProductController::class, 'StoreProduct'])->name('store-product');
    Route::get('/manage', [ProductController::class, 'ManageProduct'])->name('manage-product');
    Route::get('/edit/{id}', [ProductController::class, 'EditProduct'])->name('edit-product');
    Route::post('/update', [ProductController::class, 'UpdateProduct'])->name('update-product');
    Route::get('/multipleimage/delete/{id}', [ProductController::class, 'DeleteProductMultiImage'])->name('product-multiple-image-delete');
    Route::post('/update/images', [ProductController::class, 'UpdateProductMultiImage'])->name('update-product-image');
    Route::post('/update/thumbnail', [ProductController::class, 'UpdateProductThumbnail'])->name('update-product-thumbnail');
    Route::get('/inactive/{id}', [ProductController::class, 'InactiveProduct'])->name('inactive-product');
    Route::get('/active/{id}', [ProductController::class, 'ActiveProduct'])->name('active-product');
    Route::get('/delete/{id}', [ProductController::class, 'DeleteProduct'])->name('delete-product');


});
//Front End Slider
Route::prefix('slider')->group(function(){
    Route::get('/view', [SliderController::class, 'SliderView'])->name('manage-slider');
   Route::post('/store', [SliderController::class, 'SliderStore'])->name('slider.store');
   Route::get('/edit/{id}', [SliderController::class, 'SliderEdit'])->name('slider.edit');
   Route::post('/update', [SliderController::class, 'SliderUpdate'])->name('slider.update');
   Route::get('/delete/{id}', [SliderController::class, 'SliderDelete'])->name('slider.delete');
    Route::get('/inactive/{id}', [SliderController::class, 'InactiveSlider'])->name('inactive-slider');
    Route::get('/active/{id}', [SliderController::class, 'ActiveSlider'])->name('active-slider');
});
//Language Controller
Route::get('/language/english', [LanguageController::class, 'ChangetoEnglish'])->name('english.language');
Route::get('/language/bengali', [LanguageController::class, 'ChangetoBengali'])->name('bengali.language');
//FrontEnd Products Details

Route::get('/product/details/{id}/{slug}', [IndexController::class, 'ProductDetails']);

Route::get('/category/get-sub-subcategory/ajax/{subcategory_id}', [SubCategoryController::class, 'GetSubSubCategory']);
Route::get('/product/tag/{tag}/', [IndexController::class, 'TagWiseProduct']);
//frontend subcategorywise data
Route::get('/subcategory/product/{subcategory}/{slug}', [IndexController::class, 'SubCatWiseProduct']);
//frontend subsubcategorywise data
Route::get('/subsubcategory/product/{subsubcategory}/{slug}', [IndexController::class, 'SubSubCatWiseProduct']);

//product add to cart modal with product details
Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);
//add to cart store data
Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);
//get data from mini cart
Route::get('/product/mini/cart/', [CartController::class, 'AddMiniCart']);
//remove cart items
Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'RemoveMiniCart']);
//add to wishlist
Route::post('/add-to-wishlist/{id}', [CartController::class, 'AddToWishlist']);

Route::group(['prefix'=>'user','middleware'=>['user','auth'],'namespace'=>'User'],function (){
    //Wishlist route from header
    Route::get('/wishlist/', [WishlistController::class, 'ViewWishlist'])->name('wishlist');
//Get Wishlist Product
    Route::get('/get-wishlist-product', [WishlistController::class, 'GetWishlistProduct']);
//Remove Wishlist Product
    Route::get('/wishlist-remove/{id}', [WishlistController::class, 'RemoveWishlistProduct']);

});
//    Cart Page
Route::get('/user/mycart', [CartPageController::class, 'MyCart'])->name('mycart');
//    Get Cart Product
Route::get('/user/get-cart-product', [CartPageController::class, 'GetCartProduct']);
//    Remove Cart Product
Route::get('/user/cart-remove/{id}', [CartPageController::class, 'RemoveCartProduct']);
//Cart Quantity Increment
Route::get('/cart-increment/{id}', [CartPageController::class, 'CartIncrement']);
//Cart Quantity Decrement
Route::get('/cart-decrement/{id}', [CartPageController::class, 'CartDecrement']);

//Admin all categories
Route::prefix('coupon')->group(function(){
    Route::get('/view', [CouponController::class, 'CouponView'])->name('manage-coupon');



});
