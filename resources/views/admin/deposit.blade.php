<h1 class="title">
    <?php $title = 'Deposit'; ?>
</h1>
@extends('admin.app')

@section('title', 'Deposit')

@section('admin_content')

<table class="table" border="1">
    <thead>
        <tr>
            <th>No.</th>
            <th>Username</th>
            <th>Payment</th>
            <th>Payment ID</th>
            <th>Amount</th>
            <th>Balance</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($deposits as $key => $deposit)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $deposits->payment_method }}</td>
            <td>{{ $deposits->payment_id }}</td>
            <td>{{ $deposits->amount }}</td>
            <td>{{ $user->balance }}</td>
            <td>{{ $deposit->date }}</td>
            <td>
                <div class="action-btn-div">
                    <a href="function.php?confirmdeposit={{ $deposit->id }}&userid={{ $deposit->user_id }}&amount={{ $deposit->amount }}&balance={{ $user->balance }}" class="action-btn">Confirm</a>

                    <a class="action-btn" onclick="deleteDeposit({{ $deposit->id }})">Delete</a>
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
            <td><?php //echo $row['payment_method']; ?></td>
            <td><?php //echo $row['payment_id']; ?></td>
            <td><?php //echo $row['amount']; ?></td>
            <td><?php //echo $row1['balance']; ?></td>
            <td><?php //echo $row['date']; ?></td>
            <td>
                <div class="action-btn-div">
                    <a href="function.php?confirmdeposit=<?php //echo $row['id']; ?>&userid=<?php //echo $row['user_id']; ?>&amount=<?php //echo $row['amount']; ?>&balance=<?php //echo $row1['balance']; ?>" class="action-btn">Confirm</a>

                    <a class="action-btn" onclick="deleteDeposit(<?php //echo $row['id']; ?>)">Delete</a>
                </div>
            </td>
        </tr>
        <?php //} ?>
    </tbody>--}}
</table>
@endsection
