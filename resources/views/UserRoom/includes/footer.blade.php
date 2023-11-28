<div class="footer">
    <h3>For Yantra Code:- Reach us @ navratnacoupon@gmail.com</h3>
    <h3>Copyright @ 2015 goldennavratnacoupon.com. are reserved.</h3>
    <h3>Visitor's Count : 9999999999999</h3>
    <h3>Our All Products</h3>
</div>
</div>

<script>
function resultStatusOff(id) {
    var link = "function.php?resultstatus=" + id;
    if (confirm('Are you sure you want to enable manual mode!')) {
        window.location.href = link;
    }
}

function resultStatusOn(id) {
    var link = "function.php?resultstatus=" + id;
    if (confirm('Are you sure you want to enable automatic mode!')) {
        window.location.href = link;
    }
}

function deleteUser(id) {
    var link = "function.php?deleteuser=" + id;
    if (confirm('Are you sure you want to delete user!')) {
        window.location.href = link;
    }
}

function deleteDeposit(id) {
    var link = "function.php?deletedeposit=" + id;
    if (confirm('Are you sure you want to delete deposit request!')) {
        window.location.href = link;
    }
}

function deleteWithdraw(id) {
    var link = "function.php?deletewithdraw=" + id;
    if (confirm('Are you sure you want to delete withdraw request!')) {
        window.location.href = link;
    }
}
</script>

</body>
</html>
