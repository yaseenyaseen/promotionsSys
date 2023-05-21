<?php
/*if(isset($_POST['submit'])){
$place=$_POST['place'];
$sql="insert into ' select_data' (place) values ('$place')";
$result=mysqli_query($sql);
if($result){
    echo "Data inserted";}
else{die(mysqli_error());}

    }
echo{$place}
*/ ?>

    <!DOCTYPE html>
<html>
<head>
    <title>Main layout page </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body dir="rtl">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}"> الصفحة الرئيسية</a>
                </li>
            </ul>
            <ul class="navbar-nav nav-left ">
                <li class="nav-item">
                    <a class="nav-link"
                       href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();">
                        تسجيل خروج
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <h2 style="padding-top: 10px; color: white; text-align:center">أجراءات الترقية</h2>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container" style="text-align: right">
    @yield('content')
</div>

<nav class="navbar fixed-bottom navbar-light bg-light">
    <div class="container-fluid">
        <p class="text-muted" style="text-align: center"> جامعة الانبار{{date("Y")}}@ </p>
    </div>

</nav>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>
