<h1 class="title">
    <?php $title = 'Result'; ?>
</h1>
@extends('admin.app')

@section('title', 'Withdraw')

@section('admin_content')

<form action="function.php" method="POST">
    <table class="table" border="1">
        <thead>
            <tr>
                <th>No.</th>
                <th>DRAW TIME</th>
                <th>NV</th>
                <th>RR</th>
                <th>RY</th>
                <th>CH</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
@foreach ($yantras as $key => $yantra)


            <tr>
                <td>{{ ++$key }}</td>
                <td><input type="text" value="{{$yantra->time}}" readonly></td>
                <td><input type="text" name="NV[]" value="{{ $yantra->NV }}" placeholder="NV00"></td>
                <td><input type="text" name="RR[]" value="{{ $yantra->RR }}" placeholder="RR00"></td>
                <td><input type="text" name="RY[]" value="{{ $yantra->RY }}" placeholder="RY00"></td>
                <td><input type="text" name="CH[]" value="{{ $yantra->CH }}" placeholder="CH00"></td>
                <td><input type="text" value="<?php echo $row['status']; ?>" readonly></td>
                <td>
                    <input type="hidden" name="id[]" value="{{ $yantra->id }}">
                    <button class="action-btn" name="editresult">Update</button>
                </td>
            </tr>
            @endforeach
            {{--<tr>
                 <td><?php //echo $i; ?></td>
                <td><input type="text" value="<?php //echo $row['time']; ?>" readonly></td>
                <td><input type="text" name="NV[]" value="<?php //echo $row['NV']; ?>" placeholder="NV00"></td>
                <td><input type="text" name="RR[]" value="<?php //echo $row['RR']; ?>" placeholder="RR00"></td>
                <td><input type="text" name="RY[]" value="<?php //echo $row['RY']; ?>" placeholder="RY00"></td>
                <td><input type="text" name="CH[]" value="<?php //echo $row['CH']; ?>" placeholder="CH00"></td>
                <td><input type="text" value="<?php //echo $row['status']; ?>" readonly></td>
                <td>
                    <input type="hidden" name="id[]" value="<?php //echo $row['id']; ?>">
                    <button class="action-btn" name="editresult">Update</button>
                </td>
            </tr>--}}

            <?php //} ?>
        </tbody>
    </table>
</form>

@endsection
