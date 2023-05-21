@extends('blogs.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div>
                <h2>متطلبات الترقية-معلومات عن الاطاريح المتعلة بهذه الترقية </h2>
                <br>
                <br>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                @role('Applicant|admin')
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('NewApplicationBoard')}}"> صفحة الاستمارات
                        المطلوبة </a>
                </div>
                @endrole
                <div>
                    The user name is: <br>
                    {{Auth::user()->name}} <br> <br>
                </div>
                @role('Applicant|admin')
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('createthesis') }}">أضافة أطروحة </a>
                </div>
                <br>
                <a class="btn btn-primary" href="{{ route('edittheses') }}">
                    تعديل قائمة الاطاريح </a>
                <a class="btn btn-info"
                   href="{{ route('showtheses') }}">طباعة قائمة الاطاريح </a>
                @endrole
@endsection
