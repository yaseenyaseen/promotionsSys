
    <!DOCTYPE html>
<html>
<head>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Main layout page</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Reem+Kufi:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
          integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    {{--.................. old lines of yaseen --}}
  {{--  <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Main layout page </title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Reem+Kufi:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
          integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

--}}
</head>
<body class="antialiased" dir="rtl">
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

                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <a class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">
                            تسجيل خروج
                          </a>
                    </form>
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
{{--


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>




<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.2.min.js"
        integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA="
        crossorigin="anonymous"></script>

--}}

{{--
<div
    class="relative items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900  sm:pt-0">
    <main dir="rtl">
        @yield('content')
    </main>
</div>--}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.2.min.js"
        integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA="
        crossorigin="anonymous"></script>
<script>
</script>
</body>

</html>

{{-- add new layout from Husien--}}
  {{--
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Reem+Kufi:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
          integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .nav-link:hover {
            color: white !important;
            background-color: #4a5568;
            font-weight: bold;
        }

        .nav-item:hover .dropdown-menu {
            display: block;
        }

        #userDiv:hover .dropdown-menu {
            display: block;
        }

        .nav-link {
            color: #cbd5e0 !important;
            border-radius: 15px;
            border: solid 1px white;
            margin-right: 10px;
            margin-top: 10px;
            text-align: center;
            width: 100px;
        }

        .dropdown-menu {
            border-radius: 15px;
            background-color: rgba(255, 255, 255, 0.90);
        }

        .dropdown-item:hover {
            font-weight: bold;
        }

    </style>
</head>
<body class="antialiased">



--}}{{-- lines from Husien

<nav class="navbar navbar-expand-lg navbar-light sticky-top" dir="rtl" style="background-color: #6b7280;">
    <div class="container-fluid">
        <a class="navbar-brand" href="/"
           style="font-family: 'Acme', sans-serif;font-family: 'Reem Kufi', sans-serif; font-size:30px; color: white">منصة
            الخريجين</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @auth
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">الرئيسية</a>
                    </li>
                    @if(auth()->user()->hasRole('مسؤول النظام') || auth()->user()->hasRole('مخول تسجيل'))
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false" onmouseover="">
                                مراجعة
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="text-align: right">
                                @if(auth()->user()->hasRole('مسؤول النظام') || auth()->user()->hasRole('مخول تسجيل'))
                                    <li><a class="dropdown-item" href="{{route('reg_users')}}">مسجلون</a></li>
                                @endif
                                @if(auth()->user()->hasRole('مسؤول النظام') || auth()->user()->hasRole('موظف'))
                                    <li><a class="dropdown-item" href="{{route('review_post')}}">الوظائف والاعلانات</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            الاعلانات
                        </a>
                        <ul id="adsUl" class="dropdown-menu" aria-labelledby="navbarDropdown" style="text-align: right">
                            <li class="nav-item">
                                <a class="dropdown-item" href="{{route('announcements')}}">عرض الاعلانات</a>
                            </li>
                            @if(auth()->user()->hasRole('مسؤول النظام') || auth()->user()->hasRole('موظف'))
                                <li class="nav-item">
                                    <a class="dropdown-item" href="{{route('announcement_new')}}">إضافة اعلان</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link s" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            التوظيف
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="text-align: right">
                            <li><a class="dropdown-item" href="{{route('jobs')}}">عرض الوظائف</a></li>
                            @if(auth()->user()->hasRole('مسؤول النظام') || auth()->user()->hasRole('موظف') || auth()->user()->hasRole('جهة توظيف'))
                                <li><a class="dropdown-item" href="{{route('job_get_edit')}}">اضافة وظائف</a></li>
                            @endif
                            <li><a class="dropdown-item" href="{{route('resumes')}}">عرض السيرة الذاتية</a></li>
                        </ul>
                    </li>
                    @if(auth()->user()->hasRole('مسؤول النظام'))
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                الاعدادات
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="text-align: right">
                                @if(auth()->user()->hasRole('مسؤول النظام'))
                                    <li><a class="dropdown-item" href="{{ route('users_list') }}">الصلاحيات</a></li>
                                    <li><a class="dropdown-item" href="{{ route('add_new_admin') }}">المخولون</a></li>
                                    <li><a class="dropdown-item" href="{{ route('uni_dep') }}">اقسام الجامعة</a></li>
                                    <li><a class="dropdown-item" href="{{ route('workplaces') }}">اقسام خارج الجامعة</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('cities') }}">المدن</a></li>
                                @endif
                            </ul>
                        </li>
                    @endif
                    --}}{{--
--}}{{--                    @if(auth()->user()->hasRole('مسؤول النظام') || auth()->user()->hasRole('موظف'))--}}{{----}}{{--

                    --}}{{--
--}}{{--                        <li class="nav-item dropdown">--}}{{----}}{{--

                    --}}{{--
--}}{{--                            <a class="nav-link s" href="#" id="navbarDropdown" role="button"--}}{{----}}{{--

                    --}}{{--
--}}{{--                               data-bs-toggle="dropdown" aria-expanded="false">--}}{{----}}{{--

                    --}}{{--
--}}{{--                                الطلبة--}}{{----}}{{--

                    --}}{{--
--}}{{--                            </a>--}}{{----}}{{--

                    --}}{{--
--}}{{--                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="text-align: right">--}}{{----}}{{--

                    --}}{{--
--}}{{--                                <li><a class="dropdown-item" href="{{route('ranks')}}">عرض التسلسل</a></li>--}}{{----}}{{--

                    --}}{{--
--}}{{--                            </ul>--}}{{----}}{{--

                    --}}{{--
--}}{{--                        </li>--}}{{----}}{{--

                    --}}{{--
--}}{{--                    @endif--}}{{----}}{{--

                </ul>
            @endauth
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @if (Auth::check())
                    <li class="nav-item dropdown">
                        <a id="userDiv" class="nav-link" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            {{auth()->user()['name']}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="text-align: right">
                            <li><a class="dropdown-item" href="{{ route('profile') }}">الصفحة الشخصية</a></li>
                            <li><a class="dropdown-item" href="{{ route('my_resume') }}">سيرتي الذاتية</a></li>
                            <li><a class="dropdown-item" href="{{ route('reco_req') }}">طلب توصية</a></li>
                            <li><a class="dropdown-item" href="{{ route('reco_list') }}">قائمة التوصيات</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">تسجيل خروج</a></li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link ">تسجيل دخول</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link ">مستخدم جديد</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
--}}{{--

<div
    class="relative items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900  sm:pt-0">
    <main dir="rtl">
        @yield('content')
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.2.min.js"
        integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA="
        crossorigin="anonymous"></script>
<script>
</script>
</body>
</html>
--}}
