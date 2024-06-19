<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pcregisterController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\CheckInactiveUser;
use App\Http\Controllers\Auth\ForgotPasswordController;

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



// Example usage in routes

use App\Http\Controllers\UserController;
// Default route
Route::get('/', function () {
    return view('auth.login');
});

// Authenticated routes with session verification
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });


// Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
// Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
// Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
// Route::post('/reset-password', [ForgotPasswordController::class, 'reset'])->name('password.update');



route::get('redirect',[HomeController::class,'redirect']);
// Authenticated routes with session timeout and verification
Route::middleware([
    'auth',
    'auth:sanctum',
    config('jetstream.auth_session'),
    'throttle:300,30',
    'web',
    'verified',
    'usertype:0'
    

])->group(function () {
    Route::get('/register/pc/owners', [pcregisterController::class, 'create'])->name('pcregisters.create');
    Route::post('/register/pc/owners', [pcregisterController::class, 'create'])->name('pcregisters.create');
    Route::post('/pcregisters/showpc', [pcregisterController::class, 'store'])->middleware('auth')->name('pcregisters.store');
    Route::get('/pcregisters/showpc', [pcregisterController::class, 'store'])->middleware('auth')->name('pcregisters.store');
   
    Route::get('/ud-operation', [pcregisterController::class, 'index'])->name('pcregisters.index');
    Route::post('/scanResult', [PcregisterController::class, 'searchUser'])->name('pcregisters.searchUser');
    Route::get('/delete/{id}', [PcregisterController::class, 'delete_pcregister'])->name('pcregisters.delete_pcregister');
    Route::get('edit/{id}', [PcregisterController::class, 'edit_pcregister'])->name('pcregisters.edit_pcregister');
    Route::post('edit/', [PcregisterController::class, 'update'])->name('pcregisters.update');

    Route::post('/ud-operation', [pcregisterController::class, 'index'])->name('pcregisters.index');

    Route::get('/scanResult', [PcregisterController::class, 'searchUser'])->name('pcregisters.searchUser');
    Route::post('/delete/{id}', [PcregisterController::class, 'delete_pcregister'])->name('pcregisters.delete_pcregister');
    Route::post('edit/{id}', [PcregisterController::class, 'edit_pcregister'])->name('pcregisters.edit_pcregister');
    Route::get('edit/', [PcregisterController::class, 'update'])->name('pcregisters.update');
    Route::post('/set-rows-per-page', [PcregisterController::class, 'setRowsPerPage'])->name('setRowsPerPage');
    Route::get('/set-rows-per-page', [PcregisterController::class, 'setRowsPerPage'])->name('setRowsPerPage');
    Route::get('/pcregisters', [PcregisterController::class, 'index'])->name('pcregisters.index');
    Route::post('/pcregisters/filter', [PcregisterController::class,'filterByDescription'])->name('pcregisters.filterByDescription');


    Route::get('/download-file', [PcregisterController::class, 'download'])->name('download.file');
    Route::post('/pcregisters/search-update', [PcregisterController::class, 'searchUpdate'])->name('pcregisters.searchUpdate');
    Route::get('/pcregisters/scanQrCode', [pcregisterController::class, 'searchbyqr'])->name('pcregisters.searchbyqr');
    
    Route::post('/download-file', [PcregisterController::class, 'download'])->name('download.file');
    Route::get('/pcregisters/search-update', [PcregisterController::class, 'searchUpdate'])->name('pcregisters.searchUpdate');
    Route::post('/pcregisters/scanQrCode', [pcregisterController::class, 'searchbyqr'])->name('pcregisters.searchbyqr');
    

    Route::get('/qrcode_result', [PcregisterController::class, 'qr_result'])->name('qr_result');
    Route::post('/qrcode_result', [PcregisterController::class, 'qr_result'])->name('qr_result');
    

    Route::get('/scanBarcode', [PcregisterController::class, 'searchbyqr'])->name('pcregisters.searchbyqr');
    Route::post('/scanBarcode', [PcregisterController::class, 'qr_result'])->name('download.qr_result');
   
    Route::get('download-qr-code', [PcregisterController::class, 'downloadQRCode'])->name('downloadQRCode');
    Route::get('download-barcode', [PcregisterController::class, 'downloadBarCode'])->name('downloadBarCode');
    Route::get('download-code', [PcregisterController::class, 'downloadBothCode'])->name('downloadBothCode');

    Route::post('download-qr-code', [PcregisterController::class, 'downloadQRCode'])->name('downloadQRCode');
    Route::post('download-barcode', [PcregisterController::class, 'downloadBarCode'])->name('downloadBarCode');
    Route::post('download-code', [PcregisterController::class, 'downloadBothCode'])->name('downloadBothCode');


    Route::get('barcodeSearch', [PcregisterController::class, 'searchBarcode'])->name('pcregisters.searchBarcode');
    Route::post('barcodeSearch', [PcregisterController::class, 'searchBarcode'])->name('pcregisters.searchBarcode');


});

Route::middleware([
    'auth',
    'auth:sanctum',
    config('jetstream.auth_session'),
    'throttle:300,30',
    'web',
    'verified',
    'usertype:2'
    

])->group(function () {
    Route::get('AccessDenied', [PcregisterController::class, 'accessDenied'])->name('accessDenied');
    Route::post('AccessDenied', [PcregisterController::class, 'accessDenied'])->name('accessDenied');
});


Route::middleware(['auth', 'auth:sanctum',
config('jetstream.auth_session'),'throttle:100,30','web','usertype:1'])->group(function () {
Route::get('/task',[adminController::class,'task'])->name('admin.task');
Route::get('/security', [adminController::class, 'security'])->name('security');
Route::get('/component', [adminController::class, 'component'])->name('component');
Route::get('/permission', [adminController::class, 'permission'])->name('admin.permisson');
Route::post('/admin/update', [adminController::class, 'update'])->name('admin.update');

Route::post('/admin/searchUser', [adminController::class, 'searchUser'])->name('admin.searchUser');
Route::get('/register', function () {
    return view('auth.register');
});

Route::post('/register', [adminController::class, 'create'])->name('users.create');
Route::get('userDetails',[adminController::class,'details'])->name('pcUser.view');
Route::post('userDetails',[adminController::class,'details'])->name('pcUser.view');

Route::get('searchedUser',[adminController::class,'search'])->name('search.view');
Route::post('searchedUser',[adminController::class,'search'])->name('search.view');

Route::get('searchedSecurity',[adminController::class,'searchSecurity'])->name('search.security');
Route::post('searchedSecurity',[adminController::class,'searchSecurity'])->name('search.security');


Route::post('/task',[adminController::class,'task'])->name('admin.task');
Route::post('/security', [adminController::class, 'security'])->name('security');
Route::post('/component', [adminController::class, 'component'])->name('component');
Route::post('permission', [adminController::class, 'permission'])->name('admin.permisson');
Route::get('/admin/update', [adminController::class, 'update'])->name('admin.update');

Route::get('/ungrantedUsers',[adminController::class,'ungranted'] )->name('admin.ungranted');
Route::post('/ungrantedUsers',[adminController::class,'ungranted'] )->name('admin.ungranted');

Route::get('/grantedUsers',[adminController::class,'granted'] )->name('admin.granted');
Route::post('/grantedUsers',[adminController::class,'granted'] )->name('admin.granted');

Route::get('/student',[adminController::class,'student'] )->name('admin.student');
Route::post('/student',[adminController::class,'student'] )->name('admin.student');

Route::get('/staff',[adminController::class,'staff'] )->name('admin.staff');
Route::post('/staff',[adminController::class,'staff'] )->name('admin.staff');

Route::get('/guest',[adminController::class,'guest'] )->name('admin.guest');
Route::post('/guest',[adminController::class,'guest'] )->name('admin.guest');

Route::post('/admin/searchUser', [adminController::class, 'searchUser'])->name('admin.searchUser');



Route::get('/check-email/{email}', 'adminController@checkEmail')->name('check-email');


Route::get('/permission/update/{id}', [adminController::class, 'permission_update'])->name('admin.permisson_update');
Route::post('/permission/update/{id}', [adminController::class, 'permission_update'])->name('admin.permisson_update');
Route::get('/permission/delete/{id}', [adminController::class, 'permission_delete'])->name('admin.permisson_delete');
Route::post('/permission/delete/{id}', [adminController::class, 'permission_delete'])->name('admin.permisson_delete');



});



