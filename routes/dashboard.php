<?php

use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\AttributeController;
use App\Http\Controllers\Dashboard\Auth\AuthController;
use App\Http\Controllers\Dashboard\Auth\ForgotPasswordController;
use App\Http\Controllers\Dashboard\Auth\ResetPasswordController;
use App\Http\Controllers\Dashboard\BrandController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ContactController;
use App\Http\Controllers\Dashboard\CouponController;
use App\Http\Controllers\Dashboard\FaqController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\WorldController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(
    [
        'as' => 'dashboard.',
        'prefix' => LaravelLocalization::setLocale() . '/dashboard',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {
        Route::middleware('auth:admin')->group(function () {
            Route::get('/', fn() => view('dashboard.pages.index'))->name('home');

            //Role Routes
            ################################ Roles Routes ################################
            Route::group(['middleware' => 'can:roles'], function () {
                Route::resource('roles', RoleController::class);
            });
            ################################ End Roles ################################

            ################################ Admins Routes ############################
            Route::group(['middleware' => 'can:admins'], function () {
                Route::resource('admins', AdminController::class);
                Route::get('admins/{id}/status', [AdminController::class, 'changeStatus'])
                    ->name('admins.status');
            });
            ################################ End Admins ################################

            ############################ Shipping & Countries ##########################
            Route::group(['middleware' => 'can:global_shipping'], function () {
                Route::controller(WorldController::class)->group(function () {

                    Route::prefix('countries')->name('countries.')->group(function () {
                        Route::get('/', 'getAllCountries')->name('index');
                        Route::get('/{country_id}/governorates', 'getGovsByCountry')->name('governorates.index');
                        Route::get('/change-status/{country_id}', 'changeStatus')->name('status');
                    });

                    Route::prefix('governorates')->name('governorates.')->group(function () {
                        Route::get('/change-status/{gov_id}', 'changeGovStatus')->name('status');
                        Route::put('/shipping-price', 'changeShippingPrice')->name('shipping-price');
                    });
                });
            });
            ############################### End Shipping ###############################


            ############################### Category Routes ###############################
            Route::group(['middleware' => 'can:categories'], function () {
                Route::resource('categories', CategoryController::class)->except('show');
                Route::get('categories-all', [CategoryController::class, 'getAll'])
                    ->name('categories.all');
            });
            ############################### End categories ###############################

            ############################### Brands Routes ###############################
            Route::group(['middleware' => 'can:brands'], function () {
                Route::resource('brands', BrandController::class)->except('show');
                Route::get('brands-all', [BrandController::class, 'getAll'])
                    ->name('brands.all');
            });
            ############################### End Brands ###################################

            ############################### Coupons Routes ###############################
            Route::group(['middleware' => 'can:coupons'], function () {
                Route::resource('coupons', CouponController::class)->except('show');
                Route::get('coupons-all', [CouponController::class, 'getAll'])
                    ->name('coupons.all');
            });
            ############################### End Coupouns ###############################

            ############################### Faqs Routes ################################
            Route::group(['middleware' => 'can:faqs'], function () {
                Route::resource('faqs', FaqController::class);
                Route::get('faqs-all', [FaqController::class, 'getAll'])
                    ->name('faqs.all');
            });
            ############################### End Faqs ######################################

            ############################### Settings Routes ###############################
            Route::group(['middleware' => 'can:settings', 'as' => 'settings.'], function () {
                Route::get('settings', [SettingController::class, 'index'])->name('index');
                Route::put('settings/{id}', [SettingController::class, 'update'])->name('update');
            });
            ############################### End Settings ##################################

            ############################### Attributes Routes #############################
            Route::group(['middleware' => 'can:attributes'], function () {
                Route::resource('attributes', AttributeController::class);
                Route::get('attributes-all', [AttributeController::class, 'getAll'])
                    ->name('attributes.all');
            });
            ############################### End attributes ################################

            ############################### Products Routes ###############################
            Route::group(['middleware' => 'can:products'], function () {
                Route::resource('products', ProductController::class);
                Route::post('products/status', [ProductController::class, 'changeStatus'])
                    ->name('products.status');
                Route::get('products-all', [ProductController::class, 'getAll'])
                    ->name('products.all');

                //Variants
                Route::get('products/variants/{variant_id}', [ProductController::class, 'deleteVariant'])
                    ->name('products.variants.delete');
            });
            ############################### End products ################################
            ############################### Products Routes #############################
            Route::group(['middleware' => 'can:users'], function () {
                Route::resource('users', UserController::class);
                Route::post('users/status', [UserController::class, 'changeStatus'])
                    ->name('users.status');
                Route::get('users-all', [UserController::class, 'getAll'])
                    ->name('users.all');
            });
            ############################### End products ################################

            ############################### Contact Routes ##############################
            Route::group(['middleware' => 'can:contacts'], function () {
                Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index');
                Route::get('contacts-get/{id}', [ContactController::class, 'getContactById'])->name('contacts.get');
            });
            ############################### End Contacts ################################

//            Livewire::setUpdateRoute(function ($handle) {
//                return Route::post('/livewire/update', $handle);
//            });
        });

        //Auth Routes
        Route::controller(AuthController::class)->group(function () {
            Route::get('login', 'login')->name('login');
            Route::post('login', 'storeLogin')->name('login.store');
            Route::post('logout', 'logout')->middleware('auth:admin')->name('logout');
        });


        //Recover Password Routes
        Route::group(['prefix' => 'password', 'as' => 'password.'], function () {
            Route::controller(ForgotPasswordController::class)->group(function () {
                Route::get('email', 'showEmailForm')->name('email');
                Route::post('email', 'sendOtp')->name('email.post');
                Route::get('verify/{email}', 'showOtpForm')->name('verify');
                Route::post('verify/', 'verifyOtp')->name('verify.post');
            });

            Route::controller(ResetPasswordController::class)->group(function () {
                Route::get('reset/{email}/{code}', 'showResetForm')->name('reset');
                Route::post('reset', 'resetPassword')->name('reset.post');
            });
        });
    }
);