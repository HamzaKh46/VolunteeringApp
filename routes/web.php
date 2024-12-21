<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminMainController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\MainUserController;
use App\Http\Controllers\User\UserMainController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FormContact;
use App\Http\Controllers\ProjectController;


use App\Http\Controllers\ContactController;
// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\WelcomePageController;

Route::get('/', [WelcomePageController::class, 'index'])->name('welcome');

use App\Http\Controllers\NonprofitController;

Route::get('/nonprofits/search', [NonprofitController::class, 'search'])->name('nonprofits.search');


use App\Http\Controllers\FundraiserController;

Route::get('/fundraiser/{nonprofitIdentifier}/{fundraiserIdentifier}', [FundraiserController::class, 'showFundraiserDetails']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    

    
});


//admin routes
Route::middleware(['auth', 'verified','rolemanager:admin'])->group(function () {
    Route::prefix('admin')->group(function(){
        Route::controller(AdminMainController::class)->group(function(){
            Route::get('/dashboard','index')->name('admin');
            
            Route::get('/settings','setting')->name('admin.settings');
            Route::get('/manage/user','manage_user')->name('admin.manage.user');
            Route::get('/manage/stores','manage_stores')->name('admin.manage.store');

        
        });
        Route::controller(UserController::class)->group(function(){
            Route::get('/user/create','index')->name('user.create');
            Route::get('/user/manage','manage')->name('user.manage');
        
        });

        Route::controller(NewsController::class)->group(function(){
            Route::get('/news/create','index')->name('news.create');
            Route::get('/news/manage','manage')->name('news.manage');
            Route::post('/store/news','store_news')->name('store.news');
            Route::get('/news/{id}','showNews')->name('show.news');
            Route::put('/news/update/{id}','updateNews')->name('update.news');
            Route::delete('/news/delete/{id}','deleteNews')->name('delete.news');
            
        
        });

        Route::controller(MainUserController::class)->group(function(){
            Route::post('/store/event','store_event')->name('store.event');
            Route::get('/user/{id}','showUser')->name('show.user');
            Route::put('/user/update/{id}','updateUser')->name('update.user');
            Route::delete('/user/delete/{id}','deleteUser')->name('delete.user');
        });

        Route::controller(CategoryController::class)->group(function(){
            Route::get('/category/create','index')->name('category.create');
            Route::get('/category/manage','manage')->name('category.manage');
            Route::post('/store/category','store_category')->name('store.category');
            Route::get('/category/{id}','showCategory')->name('show.category');
            Route::put('/category/update/{id}','updateCategory')->name('update.category');
            Route::delete('/category/delete/{id}','deleteCategory')->name('delete.category');
        
        });

        Route::resource('faqs', FaqController::class);
        Route::get('/faq/create', [FAQController::class, 'create'])->name('faq.create');
        Route::get('/faq/manage', [FAQController::class, 'index'])->name('faq.manage');

    
    });
   


});


// user routes
Route::middleware(['auth', 'verified','rolemanager:user'])->group(function () {
    Route::prefix('user')->group(function(){
        Route::controller(UserMainController::class)->group(function(){
            Route::get('/welcome','welcome')->name('welcome');
            Route::get('/dashboard','index')->name('dashboard'); 
            Route::get('/settings','edit')->name('settings');
            // Route::get('/profile', 'edit')->name('profile.edit');
            // Route::put('/profile',  'update')->name('profile.update');
            

        });   
    });
});


Route::middleware(['auth', 'verified','rolemanager:user'])->group(function () {
    Route::prefix('user')->group(function(){
        Route::controller(ProfileController::class)->group(function(){
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
            Route::get('/nonprofits/search', [NonprofitController::class, 'search'])->name('nonprofits.search');
            Route::get('/profile', [ProfileController::class, 'profile'])->name('profile_page');
            

        });   
    });
});

require __DIR__.'/auth.php';



// Route::middleware(['auth', 'verified','rolemanager:user'])->group(function () {
//     Route::prefix('user')->group(function(){
//         Route::controller(WelcomePageController::class)->group(function(){
//             Route::get('/welcome','index')->name('welcome');
            
                        
            
            
            
            

//         });   
//     });
// });


use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');



Route::get('/welcome', [WelcomePageController::class, 'index'])->name('welcome');
Route::get('/users', [WelcomePageController::class, 'showUsers'])->name('showUsers');
// Route::get('/', [NewsController::class, 'displayNews'])->name('newsDisplay');
Route::get('/news/{id}', [NewsController::class, 'showNew'])->name('show.new');

Route::get('/faq', [FaqController::class, 'showFaq'])->name('faq');





Route::post('/contact', [FormContact::class, 'send'])->name('contact.send');
Route::get('/emails/contact-form', [ContactController::class, 'getEmails'])->name('emails.contact-form');
Route::get('/contact', [FormContact::class, 'showForm'])->name('contact.form');

Route::get('/nonprofits/search', [NonprofitController::class, 'search'])->name('nonprofits.search');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
