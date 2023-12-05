
<html>
<head>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-N9VH7L909J"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-N9VH7L909J');
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <br>
        <br>
   <div class="container">
    <h1 class="title">Total Sale Report</h1>
    <div>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.36">
    <title>Total Sale Report</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <style>
        table{
            text-align: center;
            margin: auto;
            font-size: 18px !important;
        }
        table, th, td {
               border: 1px solid black;
               height: 40px;
               background-color: #d9cf94;
        }
body{
                font-family: Calibri;
    text-align: center;
    background-color: #f66e92;
        }
        .table {
    width: 100%;
    border: 1px solid black;
    background-color: #F6EEAF;
}
.container {
    width: 1000px;
    margin: auto;
}
table, th, td {
    border: 1px solid;
    border-collapse: separate;
}
    </style>
</head>
<body class="body">
    <?php

    if (isset($_GET['date'])) {
    $date = $_GET['date'];
    $date = date("d-m-Y", strtotime($date));
    } else {
        $date = date('d-m-Y');
    }

    ?>
<div class="container">
    <form action="report.php" method="GET" class="form-group mt-4 d-flex">
        <div class="col-md-4"></div>
        <div class="col-md-4 d-flex" style="text-align:center">
            <input type="date" name="date" value="<?=(date("Y-m-d",strtotime($date)))?>"> <button>SEARCH</button>

        </div>
        <div class="col-md-4"></div>
    </form>
</div>


<br>

</body>
</html>
