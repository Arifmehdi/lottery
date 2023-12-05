<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Yantra;
use App\Models\Deposit;
use App\Models\Playroom;
use App\Models\Withdraw;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

    public function functional(Request $request)
    {
        if ($request->action == 'buy_ticket') {
            $user_id = Auth::id();
            $date = date('d-m-Y');
            $time = date('H:i');

            $productGroups = array('NV', 'RR', 'RY', 'CH');
            $totalQty = array(0, 0, 0, 0);
            $totalPoints = array(0, 0, 0, 0);
            $tvalues = $request->tValues;

            foreach( $tvalues as $i => $t)
            {
                if ($t !== null )
                {
                    $rowNumber = floor($i / 10);
                    $totalQty[$rowNumber] += intval($t);
                    $totalPoints[$rowNumber] += intval($t) * 11;
                }

            }
            // for ($i = 0; $i < 40; $i++) {
                //     // $t = $_REQUEST['t' . $i];
                //     $t = $tvalues;
                //     $rowNumber = floor($i / 10);
                //     $totalQty[$rowNumber] += intval($t);
                //     $totalPoints[$rowNumber] += intval($t) * 11;
                // }
                // $balance = mysqli_fetch_array(mysqli_query($conn, "SELECT balance FROM user WHERE id = '$user_id'"))['balance'];


                $balance = User::where('id',$user_id)->first()->balance;

                $total_points = array_sum($totalPoints);

                // dd($balance ,$totalPoints,$totalQty,$tvalues, $total_points);
                // dd($request->action,$date,$time,$productGroups,$totalQty,$totalPoints);
            // if ($balance >= $total_points) {
            //     for ($j = 0; $j < 4; $j++) {
            //         $product_group = $productGroups[$j];
            //         $qty = $totalQty[$j];
            //         $points = $totalPoints[$j];

            //         $insert = "INSERT INTO playroom (user_id, product_group, t0, t1, t2, t3, t4, t5, t6, t7, t8, t9, qty, points, date, time) VALUES ('$user_id', '$product_group'";

            //         for ($k = 0; $k < 10; $k++) {
            //             $t = $_REQUEST['t' . ($j * 10 + $k)];
            //             $insert .= ", '$t'";
            //         }

            //         $insert .= ", '$qty', '$points', '$date', '$time')";
            //         mysqli_query($conn, $insert);
            //     }

            //     $balance = $balance - $total_points;
            //     mysqli_query($conn, "UPDATE user SET balance = '$balance' WHERE id = '$user_id'");

            //     header('location:BuyTicket.php');
            //     $_SESSION['result'] = 'True';
            // } else {
            //     header('location:playroom.php?error=Your balance is low.');
            // }


            if ($balance >= $total_points) {
                for ($j = 0; $j < 4; $j++) {
                    $product_group = $productGroups[$j];
                    $qty = $totalQty[$j];
                    $points = $totalPoints[$j];

                    $insertData = [
                        'user_id' => $user_id,
                        'product_group' => $product_group,
                        'qty' => $qty,
                        'points' => $points,
                        'date' => $date,
                        'time' => $time,
                    ];

                    for ($k = 0; $k < 10; $k++) {
                        // $t = request()->input('t' . ($j * 10 + $k));
                        $t = $tvalues[($j * 10 + $k)];
                        // dd($t);
                        $insertData['t' . $k] = $t;
                    }

                    Playroom::create($insertData);
                }

                $balance = $balance - $total_points;

                $user_balance = User::where('id', $user_id)->update(['balance' => $balance]);
                // return redirect()->route('admin.buyTicket')->with('result', 'True');
                $response = [
                    'redirect' => route('admin.buyTicket'),
                    'result' => 'True',
                ];

                return response()->json($response);
            } else {
                return redirect()->route('playroom')->with('error', 'Your balance is low.');
            }
        }
        dd('ok rek');
    }

    public function adminDeposit(Request $request)
    {
        // if (isset($_GET['date'])) {
        //     $date = $_GET['date'];
        //     $date = date('d-m-Y', strtotime($date));
        // } else {
        //     $date = date('d-m-Y');
        // }
        // // $select = "SELECT * FROM deposit WHERE date = '$date' && status = '0'";



        $date = date('d-m-Y');

        if ($request->ajax()) {
            $date = $_GET['date'];
        }
        $deposits = Deposit::where('date',$date)->where('status',0)->get();

        $user = User::where('id',Auth::id())->first();
        // dd($deposits);
        return view('admin.deposit', compact('user','deposits'));
    }

    public function adminWithdraw(Request $request)
    {
        $date = date('d-m-Y');

        if ($request->ajax()) {
            $date = $_GET['date'];
        }
        $Withdraws = Withdraw::where('date',$date)->where('status',0)->get();

        $user = User::where('id',Auth::id())->first();
        // dd($deposits);
        return view('admin.withdraw', compact('user','Withdraws'));
    }

    public function adminResult(Request $request)
    {
        $date = date('d-m-Y');

        if ($request->ajax()) {
            $date = $_GET['date'];
        }
        $yantras = Yantra::where('date',$date)->get();

        $user = User::where('id',Auth::id())->first();
        // dd($deposits);
        return view('admin.result', compact('user','yantras'));
    }

    public function adminBuyTicket(Request $request)
    {

        // $user_id = $_SESSION['id'];

        // $select = "SELECT * FROM playroom WHERE user_id = '$user_id' && product_group = 'NV' ORDER BY id DESC";
        // $query = mysqli_query($conn, $select);
        // $row = mysqli_fetch_array($query);

        // $select1 = "SELECT * FROM playroom WHERE user_id = '$user_id' && product_group = 'RR' ORDER BY id DESC";
        // $query1 = mysqli_query($conn, $select1);
        // $row1 = mysqli_fetch_array($query1);

        // $select2 = "SELECT * FROM playroom WHERE user_id = '$user_id' && product_group = 'RY' ORDER BY id DESC";
        // $query2 = mysqli_query($conn, $select2);
        // $row2 = mysqli_fetch_array($query2);

        // $select3 = "SELECT * FROM playroom WHERE user_id = '$user_id' && product_group = 'CH' ORDER BY id DESC";
        // $query3 = mysqli_query($conn, $select3);
        // $row3 = mysqli_fetch_array($query3);

        // $qty = $row['qty'] + $row1['qty'] + $row2['qty'] + $row3['qty'];
        // $points = $row['points'] + $row1['points'] + $row2['points'] + $row3['points'];

        $user_id = Auth::id();

        // $row = Playroom::where('user_id', $user_id)->where('product_group', 'NV')->orderBy('id', 'DESC')->get();

        // $row1 = Playroom::where('user_id', $user_id)->where('product_group', 'RR')->orderBy('id', 'DESC')->get();

        // $row2 = Playroom::where('user_id', $user_id)->where('product_group', 'RY')->orderBy('id', 'DESC')->get();

        // $row3 = Playroom::where('user_id', $user_id)->where('product_group', 'CH')->orderBy('id', 'DESC')->get();

        // $qty = $row->qty + $row1->qty + $row2->qty + $row3->qty;
        // $points = $row->points + $row1->points + $row2->points + $row3->points;


        $row = Playroom::where('user_id', $user_id)
        ->where('product_group', 'NV')
        ->orderByDesc('id')
        ->first();

        $row1 = Playroom::where('user_id', $user_id)
        ->where('product_group', 'RR')
        ->orderByDesc('id')
        ->first();

        $row2 = Playroom::where('user_id', $user_id)
        ->where('product_group', 'RY')
        ->orderByDesc('id')
        ->first();

        $row3 = Playroom::where('user_id', $user_id)
        ->where('product_group', 'CH')
        ->orderByDesc('id')
        ->first();

        $qty = ($row ? $row->qty : 0) + ($row1 ? $row1->qty : 0) + ($row2 ? $row2->qty : 0) + ($row3 ? $row3->qty : 0);
        $points = ($row ? $row->points : 0) + ($row1 ? $row1->points : 0) + ($row2 ? $row2->points : 0) + ($row3 ? $row3->points : 0);




        $date = date('d-m-Y');

        if ($request->ajax()) {
            // $date = $_GET['date'];
            $date = date('d-m-Y');
        }
        $yantras = Yantra::where('date',$date)->get();

        $user = User::where('id',Auth::id())->first();
        // dd($deposits);
        return view('buyTicket', compact('user','row','row1','row2','row3','qty','points'));
    }

    public function report()
    {


//         ?php


// function printTimeInterval($date) {
    // echo "<pre>";
    // print_r($row1);

    $Loginid =Auth::id();
    $sCondition = "";
    // if($Loginid != 14){
    //     $sCondition = " AND user_id = '".$Loginid."' ";
    // }
    // date_default_timezone_set('Asia/Kolkata');
    // session_start();
    // $conn = mysqli_connect('localhost', 'u687870158_Navratna', 'Vansh@1988', 'u687870158_Navratna');
    // if (!$conn) {
    //     echo 'Database connection failed!';

    // }
    $date = date("d-m-Y");
     $DtODAY = $date;//  date("d-m-Y");;
    $start_time = strtotime('8:30 AM');
    $end_time = strtotime('9:00 PM');
    $interval = 15 * 60; // 16 minutes in seconds
	#$aGroup =["YANTRA-NV","YANTRA-RR","YANTRA-RY","YANTRA-CH"];
    $sHtml = "<div class='container'><table class='table' id='yantra-table'>";
    $sHtml .= "<tr>
    <th>Draw Time</th>
    <th >Coupon Name</th>
    <th>00-09</th>
    <th>10-19</th>
    <th>20-29</th>
    <th>30-39</th>
    <th>40-49</th>
    <th>50-59</th>
    <th>60-69</th>
    <th>70-79</th>
    <th>80-89</th>
    <th>90-99</th>
    <th>Qty</th>
    <th>Amount</th>
    <th>WIN</th>
    </tr>";
    $Tempdate = date('H:i',strtotime('8:15 AM'));//  "08:15";
    $TOtalQt = 0;
    $TotalPoint=0;
    for ($time = $start_time; $time <= $end_time; $time += $interval) {
        $date =  date('h:i A', $time);
        $date1 =  date('H:i', strtotime($date));

        //echo $date." -- ".$Tempdate." <=>".$date1."<br>";



        // $sHtml .= "<tr>";
        // $sHtml .= "<td > ". $date."</td>";
        // $sHtml .= "</tr>";
        // $select = "
        //     SELECT
        //       CONCAT('YANTRA-',product_group)AS product_group,
        //       product_group AS product_group1,
        //       SUM(t0) AS 't0',
        //       SUM(t1) AS 't1',
        //       SUM(t2) AS 't2',
        //       SUM(t3) AS 't3',
        //       SUM(t4) AS 't4',
        //       SUM(t5) AS 't5',
        //       SUM(t6) AS 't6',
        //       SUM(t7) AS 't7',
        //       SUM(t8) AS 't8',
        //       SUM(t9) AS 't9',
        //       SUM(qty) AS 'qty',
        //       SUM(points) AS 'points'
        //     FROM
        //       `playroom`
        //     WHERE DATE = '$DtODAY'
        //       AND `product_group` IN ('NV','RR','RY','CH')
        //        AND playroom.time BETWEEN '$Tempdate'
        //       AND '$date1'
        //       ".$sCondition."
        //       GROUP BY product_group
        //       order by (case product_group when 'NV' then '1' when 'RR' then '2' when 'RY' then '3' when 'CH' then '4' END )
        //     " ;

        //     $select1 = "SELECT * FROM yantra WHERE time ='$date1' and date = '$DtODAY' ORDER BY id DESC";
        //     $query1 = mysqli_query($conn, $select1);
        //     $row1 = mysqli_fetch_array($query1);
        //     $query = mysqli_query($conn, $select);
        $select = DB::table('playroom')
        ->select(
            DB::raw("CONCAT('YANTRA-', product_group) AS product_group"),
            'product_group AS product_group1',
            DB::raw('SUM(t0) AS t0'),
            DB::raw('SUM(t1) AS t1'),
            DB::raw('SUM(t2) AS t2'),
            DB::raw('SUM(t3) AS t3'),
            DB::raw('SUM(t4) AS t4'),
            DB::raw('SUM(t5) AS t5'),
            DB::raw('SUM(t6) AS t6'),
            DB::raw('SUM(t7) AS t7'),
            DB::raw('SUM(t8) AS t8'),
            DB::raw('SUM(t9) AS t9'),
            DB::raw('SUM(qty) AS qty'),
            DB::raw('SUM(points) AS points')
        )
        ->where('DATE', '=', $DtODAY)
        ->whereIn('product_group', ['NV', 'RR', 'RY', 'CH'])
        ->whereBetween('playroom.time', [$Tempdate, $date1])
        ->whereRaw($sCondition)
        ->groupBy('product_group')
        ->orderByRaw("CASE product_group WHEN 'NV' THEN '1' WHEN 'RR' THEN '2' WHEN 'RY' THEN '3' WHEN 'CH' THEN '4' END")
        ->get();

    // Eloquent query for $select1
    $select1 = DB::table('yantra')
        ->where('time', '=', $date1)
        ->where('date', '=', $DtODAY)
        ->orderBy('id', 'DESC')
        ->get();

            dd($date,$DtODAY,$start_time,$end_time,$interval,$sHtml, $Tempdate, $TOtalQt,$TotalPoint, $date, $date1, $select1);
            if($query->num_rows > 0){
                while ( $row = mysqli_fetch_array($query) ) {

                    $sHtml .= "<tr>";
                     $sHtml .= "<td > ". $date."</td>";
                    $sHtml .= "<td >".$row["product_group"]."</td>";
                    $sHtml .= "<td >".$row["t0"]."</td>";
                    $sHtml .= "<td >".$row["t1"]."</td>";
                    $sHtml .= "<td >".$row["t2"]."</td>";
                    $sHtml .= "<td >".$row["t3"]."</td>";
                    $sHtml .= "<td >".$row["t4"]."</td>";
                    $sHtml .= "<td >".$row["t5"]."</td>";
                    $sHtml .= "<td >".$row["t6"]."</td>";
                    $sHtml .= "<td >".$row["t7"]."</td>";
                    $sHtml .= "<td >".$row["t8"]."</td>";
                    $sHtml .= "<td >".$row["t9"]."</td>";

                    $sHtml .= "<td >".$row["qty"]."</td>";
                    $sHtml .= "<td >".$row["points"]."</td>";
                    $sHtml .= "<td >".$row1[$row["product_group1"]]."</td>";


                    $sHtml .= "</tr>";

                     $TOtalQt += $row["qty"];
                    $TotalPoint += $row["points"];

                }
            }
            // else{
            //     $sHtml .= "<tr><td >-</td><td >0</td><td >0</td><td >0</td><td >0</td><td >0</td><td >0</td><td >0</td><td >0</td><td >0</td><td >0</td><td >0</td><td >0</td></tr>";
            //     $sHtml .= "<tr><td >-</td><td >0</td><td >0</td><td >0</td><td >0</td><td >0</td><td >0</td><td >0</td><td >0</td><td >0</td><td >0</td><td >0</td><td >0</td></tr>";
            //     $sHtml .= "<tr><td >-</td><td >0</td><td >0</td><td >0</td><td >0</td><td >0</td><td >0</td><td >0</td><td >0</td><td >0</td><td >0</td><td >0</td><td >0</td></tr>";
            //     $sHtml .= "<tr><td >-</td><td >0</td><td >0</td><td >0</td><td >0</td><td >0</td><td >0</td><td >0</td><td >0</td><td >0</td><td >0</td><td >0</td><td >0</td></tr>";
            // }





         $Tempdate =  $date1;

    }
    $sHtml .= "</tr><th align='right' colspan='12'>Total</th><th>".$TOtalQt."</th><th>".$TotalPoint."</th></tr>";
    $sHtml .= "</table></div>";
    echo $sHtml;


// Call the function to print the time intervals
//  printTimeInterval($date);
//echo "<pre>";/
//print_r($x);





        return view('report');
    }

    public function userDeposit(Request $request)
    {
        return view('UserRoom.deposite');
    }

    public function userDepositHistory(Request $request)
    {
        // $select = "SELECT * FROM deposit WHERE user_id = '$user_id' && date = '$date' ORDER BY id DESC";
        // $query = mysqli_query($conn, $select);
        $deposits = Deposit::where('user_id',Auth::id())->get();
        return view('UserRoom.deposite_history', compact('deposits'));
    }

    public function createDeposit(Request $request)
    {
        $id = $request->user_id;
        $amount =  $request->amount;
        $payment_id = $request->payment_id;
        $payment_method =$request->payment_method;
        $date = date('d-m-Y');

        if ($amount >= 100) {

            // $insert = "INSERT INTO deposit (user_id, amount, payment_id, payment_method, date) VALUES ('$id', '$amount', '$payment_id', '$payment_method', '$date')";
            // $query = mysqli_query($conn, $insert);

            $deposit = new Deposit();
            $deposit->user_id = $id;
            $deposit->amount = $amount;
            $deposit->payment_id = $payment_id;
            $deposit->payment_method = $payment_method;
            $deposit->date = $date;
            $deposit->status =0;
            $deposit->save();
            if($deposit){

                return response()->json(['action' => 'add', 'message' => 'Deposit successful!']);
            }else{
                return response()->json(['action' => 'fail', 'message' => 'Deposit Failed!']);
            }
// dd($deposit);
            // if ($query) {
            //     $_SESSION['success'] = 'Deposit successful!';
            //     header('location:Deposit.php');
            // } else {
            //     $_SESSION['error'] = 'Deposit Failed!';
            //     header('location:Deposit.php');
            // }
        } else {
            return response()->json(['action' => 'greate', 'message' => 'Amount must be greater then 100!']);
            // $_SESSION['error'] = 'Amount must be greater then 100!';
            // header('location:Deposit.php');
        }


        dd($id, $amount,$payment_id,$payment_method,$date,$request->all());

        if ($request->ajax()) {
            if (isset($_REQUEST['deposit'])) {
                $id = $_REQUEST['user_id'];
                $amount = $_REQUEST['amount'];
                $payment_id = $_REQUEST['payment_id'];
                $payment_method = $_REQUEST['payment_method'];
                $date = date('d-m-Y');

                if ($amount >= 100) {

                    $insert = "INSERT INTO deposit (user_id, amount, payment_id, payment_method, date) VALUES ('$id', '$amount', '$payment_id', '$payment_method', '$date')";
                    $query = mysqli_query($conn, $insert);

                    if ($query) {
                        $_SESSION['success'] = 'Deposit successful!';
                        header('location:Deposit.php');
                    } else {
                        $_SESSION['error'] = 'Deposit Failed!';
                        header('location:Deposit.php');
                    }
                } else {
                    $_SESSION['error'] = 'Amount must be greater then 100!';
                    header('location:Deposit.php');
                }
            }
        }
    }
}
