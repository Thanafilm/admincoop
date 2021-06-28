<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OtherController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Facade\FlareClient\Api;
use GuzzleHttp\RetryMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

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

Auth::routes([
    'register' => false, // Register Routes...
    'reset' => false, // Reset Password Routes...
    'verify' => false, // Email Verification Routes...

]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/login/azure', [LoginController::class, 'loginazure'])->name('Login.Azure');
Route::get('/login/azurecallback', [LoginController::class, 'azurecallback']);
Route::get('/', function () {
    return redirect('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('writer')) {
            return redirect('/dashboard');
        } else {
            return redirect('/forbid');
        }
    });
    Route::get('/forbid', function () {
        if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('writer')  ) {
            return redirect('/dashboard');
        } else {
            return view('norole');
        }
    });
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/user/update/{id}', [UserController::class, 'updateRolesForm'])->name('UserROleForm');
        Route::post('/user/update/{id}', [UserController::class, 'updateRoles'])->name('usersRoleupdate');
        Route::get('/user/list', [UserController::class, 'listUser']);
    });
    Route::middleware(['role:admin|writer'])->group(function () {
        Route::post('/profile',[UserController::class,'updateprofile'])->name('Profile.Update');
        Route::get('/profile', [UserController::class,'updateprofileform'])->name('ProfileForm');
        Route::get('/dashboard', [OtherController::class, 'Dashboard'])->name('dashboard');
        Route::post('/ckupload', [NewsController::class, 'ckUpload'])->name('ck.upload');
        // Webpage Mangement
        Route::get('/coopdetail', [OtherController::class, 'Webpageform']);
        Route::post('/coopdetail', [OtherController::class, 'Webpage'])->name('home.setting');
        Route::post('/banner', [OtherController::class, 'postbanner'])->name('Banner.Post');
        Route::get('/banner', [OtherController::class, 'bannerform'])->name('Banner.Form');
        Route::delete('/banner/delete/{id}', [OtherController::class, 'deletebanner']);
        Route::get('/schedule/coop', [OtherController::class, 'scheduleForm']);
        Route::post('/schedule/coop', [OtherController::class, 'schedule'])->name('Schedule.Up');
        Route::post('/schedule/edu', [OtherController::class, 'edusche'])->name('Schedule2.Up');
        Route::get('/schedule/edu', [OtherController::class, 'eduForm'])->name('SchedulForm2');
        // News Mangement
        Route::get('/news/create', [NewsController::class, 'newsCreateForm']);
        Route::post('/news/create', [NewsController::class, 'newsCreate'])->name('Create.name');
        Route::get('/news/list', [NewsController::class, 'newsAll'])->name('news.listnews');
        Route::post('/news/update/{id}', [NewsController::class, 'newsUpdate'])->name('news.Update');
        Route::get('/news/update/{id}', [NewsController::class, 'newsUpdateForm'])->name('news.Update.Form');
        Route::get('/news/delete/{id}', [NewsController::class, 'newsDelete'])->name('news.Delete');
        //Category
        Route::get('/category/create', [OtherController::class, 'creatCategoryForm'])->name('Doc.Create.Form');
        Route::post('/category/create', [OtherController::class, 'creatCategory'])->name('Doc.Craete');
        Route::get('/category/list', [OtherController::class, 'listcategory']);
        Route::get('/category/update/{id}', [OtherController::class, 'updateCategoryForm'])->name('updateCateForm');
        Route::post('/category/update/{id}', [OtherController::class, 'updateCategory'])->name('updateCate');
        Route::get('/category/delete/{id}', [OtherController::class, 'deleteCategory'])->name('deleteCate');
        //Subcategory
        Route::post('/subcate/create', [OtherController::class, 'subcateCreate']);
        Route::get('/subcate/create', [OtherController::class, 'subcateCreateForm']);
        Route::get('/subcate/list', [OtherController::class, 'subcateList']);
        Route::get('/subcate/update/{id}', [OtherController::class, 'subcateupdateform'])->name('upDatesubcateForm');
        Route::post('/subcate/update/{id}', [OtherController::class, 'subcateupdate'])->name('upDatesubcate');
        Route::get('/subcate/delete/{id}', [OtherController::class, 'subcateDelete'])->name('deleteSubcate');
        //File Document
        Route::post('/filedoc/upload', [OtherController::class, 'uploadFiledoc']);
        Route::get('/filedoc/upload', [OtherController::class, 'upFileForm']);
        Route::get('/filedoc/list', [OtherController::class, 'listFiledoc']);
        Route::get('/listfiledoc/delete/{id}', [OtherController::class, 'fileDelete'])->name('file.Delete');
        Route::post('/filedoc/update/{id}', [OtherController::class, 'fileupdate'])->name('File.Update');
        Route::get('/filedoc/update/{id}', [OtherController::class, 'fileupdateform'])->name('File.Update.Form');
        Route::get('/getsubcategory/{id}', [OtherController::class, 'getsubcategory']);

        //Company
        Route::post('/company/create', [OtherController::class, 'companycreate'])->name('createcorp');
        Route::get('/company/create', [OtherController::class, 'companycreateform']);
        Route::get('/company/list', [OtherController::class, 'listCopmany']);
        Route::post('/company/update/{id}', [OtherController::class, 'editcompany'])->name('Company.Edit');
        Route::get('/company/update/{id}', [OtherController::class, 'editcompanyform'])->name('Company.Edit.Form');
        //Gallery
        Route::post('/gallery/news/creates/{id}', [OtherController::class, 'postGallynews'])->name('Gallery.Create.News');
        Route::post('/gallery/news/create/{id}', [OtherController::class, 'Newsgal'])->name('Gallery.Create.News.Form');
        Route::post('/gallery/create', [OtherController::class, 'postGally'])->name('Gallery.Create');
        Route::get('/gallery/create', [OtherController::class, 'FormGallery']);
        Route::get('/gallery/list', [OtherController::class, 'listGall']);
        Route::post('/gallery/update/{id}', [OtherController::class, 'updateGallery'])->name('Gallery.Update');
        Route::get('/gallery/update/{id}', [OtherController::class, 'updateGalForm']);
        Route::delete('/gallery/delete/{id}', [OtherController::class, 'galDelete'])->name("Gallery.Delete");
        Route::delete('/image/delete/{id}', [OtherController::class, 'delImg']);
    });
});
