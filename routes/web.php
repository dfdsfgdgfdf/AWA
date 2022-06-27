<?php

use \Backend\AboutController;
use App\Http\Controllers\Backend\BackendController;
use \Backend\ProjectDetailsController;
use \Backend\LocationController;
use \Backend\PageTitleController;
use \Backend\ContactMessageController;
use \Backend\HomeServiceController;
use \Backend\HomeProjectController;
use \Backend\HomeSliderController;
use \Backend\EmailController;
use \Backend\PhoneController;
use \Backend\SocialMediaController;
use \Backend\AdminController;
use \Backend\UserController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
//دا علشان يبغت ايميل تاكيد عند التسجيل
Auth::routes(['verify'=>true]);

Route::get('/admin', function () {
    return redirect('login');
});

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/',         [FrontendController::class, 'index'   ])->name('frontend.index');
Route::get('/our-work',     [FrontendController::class, 'ourWork'    ])->name('frontend.our-work');
Route::get('/about-us',   [FrontendController::class, 'aboutUs'  ])->name('frontend.about-us');
Route::get('/contact',   [FrontendController::class, 'contact'  ])->name('frontend.contact');
Route::post('/contact/send-contact-message',   [FrontendController::class, 'sendContactMessage'  ])->name('frontend.send-contact-message');
Route::post('/send-message',   [FrontendController::class, 'sendMessage'  ])->name('frontend.send-message');
Route::get('/project-details/{projectDetail}',   [FrontendController::class, 'projectDetails'  ])->name('frontend.project-details');
Route::get('/homeServices/{service}',   [FrontendController::class, 'homeServices'  ]);


//==========================================================================================================
//================================= Admin Dashboard  =======================================================
//==========================================================================================================
Route::group(['prefix' => 'admin', 'as'=>'admin.' ], function(){

    Route::group(['middleware' => 'guest' ], function(){

        Route::get('/login',               [BackendController::class, 'login'    ])->name('login');
        Route::get('/forget_password',     [BackendController::class, 'forget_password'])->name('forget_password');
    });

    //==========================================================================================================
    Route::group(['middleware' => ['roles', 'role:superAdmin|admin'] ], function(){

        Route::get('/',               [BackendController::class, 'index'    ])->name('index_route');
        Route::get('/index',          [BackendController::class, 'index'    ])->name('index');

        Route::resource('admins'    ,AdminController::class);
        Route::post('/admins/removeImage', 'Backend\AdminController@removeImage')->name('admins.removeImage');

        Route::resource('users'     ,UserController::class);
        Route::post('/users/removeImage', 'Backend\UserController@removeImage')->name('users.removeImage');


        #######################################################################################################################
        #######################################################  2022 #########################################################
        #######################################################################################################################

        //our-work
        Route::group(['prefix' => 'our-work', 'as'=>'our-work.' ], function(){
            //projectDetails
            Route::resource('projectDetails',ProjectDetailsController::class);
            Route::post('/projectDetails/removeImages', 'Backend\ProjectDetailsController@removeImages')->name('projectDetails.removeImages');
            Route::post('/projectDetails/removeImage', 'Backend\ProjectDetailsController@removeImage')->name('projectDetails.removeImage');
        });

        //Home
        Route::resource('sliders',HomeSliderController::class);
        Route::post('/sliders/removeImage', 'Backend\HomeSliderController@removeImage')->name('sliders.removeImage');

        Route::resource('projects',HomeProjectController::class);
        Route::post('/projects/removeImage', 'Backend\HomeProjectController@removeImage')->name('projects.removeImage');

        Route::resource('services',HomeServiceController::class);
        Route::post('/services/removeImage', 'Backend\HomeServiceController@removeImage')->name('services.removeImage');

        /////////////////////

        //Settings
        Route::resource('page-titles',PageTitleController::class);
        Route::resource('locations',LocationController::class);


        //abouts
        Route::resource('abouts',AboutController::class);
        Route::post('/abouts/removeImages', 'Backend\AboutController@removeImages')->name('abouts.removeImages');
        Route::post('/abouts/removeImage', 'Backend\AboutController@removeImage')->name('abouts.removeImage');

        //socials
        Route::resource('socials',SocialMediaController::class);
        Route::resource('phones',PhoneController::class);
        Route::resource('emails',EmailController::class);
        Route::resource('contact-messages',ContactMessageController::class);
        Route::get('/get-contact-messages-notifications',   'Backend\ContactMessageController@numberMessage');

    });

});










//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});
