<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css"
          integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>تقرير السجلات</title>
</head>


<body>

<!-- start the header -->
<div class="row">
    <img src="{{Request::root()}}/bill/header.png" width="100%">
</div>
<!-- end the header -->


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center mt-4">{{ $date }} : تقرير السجلات بتاريخ </h2>


            <div class="row" dir="rtl">
                @if(count($logs) == 0)
                    <div class="col-md-12">
                        <p class="text-center text-danger fa-3x">لا يوجد سجلات متوفرة</p>
                    </div>
                @else
                    @foreach($logs as $row)
                        @include('dashboard.Home.dailyLogs.logCard')
                    @endforeach
                @endif
            </div>


        </div>
    </div>
</div>


<!-- end the title -->


<!-- start the footer -->


<!-- end the footer -->


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script type="text/javascript"
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script>
    $(document).ready(function () {
        window.print();
    });
</script>

</body>


</html>
