@extends('admin.app')

@section('admin_content')

<form action="function.php" method="POST">
    <table class="table" border="1">
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
        <tbody>
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
        </tbody>
    </table>
</form>

@endsection












