<h1 class="title">
    <?php echo $title; ?>
</h1>
<?php

if (isset($_GET['date'])) {
    $date = $_GET['date'];
    $date = date('d-m-Y', strtotime($date));
} else {
    $date = date('d-m-Y');
}

// $select10 = "SELECT * FROM result_status";
// $query10 = mysqli_query($conn, $select10);
// $row10 = mysqli_fetch_array($query10);
// $status10 = $row10['status'];

if ($title == 'Deposit' || $title == 'Withdraw' || $title == 'Result') {

?>
    <form action="" class="datepicker">
        <input type="date" name="date">
        <button>Search</button>
    </form>
<?php } ?>
<div class="section">
    <div>

        <a href="{{ route('user.list') }}" class="{{ request()->routeIs('user.list') ? 'active' : '' }}">User</a>

        <a href="{{ route('admin.deposit') }}" class="{{ request()->routeIs('admin.deposit') ? 'active' : '' }}">Deposit</a>

        <a href="withdraw.php" class="<?php if ($title == 'Withdraw') { echo 'active'; } ?>">Withdraw</a>

        <a href="result.php" class="<?php if ($title == 'Result') { echo 'active'; } ?>">Result</a>


        <?php if ($title == 'Result') { ?>
            <a href="function.php?generateresult=true" class="generate-result">Generate Results</a>
            <?php if ($status10 == 1) {  ?>
                <a onclick="resultStatusOff('off')">Manual</a>
            <?php } else { ?>
                <a onclick="resultStatusOn('on')">Automatic</a>
            <?php } ?>
        <?php } ?>

    </div>
    <div>
        <a href="../logout.php">Logout</a>
    </div>
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
