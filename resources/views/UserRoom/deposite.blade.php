@php
$title = 'Deposit';
@endphp
@include('UserRoom.includes.header')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.31">
    <title>PlayRoom</title>
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<form action="function.php" method="POST">
    <table class="table" border="1">
        <thead>
            <tr>
                <th>Payment Method</th>
                <th>Amount</th>
                <th>GooglePay | PhonePe</th>
                <th>Payment By</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <select name="payment_method" required>
                        <option value="UPI">UPI</option>
                    </select>
                </td>
                <td>
                    <input type="text" name="amount" placeholder="Enter Amount (Min. 100)" required>
                </td>
                <td>
                    <input type="text" value="9*******1" readonly>
                </td>
                <td>
                    <input type="text" name="payment_id" placeholder="Enter Your Phone Number" required>
                </td>
                <td>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <button class="action-btn" name="deposit">Deposit</button>
                </td>
            </tr>
        </tbody>
    </table>
</form>


@include('UserRoom.includes.footer')
