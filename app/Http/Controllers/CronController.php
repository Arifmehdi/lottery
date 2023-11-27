<?php

namespace App\Http\Controllers;

use App\Models\Yantra;
use App\Models\Playroom;
use Illuminate\Http\Request;

class CronController extends Controller
{
    public function index()
    {
        // sleep(25);
        date_default_timezone_set('Asia/Kolkata');

        $current_time = date('H:i');
        $hour = date('G');
        $minute = date('i');
        $quarter = floor($minute / 15);

        if ($quarter == 4) {
            $hour++;
            $quarter = 0;
        }

        $current_date = date('d-m-Y');
        // $current_date =now()->format('Y-m-d');

        $formatted_timelast = sprintf('%02d', $hour) . ':' . str_pad($quarter * 15, 2, '0', STR_PAD_LEFT);

        $yantra = Yantra::where('time', $formatted_timelast)
        ->where('date', $current_date)
        ->orderByDesc('id')
        ->first();

        if ($yantra) {
            Yantra::where('id', '<=', $yantra->id)
                ->update(['status' => 1]);
        }

        //cron jobs
        $date = date('d-m-Y');
        $time = date('H:i');
        $time_15 = date('H:i', strtotime('-15 minutes'));

        // Get the current time
        $current_time = strtotime(date('H:i'));

        // Define the start and end times
        $start_time = strtotime('8:30');
        $end_time = strtotime('21:00');

        // dd($start_time,$end_time,$time_15);

        if ($current_time >= $start_time && $current_time <= $end_time) {
            // $select = "SELECT * FROM playroom WHERE date = '$date' && time BETWEEN '$time_15' AND '$time' && product_group = 'NV'";
            // $query = mysqli_query($conn, $select);
            // $result = mysqli_num_rows($query);

            // $select1 = "SELECT * FROM playroom WHERE date = '$date' && time BETWEEN '$time_15' AND '$time' && product_group = 'RR'";
            // $query1 = mysqli_query($conn, $select1);
            // $result1 = mysqli_num_rows($query1);

            // $select2 = "SELECT * FROM playroom WHERE date = '$date' && time BETWEEN '$time_15' AND '$time' && product_group = 'RY'";
            // $query2 = mysqli_query($conn, $select2);
            // $result2 = mysqli_num_rows($query2);
            // $select3 = "SELECT * FROM playroom WHERE date = '$date' && time BETWEEN '$time_15' AND '$time' && product_group = 'CH'";
            // $query3 = mysqli_query($conn, $select3);
            // $result3 = mysqli_num_rows($query3);

            $result = Playroom::where('date', $date)
            ->whereBetween('time', [$time_15, $time])
            ->where('product_group', 'NV')
            ->count();

        $result1 = Playroom::where('date', $date)
            ->whereBetween('time', [$time_15, $time])
            ->where('product_group', 'RR')
            ->count();

        $result2 = Playroom::where('date', $date)
            ->whereBetween('time', [$time_15, $time])
            ->where('product_group', 'RY')
            ->count();

        $result3 = Playroom::where('date', $date)
            ->whereBetween('time', [$time_15, $time])
            ->where('product_group', 'CH')
            ->count();

            // if ($result != 0) {

            //     $sum0 = 0; $sum1 = 0; $sum2 = 0; $sum3 = 0; $sum4 = 0; $sum5 = 0; $sum6 = 0; $sum7 = 0; $sum8 = 0; $sum9 = 0;

            //     while ($row = mysqli_fetch_assoc($query)) {

            //         $t0 = $row['t0']; $t1 = $row['t1']; $t2 = $row['t2']; $t3 = $row['t3']; $t4 = $row['t4']; $t5 = $row['t5']; $t6 = $row['t6']; $t7 = $row['t7']; $t8 = $row['t8']; $t9 = $row['t9'];

            //         $sum0 += $t0; $sum1 += $t1; $sum2 += $t2; $sum3 += $t3; $sum4 += $t4; $sum5 += $t5; $sum6 += $t6; $sum7 += $t7; $sum8 += $t8; $sum9 += $t9;
            //     }

            //     $sums0 = array($sum0, $sum1, $sum2, $sum3, $sum4, $sum5, $sum6, $sum7, $sum8, $sum9);
            //     $minValue = min($sums0);
            //     $minIndex = array_search($minValue, $sums0);
            //     $minIndex0 = $minIndex . 0;
            //     $minIndex9 = $minIndex . 0;
            //     $rand = rand($minIndex0, $minIndex9);
            //     if ($rand < 10) {
            //         $rand = 0 . $rand;
            //     } else {
            //         $rand;
            //     }



            //     // echo $sum0 . '<br>'; echo $sum1 . '<br>'; echo $sum2 . '<br>'; echo $sum3 . '<br>'; echo $sum4 . '<br>'; echo $sum5 . '<br>'; echo $sum6 . '<br>'; echo $sum7 . '<br>'; echo $sum8 . '<br>'; echo $sum9 . '<br>';
            // } else {
            //     $rand = '00';
            // }

            // if ($result1 != 0) {

            //     $sum10 = 0; $sum11 = 0; $sum12 = 0; $sum13 = 0; $sum14 = 0; $sum15 = 0; $sum16 = 0; $sum17 = 0; $sum18 = 0; $sum19 = 0;

            //     while ($row1 = mysqli_fetch_assoc($query1)) {

            //         $t10 = $row1['t0']; $t11 = $row1['t1']; $t12 = $row1['t2']; $t13 = $row1['t3']; $t14 = $row1['t4']; $t15 = $row1['t5']; $t16 = $row1['t6']; $t17 = $row1['t7']; $t18 = $row1['t8']; $t19 = $row1['t9'];

            //         $sum10 += $t10; $sum11 += $t11; $sum12 += $t12; $sum13 += $t13; $sum14 += $t14; $sum15 += $t15; $sum16 += $t16; $sum17 += $t17; $sum18 += $t18; $sum19 += $t19;
            //     }

            //     $sums1 = array($sum10, $sum11, $sum12, $sum13, $sum14, $sum15, $sum16, $sum17, $sum18, $sum19);
            //     $minValue1 = min($sums1);
            //     $minIndex1 = array_search($minValue1, $sums1);
            //     $minIndex10 = $minIndex1 . 0;
            //     $minIndex19 = $minIndex1 . 0;
            //     $rand1 = rand($minIndex10, $minIndex19);
            //     if ($rand1 < 10) {
            //         $rand1 = 0 . $rand1;
            //     } else {
            //         $rand1;
            //     }


            // } else {
            //     $rand1 = '00';
            // }

            // if ($result2 != 0) {

            //     $sum20 = 0; $sum21 = 0; $sum22 = 0; $sum23 = 0; $sum24 = 0; $sum25 = 0; $sum26 = 0; $sum27 = 0; $sum28 = 0; $sum29 = 0;

            //     while ($row2 = mysqli_fetch_assoc($query2)) {

            //         $t20 = $row2['t0']; $t21 = $row2['t1']; $t22 = $row2['t2']; $t23 = $row2['t3']; $t24 = $row2['t4']; $t25 = $row2['t5']; $t26 = $row2['t6']; $t27 = $row2['t7']; $t28 = $row2['t8']; $t29 = $row2['t9'];

            //         $sum20 += $t20; $sum21 += $t21; $sum22 += $t22; $sum23 += $t23; $sum24 += $t24; $sum25 += $t25; $sum26 += $t26; $sum27 += $t27; $sum28 += $t28; $sum29 += $t29;
            //     }

            //     $sums2 = array($sum20, $sum21, $sum22, $sum23, $sum24, $sum25, $sum26, $sum27, $sum28, $sum29);
            //     $minValue2 = min($sums2);
            //     $minIndex2 = array_search($minValue2, $sums2);
            //     $minIndex20 = $minIndex2 . 0;
            //     $minIndex29 = $minIndex2 . 0;
            //     $rand2 = rand($minIndex20, $minIndex29);
            //     if ($rand2 < 10) {
            //         $rand2 = 0 . $rand2;
            //     } else {
            //         $rand2;
            //     }


            // } else {
            //     $rand2 = '00';
            // }

            // if ($result3 != 0) {

            //     $sum30 = 0; $sum31 = 0; $sum32 = 0; $sum33 = 0; $sum34 = 0; $sum35 = 0; $sum36 = 0; $sum37 = 0; $sum38 = 0; $sum39 = 0;

            //     while ($row3 = mysqli_fetch_assoc($query3)) {

            //         $t30 = $row3['t0']; $t31 = $row3['t1']; $t32 = $row3['t2']; $t33 = $row3['t3']; $t34 = $row3['t4']; $t35 = $row3['t5']; $t36 = $row3['t6']; $t37 = $row3['t7']; $t38 = $row3['t8']; $t39 = $row3['t9'];

            //         $sum30 += $t30; $sum31 += $t31; $sum32 += $t32; $sum33 += $t33; $sum34 += $t34; $sum35 += $t35; $sum36 += $t36; $sum37 += $t37; $sum38 += $t38; $sum39 += $t39;
            //     }

            //     $sums3 = array($sum30, $sum31, $sum32, $sum33, $sum34, $sum35, $sum36, $sum37, $sum38, $sum39);
            //     $minValue3 = min($sums3);
            //     $minIndex3 = array_search($minValue3, $sums3);
            //     $minIndex30 = $minIndex3 . 0;
            //     $minIndex39 = $minIndex3 . 0;
            //     $rand3 = rand($minIndex30, $minIndex39);
            //     if ($rand3 < 10) {
            //         $rand3 = 0 . $rand3;
            //     } else {
            //         $rand3;
            //     }


            // } else {
            //     $rand3 = '00';
            // }

            // // echo $rand . '<br>';
            // // echo $rand1 . '<br>';
            // // echo $rand2 . '<br>';
            // // echo $rand3 . '<br>';

            // $select4 = "SELECT * FROM yantra ORDER BY id DESC";
            // $query4 = mysqli_query($conn,$select4);
            // $row4 = mysqli_fetch_array($query4);

            // $yantra_id = $row4['id'];

            // $update = "UPDATE yantra SET status = 1 WHERE id = '$yantra_id'";
            // $query5 = mysqli_query($conn, $update);


            //  $select = "SELECT * FROM yantra WHERE time = '$time' && date = '$date'";
            // $query = mysqli_query($conn, $select);
            // $row = mysqli_fetch_array($query);
            // $result = mysqli_num_rows($query);

            // if ($result != 0) {

            // } else {
            // $insert = "INSERT INTO yantra (NV, RR, RY, CH, date, time) VALUES ('NV$rand', 'RR$rand1', 'RY$rand2', 'CH$rand3', '$date', '$time')";
            // $query6 = mysqli_query($conn, $insert);

            // }




            // $slice = substr(strval($rand), 0, 1);
            // $slice1 = substr(strval($rand1), 0, 1);
            // $slice2 = substr(strval($rand2), 0, 1);
            // $slice3 = substr(strval($rand3), 0, 1);

            // echo $slice;
            // echo $slice1;
            // echo $slice2;
            // echo $slice3;

            if ($result != 0) {
                $sums = array_fill(0, 10, 0);

                while ($row = $query->fetch()) {
                    for ($i = 0; $i < 10; $i++) {
                        $sums[$i] += $row["t{$i}"];
                    }
                }

                $minValue = min($sums);
                $minIndex = array_search($minValue, $sums);
                $rand = mt_rand($minIndex * 10, $minIndex * 10 + 9);

                if ($rand < 10) {
                    $rand = '0' . $rand;
                }
            } else {
                $rand = '00';
            }

            // Process for the second condition
            if ($result1 != 0) {
                $sums1 = array_fill(10, 10, 0);

                while ($row1 = $query1->fetch()) {
                    for ($i = 0; $i < 10; $i++) {
                        $sums1[$i] += $row1["t{$i}"];
                    }
                }

                $minValue1 = min($sums1);
                $minIndex1 = array_search($minValue1, $sums1);
                $rand1 = mt_rand($minIndex1 * 10, $minIndex1 * 10 + 9);

                if ($rand1 < 10) {
                    $rand1 = '0' . $rand1;
                }
            } else {
                $rand1 = '00';
            }

            // Process for the third condition
            if ($result2 != 0) {
                $sums2 = array_fill(20, 10, 0);

                while ($row2 = $query2->fetch()) {
                    for ($i = 0; $i < 10; $i++) {
                        $sums2[$i] += $row2["t{$i}"];
                    }
                }

                $minValue2 = min($sums2);
                $minIndex2 = array_search($minValue2, $sums2);
                $rand2 = mt_rand($minIndex2 * 10, $minIndex2 * 10 + 9);

                if ($rand2 < 10) {
                    $rand2 = '0' . $rand2;
                }
            } else {
                $rand2 = '00';
            }

            // Process for the fourth condition
            if ($result3 != 0) {
                $sums3 = array_fill(30, 10, 0);

                while ($row3 = $query3->fetch()) {
                    for ($i = 0; $i < 10; $i++) {
                        $sums3[$i] += $row3["t{$i}"];
                    }
                }

                $minValue3 = min($sums3);
                $minIndex3 = array_search($minValue3, $sums3);
                $rand3 = mt_rand($minIndex3 * 10, $minIndex3 * 10 + 9);

                if ($rand3 < 10) {
                    $rand3 = '0' . $rand3;
                }
            } else {
                $rand3 = '00';
            }

            // Update the 'yantra' table
            $yantra = Yantra::orderBy('id', 'desc')->first();
            $yantra_id = $yantra ? $yantra->id : null;

            if ($yantra_id) {
                Yantra::where('id', $yantra_id)->update(['status' => 1]);
            }

            // Check if a record with the same date and time exists in the 'yantra' table
            $existingYantra = Yantra::where('time', $time)->where('date', $date)->first();

            if (!$existingYantra) {
                // Insert a new record into the 'yantra' table
                Yantra::create([
                    'NV' => "NV{$rand}",
                    'RR' => "RR{$rand1}",
                    'RY' => "RY{$rand2}",
                    'CH' => "CH{$rand3}",
                    'date' => $date,
                    'time' => $time,
                ]);
            }

            // $select7 = "SELECT * FROM playroom WHERE date = '$date' && time BETWEEN '$time_15' AND '$time' && t$slice != 0 && product_group = 'NV'";
            // $query7 = mysqli_query($conn, $select7);
            // $result7 = mysqli_num_rows($query7);

            // $select8 = "SELECT * FROM playroom WHERE date = '$date' && time BETWEEN '$time_15' AND '$time' && t$slice1 != 0 && product_group = 'RR'";
            // $query8 = mysqli_query($conn, $select8);
            // $result8 = mysqli_num_rows($query8);

            // $select9 = "SELECT * FROM playroom WHERE date = '$date' && time BETWEEN '$time_15' AND '$time' && t$slice2 != 0 && product_group = 'RY'";
            // $query9 = mysqli_query($conn, $select9);
            // $result9 = mysqli_num_rows($query9);

            // $select10 = "SELECT * FROM playroom WHERE date = '$date' && time BETWEEN '$time_15' AND '$time' && t$slice3 != 0 && product_group = 'CH'";
            // $query10 = mysqli_query($conn, $select10);
            // $result10 = mysqli_num_rows($query10);


            // Process for the first condition
            $select7 = Playroom::where('date', $date)
            ->whereBetween('time', [$time_15, $time])
            ->where("t{$slice}", '!=', 0)
            ->where('product_group', 'NV')
            ->get();
            $result7 = $select7->count();

            // Process for the second condition
            $select8 = Playroom::where('date', $date)
            ->whereBetween('time', [$time_15, $time])
            ->where("t{$slice1}", '!=', 0)
            ->where('product_group', 'RR')
            ->get();
            $result8 = $select8->count();

            // Process for the third condition
            $select9 = Playroom::where('date', $date)
            ->whereBetween('time', [$time_15, $time])
            ->where("t{$slice2}", '!=', 0)
            ->where('product_group', 'RY')
            ->get();
            $result9 = $select9->count();

            // Process for the fourth condition
            $select10 = Playroom::where('date', $date)
            ->whereBetween('time', [$time_15, $time])
            ->where("t{$slice3}", '!=', 0)
            ->where('product_group', 'CH')
            ->get();
            $result10 = $select10->count();

            if ($result7 != 0) {
                $playroom7 = $query7->get();

                foreach ($playroom7 as $row7) {
                    $user_id = $row7->user_id;
                    $t = $row7["t{$slice}"] * 100;

                    $user = User::find($user_id);
                    $balance = $user->balance + $t;

                    $user->update(['balance' => $balance]);
                }
            }

            // Process for the second condition
            if ($result8 != 0) {
                $playroom8 = $query8->get();

                foreach ($playroom8 as $row8) {
                    $user_id = $row8->user_id;
                    $t = $row8["t{$slice1}"] * 100;

                    $user = User::find($user_id);
                    $balance = $user->balance + $t;

                    $user->update(['balance' => $balance]);
                }
            }

            // Process for the third condition
            if ($result9 != 0) {
                $playroom9 = $query9->get();

                foreach ($playroom9 as $row9) {
                    $user_id = $row9->user_id;
                    $t = $row9["t{$slice2}"] * 100;

                    $user = User::find($user_id);
                    $balance = $user->balance + $t;

                    $user->update(['balance' => $balance]);
                }
            }

            // Process for the fourth condition
            if ($result10 != 0) {
                $playroom10 = $query10->get();

                foreach ($playroom10 as $row10) {
                    $user_id = $row10->user_id;
                    $t = $row10["t{$slice3}"] * 100;

                    $user = User::find($user_id);
                    $balance = $user->balance + $t;

                    $user->update(['balance' => $balance]);
                }
            }

            }
        // return 'ok bro';
    }
}
