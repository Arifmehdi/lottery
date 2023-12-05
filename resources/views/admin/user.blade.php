@extends('admin.app')

@section('admin_content')

<form action="function.php" method="POST">
    <table class="table banner_table" border="1">
        <thead>
            <tr>
                <th>No.</th>
                <th>Username</th>
                <th>Phone / ID</th>
                <th>Password</th>
                <th>Balance</th>
                <th>Status</th>
                <th>Admin</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody></tbody>
        {{--<tbody>
            @foreach ($users as $key => $user)

            <tr>
                <td>{{ ++$key }}</td>
                <td><input type="text" name="username[]" placeholder="Username" value="{{ $user->username }}"></td>
                <td><input type="text" name="name[]" placeholder="" value="{{ $user->phone }}"></td>
                <td><input type="password" name="password[]" placeholder="Password"></td>
                <td><input type="text" name="balance[]" placeholder="Balance" value="{{ $user->balance }}"></td>
                <td>
                    @if($user->status == 1)
                    {{'Verified'}}
                    @else
                    {{'Unverified'}}
                    @endif

                </td>
                <td>
                    @if($user->role == 1)
                    <input type="checkbox" name="admin[]" checked>
                    @else
                    <input type="checkbox" name="admin[]">
                    @endif
                </td>
                <td>
                    <input type="hidden" name="id[]" value="{{$user->id}}">
                    <div class="action-btn-div">
                        <button class="action-btn" name="updateuser">Update</button>
                        <a class="action-btn" onclick="deleteUser({{$user->id}})">Delete</a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>--}}
    </table>
</form>
<script>
    $(document).ready(function(){
        $(function() {

var table = $('.banner_table').DataTable({

    dom: "lBfrtip",
            buttons: [{
                extend: 'pdf',
                text: '<i class="fa-thin fa-file-pdf fa-2x"></i><br>PDF',
                className: 'pdf btn text-white btn-sm px-1',
                exportOptions: {
                    columns: [2, 4, 5, 6, 7, 8]
                }
            }, {
                extend: 'excel',
                text: '<i class="fa-thin fa-file-excel fa-2x"></i><br>Excel',
                className: 'pdf btn text-white btn-sm px-1',
                exportOptions: {
                    columns: [2, 4, 5, 6, 7, 8]
                }
            }, {
                extend: 'print',
                text: '<i class="fa-thin fa-print fa-2x"></i><br>Print',
                className: 'pdf btn text-white btn-sm px-1',
                exportOptions: {
                    columns: [2, 4, 5, 6, 7, 8]
                }
            }, ],

    "pageLength": 50,
    "lengthMenu": [
        [10, 25, 50, 100, 500, 1000, -1],
        [10, 25, 50, 100, 500, 1000, "All"]
    ],
    processing: true,
    serverSide: true,
    searchable: true,
    "ajax": {
        "url": "{{ route('user.list') }}",
        "data": function(data) {
            //filter options
            // data.hrm_department_id = $('#hrm_department_id').val();
            // data.shift_id = $('#shift_id').val();
            // data.grade_id = $('#grade_id').val();
            // data.designation_id = $('#designation_id').val();
            // data.date_range = $('.submitable_input').val();
            // data.employment_status = $('#employment_status').val();
        }
    },

    "drawCallback": function(data) {
        allRow = data.json.allRow;
        // $('#all_item').text('All (' + allRow + ')');
        $('#is_check_all').prop('checked', false);
        // $('#trashed_item').text('');
        // $('#trash_separator').text('');
        // $("#bulk_action_field option:selected").prop("selected", false);

    },

    columns: [
        {
            name: 'DT_RowIndex',
            data: 'DT_RowIndex',
            sWidth: '3%'
        },
        {
            data: 'username',
            name: 'username'
        },
        {
            data: 'phone',
            name: 'phone'
        },
        {
            data: 'password',
            name: 'password'
        },
        {
            data: 'balance',
            name: 'balance'
        },
        {
            data: 'status',
            name: 'status'
        },
        {
            data: 'is_admin',
            name: 'is_admin'
        },

        {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false
        },

    ],
    "lengthMenu": [
        [10, 25, 50, 100, 500, 1000, -1],
        [10, 25, 50, 100, 500, 1000, "All"]
    ],
});
table.buttons().container().appendTo('#exportButtonsContainer');

// $(document.body).on('click', '#is_check_all', function(event) {
//     alert('Checkbox clicked!');
//     var checked = event.target.checked;
//     if (true == checked) {
//         $('.check1').prop('checked', true);
//     }
//     if (false == checked) {
//         $('.check1').prop('checked', false);
//     }
// });

// $('#is_check_all').parent().addClass('text-center');

// $(document.body).on('click', '.check1', function(event) {

//     var allItem = $('.check1');

//     var array = $.map(allItem, function(el, index) {
//         return [el]
//     })

//     var allChecked = array.every(isSameAnswer);

//     function isSameAnswer(el, index, arr) {
//         if (index === 0) {
//             return true;
//         } else {
//             return (el.checked === arr[index - 1].checked);
//         }
//     }

//     if (allChecked && array[0].checked) {
//         $('#is_check_all').prop('checked', true);
//     } else {
//         $('#is_check_all').prop('checked', false);
//     }
// });

// //Submit filter form by select input changing
// $(document).on('change', '.submitable', function() {

//     table.ajax.reload();

// });


});
    });
</script>

@endsection












