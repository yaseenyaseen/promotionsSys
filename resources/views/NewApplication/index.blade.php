@extends('blogs.layout')

@section('content')
<<<<<<< HEAD
    <div class="container">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3 style="text-align: center; padding-top: 15px">الاستمارات المطلوبة لمعاملة الترقية الجديدة</h3>
            </div>
        </div>
        <br>
        <br>
=======
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
           href="{{route('createpapersdata')}}"> ملئ بيانات البحوث </a>
    </div>
    <br>
    <div class="pull-right">
        <a class="btn btn-secondary"
           href="{{ route('positionsDegreesindex',Auth::user()->id) }}">     بيانات عن الوظائف التي مارسها و الشهادة</a>
    </div>
    <br>
    <div class="pull-right">
        <a class="btn btn-secondary"
           href="{{ route('thesesindex',Auth::user()->id) }}">     بيانات عن الاطاريح المتعلة بهذه الترقية</a>
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
>>>>>>> bf72b9581d19a5757ea153d88369b4b4d826b61f

        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4 py-3">
                <a class="btn btn-secondary"
                   href="{{route('createpapersdata')}}"> ملئ معلومات البحوث </a>
            </div>
            @role('Applicant')
            <div class="col-sm-12 col-md-6 col-lg-4 py-3">
                <a class="btn btn-secondary"
<<<<<<< HEAD
                   href="{{route('userPromotiondata')}}"> ملئ بيانات لمقدم الترقية </a>
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
                   href="{{ route('positionsDegreesindex',Auth::user()->id) }}"> معلومات عن الوظائف التي مارسها و
                    الشهادة</a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 py-3">
                <a class="btn btn-secondary"
                   href="{{ route('thesesindex',Auth::user()->id) }}"> معلومات عن الاطاريح المتعلة بهذه الترقية</a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 py-3">
                <a class="btn btn-secondary"
                   href="{{ route('ProApplicationSummaryindex',Auth::user()->id) }}"> ملخص معاملة الترقية </a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 py-3">
                <a class="btn btn-secondary" href="{{ route('hamshs.forms.administrators.index') }}"> تأييد خطة
                    بحثية </a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 py-3">
                <a class="btn btn-secondary"
                   href="{{ route('hamshs.forms.administrators.indexrequestApplying') }}"> استمارة تقديم الطلب للترقية
                    العلمية </a>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-4 py-3">
                <a class="btn btn-secondary"
                   href="{{ route('adminAcademicReputationindex') }}"> السمعة الاكاديمية </a>
            </div>
            @endrole

            <div class="col-sm-12 col-md-6 col-lg-4 py-3">
                <a class="btn btn-secondary" href="#">بيانات الترقية</a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 py-3">
                <a class="btn btn-secondary" href="#">بيانات الترقية</a>

            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 py-3">
                <a class="btn btn-secondary" href="#">تعهد خطي بعدم الاستلال</a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 py-3">
                <a class="btn btn-secondary" href="#">السيرة الذاتية</a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 py-3">
                <a class="btn btn-secondary" href="#">مواقع الكترونية</a>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 py-3">
                <a class="btn btn-secondary" href="#">ملخص معاملة ترقية</a>
            </div>
        </div>
    </div>

    <br>
    <br>

    <br>
=======
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
>>>>>>> bf72b9581d19a5757ea153d88369b4b4d826b61f
    <br>

@endsection
