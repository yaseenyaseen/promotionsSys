@extends('blogs.layout')

@section('content')
    <h3>مسؤلين انجاز الخطة البحثية </h3>
    <br>
    {{--improve following code by adding role name automatically, then call one route only--}}
    @role('رئيس قسم الكلية|admin')
    <div class="pull-right">
        <a class="btn btn-secondary" href="{{ route('hamshs.forms.sciplanlistindex')}}"> رئيس القسم العلمي </a>
        {{-- the above line call a function named "sciplanlistindex" in the controller without need to send $user as a parameter.
          and it is accecpted bcs the destination page (call) does  not need a specific variable.--}}
    </div>
    <br>

    @else
        <div class="pull-right">

            <a class="btn btn-secondary disabled" href="#" aria-disabled="true"> رئيس القسم العلمي </a></div>
        <br>
        @endrole
        @role('Coll_ResearchPlan_Officer')

        <div class="pull-right">
            <div class="pull-right">
                <a class="btn btn-secondary" href="{{ route('hamshs.forms.sciplanlistindex') }} "> مسؤل خطة
                    بحثية(كلية)</a></div>
            <br>

            @else
                <div class="pull-right">

                    <a class="btn btn-secondary disabled" href="#" aria-disabled="true"> مسؤل خطة بحثية(كلية) </a></div>
                <br>
                @endrole
                @role('معاون العميد للشؤون العلمية (كلية)')
                <div class="pull-right">
                    <a class="btn btn-secondary" href="{{ route('hamshs.forms.sciplanlistindex') }}">معاون العميد للشؤون العلمية (كلية) </a></div>
                <br>
                @else
                    <div class="pull-right">
                        <a class="btn btn-secondary disabled" href="#">معاون العميد للشؤون العلمية (كلية) </a></div>
                    <br>
                    @endrole

                    @role('Presidency_Research_Plan_Officer')
                    <div class="pull-right">
                        <a class="btn btn-secondary" href="{{ route('hamshs.forms.sciplanlistindex') }}"> اسم مسؤول الخطة البحثية (رئاسة الجامعة)</a></div>
                    <br>
                    @else
                        <div class="pull-right">
                            <a class="btn btn-secondary disabled" href="#"> اسم مسؤول الخطة البحثية (رئاسة الجامعة)</a>
                        </div>
                        <br>
                        @endrole
                        @role('Presidency_DirectorDepart_Scient_Affairs')
                        <div class="pull-right">
                            <a class="btn btn-secondary" href="#">مدير قسم الشؤون العلمية (رئاسة الجامعة)</a></div>
                        <br>
                        @else
                            <div class="pull-right">
                                <a class="btn btn-secondary disabled" href="#">مدير قسم الشؤون العلمية (رئاسة
                                    الجامعة)</a></div>
                            <br>
                            @endrole
                            <br>
                            <br>
                            <br>

        @endsection
