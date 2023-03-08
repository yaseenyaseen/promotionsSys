@extends('blogs.layout')

@section('content')
    <h3>مسؤلين انجاز الخطة البحثية </h3>
    <br>
    @role('HeadDepartment_Coll')
    <div  class="pull-right">
        <a class="btn btn-secondary" href="{{ route('hamshs.forms.sciplanlistindex')}}" > رئيس القسم العلمي </a>
        {{-- the above line call a function named "sciplanlistindex" in the controller without need to send $user as a parameter.
          and it is accecpted bcs the destination page (call) does  not need a specific variable.--}}
    </div>
          @else
              <div class="pull-right">

                  <a class="btn btn-secondary disabled" href="#" aria-disabled="true"> رئيس القسم العلمي </a></div>
        @endrole

    <div class="pull-right">
        <br>
        <div class="pull-right">
            <a class="btn btn-secondary" href="{{ route('hamshs.forms.sciplanlistindex') }} "> مسؤل خطة بحثية(كلية)</a></div>
        <br>
    <div class="pull-right">
        <a class="btn btn-secondary" href="#">معاون العميد للشؤون العلمية </a></div>
    <br>
    <div class="pull-right">
        <a class="btn btn-secondary" href="#"> اسم مسؤول الخطة البحثية (رئاسة الجامعة)</a></div>
    <br>
    <div class="pull-right">
        <a class="btn btn-secondary" href="#">مدير قسم الشؤون العلمية (رئاسة الجامعة)</a></div>
    <br>
@endsection
