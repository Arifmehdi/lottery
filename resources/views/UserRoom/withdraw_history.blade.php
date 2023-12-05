@php
$title = 'Withdraw History';
@endphp
@include('UserRoom.includes.header')



<table class="table" border="1">
    <thead>
        <tr>
            <th>No.</th>
            <th>Amount</th>
            <th>Wallet</th>
            <th>Payment Method</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        {{-- <?php
        //$i = 0;
        // while ($row = mysqli_fetch_array($query)) {
        //     $i++;
        //     $status = $row['status'];
        //     if ($status == '1') {
        //         $status = 'Completed';
        //     } else {
        //         $status = 'Incomplete';
        //     }
        ?>
        <tr>
            <td><?php //echo $i; ?></td>
            <td><?php //echo $row['amount']; ?></td>
            <td><?php //echo $row['wallet']; ?></td>
            <td><?php //echo $row['payment_method']; ?></td>
            <td><?php //echo $row['date']; ?></td>
            <td><?php //echo $status; ?></td>
        </tr>
        <?php //} ?> --}}
        @foreach ($withdraws as $key => $withdraw)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $withdraw->amount }}</td>
            <td>{{ $withdraw->wallet }}</td>
            <td>{{ $withdraw->payment_method }}</td>
            <td>{{ $withdraw->date }}</td>
            <td>{{ ($withdraw->status == 1) ? 'Completed' : 'Incomplete' }}</td>
        </tr>
        @endforeach
        <?php //} ?>
    </tbody>
</table>

{{-- <script>

$(document).ready(function() {
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });

    $('#deposit').click(function(e) {
        e.preventDefault(); // Add this line to prevent the default form submission

        var payment_method = $('#payment_method').val();
        var amount = $('#amount').val();
        var payment_id = $('#payment_id').val();
        var user_id = $('#user_id').val();

        $.ajax({
            url: "{{ route('user.create.deposit') }}",
            type: 'POST',
            data: {
                payment_method: payment_method,
                amount: amount,
                payment_id: payment_id,
                user_id: user_id,
            },
            success: function(res) {
                amount = $('#amount').val('');
                payment_id = $('#payment_id').val('');
                console.log(res.message);
                toastr.success(res.message);
            },
            error: function(error) {
                console.error(error);
            } // Removed the unnecessary semicolon and replaced the empty block with a console.error statement
        });
    });
});
</script> --}}


@include('UserRoom.includes.footer')
