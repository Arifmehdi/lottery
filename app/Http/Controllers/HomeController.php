<?php

namespace App\Http\Controllers;

use App\Models\Yantra;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['result','ajaxCaptcha']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $current_time = date('H:i');
        // $hour = date('G');
        // $minute = date('i');
        // $quarter = floor($minute / 16);

        // if ($quarter == 4) {
        //     $hour++;
        //     $quarter = 0;
        // } else {
        //     $quarter++;
        // }

        // $formatted_time = $hour . ':' . str_pad($quarter * 15, 2, '0', STR_PAD_LEFT);



        // $current_time = date('H:i');
        // $hour = date('G');
        // $minute = date('i');
        // $quarter = floor($minute / 16);

        // if ($quarter == 4) {
        //     $hour++;
        //     $quarter = 0;
        // }



        // $current_date = date('d-m-Y');
        // $formatted_timelast = sprintf('%02d', $hour) . ':' . str_pad($quarter * 15, 2, '0', STR_PAD_LEFT);



        $current_time = date('H:i');
        $hour = date('G');
        $minute = date('i');
        $quarter = floor($minute / 15);

        if ($quarter == 4) {
            $hour++;
            $quarter = 0;
        }



        $current_date = date('d-m-Y');
        $formatted_timelast = sprintf('%02d', $hour) . ':' . str_pad($quarter * 15, 2, '0', STR_PAD_LEFT);

        $row1 = Yantra::where('time', $formatted_timelast)
        ->where('date', $current_date)
        ->orderByDesc('id')
        ->first();

        $timeToDisplay = $row1 ? $row1->time : $formatted_timelast;
                // dd($formatted_timelast);

        return view('home',compact('row1','timeToDisplay'));
    }

    public function result(Request $request)
    {

        // include_once 'includes/connection.php';


        // if (isset($_GET['date'])) {
        //     $date = $_GET['date'];
        //     $date = date("d-m-Y", strtotime($date));
        // } else {
        //     $date = date('d-m-Y');
        // }
        //marif start

        // $select = "SELECT * FROM yantra WHERE date = '$date' and status='1'" ;
        // $query = mysqli_query($conn, $select);


        $date = date('d-m-Y');
        $yantra_datas= Yantra::where('date',$date)->where('status',1)->get();
// dd($yantra_datas);
        return view('result', compact('yantra_datas'));
    }

    public function deposite()
    {
        return view('Userroom.deposite');
    }

    public function ajaxCaptcha(Request $request)
    {
        // $chars = 'NAVRATNACOUPON0123456789';
        // $length = 5;
        // $random_text = '';
        // for ($i = 0; $i < $length; $i++) {
        //     $random_text .= $chars[rand(0, strlen($chars) - 1)];
        // }

        $length = 5;
        $length = max(2, $length);
        $reservedLetter = Str::random(1, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ');
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $randomString = $reservedLetter . Str::random($length - 1, str_shuffle($characters));

        return strtoupper($randomString);
    }
}
