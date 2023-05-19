@extends('blogs.layout')

@section('content')
    <h3>الاستمارات المطلوبة لمعاملة الترقية الجديدة</h3>


    @role('Applicant|admin')
    <br>
    <br>
    <label>استمارات لمقدم الترقية</label>
    <br>
    <div class="pull-right">
        <a class="btn btn-secondary"
           href="{{route('userPromotiondata')}}"> ملئ بيانات لمقدم الترقية </a>
    </div>
    <br>
    <div class="pull-right">
        <a class="btn btn-secondary"
           href="{{route('createpapersdata')}}"> ملئ معلومات البحوث </a>
    </div>
    <br>

    <div class="pull-right">
        <a class="btn btn-secondary"
           href="{{ route('hamshs.forms.sciplanindex',Auth::user()->id) }}"> تأييد خطة بحثية </a>
    </div>
    <br>
    <div class="pull-right">
    <a class="btn btn-secondary"
       href="{{ route('requestApplyingindex',Auth::user()->id) }}"> تقديم طلب</a>
    </div>
    <br>
    <div class="pull-right">
    <a class="btn btn-secondary"
       href="{{ route('AcademicReputationindex',Auth::user()->id) }}"> السمعة الاكاديمية </a>
    </div>
    <br>
    <div class="pull-right">
    <a class="btn btn-secondary"
       href="{{ route('positionsDegreesindex',Auth::user()->id) }}">     معلومات عن الوظائف التي مارسها و الشهادة</a>
    </div>
    <br>
    <div class="pull-right">
    <a class="btn btn-secondary"
       href="{{ route('thesesindex',Auth::user()->id) }}">     معلومات عن الاطاريح المتعلة بهذه الترقية</a>
    </div>
    <br>
    <div class="pull-right">
        <a class="btn btn-secondary"
           href="{{ route('ProApplicationSummaryindex',Auth::user()->id) }}">  ملخص معاملة الترقية </a>
    </div>
    <br>
    @endrole
    @hasanyrole('HeadDepartment_Coll|Coll_ResearchPlan_Officer|Computer_Center_Officer|admin')
    <label>أدارة الاستمارات</label>

    <div class="pull-right">
            <a class="btn btn-secondary" href="{{ route('hamshs.forms.administrators.index') }}"> تأييد خطة بحثية </a></div>
        <div class="pull-right">
            <br>

            <div class="pull-right">
                <a class="btn btn-secondary"
                   href="{{ route('hamshs.forms.administrators.indexrequestApplying') }}"> استمارة تقديم الطلب للترقية العلمية </a></div>
            <br>
            <div class="pull-right">
                <a class="btn btn-secondary"
                   href="{{ route('adminAcademicReputationindex') }}"> السمعة الاكاديمية </a>
            </div>
        @endrole
    <br>
    <div class="pull-right">
        <a class="btn btn-warning" href="#">بيانات الترقية</a></div>
    <br>
    <div class="pull-right">
        <a class="btn btn-warning" href="#">تعهد خطي بعدم الاستلال</a></div>
    <br>
    <div class="pull-right">
        <a class="btn btn-warning" href="#">السيرة الذاتية</a></div>
    <br>

<br>
    <br>

@endsection
