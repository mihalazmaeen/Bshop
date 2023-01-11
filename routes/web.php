<?php

use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Frontend\IndexController;
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




Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

//Admin all routes
Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
Route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');
Route::get('/admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');
Route::post('/update/change/password', [AdminProfileController::class, 'AdminUpdateChangePassword'])->name('update.admin.password');


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
Route::prefix('category')->group(function(){Route::get('/view', [CategoryController::class, 'CategoryView'])->name('all.category');

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
    Route::get('/sub-subcategory/ajax/{subcategory_id}', [SubCategoryController::class, 'GetSubSubCategory']);
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

//    Route::get('/edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');
//    Route::post('/update', [CategoryController::class, 'CategoryUpdate'])->name('category.update');
//    Route::get('/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete');
