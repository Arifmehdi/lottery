function calculate() {
    var totalQty = [0, 0, 0, 0];
    var totalAmount = [0, 0, 0, 0];
    for (var i = 0; i < 40; i++) {
        var input = document.getElementById('t' + i);
        if (isNaN(input.value)) {
            input.value = '';
        }
        var quantity = parseInt(input.value) || 0;
        var amount = quantity * 11;
        var rowNumber = Math.floor(i / 10);
        totalQty[rowNumber] += quantity;
        totalAmount[rowNumber] += amount;
    }
    for (var j = 0; j < 4; j++) {
        var qtyId = 'qty' + (j + 1);
        var amountId = 'amount' + (j + 1);
        document.getElementById(qtyId).innerHTML = totalQty[j];
        document.getElementById(amountId).innerHTML = totalAmount[j];
    }
    var overallTotalQty = totalQty.reduce((a, b) => a + b, 0);
    document.getElementById('totalqty').innerHTML = overallTotalQty;
    var overallTotalAmount = totalAmount.reduce((a, b) => a + b, 0);
    document.getElementById('totalamount').innerHTML = overallTotalAmount;
}

function clearAll() {
    for (var i = 0; i < 40; i++) {
        var input = document.getElementById('t' + i);
        input.value = '';
    }
    for (var j = 1; j <= 4; j++) {
        var qtyId = 'qty' + j;
        var amountId = 'amount' + j;
        document.getElementById(qtyId).innerHTML = 0;
        document.getElementById(amountId).innerHTML = 0;
    }
    document.getElementById('totalqty').innerHTML = 0;
    document.getElementById('totalamount').innerHTML = 0;
}

function startClock() {
    var date = new Date();
    var h = date.getHours();
    var m = date.getMinutes();
    var s = date.getSeconds();

    h = h.toString().padStart(2, '0');
    m = m.toString().padStart(2, '0');

    var minuite = m;;
    var minuteMapping = [14, 13, 12, 11, 10, 9, 8, 7, 6, 5, 4, 3, 2, 1, 0];
    m = minuteMapping[m % 15];
    
    s = 59 - s;
    s = s.toString().padStart(2, '0');
    
    document.getElementById('viewTimer').innerHTML = (m < 10 ? '0' + m : m) + ':' + s;

    if (minuite >= 0 && minuite < 15) {
        m = '15';
    } else if (minuite >= 15 && minuite < 30) {
        m = '30';
    } else if (minuite >= 30 && minuite < 45) {
        m = '45';
    } else if (minuite >= 45 && minuite <= 59) {
        m = '00';
        h = parseInt(h) + 1;
    }

    document.getElementById('viewClock').innerHTML = h + ':' + m;
}

setInterval(startClock, 1000);


