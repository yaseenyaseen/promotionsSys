@extends('blogs.layout')

@section('content')

    <div class="py-4 m-6 m-2">
            <div class="row">

                @role('Applicant|admin')

                <div class="col-sm-12 col-md-12 py-3" style="text-align: center">
                    <a class="btn btn-secondary" href="{{route('newapplicaion')}}"> أنشاء معاملة جديدة</a>
                </div>
                <div class="col-sm-12 col-md-12 py-3" style="text-align: center">
                    <a class="btn btn-secondary" href="{{route('NewApplicationBoard')}}"> أكمال ترويج معاملة</a>
                </div>
                <div class="col-sm-12 col-md-12py-3" style="text-align: center">
                    <a class="btn btn-secondary" href="#"> الأطلاع على أوليات ترقيات سابقة</a>
                </div>

                @endrole
                @hasanyrole('HeadDepartment_Coll|Coll_ResearchPlan_Officer|Computer_Center_Officer|admin')
                <div class="col-sm-12 col-md-12 py-3" style="text-align: center">
                    <a class="btn btn-secondary" href="{{route('NewApplicationBoard')}}"> أدارة معاملة الترقية</a>
                </div>
                @endrole

                <div class="col-sm-12 col-md-12 py-3" style="text-align: center">
                    <a class="btn btn-secondary" href="{{route('users_list')}}"> أدارة ادوار نظام الترقية</a>
                </div>

            </div>


    </div>
    <br>
    <br>
    <br>

@endsection
