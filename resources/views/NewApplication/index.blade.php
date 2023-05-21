@extends('blogs.layout')

@section('content')

    <div class="container">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3 style="text-align: center; padding-top: 15px">الاستمارات المطلوبة لمعاملة الترقية الجديدة</h3>
            </div>
        </div>

        @role('Applicant|admin')
        <br>
        <div style="width: 100%; height: 20px; border-bottom: 1px solid black; text-align: center">
            <span style="font-size: 20px; background-color: white; padding: 0 10px;">
                استمارات لمقدم الترقية
            </span>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4 py-3">
                <a class="btn btn-secondary"
                   href="{{route('userPromotiondata')}}"> ملئ بيانات لمقدم الترقية </a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 py-3">
                <a class="btn btn-secondary"
                   href="{{route('createpapersdata')}}"> ملئ بيانات البحوث </a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 py-3">
                <a class="btn btn-secondary"
                   href="{{ route('positionsDegreesindex',Auth::user()->id) }}"> بيانات عن الوظائف التي مارسها و
                    الشهادة</a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 py-3">
                <a class="btn btn-secondary"
                   href="{{ route('thesesindex',Auth::user()->id) }}"> بيانات عن الاطاريح المتعلة بهذه الترقية</a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 py-3">
                <a class="btn btn-secondary"
                   href="{{ route('hamshs.forms.sciplanindex',Auth::user()->id) }}"> تأييد خطة بحثية </a>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-4 py-3">
                <a class="btn btn-secondary"
                   href="{{ route('requestApplyingindex',Auth::user()->id) }}"> تقديم طلب</a>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-4 py-3">
                <a class="btn btn-secondary"
                   href="{{ route('AcademicReputationindex',Auth::user()->id) }}"> السمعة الاكاديمية </a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 py-3">
                <a class="btn btn-secondary"
                   href="{{ route('ProApplicationSummaryindex',Auth::user()->id) }}"> ملخص معاملة الترقية </a>
            </div>

        </div>
        <br>
        @endrole
        @hasanyrole('HeadDepartment_Coll|Coll_ResearchPlan_Officer|Computer_Center_Officer|admin')
        <div style="width: 100%; height: 20px; border-bottom: 1px solid black; text-align: center">
            <span style="font-size: 20px; background-color: white; padding: 0 10px;">
                أدارة الاستمارات
            </span>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4 py-3">
                <a class="btn btn-secondary" href="{{ route('hamshs.forms.administrators.index') }}"> تأييد خطة
                    بحثية </a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 py-3">
                <a class="btn btn-secondary" href="{{ route('hamshs.forms.administrators.indexrequestApplying') }}">
                    استمارة تقديم الطلب للترقية العلمية
                </a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 py-3">
                <a class="btn btn-secondary"
                   href="{{ route('adminAcademicReputationindex') }}"> السمعة الاكاديمية </a>
            </div>
        </div>
        @endrole
        <br>
        <div style="width: 100%; height: 20px; border-bottom: 1px solid black; text-align: center">
            <span style="font-size: 20px; background-color: white; padding: 0 10px;">
                not completed
            </span>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4 py-3">
                <a class="btn btn-warning" href="#">بيانات الترقية</a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 py-3">
                <a class="btn btn-warning" href="#">تعهد خطي بعدم الاستلال</a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 py-3">
                <a class="btn btn-warning" href="#">السيرة الذاتية</a>
            </div>
        </div>

        <br>
        <br>
        <br>

@endsection
