@php
$title = 'Deposit';
@endphp
@include('UserRoom.includes.header')



<form action="{{ route('user.create.deposit') }}" method="POST">
    @csrf

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
                    <select name="payment_method"  id="payment_method">
                        <option value="UPI">UPI</option>
                    </select>
                </td>
                <td>
                    <input type="text" name="amount" placeholder="Enter Amount (Min. 100)" required id="amount">
                </td>
                <td>
                    <input type="text" value="9*******1" readonly>
                </td>
                <td>
                    <input type="text" name="payment_id" placeholder="Enter Your Phone Number" required id="payment_id">
                </td>
                <td>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" id="user_id">
                    <button class="action-btn" name="deposit" id="deposit">Deposit</button>
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
</script>


@include('UserRoom.includes.footer')
