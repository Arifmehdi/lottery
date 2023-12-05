<?php

use App\Models\User;
use App\Models\Yantra;
use App\Models\Deposit;
use App\Models\OldUser;
use App\Models\Playroom;
use App\Models\Withdraw;
use App\Models\OldYantra;
use App\Models\OldDeposit;
use App\Models\OldPlayroom;
use App\Models\OldWithdraw;
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

Route::get('/playroom-table', function () {
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

Route::get('/deposit-table', function () {
    $data = OldDeposit::get();
    foreach ($data as $d){
        $newData = new Deposit();
        $newData->user_id = $d->user_id;
        $newData->amount = $d->amount;
        $newData->payment_id = $d->payment_id;
        $newData->payment_method = $d->payment_method;
        $newData->date = $d->date;
        $newData->status = $d->status;
        $newData->save();
    }
    return 'Done Deposit Table';
});

Route::get('/withdraw-table', function () {
    $data = OldWithdraw::get();
    foreach ($data as $d){
        $newData = new Withdraw();
        $newData->user_id = $d->user_id;
        $newData->amount = $d->amount;
        $newData->wallet = $d->wallet;
        $newData->payment_method = $d->payment_method;
        $newData->date = $d->date;
        $newData->status = $d->status;
        $newData->save();
    }
    return 'Done Withdraw Table';
});


Route::get('/cron-playroom',[CronController::class,'index'])->name('cron.playroom');

Auth::routes();

// Route::middleware(['auth', 'role:1'])->group(function () {
//     // dd('kasjdasjd');
//     Route::get('/admin/home', [HomeController::class, 'index'])->name('admin.home');
// });

// Route::middleware(['auth', 'role:0'])->group(function () {
    Route::get('/playroom', [HomeController::class, 'index'])->name('home');
    Route::get('/result',[HomeController::class,'result'])->name('result');
    Route::get('/deposite',[HomeController::class,'deposite'])->name('deposite');
    Route::post('/ajax-captcha',[HomeController::class,'ajaxCaptcha'])->name('ajax.captcha');
    Route::get('/function',[HomeController::class,'functional'])->name('functional');
    Route::get('/report',[HomeController::class,'report'])->name('report');
    Route::get('/user/deposit',[HomeController::class,'userDeposit'])->name('user.deposit');
    Route::post('/user/create/deposit',[HomeController::class,'createDeposit'])->name('user.create.deposit');
    Route::get('/user/deposit-history',[HomeController::class,'userDepositHistory'])->name('user.deposit.history');
    Route::get('/user/withdraw',[HomeController::class,'userWithdraw'])->name('user.withdraw');
    Route::post('/user/create/withdraw',[HomeController::class,'createWithdraw'])->name('user.create.withdraw');
    // Route::get('/user/deposit-history',[HomeController::class,'userDepositHistory'])->name('user.deposit.history');

    Route::get('/admin/user',[HomeController::class,'user'])->name('user.list');
    Route::get('/admin/deposit',[HomeController::class,'adminDeposit'])->name('admin.deposit');
    Route::get('/admin/withdraw',[HomeController::class,'adminWithdraw'])->name('admin.withdraw');
    Route::get('/admin/result',[HomeController::class,'adminResult'])->name('admin.result');
    Route::get('/BuyTicket',[HomeController::class,'adminBuyTicket'])->name('admin.buyTicket');

// });



