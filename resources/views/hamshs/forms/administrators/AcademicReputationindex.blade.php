@extends('blogs.layout')
@section('content')
    <h3>مسؤلين انجاز  استمارة السمعة الاكاديمية  </h3>
    <br>
    @role('Computer_Center_Officer')
    <div class="pull-right">
        <a class="btn btn-secondary" href="{{ route('hamshs.forms.RequestApplyinglistindex')}}">  مسؤول مركز الحاسبة الالكترونية </a>
        {{-- the above line call a function named "sciplanlistindex" in the controller without need to send $user as a parameter.
          and it is accecpted bcs the destination page (call) does  not need a specific variable.--}}
    </div>
    @else
        <div class="pull-right">
            <a class="btn btn-secondary disabled" href="#" aria-disabled="true"> مسؤول مركز الحاسبة الالكترونية </a></div>
        @endrole

            @endsection
