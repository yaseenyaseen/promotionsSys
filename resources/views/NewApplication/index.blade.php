@extends('blogs.layout')

@section('content')
    <h3>الاستمارات المطلوبة لمعاملة الترقية الجديدة</h3>

    <br>
    <div class="pull-right">
        <a class="btn btn-secondary"
           href="{{route('createpapersdata')}}"> ملئ معلومات البحوث </a>
        {{--
        if applicant go to create paper(or update) send user_id.
        else if admin go to adminstrator page, selct role, selct user.
        --}}
    </div>
    <br>

    @role('Applicant')

    <div class="pull-right">
        <a class="btn btn-secondary"
           href="{{ route('hamshs.forms.sciplanindex',Auth::user()->id) }}"> تأييد خطة بحثية </a>
    </div>
    <div class="pull-right">
    <a class="btn btn-secondary"
       href="{{ route('requestApplyingindex',Auth::user()->id) }}"> تقديم طلب</a>
    </div>
    <div class="pull-right">
    <a class="btn btn-secondary"
       href="{{ route('AcademicReputationindex',Auth::user()->id) }}"> السمعة الاكاديمية </a>
    </div>
    <div class="pull-right">
    <a class="btn btn-secondary"
       href="{{ route('positionsDegreesindex',Auth::user()->id) }}">     معلومات عن الوظائف التي مارسها و الشهادة</a>
    </div>
    <div class="pull-right">
    <a class="btn btn-secondary"
       href="{{ route('thesesindex',Auth::user()->id) }}">     معلومات عن الاطاريح المتعلة بهذه الترقية</a>
    </div>
    <div class="pull-right">
        <a class="btn btn-secondary"
           href="{{ route('ProApplicationSummaryindex',Auth::user()->id) }}">  ملخص معاملة الترقية </a>
    </div>
    @else
        <div class="pull-right">
            <a class="btn btn-secondary" href="{{ route('hamshs.forms.administrators.index') }}"> تأييد خطة بحثية </a></div>
        <div class="pull-right">
            <br>

            <div class="pull-right">
                <a class="btn btn-secondary"
                   href="{{ route('hamshs.forms.administrators.indexrequestApplying') }}"> استمارة تقديم الطلب للترقية العلمية </a></div>
            <div class="pull-right">
                <a class="btn btn-secondary"
                   href="{{ route('adminAcademicReputationindex') }}"> السمعة الاكاديمية </a>
            </div>

        @endrole
    <br>
    <div class="pull-right">
        <a class="btn btn-secondary" href="#">بيانات الترقية</a></div>
    <br>
    <div class="pull-right">
        <a class="btn btn-secondary" href="#">تعهد خطي بعدم الاستلال</a></div>
    <br>
    <div class="pull-right">
        <a class="btn btn-secondary" href="#">السيرة الذاتية</a></div>
    <br>
    <div class="pull-right">
        <a class="btn btn-secondary" href="#">مواقع الكترونية</a></div>
    <br>
    <div class="pull-right">
        <a class="btn btn-secondary" href="#">ملخص معاملة ترقية</a></div>
    <br>
@endsection
