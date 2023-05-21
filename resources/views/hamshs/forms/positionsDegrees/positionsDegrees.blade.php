@extends('blogs.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div>
                <h2>متطلبات الترقية-استمارة معلومات الوظائف التي مارسها و الشهادة مقدم الترقية </h2>
                <br>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                @role('Applicant|admin')
                <br>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('NewApplicationBoard')}}"> صفحة الاستمارات
                        المطلوبة </a>
                </div>
                @endrole
                <br>
                <div>
                    The user name is: <br>
                    {{Auth::user()->name}} <br> <br>
                </div>
                @role('Applicant|admin')
                <br>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('createpositionsDegrees') }}">أضافة وظيفة</a>
                </div>
                <br>
                <a class="btn btn-primary" href="{{ route('editpositionsDegrees') }}">
                    تعديل قائمة الوظائف </a>
                <a class="btn btn-info"
                   href="{{ route('showPositionsDegrees') }}">طباعة قائمة الوظائف </a>
<br>
                <br>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('createpositionsDegrees2') }}">أضافة شهادة جامعية</a>
                </div>
                <br>
                <a class="btn btn-primary" href="{{ route('editpositionsDegrees2') }}">
                    تعديل قائمة الشهادات </a>
                <a class="btn btn-info"
                   href="{{ route('showPositionsDegrees2') }}">طباعة قائمة الشهادات </a>
               @endrole
                <br>
                <br>
             {{--   <table class="table table-dark">
                    <thead>
                    <tr>
                        <th>عنوان الوظيفة</th>
                        <th> جهة العمل</th>
                        <th> تاريخ بداية العمل</th>
                        <th> تاريخ نهاية العمل</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($PositionsHeldBy as $PositionHeldBy)
                        <tr>
                            <td>{{ $PositionHeldBy['workDescriptoin'] }}</td>
                            <td>{{ $PositionHeldBy['workplace'] }}</td>
                            <td>{{date('Y-m-d',trim(strtotime( $PositionHeldBy['sDate']))) }}</td>
                            <td>{{date('Y-m-d',trim(strtotime( $PositionHeldBy['edate']))) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>--}}
    <br>
    <br>
    <br>

@endsection
