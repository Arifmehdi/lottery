<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Yantra;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

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

    public function user(Request $request)
    {
        $users = User::get();
        if ($request->ajax()) {
            // dd($users);
            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('DT_RowIndex', function ($user) {
                    return $user->id; // Use any unique identifier for your rows
                })
                ->editColumn('username', function ($row) {
                    return '<input type="text" name="username[]" placeholder="Username" value="'. $row->username .'">';
                })
                ->editColumn('phone', function ($row) {
                    return '<input type="text" name="name[]" placeholder="" value="'. $row->phone .'">';
                })
                ->editColumn('password', function ($row) {
                    return '<input type="password" name="password[]" placeholder="Password"> <input type="hidden" name="id[]" value="{{$user->id}}">';
                })
                ->editColumn('balance', function ($row) {
                    return '<input type="text" name="balance[]" placeholder="Balance" value="'. $row->balance .'">';
                })
                ->editColumn('status', function ($row) {
                    return ($row->status == 1) ? 'Verified' : 'Unverified' ;
                })
                ->addColumn('is_admin', function ($row) {
                    return ($row->role == 1) ?  '<input type="checkbox" name="admin[]" checked>' :  '<input type="checkbox" name="admin[]">';
                })

                ->addColumn('action', function ($row) {
                     $html ='<div class="action-btn-div">
                    <button class="action-btn" name="updateuser">Update</button>
                    <a class="action-btn" onclick="deleteUser({{$user->id}})">Delete</a>
                </div>';
                return $html;
                })

                ->rawColumns(['action', 'username', 'phone', 'password', 'balance', 'status','is_admin'])
                ->make(true);
        }
        return view('admin.user');
    }
}
