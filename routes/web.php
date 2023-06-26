<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\ExtraSitesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LegislationController;
use App\Http\Controllers\DecisionController;
use App\Http\Controllers\InquirieController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SiteMapController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StudyController;
use App\Http\Controllers\VedioNewsController;
use App\Http\Controllers\YearlyReportController;
use App\Http\Livewire\DesisionPageComponent;
use App\Http\Livewire\LegislationPageComponent;
use App\Http\Livewire\NewsPageComponent;
use App\Http\Livewire\StudyPageComponent;

Auth::routes(['register' => false]);

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/about', [HomeController::class,'about'])->name('about');
Route::get('/show_news', NewsPageComponent::class)->name('show_news');
Route::get('/news_details/{id}', [HomeController::class,'index'])->name('news_details');
Route::get('/show_studies', StudyPageComponent::class)->name('show_studies');
Route::get('/show_legislations', LegislationPageComponent::class)->name('show_legislations');
Route::get('/show_desisions', DesisionPageComponent::class)->name('show_desisions');
Route::get('/show_yearly_report', [HomeController::class,'index'])->name('show_yearly_report');
Route::get('/show_study', [HomeController::class,'index'])->name('show_study');
Route::get('/show_branches', [HomeController::class,'branches'])->name('show_branches');
Route::get('/complaint_report', [HomeController::class,'complaint_report'])->name('complaint_report');
Route::get('/report_form', [HomeController::class,'report_form'])->name('report_form');
Route::post('/save_inquire', [InquirieController::class,'store'])->name('save_inquire');

Route::prefix('admin')->middleware(['auth','CheckRole:ADMIN','ActiveAccount'])->name('admin.')->group(function () {
    Route::get('/', [AdminController::class,'index'])->name('index');


    //Route::get('/profile',[AdminController::class,'upload_image']);
    
    Route::resource('articles', ArticleController::class);
    Route::prefix('upload')->name('upload.')->group(function () {
        Route::post('/image', [HelperController::class,'upload_image'])->name('image');
        Route::post('/file', [HelperController::class,'upload_file'])->name('file');
        Route::post('/remove-file', [HelperController::class,'remove_files'])->name('remove-file');
    });
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class,'index'])->name('index');
        Route::get('/edit', [ProfileController::class,'edit'])->name('edit');
        Route::put('/update', [ProfileController::class,'update'])->name('update');
        Route::put('/update-password', [ProfileController::class,'update_password'])->name('update-password');
        Route::put('/update-email', [ProfileController::class,'update_email'])->name('update-email');
    });
    Route::prefix('notifications')->name('notifications.')->group(function () {
        Route::get('/', [NotificationsController::class,'index'])->name('index');
        Route::get('/ajax', [NotificationsController::class,'notifications_ajax'])->name('ajax');
        Route::post('/see', [NotificationsController::class,'notifications_see'])->name('see');
    });
    Route::prefix('settings')->name('settings.')->group(function () {
        Route::get('/', [SettingController::class,'index'])->name('index');
        Route::put('/update', [SettingController::class,'update'])->name('update');
    });
    Route::prefix('branches')->name('branches.')->group(function () {
        Route::get('/', [BranchController::class,'index'])->name('index');
        Route::get('/create', [BranchController::class,'create'])->name('create');
        Route::get('/edit/{id}', [BranchController::class,'edit'])->name('edit');
        Route::post('/store', [BranchController::class,'store'])->name('store');
        Route::put('/update/{id}', [BranchController::class,'update'])->name('update');
        Route::get('/delete/{id}', [BranchController::class,'destroy'])->name('delete');
    });
    Route::prefix('categories')->name('categories.')->group(function () {
        Route::get('/', [CategoryController::class,'index'])->name('index');
        Route::get('/create', [CategoryController::class,'create'])->name('create');
        Route::get('/edit/{id}', [CategoryController::class,'edit'])->name('edit');
        Route::post('/store', [CategoryController::class,'store'])->name('store');
        Route::put('/update/{id}', [CategoryController::class,'update'])->name('update');
        Route::get('/delete/{id}', [CategoryController::class,'destroy'])->name('delete');
    });
    Route::prefix('news')->name('news.')->group(function () {
        Route::get('/', [NewsController::class,'index'])->name('index');
        Route::get('/create', [NewsController::class,'create'])->name('create');
        Route::get('/edit/{id}', [NewsController::class,'edit'])->name('edit');
        Route::post('/store', [NewsController::class,'store'])->name('store');
        Route::put('/update/{id}', [NewsController::class,'update'])->name('update');
        Route::get('/delete/{id}', [NewsController::class,'destroy'])->name('delete');
        Route::get('/delete_doc/{id}', [NewsController::class,'delete_doc'])->name('delete_doc');
    });
    Route::prefix('yearlyreports')->name('yearlyreports.')->group(function () {
        Route::get('/', [YearlyReportController::class,'index'])->name('index');
        Route::get('/create', [YearlyReportController::class,'create'])->name('create');
        Route::get('/edit/{id}', [YearlyReportController::class,'edit'])->name('edit');
        Route::post('/store', [YearlyReportController::class,'store'])->name('store');
        Route::put('/update/{id}', [YearlyReportController::class,'update'])->name('update');
        Route::get('/delete/{id}', [YearlyReportController::class,'destroy'])->name('delete');
    });
    Route::prefix('descisions')->name('descisions.')->group(function () {
        Route::get('/', [DecisionController::class,'index'])->name('index');
        Route::get('/create', [DecisionController::class,'create'])->name('create');
        Route::get('/edit/{id}', [DecisionController::class,'edit'])->name('edit');
        Route::post('/store', [DecisionController::class,'store'])->name('store');
        Route::put('/update/{id}', [DecisionController::class,'update'])->name('update');
        Route::get('/delete/{id}', [DecisionController::class,'destroy'])->name('delete');
    });
    Route::prefix('legislation')->name('legislation.')->group(function () {
        Route::get('/', [LegislationController::class,'index'])->name('index');
        Route::get('/create', [LegislationController::class,'create'])->name('create');
        Route::get('/edit/{id}', [LegislationController::class,'edit'])->name('edit');
        Route::post('/store', [LegislationController::class,'store'])->name('store');
        Route::put('/update/{id}', [LegislationController::class,'update'])->name('update');
        Route::get('/delete/{id}', [LegislationController::class,'destroy'])->name('delete');
    });
    Route::prefix('study')->name('study.')->group(function () {
        Route::get('/', [StudyController::class,'index'])->name('index');
        Route::get('/create', [StudyController::class,'create'])->name('create');
        Route::get('/edit/{id}', [StudyController::class,'edit'])->name('edit');
        Route::post('/store', [StudyController::class,'store'])->name('store');
        Route::put('/update/{id}', [StudyController::class,'update'])->name('update');
        Route::get('/delete/{id}', [StudyController::class,'destroy'])->name('delete');
    });
    Route::prefix('vedionews')->name('vedionews.')->group(function () {
        Route::get('/', [VedioNewsController::class,'index'])->name('index');
        Route::get('/create', [VedioNewsController::class,'create'])->name('create');
        Route::get('/edit/{id}', [VedioNewsController::class,'edit'])->name('edit');
        Route::post('/store', [VedioNewsController::class,'store'])->name('store');
        Route::put('/update/{id}', [VedioNewsController::class,'update'])->name('update');
        Route::get('/delete/{id}', [VedioNewsController::class,'destroy'])->name('delete');
    });
    Route::prefix('extrasites')->name('extrasites.')->group(function () {
        Route::get('/', [ExtraSitesController::class,'index'])->name('index');
        Route::get('/create', [ExtraSitesController::class,'create'])->name('create');
        Route::get('/edit/{id}', [ExtraSitesController::class,'edit'])->name('edit');
        Route::post('/store', [ExtraSitesController::class,'store'])->name('store');
        Route::put('/update/{id}', [ExtraSitesController::class,'update'])->name('update');
        Route::get('/delete/{id}', [ExtraSitesController::class,'destroy'])->name('delete');
    });
    Route::prefix('inquiries')->name('inquiries.')->group(function () {
        Route::get('/', [InquirieController::class,'index'])->name('index');
        Route::get('/create', [InquirieController::class,'create'])->name('create');
        Route::get('/edit/{id}', [InquirieController::class,'edit'])->name('edit');
        Route::post('/store', [InquirieController::class,'store'])->name('store');
        Route::put('/update/{id}', [InquirieController::class,'update'])->name('update');
        Route::get('/delete/{id}', [InquirieController::class,'destroy'])->name('delete');
    });
    Route::prefix('complaints')->name('complaints.')->group(function () {
        Route::get('/', [ComplaintController::class,'index'])->name('index');
        Route::get('/create', [ComplaintController::class,'create'])->name('create');
        Route::get('/edit/{id}', [ComplaintController::class,'edit'])->name('edit');
        Route::post('/store', [ComplaintController::class,'store'])->name('store');
        Route::put('/update/{id}', [ComplaintController::class,'update'])->name('update');
        Route::get('/delete/{id}', [ComplaintController::class,'destroy'])->name('delete');
    });
});


Route::get('blocked', [HelperController::class,'blocked_user'])->name('blocked');
Route::get('robots.txt', [HelperController::class,'robots']);
Route::get('manifest.json', [HelperController::class,'manifest']);
Route::get('sitemap.xml', [SiteMapController::class,'sitemap']);
Route::get('sitemaps/{name}/{page}/sitemap.xml', [SiteMapController::class,'viewer']);