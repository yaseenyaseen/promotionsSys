@extends('blogs.layout')
@section('content')
    <h3>مسؤلين انجاز استمارة تقديم الطلب للترقية العلمية </h3>
    <br>
    @role('HeadDepartment_Coll|admin')
    <div class="pull-right">
        <a class="btn btn-secondary" href="{{ route('hamshs.forms.RequestApplyinglistindex')}}"> رئيس القسم العلمي </a>
        {{-- the above line call a function named "sciplanlistindex" in the controller without need to send $user as a parameter.
          and it is accecpted bcs the destination page (call) does  not need a specific variable.--}}
    </div>
    @else
        <div class="pull-right">
            <a class="btn btn-secondary disabled" href="#" aria-disabled="true"> رئيس القسم العلمي </a></div>
        @endrole
        <br>
        @role('Dean')
        <div class="pull-right">
            <a class="btn btn-secondary" href="#">عميد الكلية </a></div>
        <br>
        @else
            <div class="pull-right">
                <a class="btn btn-secondary disabled" href="#" aria-disabled="true">عميد الكلية </a></div>
            @endrole
            @endsection
