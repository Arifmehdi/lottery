<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.36">
    <title>Total Sale Report</title>
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        table {
            text-align: center;
            margin: auto;
            font-size: 18px !important;
        }
        table, th, td {
            border: 1px solid black;
            height: 40px;
            background-color: #d9cf94;
        }
        .font-family {
            font-family: Calibri;
            text-align: center;
            background-color: #f66e92;
        }
        .table {
            width: 100%;
            border: 1px solid black;
            background-color: #F6EEAF;
        }
        .container {
            width: 1000px;
            margin: auto;
        }
        table, th, td {
            border: 1px solid;
            border-collapse: separate;
        }
    </style>
</head>
<body class="body">

@php
    use Illuminate\Support\Facades\DB;

    if (request()->has('date')) {
        $date = request('date');
        $date = date("d-m-Y", strtotime($date));
    } else {
        $date = date('d-m-Y');
    }

    function printTimeInterval($date) {
        $Loginid = session('id');
        $sCondition = "";
        if ($Loginid != 14) {
            $sCondition = " AND user_id = '" . $Loginid . "' ";
        }
        date_default_timezone_set('Asia/Kolkata');
        $DtODAY = $date;
        $start_time = strtotime('8:30 AM');
        $end_time = strtotime('9:00 PM');
        $interval = 15 * 60; // 16 minutes in seconds
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
        $Tempdate = date('H:i', strtotime('8:15 AM'));
        $TOtalQt = 0;
        $TotalPoint = 0;

        for ($time = $start_time; $time <= $end_time; $time += $interval) {
            $date = date('h:i A', $time);
            $date1 = date('H:i', strtotime($date));

            $select = DB::table('playroom')
                ->select(
                    DB::raw("CONCAT('YANTRA-', product_group)AS product_group"),
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

            $select1 = DB::table('yantra')
                ->where('time', '=', $date1)
                ->where('date', '=', $DtODAY)
                ->orderBy('id', 'DESC')
                ->get();

            if ($select->count() > 0) {
                foreach ($select as $row) {
                    $sHtml .= "<tr>";
                    $sHtml .= "<td > " . $date . "</td>";
                    $sHtml .= "<td >" . $row->product_group . "</td>";
                    $sHtml .= "<td >" . $row->t0 . "</td>";
                    $sHtml .= "<td >" . $row->t1 . "</td>";
                    $sHtml .= "<td >" . $row->t2 . "</td>";
                    $sHtml .= "<td >" . $row->t3 . "</td>";
                    $sHtml .= "<td >" . $row->t4 . "</td>";
                    $sHtml .= "<td >" . $row->t5 . "</td>";
                    $sHtml .= "<td >" . $row->t6 . "</td>";
                    $sHtml .= "<td >" . $row->t7 . "</td>";
                    $sHtml .= "<td >" . $row->t8 . "</td>";
                    $sHtml .= "<td >" . $row->t9 . "</td>";

                    $sHtml .= "<td >" . $row->qty . "</td>";
                    $sHtml .= "<td >" . $row->points . "</td>";
                    $sHtml .= "<td >" . $select1[$row->product_group1] . "</td>";

                    $sHtml .= "</tr>";

                    $TOtalQt += $row->qty;
                    $TotalPoint += $row->points;
                }
            }

            $Tempdate = $date1;
        }

        $sHtml .= "</tr><th align='right' colspan='12'>Total</th><th>" . $TOtalQt . "</th><th>" . $TotalPoint . "</th></tr>";
        $sHtml .= "</table></div>";
        echo $sHtml;
    }

    // Call the function to print the time intervals
    printTimeInterval($date);
@endphp

<br>
</body>
</html>
