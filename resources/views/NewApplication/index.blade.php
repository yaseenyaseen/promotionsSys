@extends('blogs.layout')

@section('content')
    <h3>الاستمارات المطلوبة لمعاملة الترقية الجديدة</h3>

    <br>
    <div class="pull-right">
        <a class="btn btn-secondary"
           href="{{route('createpapersdata')}}"> ملئ معلومات البحوث </a>
    </div>
    <br>

    @role('Applicant')

    <div class="pull-right">
        <a class="btn btn-secondary"
           href="{{ route('hamshs.forms.sciplanindex',Auth::user()->id) }}"> تأييد خطة بحثية </a>
    </div>
    <a class="btn btn-secondary"
       href="{{ route('requestApplyingindex',Auth::user()->id) }}"> تقديم طلب</a>
    </div>

    @else
        <div class="pull-right">
            <a class="btn btn-secondary" href="{{ route('hamshs.forms.administrators.index') }}"> تأييد خطة بحثية </a></div>
        <div class="pull-right">
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
