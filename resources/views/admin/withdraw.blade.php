<h1 class="title">
    <?php $title = 'Withdraw'; ?>
</h1>
@extends('admin.app')

@section('title', 'Withdraw')

@section('admin_content')

<table class="table" border="1">
    <thead>
        <tr>
            <th>No.</th>
            <th>Username</th>
            <th>Amount</th>
            <th>Wallet</th>
            <th>Payment Method</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($Withdraws as $key => $withdraw)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $withdraw->amount }}</td>
            <td>{{ $withdraw->wallet }}</td>
            <td>{{ $withdraw->payment_method }}</td>
            <td>{{ $user->balance }}</td>
            <td>{{ $withdraw->date }}</td>
            <td>
                <div class="action-btn-div">
                    <a href="function.php?confirmdeposit={{ $withdraw->id }}&userid={{ $withdraw->user_id }}&amount={{ $withdraw->amount }}&balance={{ $user->balance }}" class="action-btn">Confirm</a>

                    <a class="action-btn" onclick="deleteDeposit({{ $withdraw->id }})">Delete</a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
    {{--<tbody>
        <?php
        // $i = 0;
        // while ($row = mysqli_fetch_array($query)) {
        //     $i++;
        //     $user_id = $row['user_id'];
        //     $select1 = "SELECT * FROM user WHERE id = '$user_id'";
        //     $query1 = mysqli_query($conn, $select1);
        //     $row1 = mysqli_fetch_array($query1);
        ?>
        <tr>
            <td><?php //echo $i; ?></td>
            <td><?php //echo $row1['username']; ?></td>
            <td><?php //echo $row['amount']; ?></td>
            <td><?php //echo $row['wallet']; ?></td>
            <td><?php //echo $row['payment_method']; ?></td>
            <td><?php //echo $row['date']; ?></td>
            <td>
                <div class="action-btn-div">
                    <a href="function.php?confirmwithdraw=<?php //echo $row['id']; ?>" class="action-btn">Confirm</a>

                    <a class="action-btn" onclick="deleteWithdraw(<?php //echo $row['id']; ?>)">Delete</a>
                </div>
            </td>
        </tr>
        <?php //} ?>
    </tbody>--}}
</table>
@endsection
