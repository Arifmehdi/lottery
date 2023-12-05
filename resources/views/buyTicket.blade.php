<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.35">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/result.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Confirm Booking</title>
</head>
<body>
<br>
    <br>
        <br>
<div class="container">
    <h1 class="title">Your Booking Ticket</h1>
    <h3 class="subtitle">
        Date: <?php echo date('d-m-Y'); ?>
    </h3>
    <div>
        <div>
            <div>
        <h4 class="subtitle">
            Gift Event Code: <span><?php echo $row['time']; ?></span> <br> Game Type: <span>Bulk Coupon NV</span>
        </h4>
        <table class="table">
            <tr>
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
            </tr>
            <tr>
                <td><?php if ($row['t0'] == 0) { echo '~'; } else { echo $row['t0']; }?> </td>
                <td><?php if ($row['t1'] == 0) { echo '~'; } else { echo $row['t1']; }?> </td>
                <td><?php if ($row['t2'] == 0) { echo '~'; } else { echo $row['t2']; }?> </td>
                <td><?php if ($row['t3'] == 0) { echo '~'; } else { echo $row['t3']; }?> </td>
                <td><?php if ($row['t4'] == 0) { echo '~'; } else { echo $row['t4']; }?> </td>
                <td><?php if ($row['t5'] == 0) { echo '~'; } else { echo $row['t5']; }?> </td>
                <td><?php if ($row['t6'] == 0) { echo '~'; } else { echo $row['t6']; }?> </td>
                <td><?php if ($row['t7'] == 0) { echo '~'; } else { echo $row['t7']; }?> </td>
                <td><?php if ($row['t8'] == 0) { echo '~'; } else { echo $row['t8']; }?> </td>
                <td><?php if ($row['t9'] == 0) { echo '~'; } else { echo $row['t9']; }?> </td>
            </tr>
        </table>
        <h3 class="subtitle">
            Quantity Played: <span><?php echo $row['qty']; ?></span> Rate(per unit): <span>11</span> Points: <span><?php echo $row['points']; ?></span>
        </h3>
     <div>
        <div>
        <h3 class="subtitle">
            Gift Event Code: <span><?php echo $row1['time']; ?></span> <br> Game Type: <span>Bulk Coupon RR</span>
        </h3>
        <table class="table">
            <tr>
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
            </tr>
            <tr>
                <td><?php if ($row1['t0'] == 0) { echo '~'; } else { echo $row1['t0']; }?> </td>
                <td><?php if ($row1['t1'] == 0) { echo '~'; } else { echo $row1['t1']; }?> </td>
                <td><?php if ($row1['t2'] == 0) { echo '~'; } else { echo $row1['t2']; }?> </td>
                <td><?php if ($row1['t3'] == 0) { echo '~'; } else { echo $row1['t3']; }?> </td>
                <td><?php if ($row1['t4'] == 0) { echo '~'; } else { echo $row1['t4']; }?> </td>
                <td><?php if ($row1['t5'] == 0) { echo '~'; } else { echo $row1['t5']; }?> </td>
                <td><?php if ($row1['t6'] == 0) { echo '~'; } else { echo $row1['t6']; }?> </td>
                <td><?php if ($row1['t7'] == 0) { echo '~'; } else { echo $row1['t7']; }?> </td>
                <td><?php if ($row1['t8'] == 0) { echo '~'; } else { echo $row1['t8']; }?> </td>
                <td><?php if ($row1['t9'] == 0) { echo '~'; } else { echo $row1['t9']; }?> </td>
            </tr>
        </table>
        <h3 class="subtitle">
            Quantity Played: <span><?php echo $row1['qty']; ?></span> Rate(per unit): <span>11</span> Points: <span><?php echo $row1['points']; ?></span>
        </h3>
     <div>
        <div>
        <h3 class="subtitle">
            Gift Event Code: <span><?php echo $row2['time']; ?></span> <br> Game Type: <span>Bulk Coupon RY</span>
        </h3>
        <table class="table">
            <tr>
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
            </tr>
            <tr>
                <td><?php if ($row2['t0'] == 0) { echo '~'; } else { echo $row2['t0']; }?> </td>
                <td><?php if ($row2['t1'] == 0) { echo '~'; } else { echo $row2['t1']; }?> </td>
                <td><?php if ($row2['t2'] == 0) { echo '~'; } else { echo $row2['t2']; }?> </td>
                <td><?php if ($row2['t3'] == 0) { echo '~'; } else { echo $row2['t3']; }?> </td>
                <td><?php if ($row2['t4'] == 0) { echo '~'; } else { echo $row2['t4']; }?> </td>
                <td><?php if ($row2['t5'] == 0) { echo '~'; } else { echo $row2['t5']; }?> </td>
                <td><?php if ($row2['t6'] == 0) { echo '~'; } else { echo $row2['t6']; }?> </td>
                <td><?php if ($row2['t7'] == 0) { echo '~'; } else { echo $row2['t7']; }?> </td>
                <td><?php if ($row2['t8'] == 0) { echo '~'; } else { echo $row2['t8']; }?> </td>
                <td><?php if ($row2['t9'] == 0) { echo '~'; } else { echo $row2['t9']; }?> </td>
            </tr>
        </table>
        <h3 class="subtitle">
            Quantity Played: <span><?php echo $row2['qty']; ?></span> Rate(per unit): <span>11</span> Points: <span><?php echo $row2['points']; ?></span>
        </h3>
    </div>
    <div>
        <h3 class="subtitle">
            Gift Event Code: <span><?php echo $row3['time']; ?></span> <br> Game Type: <span>Bulk Coupon CH</span>
        </h3>
        <table class="table">
            <tr>
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
            </tr>
            <tr>
                <td><?php if ($row3['t0'] == 0) { echo '~'; } else { echo $row3['t0']; }?> </td>
                <td><?php if ($row3['t1'] == 0) { echo '~'; } else { echo $row3['t1']; }?> </td>
                <td><?php if ($row3['t2'] == 0) { echo '~'; } else { echo $row3['t2']; }?> </td>
                <td><?php if ($row3['t3'] == 0) { echo '~'; } else { echo $row3['t3']; }?> </td>
                <td><?php if ($row3['t4'] == 0) { echo '~'; } else { echo $row3['t4']; }?> </td>
                <td><?php if ($row3['t5'] == 0) { echo '~'; } else { echo $row3['t5']; }?> </td>
                <td><?php if ($row3['t6'] == 0) { echo '~'; } else { echo $row3['t6']; }?> </td>
                <td><?php if ($row3['t7'] == 0) { echo '~'; } else { echo $row3['t7']; }?> </td>
                <td><?php if ($row3['t8'] == 0) { echo '~'; } else { echo $row3['t8']; }?> </td>
                <td><?php if ($row3['t9'] == 0) { echo '~'; } else { echo $row3['t9']; }?> </td>
            </tr>
        </table>
        <h3 class="subtitle">
            Quantity Played: <span><?php echo $row3['qty']; ?></span> Rate(per unit): <span>11</span> Points: <span><?php echo $row3['points']; ?></span>
        </h3>
    </div>
    <div>
        <h3 class="subtitle"><br>
            Total Quantity Played: <span><?php echo $qty; ?></span> Total Points: <span><?php echo $points; ?></span>
        </h3>
    </div>
    <div class="footer">
        <h3>For Yantra Code:- Reach us @ navratnacoupon@gmail.com</h3>
        <h3>Copyright @ 2015 goldennavratnacoupon.com. are reserved.</h3>
        <h3>Visitor's Count : 9999999999999</h3>
        <h3>Our All Products</h3>
    </div>
</div>
</body>


</html>

