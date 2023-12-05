@php
$title = 'Withdraw';
@endphp
@include('UserRoom.includes.header')



<form action="function.php" method="POST">
    <table class="table" border="1">
        <thead>
            <tr>
                <th>Payment Method</th>
                <th>Amount</th>
                <th>GooglePay | PhonePe | Paytm</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <select name="payment_method" required id="payment_method">
                        <option value="UPI">UPI</option>
                    </select>
                </td>
                <td>
                    <input type="text" name="amount" placeholder="Please Enter Amount (Min. 1000)" required id="amount">
                </td>
                <td>
                    <input type="text" name="wallet" placeholder="Please Enter Mobile Wallet" required id="wallet">
                </td>
                <td>
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}" id="user_id">
                    <button class="action-btn" name="withdraw" id="withdraw">WithDraw</button>
                </td>
            </tr>
        </tbody>
    </table>
</form>

<script>

$(document).ready(function() {
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });

    $('#withdraw').click(function(e) {
        e.preventDefault(); // Add this line to prevent the default form submission

        var payment_method = $('#payment_method').val();
        var amount = $('#amount').val();
        var wallet = $('#wallet').val();
        var user_id = $('#user_id').val();
alert(payment_method +' ' +amount +' ' +wallet + ' '+ user_id )
        $.ajax({
            url: "{{ route('user.create.withdraw') }}",
            type: 'POST',
            data: {
                payment_method: payment_method,
                amount: amount,
                wallet: wallet,
                user_id: user_id,
            },
            success: function(res) {
                 $('#amount').val('');
                 $('#wallet').val('');
                toastr.success(res.message);
            },
            error: function(error) {
                console.error(error);
            } // Removed the unnecessary semicolon and replaced the empty block with a console.error statement
        });
    });
});
</script>


@include('UserRoom.includes.footer')
