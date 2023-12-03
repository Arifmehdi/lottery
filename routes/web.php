<?php

use App\Models\User;
use App\Models\Yantra;
use App\Models\OldUser;
use App\Models\Playroom;
use App\Models\OldYantra;
use App\Models\OldPlayroom;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CronController;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {

    return redirect()->route('login');
});

Route::get('/user', function () {
    $data = OldUser::get();
    foreach ($data as $d){
        $newData = new User();
        $newData->phone = $d->name;
        $newData->username = $d->username;
        $newData->password = $d->password;
        $newData->balance = $d->balance;
        $newData->status = $d->status;
        $newData->role = $d->role;
        $newData->save();
    }
    return 'Done';
});
Route::get('/yantra', function () {
    $data = OldYantra::get();
    foreach ($data as $d){
        $newData = new Yantra();
        $newData->NV = $d->NV;
        $newData->RR = $d->RR;
        $newData->RY = $d->RY;
        $newData->CH = $d->CH;
        $newData->date = $d->date;
        $newData->time = $d->time;
        $newData->status = $d->status;
        $newData->save();
    }
    return 'Done Yantra Table';
});

Route::get('/playroom', function () {
    $data = OldPlayroom::get();
    foreach ($data as $d){
        // dd($d->user_id);
        $newData = new Playroom();
        $newData->user_id = $d->user_id;
        $newData->product_group = $d->product_group;
        $newData->t0 = $d->t0;
        $newData->t1 = $d->t1;
        $newData->t2 = $d->t2;
        $newData->t3 = $d->t3;
        $newData->t4 = $d->t4;
        $newData->t5 = $d->t5;
        $newData->t6 = $d->t6;
        $newData->t7 = $d->t7;
        $newData->t8 = $d->t8;
        $newData->t9 = $d->t9;
        $newData->qty = $d->qty;
        $newData->points = $d->points;
        $newData->date = $d->date;
        $newData->time = $d->time;
        $newData->save();
    }
    return 'Done Playroom Table';
});
Route::get('/cron-playroom',[CronController::class,'index'])->name('cron.playroom');

Auth::routes();

// Route::middleware(['auth', 'role:1'])->group(function () {
//     // dd('kasjdasjd');
//     Route::get('/admin/home', [HomeController::class, 'index'])->name('admin.home');
// });

// Route::middleware(['auth', 'role:0'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/result',[HomeController::class,'result'])->name('result');
    Route::get('/deposite',[HomeController::class,'deposite'])->name('deposite');
    Route::post('/ajax-captcha',[HomeController::class,'ajaxCaptcha'])->name('ajax.captcha');
    // });
    Route::get('/user-list',[HomeController::class,'user'])->name('user.list');



