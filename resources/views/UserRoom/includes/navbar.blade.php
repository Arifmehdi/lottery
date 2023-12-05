<h1 class="title">{{ $title }}</h1>
<?php

if (isset($_GET['date'])) {
    $date = $_GET['date'];
    $date = date('d-m-Y', strtotime($date));
} else {
    $date = date('d-m-Y');
}

//if ($title == 'Deposit History' || $title == 'Withdraw History') {

?>
    {{-- <form action="" class="datepicker">
        <input type="date" name="date">
        <button>Search</button>
    </form> --}}
<?php //} ?>
<div class="section">
    <div>
        <a href="{{route('home')}}">Playroom</a>

        <?php if ($title == 'Deposit' || $title == 'Deposit History') {?>
        <a href="{{route('user.deposit')}}" class="<?php if ($title == 'Deposit') { echo 'active'; } ?>">Deposit</a>

        <a href="{{ route('user.deposit.history') }}" class="<?php if ($title == 'Deposit History') { echo 'active'; } ?>">Deposit History</a><?php } ?>

        <?php if ($title == 'Withdraw' || $title == 'Withdraw History') {?>
        <a href="{{ route('user.withdraw') }}" class="<?php if ($title == 'Withdraw') { echo 'active'; } ?>">Withdraw</a>

        <a href="{{ route('user.withdraw.history') }}" class="<?php if ($title == 'Withdraw History') { echo 'active'; } ?>">Withdraw History</a><?php } ?>
    </div>
    {{--<div>
        <a href="../logout.php">Logout</a>
    </div>--}}
</div>

<?php
if (isset($_SESSION['success'])) {
?>
<div class="message">
    <div class="success">
        <div class="h3">
            <?php echo $_SESSION['success']; ?>
        </div>
        <a href="" onclick="location.reload()">x</a>
    </div>
</div>
<?php
unset($_SESSION['success']);
} else if (isset($_SESSION['error'])) {
?>
<div class="message">
    <div class="error">
        <div class="h3">
            <?php echo $_SESSION['error']; ?>
        </div>
        <a href="" onclick="location.reload()">x</a>
    </div>
</div>
<?php unset($_SESSION['error']); } ?>
