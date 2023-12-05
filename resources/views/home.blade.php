

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.38">
    <title>PlayRoom</title>
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>

<form action="function.php" method="POST">
    <div class="container">
        <div class="section">
            <div class="section1">
                <h4 class="section1-a" style="color:black">
                    Welcome, {{ Auth::user()->phone }}
                </h4>
                <h4 class="section1-b" style="color:black">
                    Balance Points: {{ Auth::user()->balance }}
                </h4>
                <div>
                    @if(Auth::user()->role == 1)
                    <a href="{{route('home')}}" style="background-color:#020d6a">PlayRoom</a>
                    <a href="NavRatnaCouPon/deposit.php" style="background-color:#020d6a">Deposit</a>
                    <a href="NavRatnaCouPon/WithDraw.php" style="background-color:#020d6a">Withdraw</a>
                    <a href="{{route('user.list')}}" style="background-color:#020d6a">User</a>
                    <a href="NavRatnaCouPon/result.php" style="background-color:#020d6a">Result</a>
                    <a href="report.php">Report</a>
                    @else
                    <a href="{{route('home')}}" style="background-color:#020d6a">Bulk Coupons [ A ]</a>
                    <a href="{{route('home')}}" style="background-color:#020d6a">Bulk Coupons [ B ]</a>
                    <a href="{{route('home')}}" style="background-color:#020d6a">Jodi Coupons [ AB ]</a>
                    <a href="UserRoom/Deposit.php" style="background-color:#020d6a">Deposit Room</a>
                    <a href="UserRoom/WithDraw.php" style="background-color:#020d6a">WithDraw Room</a>
                    @endif
                </div>
            </div>
            <div class="section2" style="color:#020d6a">
                <div>
                    <a  class="glossy" style="background-color:#D49828" href="{{ route('logout') }}"  id="glossy_btn">Logout</a>
                                  {{-- <a class="dropdown-item" href="{{ route('logout') }}"
                                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                   {{ __('Logout') }}
                               </a> --}}
                </div>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

                <h4 class="section1-a">
                    Gift Event Code: <span id="viewClock"></span>
                </h4>
                <h4 class="section1-b">
                    Countdown: <span id="viewTimer"></span>
                </h4>
            </div>
        </div>
        <table class="table"  id="yantra-table">
            <thead>
                <tr style="color:#020d6a">
                    <th>Product Group</th>
                    <th>Win</th>
                    <th>00-09</th>
                    <th>10-19</th>
                    <th>20-29</th>
                    <th>30-39</th>
                    <th>40-49</th>
                    <th>50-59</th>
                    <th>60-69</th>
                    <th>70-79</th>
                    <th>80-89</th>
                    <th>90-99</th>
                    <th>Qty.</th>
                    <th>Amount</th>

                    <th>
                        {{ $timeToDisplay }}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>YANTRA GROUP-NV</td>
                    <td>100</td>
                    @for ($i = 0; $i < 10; $i++)
                        <td>
                            <input type="text" class="yantra-input" name="t{{ $i }}" id="t{{ $i }}" oninput="calculate()">
                        </td>
                    @endfor
                    <td id="qty1">0</td>
                    <td id="amount1">0</td>
                    <td>
                        @if($row1 && $row1->NV)
                            {{ $row1->NV }}
                        @else
                            {{ 'NV00' }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>YANTRA GROUP-RR</td>
                    <td>100</td>
                    @for ($i = 10; $i < 20; $i++)
                    <td>
                        <input type="text" class="yantra-input" name="t{{ $i }}" id="t{{ $i }}" oninput="calculate()">
                    </td>
                    @endfor
                    <td id="qty2">0</td>
                    <td id="amount2">0</td>
                    <td>
                        @if($row1 && $row1->RR)
                        {{ $row1->RR }}
                        @else
                        {{ 'RR00' }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>YANTRA GROUP-RY</td>
                    <td>100</td>
                    @for ($i = 20; $i < 30; $i++)
                    <td>
                        <input type="text" class="yantra-input" name="t{{ $i }}" id="t{{ $i }}" oninput="calculate()">
                    </td>
                    @endfor
                    <td id="qty3">0</td>
                    <td id="amount3">0</td>
                    <td>

                        @if($row1 && $row1->RY)
                        {{ $row1->RY }}
                        @else
                        {{ 'RY00' }}
                        @endif

                    </td>
                </tr>
                <tr>
                    <td>YANTRA GROUP-CH</td>
                    <td>100</td>
                    @for ($i = 30; $i < 40; $i++)
                    <td>
                        <input type="text" class="yantra-input" name="t{{ $i }}" id="t{{ $i }}" oninput="calculate()">
                    </td>
                    @endfor
                    <td id="qty4">0</td>
                    <td id="amount4">0</td>
                    <td>

                        @if($row1 && $row1->CH)
                        {{ $row1->CH }}
                        @else
                        {{ 'CH00' }}
                        @endif


                       </td>
                </tr>
                <tr>
                    <td colspan="12" class="total">Total: </td>
                    <td id="totalqty">0</td>
                    <td id="totalamount">0</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <div class="button">
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <a onclick="clearAll()" class="glossy" style="background-color:#005D02">ADVANCE</a>
            <button type="submit" class="glossy" style="background-color:#005D02" name="buy_ticket">BUY</button>
            <a onclick="clearAll()" class="glossy" style="background-color:#B80007">CLEAR</a>
            <button type="submit" class="glossy" name="cancel_ticket" style="background-color:#B80007">CANCEL</button>
            <a href="report.php" class="glossy" style="background-color:#B80007">HISTORY</a>
            <a href="BuyTicket.php" class="glossy" style="background-color:#B80007">REPORT</a>
            <a href="{{route('result')}}" class="glossy" style="background-color:#B80007">RESULT</a>

        </div>
        <br>
        <br>
        <div class="footer"  style="font-weight: 500;">
            <h3 style="color:#FFFFFF;">For Yantra Code :- Reach us @ navratnacoupon@gmail.com</h3>
            <h3 style="color:#FFFFFF;">Copyright @ 2015 goldennavratnacoupon.com are reserved.</h3>
            <h3 style="color:#FFFFFF;">Visitor's Count : 9999999999999</h3>
            <h3 style="color:#020d6a;">Our All Products</h3>
        </TD>
        </div>
    </div>
</form>
    <script>

        setInterval(function(){

        const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            const timeString = `${hours}:${minutes}:${seconds}`;
            console.log(minutes)

            if( (minutes == 16 || minutes == 31 || minutes == 46 || minutes == 01)){
                //window.hasReloaded = true
                window.location.reload();
            }


            // if ((minutes === 16 || minutes === 31 || minutes === 46 || minutes === 0) && !window.hasReloaded) {
            //     window.hasReloaded = true; // Set the flag to prevent multiple reloads
            //     window.location.reload();
            // } else if (minutes !== 16 && minutes !== 31&& minutes !== 46 && minutes !== 0) {
            //     // Reset the flag at other minutes to allow reloading in the next hour
            //     window.hasReloaded = false;
            // }

}, 60000);
    </script>
<script src="{{asset('frontend/assets/js/script.js')}}"></script>
<script>
$(document).ready(function(){

    $('#glossy_btn').click(function(event){
        event.preventDefault();
        $('#logout-form').submit()
        // document.getElementById('logout-form').submit();
        // alert('ajsgdasdjashdj')
    })
})
</script>

<div class="collapse navbar-collapse " id="navbarSupportedContent" style="display:none">


                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item " href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>

</div>
</body>
</html>
